<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use App\Exports\WaliAbsensiExport;
use App\Imports\WaliAbsensiImport;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;

class WaliAbsensiController extends Controller
{
    public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | GURU LOGIN
    |--------------------------------------------------------------------------
    */

    $guru = Auth::user()->guru;


    /*
|--------------------------------------------------------------------------
| TAHUN AJARAN YANG DILIHAT
|--------------------------------------------------------------------------
*/

$tahunAjaran = $request->filled('tahun_ajaran_id')
    ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
    : TahunAjaran::where('status', 'Aktif')->first();

if (!$tahunAjaran) {
    abort(404, 'Tahun ajaran belum tersedia.');
}


/*
|--------------------------------------------------------------------------
| TAHUN AJARAN AKTIF
|--------------------------------------------------------------------------
*/

$tahunAktif = TahunAjaran::where(
    'status',
    'Aktif'
)->first();


/*
|--------------------------------------------------------------------------
| MODE ARSIP
|--------------------------------------------------------------------------
*/

$modeArsip = $tahunAjaran->status !== 'Aktif';

    /*
    |--------------------------------------------------------------------------
    | TAHUN STRUKTUR KELAS
    |--------------------------------------------------------------------------
    */

    $tahunStruktur = $tahunAjaran;

if (strtolower($tahunAjaran->semester) === 'genap') {

    $tahunStruktur = TahunAjaran::where(
        'tahun_ajaran',
        $tahunAjaran->tahun_ajaran
    )
    ->where(
        'semester',
        'Ganjil'
    )
    ->first();

    if (!$tahunStruktur) {
        abort(
            404,
            'Data tahun ajaran Ganjil untuk struktur kelas belum tersedia.'
        );
    }
}
    


    /*
    |--------------------------------------------------------------------------
    | KELAS WALI
    |--------------------------------------------------------------------------
    */

    $kelas = Kelas::where(
        'wali_kelas_id',
        $guru->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunStruktur->id
    )
    ->first();

    if (!$kelas) {
        abort(
            403,
            'Guru belum memiliki kelas pada tahun ajaran ini.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SISWA DALAM KELAS
    |--------------------------------------------------------------------------
    */

    $ids = AnggotaKelas::where(
        'kelas_id',
        $kelas->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunStruktur->id
    )
    ->pluck('siswa_id');

    $siswas = Siswa::whereIn(
        'id',
        $ids
    )
    ->orderBy('nama_siswa')
    ->get();
/*
|--------------------------------------------------------------------------
| FILTER REKAP
|--------------------------------------------------------------------------
*/

$bulan = $request->bulan ?? now()->month;

$tahun = (int) explode('/', $tahunAktif->tahun_ajaran)[0];

$mapelId = $request->mapel_id;

/*
|--------------------------------------------------------------------------
| MASTER MAPEL
|--------------------------------------------------------------------------
*/

$mapels = Mapel::orderBy(

    'nama_mapel'

)->get();

/*
|--------------------------------------------------------------------------
| JUMLAH HARI
|--------------------------------------------------------------------------
*/

$jumlahHari = Carbon::create(

    $tahun,

    $bulan

)->daysInMonth;
/*
|--------------------------------------------------------------------------
| ARRAY REKAP
|--------------------------------------------------------------------------
*/

$data = [];



foreach($siswas as $siswa){

    $tanggalData = [];

    $hadir = 0;

    $izin = 0;

    $sakit = 0;

    $alfa = 0;

    for($i=1;$i<=$jumlahHari;$i++){

    $tanggal = Carbon::create(

        $tahun,

        $bulan,

        $i

    )->format('Y-m-d');
    
    
    $absen = Absensi::where(

        'siswa_id',

        $siswa->id

    )

    ->where(

        'kelas_id',

        $kelas->id

    )

    ->where(
    'tahun_ajaran_id',
    $tahunAjaran->id
)

->where(
    'semester',
    $tahunAjaran->semester
)

    ->whereDate(

        'tanggal',

        $tanggal

    );

    if ($mapelId) {
    $absen->where('mapel_id', $mapelId);
}

    $absen = $absen->first();




/*
|--------------------------------------------------------------------------
| STATUS HARIAN
|--------------------------------------------------------------------------
*/

if($absen){

    switch(strtolower($absen->status)){

        case 'hadir':

            $tanggalData[$i] = 'H';

            $hadir++;

        break;

        case 'izin':

            $tanggalData[$i] = 'I';

            $izin++;

        break;

        case 'sakit':

            $tanggalData[$i] = 'S';

            $sakit++;

        break;

        case 'alfa':

            $tanggalData[$i] = 'A';

            $alfa++;

        break;

        default:

            $tanggalData[$i] = '-';

    }

}else{

    $tanggalData[$i] = '-';

}
    }
    /*
|--------------------------------------------------------------------------
| REKAP
|--------------------------------------------------------------------------
*/

$total =

    $hadir +

    $izin +

    $sakit +

    $alfa;

$persentase =

    $jumlahHari > 0

    ?

    round(

        ($hadir / $jumlahHari) * 100

    )

    :

    0;

    $data[] = [

    'siswa' => $siswa,

    'tanggal' => $tanggalData,

    'hadir' => $hadir,

    'izin' => $izin,

    'sakit' => $sakit,

    'alfa' => $alfa,

    'total' => $total,

    'persentase' => $persentase

];
}


  return view(
    'wali.absensi',
   compact(
    'guru',
    'kelas',
    'siswas',
    'mapels',
    'bulan',
    'tahun',
    'jumlahHari',
    'tahunAktif',
    'tahunAjaran',
    'modeArsip',
    'mapelId',
    'data'
)
);
}

public function export(Request $request)
{

    return Excel::download(

        new WaliAbsensiExport(

            $request->kelas,

            $request->bulan,

            $request->tahun,

            $request->mapel_id

        ),

        'Rekap_Absensi.xlsx'

    );

}
public function import(Request $request)
{

    $request->validate([

        'file'=>'required|mimes:xlsx,xls'

    ]);

    Excel::import(

        new WaliAbsensiImport,

        $request->file('file')

    );

    return back()->with(

        'success',

        'Import absensi berhasil.'

    );

}
}
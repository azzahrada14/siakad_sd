<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;

use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

  public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | DATA LOGIN
    |--------------------------------------------------------------------------
    */

    $user = Auth::user();

    $guru = $user->guru ?? null;


    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    $tahunajaran = TahunAjaran::orderByDesc('id')->get();

    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {

        return back()->with(
            'error',
            'Belum ada Tahun Ajaran yang tersedia.'
        );

    }

    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    $modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
|--------------------------------------------------------------------------
| TAHUN STRUKTUR KELAS
|--------------------------------------------------------------------------
| Pembagian kelas hanya dilakukan pada semester Ganjil.
| Semester Genap menggunakan struktur kelas dari Ganjil.
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

        return back()->with(
            'error',
            'Data tahun ajaran Ganjil untuk struktur kelas belum tersedia.'
        );

    }
}

    /*
    |--------------------------------------------------------------------------
    | MASTER
    |--------------------------------------------------------------------------
    */

    $semester = [
        'Ganjil',
        'Genap'
    ];

    $kelas = collect();

    $mapels = collect();


    /*
    |--------------------------------------------------------------------------
    | HAK AKSES
    |--------------------------------------------------------------------------
    */

    if (!$guru) {

        // Operator

        $kelas = Kelas::where(
            'status',
            'Aktif'
        )
        ->orderBy('nama_kelas')
        ->get();

        $mapels = Mapel::where(
            'status',
            'Aktif'
        )
        ->orderBy('nama_mapel')
        ->get();

    } else {

        switch ($guru->jenis_pengajar) {

            case 'Wali Kelas':

                if ($guru->waliKelas) {

                    $kelas = collect([
                        $guru->waliKelas
                    ]);

                }

                $mapels = Mapel::where(
                    'status',
                    'Aktif'
                )->get();

            break;


            case 'Guru PAI':

                $kelas = Kelas::where(
                    'status',
                    'Aktif'
                )
                ->orderBy('nama_kelas')
                ->get();

                $mapels = Mapel::where(
                    'kode_mapel',
                    'PAI'
                )->get();

            break;


            case 'Guru PJOK':

                $kelas = Kelas::where(
                    'status',
                    'Aktif'
                )
                ->orderBy('nama_kelas')
                ->get();

                $mapels = Mapel::where(
                    'kode_mapel',
                    'PJOK'
                )->get();

            break;


            default:

                $kelas = Kelas::where(
                    'status',
                    'Aktif'
                )
                ->orderBy('nama_kelas')
                ->get();

                $mapels = Mapel::where(
                    'status',
                    'Aktif'
                )->get();

            break;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | KELAS YANG DIPILIH
    |--------------------------------------------------------------------------
    */

   $kelasId = $request->kelas;

/*
|--------------------------------------------------------------------------
| WALI KELAS
|--------------------------------------------------------------------------
| Pada Genap, kelas tetap menggunakan kelas hasil pembagian Ganjil.
|--------------------------------------------------------------------------
*/

$kelasId = $request->kelas;

if (
    $guru &&
    $guru->jenis_pengajar == 'Wali Kelas'
) {

    $kelasWali = Kelas::where(
        'wali_kelas_id',
        $guru->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunStruktur->id
    )
    ->first();

    $kelasId = $kelasWali?->id;
}


    /*
    |--------------------------------------------------------------------------
    | ABSENSI SISWA
    |--------------------------------------------------------------------------
    */

    $absensiSiswa = [];


   
       /*
|--------------------------------------------------------------------------
| AMBIL SISWA
|--------------------------------------------------------------------------
*/

$siswas = collect();

if ($kelasId) {

    $ids = AnggotaKelas::where(
        'kelas_id',
        $kelasId
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
}
   


    /*
    |--------------------------------------------------------------------------
    | AMBIL DATA ABSENSI
    |--------------------------------------------------------------------------
    */

    $filter = [
        'kelas_id' => null,
        'tahun_ajaran_id' => $tahunAjaran->id,
        'semester' => $tahunAjaran->semester,
        'tanggal' => null,
        'mapel_id' => null,
    ];


    if ($kelasId && $request->tanggal) {

        $query = Absensi::where(
            'tanggal',
            $request->tanggal
        )
        ->where(
            'kelas_id',
            $kelasId
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAjaran->id
        )
        ->where(
            'semester',
            $tahunAjaran->semester
        );


        if ($request->filled('mapel')) {

            $query->where(
                'mapel_id',
                $request->mapel
            );

        }


        $absensi = $query->get();


        foreach ($absensi as $item) {

            $absensiSiswa[$item->siswa_id] = $item;

        }


        $filter = [
            'kelas_id' => $kelasId,
            'tahun_ajaran_id' => $tahunAjaran->id,
            'semester' => $tahunAjaran->semester,
            'tanggal' => $request->tanggal,
            'mapel_id' => $request->mapel,
        ];

    }


    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    return view(
        'absensi.index',
        compact(
            'guru',
            'kelas',
            'mapels',
            'tahunAktif',
            'tahunAjaran',
            'tahunajaran',
            'semester',
            'siswas',
            'absensiSiswa',
            'kelasId',
            'modeArsip',
            'filter'
        )
    );
}
public function massStore(Request $request)
{

    
    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    $request->validate([

        'tanggal' => 'required|date',

        'kelas_id' => 'required',

        'tahun_ajaran_id' => 'required',

        'semester' => 'required',

        'mapel' => 'required',

        'siswa_id' => 'required|array'

    ]);

    $tahunAjaran = TahunAjaran::findOrFail(
    $request->tahun_ajaran_id
);

if ($tahunAjaran->status !== 'Aktif') {

    return back()->with(
        'error',
        'Data absensi pada periode arsip tidak dapat ditambahkan atau diubah.'
    );

}

    DB::beginTransaction();

    try {

        foreach ($request->siswa_id as $siswaId) {

    $absensi = Absensi::updateOrCreate(

        [
            'siswa_id' => $siswaId,
            'tanggal' => $request->tanggal,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'semester' => $request->semester,
            'mapel_id' => $request->mapel,
        ],

        [
            'status' => strtolower($request->status[$siswaId]),
        ]
    );

}

               
        DB::commit();

        return redirect()->route('absensi.index', [
    'kelas'             => $request->kelas_id,
    'tahun_ajaran_id'   => $request->tahun_ajaran_id,
    'semester'          => $request->semester,
    'tanggal'           => $request->tanggal,
    'mapel'             => $request->mapel,
])->with(
    'success',
    'Absensi berhasil disimpan.'
);
    }

    catch(\Exception $e){

        DB::rollBack();

        return back()

            ->withInput()

            ->with(

                'error',

                $e->getMessage()

            );

    }

}
public function edit($id)
{
    $absensi = Absensi::findOrFail($id);

    return view('absensi.edit', compact('absensi'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:hadir,izin,sakit,alfa',
    ]);

    $absensi = Absensi::findOrFail($id);

    $absensi->update([
        'status' => strtolower($request->status),
    ]);

    return redirect()->route('absensi.index', [
        'kelas' => $absensi->kelas_id,
        'tahun_ajaran_id' => $absensi->tahun_ajaran_id,
        'semester' => $absensi->semester,
        'tanggal' => $absensi->tanggal,
        'mapel' => $absensi->mapel_id,
    ])->with('success', 'Status absensi berhasil diperbarui.');
}
public function destroy($id)
{
    $absensi = Absensi::findOrFail($id);

    $absensi->delete();

    return redirect()

        ->back()

        ->with(

            'success',

            'Data absensi berhasil dihapus.'

        );
}
    }
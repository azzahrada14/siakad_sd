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

        $guru = Auth::user()->guru;

        /*
        |--------------------------------------------------------------------------
        | MASTER
        |--------------------------------------------------------------------------
        */

        $tahunajaran = TahunAjaran::orderByDesc('id')->get();
        $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAktif) {
    return back()->with('error', 'Belum ada Tahun Ajaran yang aktif.');
}
        $semester = [
            'Ganjil',
            'Genap'
        ];

        $kelas = collect();

        $mapels = collect();

        /*
        |--------------------------------------------------------------------------
        | HAK AKSES GURU
        |--------------------------------------------------------------------------
        */

        switch ($guru->jenis_pengajar) {

            case 'Wali Kelas':

                if ($guru->waliKelas) {

                    $kelas = collect([
                        $guru->waliKelas
                    ]);

                }

                $mapels = Mapel::all();

            break;

            case 'Guru PAI':

                $kelas = Kelas::orderBy('nama_kelas')->get();

                $mapels = Mapel::where(
                    'kode_mapel',
                    'PAI'
                )->get();

            break;

            case 'Guru PJOK':

                $kelas = Kelas::orderBy('nama_kelas')->get();

                $mapels = Mapel::where(
                    'kode_mapel',
                    'PJOK'
                )->get();

            break;

            default:

                $kelas = Kelas::orderBy('nama_kelas')->get();

                $mapels = Mapel::all();

        }

        
                /*
        |--------------------------------------------------------------------------
        | KELAS YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $kelasId = $request->kelas;

        if ($guru->jenis_pengajar == 'Wali Kelas') {

            $kelasId = $guru->waliKelas?->id;

        }
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
    )->pluck('siswa_id');

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
    'tahun_ajaran_id' => null,
    'semester' => null,
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
        );

    if ($request->filled('tahun_ajaran_id')) {
    $query->where(
        'tahun_ajaran_id',
        $request->tahun_ajaran_id
    );
}

    if ($request->filled('semester')) {

        $query->where(
            'semester',
            $request->semester
        );

    }

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
    'tahun_ajaran_id' => $request->tahun_ajaran_id,
    'semester' => $request->semester,
    'tanggal' => $request->tanggal,
    'mapel_id' => $request->mapel,
];

}
return view(
    'absensi.index',
    compact(
        'guru',
        'kelas',
        'mapels',
        'tahunAktif',
        'siswas',
        'absensiSiswa',
        'kelasId',
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
<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Imports\NilaiImport;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | DATA FILTER
        |--------------------------------------------------------------------------
        */

        $kelas = Kelas::all();

        $tahunajaran = TahunAjaran::all();

        $semester = ['Ganjil', 'Genap'];

        /*
        |--------------------------------------------------------------------------
        | AMBIL GURU LOGIN
        |--------------------------------------------------------------------------
        */

$guru = Auth::user()->guru ?? null;

if (!$guru) {
    abort(403, 'Data guru tidak ditemukan');
}

        /*
        |--------------------------------------------------------------------------
        | AMBIL MAPEL BERDASARKAN GURU LOGIN
        |--------------------------------------------------------------------------
        */
if(str_contains(strtoupper($guru->nama_guru), 'PAI'))
{
    $mapels = Mapel::where('kode_mapel','PAI')->get();
}
elseif(str_contains(strtoupper($guru->nama_guru), 'PJOK'))
{
    $mapels = Mapel::where('kode_mapel','PJOK')->get();
}
else
{
    $mapels = Mapel::all();
}
        /*
        |--------------------------------------------------------------------------
        | SISWA
        |--------------------------------------------------------------------------
        */

        $siswas = collect();

        if ($request->kelas) {

            $siswas = Siswa::with('kelas')

                ->where(
                    'kelas_id',
                    $request->kelas
                )

                ->orderBy('nama_siswa')

                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | NILAI SISWA
        |--------------------------------------------------------------------------
        */
        $mapel = null;

if($request->mapel)
{
    $mapel = Mapel::find($request->mapel);
}

        $nilaiSiswa = collect();

       if (
    $request->tahun_ajaran_id &&
    $request->semester &&
    $mapel
){

            $nilaiSiswa = Nilai::where(

                    'mapel_id',
                    $mapel->id

                )

                ->where(
    'tahun_ajaran_id',
    $request->tahun_ajaran_id
)

                ->where(

                    'semester',
                    $request->semester

                )

                ->get()

                ->keyBy('siswa_id');
        }

      return view('nilai.index', compact(
    'kelas',
    'tahunajaran',
    'semester',
    'siswas',
    'nilaiSiswa',
    'mapels',
    'mapel'
));
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN MASSAL NILAI
    |--------------------------------------------------------------------------
    */

    public function massStore(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL GURU LOGIN
        |--------------------------------------------------------------------------
        */

        $guru = Auth::user()->guru;

        /*
        |--------------------------------------------------------------------------
        | AMBIL MAPEL GURU
        |--------------------------------------------------------------------------
        */

        $mapel = Mapel::find(
    $request->mapel_id
);

        /*
        |--------------------------------------------------------------------------
        | VALIDASI MAPEL
        |--------------------------------------------------------------------------
        */

        if (!$mapel) {

            return redirect()

                ->back()

                ->with(

                    'error',

                    'Guru belum memiliki mata pelajaran'

                );
        }

        /*
        |--------------------------------------------------------------------------
        | LOOP SISWA
        |--------------------------------------------------------------------------
        */

        foreach ($request->siswa_id as $key => $siswa) {

            $tugas = $request->tugas[$key] ?? 0;

            $uts = $request->uts[$key] ?? 0;

            $uas = $request->uas[$key] ?? 0;

            /*
            |--------------------------------------------------------------------------
            | HITUNG NILAI
            |--------------------------------------------------------------------------
            */

            $jumlah = $tugas + $uts + $uas;

            $rataRata = $jumlah / 3;

            /*
            |--------------------------------------------------------------------------
            | CEK NILAI
            |--------------------------------------------------------------------------
            */

            $nilai = Nilai::where(

                    'siswa_id',
                    $siswa

                )

                ->where(

                    'mapel_id',
                    $mapel->id

                )

                ->where(

                    'tahun_ajaran_id',
                    $request->tahun_ajaran_id

                )

                ->where(

                    'semester',
                    $request->semester

                )

                ->first();

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            if ($nilai) {

                $nilai->update([

                    'tugas' => $tugas,

                    'uts' => $uts,

                    'uas' => $uas,

                    'jumlah' => $jumlah,

                    'rata_rata' => $rataRata,

                    'nilai_akhir' => $rataRata,

                    'deskripsi' => $request->deskripsi[$key] ?? null

                ]);

            } else {

                /*
                |--------------------------------------------------------------------------
                | CREATE
                |--------------------------------------------------------------------------
                */

                Nilai::create([

                    'siswa_id' => $siswa,

                    'mapel_id' => $mapel->id,

                    'tahun_ajaran_id' => $request->tahun_ajaran_id,

                    'semester' => $request->semester,

                    'tugas' => $tugas,

                    'uts' => $uts,

                    'uas' => $uas,

                    'jumlah' => $jumlah,

                    'rata_rata' => $rataRata,

                    'nilai_akhir' => $rataRata,

                                        'deskripsi' => $request->deskripsi[$key] ?? null

                ]);
            }
        }

        return redirect()->route(
    'nilai.index',
    [
        'kelas'            => $request->kelas_id,
        'mapel'            => $request->mapel_id,
        'tahun_ajaran_id'  => $request->tahun_ajaran_id,
        'semester'         => $request->semester
    ]
)->with(
    'success',
    'Nilai berhasil disimpan'
);

        
    }
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(
        new NilaiImport,
        $request->file('file')
    );

    return back()->with(
        'success',
        'Data nilai berhasil diimport'
    );
}
}
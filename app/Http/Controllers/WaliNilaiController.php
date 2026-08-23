<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\LingkupMateri;
use App\Models\TahunAjaran;
use App\Models\AnggotaKelas;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WaliNilaiExport;

class WaliNilaiController extends Controller
{
   public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | GURU LOGIN
    |--------------------------------------------------------------------------
    */

    $guru = Auth::user()->guru;

    if (!$guru) {
        abort(403, 'Data guru tidak ditemukan.');
    }


    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN
    |--------------------------------------------------------------------------
    */
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

$modeArsip = $tahunAjaran->status !== 'Aktif';

    /*
    |--------------------------------------------------------------------------
    | TAHUN STRUKTUR KELAS
    |--------------------------------------------------------------------------
    */

    $tahunStruktur = $tahunAktif;

    if (
        strtolower($tahunAktif->semester) === 'genap'
    ) {

        $tahunStruktur = TahunAjaran::where(
            'tahun_ajaran',
            $tahunAktif->tahun_ajaran
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
                'Guru belum memiliki kelas wali pada tahun ajaran ini.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | TINGKAT KELAS
        |--------------------------------------------------------------------------
        */

        $tingkat = $kelas->tingkat;


        /*
        |--------------------------------------------------------------------------
        | INISIALISASI
        |--------------------------------------------------------------------------
        */

        $mapels = collect();

        $siswas = collect();

        $lingkupMateris = collect();

        $tujuanPembelajarans = collect();

        $nilaiTP = [];

        $nilaiSiswa = [];

        $rataFormatif = [];


        /*
        |--------------------------------------------------------------------------
        | MAPEL AKTIF
        |--------------------------------------------------------------------------
        */

        $mapels = Mapel::where(
            'status',
            'Aktif'
        )
        ->orderBy('nama_mapel')
        ->get();

        $mapelId = $request->mapel;


        /*
        |--------------------------------------------------------------------------
        | DATA SISWA
        |--------------------------------------------------------------------------
        |
        | Siswa mengikuti struktur anggota kelas Ganjil.
        |
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
        | MAPEL YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $mapel = null;

        if ($mapelId) {

            $mapel = Mapel::find($mapelId);

        }


        /*
        |--------------------------------------------------------------------------
        | LINGKUP MATERI
        |--------------------------------------------------------------------------
        |
        | LM dan TP mengikuti:
        | - Mapel
        | - Tingkat
        | - Tahun ajaran aktif
        | - Semester aktif
        |
        */

        if ($mapel) {

           $lingkupMateris = LingkupMateri::with([
    'tujuanPembelajarans' => function ($query) {
        $query
            ->where('status', 'Aktif')
            ->orderBy('urutan');
    }
])
->where('mapel_id', $mapel->id)
->where('tingkat', $tingkat)
->where('tahun_ajaran_id', $tahunAjaran->id)
->where('semester', $tahunAjaran->semester)
->where('status', 'Aktif')
->orderBy('id')
->get();
        }


        /*
        |--------------------------------------------------------------------------
        | TUJUAN PEMBELAJARAN
        |--------------------------------------------------------------------------
        */

        foreach ($lingkupMateris as $lm) {

            foreach (
                $lm->tujuanPembelajarans as $tp
            ) {

                $tujuanPembelajarans->push(
                    $tp
                );

            }

        }


        /*
        |--------------------------------------------------------------------------
        | NILAI SISWA
        |--------------------------------------------------------------------------
        |
        | Nilai selalu mengikuti tahun ajaran dan semester aktif.
        |
        */

        if ($mapelId) {

            foreach ($siswas as $siswa) {

                $nilai = Nilai::with('detailTP')
    ->where('siswa_id', $siswa->id)
    ->where('mapel_id', $mapelId)
    ->where('tahun_ajaran_id', $tahunAjaran->id)
    ->where('semester', $tahunAjaran->semester)
    ->first();


                if (!$nilai) {
                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | NILAI UTAMA
                |--------------------------------------------------------------------------
                */

                $nilaiSiswa[
                    $siswa->id
                ] = $nilai;


                /*
                |--------------------------------------------------------------------------
                | NILAI TP
                |--------------------------------------------------------------------------
                */

                foreach (
                    $nilai->detailTP as $detail
                ) {

                    $nilaiTP[
                        $siswa->id
                    ][
                        $detail->tp_id
                    ] = $detail->nilai;

                }


                /*
                |--------------------------------------------------------------------------
                | RATA FORMATIF
                |--------------------------------------------------------------------------
                */

                $rataFormatif[
                    $siswa->id
                ] = $nilai->rata_formatif;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $filter = [

    'kelas_id' =>
        $kelas->id,

    'tingkat' =>
        $tingkat,

    'tahun_ajaran_id' =>
        $tahunAjaran->id,

    'semester' =>
        $tahunAjaran->semester,

    'mapel_id' =>
        $mapelId,

];


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

      return view(
    'wali.nilai',
    compact(
        'guru',
        'kelas',
        'tingkat',
        'tahunAktif',
        'tahunAjaran',
        'modeArsip',
        'mapels',
        'mapel',
        'siswas',
        'lingkupMateris',
        'tujuanPembelajarans',
        'nilaiTP',
        'nilaiSiswa',
        'rataFormatif',
        'filter'
    )
);
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORT EXCEL
    |--------------------------------------------------------------------------
    */

    public function export(Request $request)
    {
        return Excel::download(

            new WaliNilaiExport(
                $request->mapel
            ),

            'Rekap_Nilai_' .
            $request->mapel .
            '.xlsx'

        );
    }
}
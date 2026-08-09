<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Guru;
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


        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN AKTIF
        |--------------------------------------------------------------------------
        */

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAktif) {
            abort(404, 'Tahun ajaran aktif belum tersedia.');
        }


        /*
        |--------------------------------------------------------------------------
        | KELAS WALI
        |--------------------------------------------------------------------------
        */

        $kelas = $guru->waliKelas;

        if (!$kelas) {
            abort(403, 'Guru bukan wali kelas.');
        }


        /*
        |--------------------------------------------------------------------------
        | TINGKAT KELAS
        |--------------------------------------------------------------------------
        |
        | LM dan TP mengikuti TINGKAT kelas.
        | Jadi 3A dan 3B sama-sama menggunakan LM/TP tingkat 3.
        |
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

        $filter = [];


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
        */

        $ids = AnggotaKelas::where(
            'kelas_id',
            $kelas->id
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
        | PENTING:
        | LM mengikuti TINGKAT kelas wali.
        |
        | Contoh:
        |
        | 3A -> tingkat 3 -> LM tingkat 3
        | 3B -> tingkat 3 -> LM tingkat 3
        |
        | 4A -> tingkat 4 -> LM tingkat 4
        | 4B -> tingkat 4 -> LM tingkat 4
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

            ->where(
                'mapel_id',
                $mapel->id
            )

            ->where(
                'tingkat',
                $tingkat
            )

            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )

            ->where(
                'semester',
                $tahunAktif->semester
            )

            ->where(
                'status',
                'Aktif'
            )

            ->orderBy('id')
            ->get();

        }


        /*
        |--------------------------------------------------------------------------
        | TUJUAN PEMBELAJARAN
        |--------------------------------------------------------------------------
        */

        foreach ($lingkupMateris as $lm) {

            foreach ($lm->tujuanPembelajarans as $tp) {

                $tujuanPembelajarans->push($tp);

            }

        }


        /*
        |--------------------------------------------------------------------------
        | NILAI SISWA
        |--------------------------------------------------------------------------
        */

        if ($mapelId) {

            foreach ($siswas as $siswa) {

                $nilai = Nilai::with(
                    'detailTP'
                )

                ->where(
                    'siswa_id',
                    $siswa->id
                )

                ->where(
                    'mapel_id',
                    $mapelId
                )

                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )

                ->where(
                    'semester',
                    $tahunAktif->semester
                )

                ->first();


                if (!$nilai) {

                    continue;

                }


                /*
                |--------------------------------------------------------------------------
                | NILAI UTAMA
                |--------------------------------------------------------------------------
                */

                $nilaiSiswa[$siswa->id] = $nilai;


                /*
                |--------------------------------------------------------------------------
                | NILAI TP
                |--------------------------------------------------------------------------
                */

                foreach ($nilai->detailTP as $detail) {

                    $nilaiTP[$siswa->id][$detail->tp_id]
                        = $detail->nilai;

                }


                /*
                |--------------------------------------------------------------------------
                | RATA FORMATIF
                |--------------------------------------------------------------------------
                */

                $rataFormatif[$siswa->id]
                    = $nilai->rata_formatif;

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
                $tahunAktif->id,

            'semester' =>
                $tahunAktif->semester,

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

            'Rekap_Nilai_' . $request->mapel . '.xlsx'

        );
    }
}
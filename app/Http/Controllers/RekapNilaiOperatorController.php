<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\TahunAjaran;
use App\Models\LingkupMateri;
use App\Models\AnggotaKelas;

class RekapNilaiOperatorController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        | Jika tahun_ajaran_id dikirim dari halaman Riwayat Akademik,
        | gunakan periode tersebut.
        | Jika tidak ada, gunakan tahun ajaran yang sedang aktif.
        */

        $tahunAjaran = $request->filled('tahun_ajaran_id')
            ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
            : TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaran) {
            abort(404, 'Tahun ajaran belum tersedia.');
        }


        /*
        |--------------------------------------------------------------------------
        | MODE ARSIP
        |--------------------------------------------------------------------------
        */

        $modeArsip = $tahunAjaran->status !== 'Aktif';


        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $kelasId = $request->kelas_id;
        $mapelId = $request->mapel;


        /*
        |--------------------------------------------------------------------------
        | DATA KELAS
        |--------------------------------------------------------------------------
        */

       $kelass = Kelas::where(
    'tahun_ajaran_id',
    $tahunAjaran->id
)
->where(
    'status',
    'Aktif'
)
->orderBy('tingkat')
->orderBy('nama_kelas')
->get();


        /*
        |--------------------------------------------------------------------------
        | DATA MAPEL
        |--------------------------------------------------------------------------
        */

        $mapels = Mapel::where(
            'status',
            'Aktif'
        )
        ->orderBy('nama_mapel')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | KELAS YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $kelas = null;

        if ($kelasId) {

            $kelas = Kelas::find($kelasId);

        }


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
        | DATA SISWA
        |--------------------------------------------------------------------------
        */
$siswas = collect();

if ($kelas) {

    $ids = AnggotaKelas::where(
        'kelas_id',
        $kelas->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunAjaran->id
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
        | INISIALISASI DATA NILAI
        |--------------------------------------------------------------------------
        */

        $nilaiSiswa = [];

        $nilaiTP = [];

        $lingkupMateris = collect();

        $tujuanPembelajarans = collect();


        /*
        |--------------------------------------------------------------------------
        | DATA LINGKUP MATERI, TP, DAN NILAI
        |--------------------------------------------------------------------------
        */

        if ($kelas && $mapel) {

            /*
            |--------------------------------------------------------------------------
            | TINGKAT KELAS
            |--------------------------------------------------------------------------
            */

            $tingkat = $kelas->tingkat;


            /*
            |--------------------------------------------------------------------------
            | LINGKUP MATERI
            |--------------------------------------------------------------------------
            |
            | Data LM mengikuti:
            | - Mata pelajaran
            | - Tingkat kelas
            | - Tahun ajaran
            | - Semester
            |
            */

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
                $tahunAjaran->id
            )
            ->where(
                'semester',
                $tahunAjaran->semester
            )
            ->where(
                'status',
                'Aktif'
            )
            ->orderBy('id')
            ->get();


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
                    $mapel->id
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAjaran->id
                )
                ->where(
                    'semester',
                    $tahunAjaran->semester
                )
                ->first();


                /*
                |--------------------------------------------------------------------------
                | JIKA BELUM ADA NILAI
                |--------------------------------------------------------------------------
                */

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
                | NILAI TUJUAN PEMBELAJARAN
                |--------------------------------------------------------------------------
                */

                foreach ($nilai->detailTP as $detail) {

                    $nilaiTP[$siswa->id][$detail->tp_id]
                        = $detail->nilai;

                }

            }

        }


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'operator.rekap-nilai',
            compact(
                'tahunAjaran',
                'kelass',
                'kelas',
                'mapels',
                'mapel',
                'siswas',
                'lingkupMateris',
                'tujuanPembelajarans',
                'nilaiTP',
                'nilaiSiswa',
                'modeArsip'
            )
        );
    }
}
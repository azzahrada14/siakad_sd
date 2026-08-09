<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\RankingSiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    /**
     * Halaman Ranking
     */
    public function index()
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403, 'Data guru tidak ditemukan.');
        }

        /*
        |--------------------------------------------------------------------------
        | Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAktif) {
            return back()->with(
                'error',
                'Tahun ajaran aktif belum tersedia.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Kelas Wali pada Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $kelasGuru = Kelas::where(
            'wali_kelas_id',
            $guru->id
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->first();

        if (!$kelasGuru) {
            return back()->with(
                'error',
                'Anda belum menjadi wali kelas pada tahun ajaran aktif.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Ranking Hanya untuk Kelas Wali
        |--------------------------------------------------------------------------
        */

        $ranking = RankingSiswa::with([
            'siswa',
            'kelas',
            'tahunAjaran'
        ])
        ->where(
            'kelas_id',
            $kelasGuru->id
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'semester',
            $tahunAktif->semester
        )
        ->orderBy('ranking')
        ->paginate(10);

        return view(
            'ranking.index',
            compact(
                'ranking',
                'kelasGuru',
                'tahunAktif'
            )
        );
    }


    /**
     * Generate Ranking
     */
    public function generate()
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403, 'Data guru tidak ditemukan.');
        }

        /*
        |--------------------------------------------------------------------------
        | Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAktif) {
            return back()->with(
                'error',
                'Tahun ajaran aktif belum tersedia.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Cari Kelas Wali Sesuai Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $kelasGuru = Kelas::where(
            'wali_kelas_id',
            $guru->id
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->first();

        if (!$kelasGuru) {
            return back()->with(
                'error',
                'Anda belum menjadi wali kelas pada tahun ajaran aktif.'
            );
        }

        $kelasId = $kelasGuru->id;

        /*
        |--------------------------------------------------------------------------
        | Hapus Ranking Lama Kelas Ini
        |--------------------------------------------------------------------------
        */

        RankingSiswa::where(
            'kelas_id',
            $kelasId
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'semester',
            $tahunAktif->semester
        )
        ->delete();

        /*
        |--------------------------------------------------------------------------
        | Ambil Nilai Siswa
        |--------------------------------------------------------------------------
        |
        | Siswa harus merupakan anggota kelas aktif.
        |
        */

        $nilai = Nilai::join(
            'anggota_kelas',
            'anggota_kelas.siswa_id',
            '=',
            'nilais.siswa_id'
        )
        ->join(
            'siswas',
            'siswas.id',
            '=',
            'nilais.siswa_id'
        )
        ->selectRaw("
            nilais.siswa_id,
            AVG(nilais.nilai_akhir) AS rata_rata
        ")
        ->where(
            'anggota_kelas.kelas_id',
            $kelasId
        )
        ->where(
            'anggota_kelas.tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'nilais.tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'nilais.semester',
            $tahunAktif->semester
        )
        ->groupBy(
            'nilais.siswa_id'
        )
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Hitung Kehadiran
        |--------------------------------------------------------------------------
        */

        foreach ($nilai as $item) {

            $total = Absensi::where(
                'siswa_id',
                $item->siswa_id
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'semester',
                $tahunAktif->semester
            )
            ->count();

            $hadir = Absensi::where(
                'siswa_id',
                $item->siswa_id
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
                'hadir'
            )
            ->count();

            $item->kehadiran = $total > 0
                ? round(($hadir / $total) * 100, 2)
                : 0;
        }

        /*
        |--------------------------------------------------------------------------
        | Urutkan Ranking
        |--------------------------------------------------------------------------
        |
        | 1. Rata-rata nilai tertinggi
        | 2. Kehadiran tertinggi
        | 3. Nama siswa
        |
        */

        $nilai = $nilai->sort(function ($a, $b) {

            if ($a->rata_rata != $b->rata_rata) {
                return $b->rata_rata <=> $a->rata_rata;
            }

            if ($a->kehadiran != $b->kehadiran) {
                return $b->kehadiran <=> $a->kehadiran;
            }

            return strcmp(
                $a->nama_siswa,
                $b->nama_siswa
            );
        });

        /*
        |--------------------------------------------------------------------------
        | Simpan Ranking
        |--------------------------------------------------------------------------
        */

        $ranking = 1;

        foreach ($nilai as $item) {

            RankingSiswa::create([
                'siswa_id' => $item->siswa_id,

                'kelas_id' => $kelasId,

                'tahun_ajaran_id' => $tahunAktif->id,

                'semester' => $tahunAktif->semester,

                'rata_rata' => round(
                    $item->rata_rata,
                    2
                ),

                'kehadiran' => $item->kehadiran,

                'ranking' => $ranking++,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Selesai
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('ranking.index')
            ->with(
                'success',
                'Ranking berhasil digenerate untuk kelas ' .
                $kelasGuru->nama_kelas .
                '.'
            );
    }
}
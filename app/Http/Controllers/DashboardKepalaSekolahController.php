<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\RankingSiswa;
use App\Models\Rapor;
use App\Models\Mapel;
use App\Models\JadwalPelajaran;
use App\Models\Ekstrakurikuler;
use App\Models\Kelulusan;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;

class DashboardKepalaSekolahController extends Controller
{
    public function index()
    {
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
        | DATA UTAMA
        |--------------------------------------------------------------------------
        */

        $totalGuru = Guru::where(
            'status_guru',
            'Aktif'
        )->count();

        $totalSiswa = Siswa::where(
            'status_siswa',
            'Aktif'
        )->count();

        $totalKelas = Kelas::where(
            'status',
            'Aktif'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | RINGKASAN AKADEMIK
        |--------------------------------------------------------------------------
        */

        $totalNilai = 0;
        $rataRataNilai = 0;

        $totalRanking = 0;
        $totalRapor = 0;

        $totalHadir = 0;
        $totalIzin = 0;
        $totalSakit = 0;
        $totalAlfa = 0;


        if ($tahunAktif) {

            /*
            |--------------------------------------------------------------------------
            | NILAI
            |--------------------------------------------------------------------------
            */

            $queryNilai = Nilai::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'semester',
                $tahunAktif->semester
            );

            $totalNilai = $queryNilai->count();

            $rataRataNilai = round(
                $queryNilai->avg('nilai_akhir') ?? 0,
                2
            );


            /*
            |--------------------------------------------------------------------------
            | RANKING
            |--------------------------------------------------------------------------
            */

            $totalRanking = RankingSiswa::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'semester',
                $tahunAktif->semester
            )
            ->count();


            /*
            |--------------------------------------------------------------------------
            | RAPOR
            |--------------------------------------------------------------------------
            */

            $totalRapor = Rapor::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'semester',
                $tahunAktif->semester
            )
            ->where(
                'is_generate',
                true
            )
            ->count();


            /*
            |--------------------------------------------------------------------------
            | ABSENSI
            |--------------------------------------------------------------------------
            */

            $absensi = Absensi::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'semester',
                $tahunAktif->semester
            );

            $totalHadir = (clone $absensi)
                ->where('status', 'hadir')
                ->count();

            $totalIzin = (clone $absensi)
                ->where('status', 'izin')
                ->count();

            $totalSakit = (clone $absensi)
                ->where('status', 'sakit')
                ->count();

            $totalAlfa = (clone $absensi)
                ->where('status', 'alfa')
                ->count();
        }


        /*
        |--------------------------------------------------------------------------
        | MONITORING KENAIKAN KELAS
        |--------------------------------------------------------------------------
        |
        | Mengikuti aturan yang sudah digunakan pada
        | KenaikanKelasController:
        |
        | Nilai akhir < 75 = belum tuntas
        | Semua nilai memenuhi = Naik
        | Tingkat 6 = Lulus
        |
        */

        $totalNaik = 0;
        $totalTidakNaik = 0;
        $totalLulusKelas6 = 0;


        if ($tahunAktif) {

            $anggotaKelas = AnggotaKelas::with('siswa')
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->get();

            foreach ($anggotaKelas as $anggota) {

                $kelas = Kelas::find(
                    $anggota->kelas_id
                );

                if (!$kelas) {
                    continue;
                }

                $nilaiKurang = Nilai::where(
                    'siswa_id',
                    $anggota->siswa_id
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->where(
                    'nilai_akhir',
                    '<',
                    75
                )
                ->count();


                if ($kelas->tingkat == 6) {

                    $totalLulusKelas6++;

                } elseif ($nilaiKurang == 0) {

                    $totalNaik++;

                } else {

                    $totalTidakNaik++;
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | MONITORING KELULUSAN
        |--------------------------------------------------------------------------
        */

        $totalKelulusan = 0;
        $totalLulus = 0;
        $totalTidakLulus = 0;

        if ($tahunAktif) {

            $kelulusan = Kelulusan::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            );

            $totalKelulusan = $kelulusan->count();

            $totalLulus = (clone $kelulusan)
    ->where(
        'status',
        'Lulus'
    )
    ->count();

$totalTidakLulus = (clone $kelulusan)
    ->where(
        'status',
        'Belum Lulus'
    )
    ->count();
        }


        /*
        |--------------------------------------------------------------------------
        | GRAFIK SISWA PER KELAS
        |--------------------------------------------------------------------------
        */

        $grafikSiswa = DB::table('kelas')
            ->leftJoin(
                'anggota_kelas',
                'kelas.id',
                '=',
                'anggota_kelas.kelas_id'
            )
            ->where(
                'kelas.status',
                'Aktif'
            )
            ->when(
                $tahunAktif,
                function ($query) use ($tahunAktif) {

                    $query->where(
                        'kelas.tahun_ajaran_id',
                        $tahunAktif->id
                    );

                    $query->where(
                        'anggota_kelas.tahun_ajaran_id',
                        $tahunAktif->id
                    );
                }
            )
            ->select(
                'kelas.nama_kelas',
                DB::raw(
                    'COUNT(anggota_kelas.id) as total_siswa'
                )
            )
            ->groupBy(
                'kelas.id',
                'kelas.nama_kelas'
            )
            ->orderBy(
                'kelas.tingkat'
            )
            ->orderBy(
                'kelas.nama_kelas'
            )
            ->get();


        $labelKelas = $grafikSiswa->pluck(
            'nama_kelas'
        );

        $jumlahSiswa = $grafikSiswa->pluck(
            'total_siswa'
        );


        /*
        |--------------------------------------------------------------------------
        | GRAFIK DISTRIBUSI GURU
        |--------------------------------------------------------------------------
        */

        $grafikGuru = Guru::where(
            'status_guru',
            'Aktif'
        )
        ->select(
            'jenis_pengajar',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy(
            'jenis_pengajar'
        )
        ->get();


        $labelGuru = $grafikGuru->pluck(
            'jenis_pengajar'
        );

        $jumlahGuru = $grafikGuru->pluck(
            'total'
        );


        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'kepala.dashboardKepala',
            compact(

                'tahunAktif',

                'totalGuru',
                'totalSiswa',
                'totalKelas',

                'totalNilai',
                'rataRataNilai',

                'totalRanking',
                'totalRapor',

                'totalHadir',
                'totalIzin',
                'totalSakit',
                'totalAlfa',

                'totalNaik',
                'totalTidakNaik',
                'totalLulusKelas6',

                'totalKelulusan',
                'totalLulus',
                'totalTidakLulus',

                'labelKelas',
                'jumlahSiswa',

                'labelGuru',
                'jumlahGuru'
            )
        );
    }

    public function informasiAkademik()
{
    $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

    $totalGuru = Guru::where('status_guru', 'Aktif')->count();

    $totalSiswa = Siswa::where('status_siswa', 'Aktif')->count();

    $totalKelas = Kelas::where('status', 'Aktif')->count();

    $totalMapel = Mapel::where('status', 'Aktif')->count();

    $totalJadwal = JadwalPelajaran::count();

    $totalEkstrakurikuler = Ekstrakurikuler::count();

    $grafikSiswa = DB::table('kelas')
        ->leftJoin('anggota_kelas', 'kelas.id', '=', 'anggota_kelas.kelas_id')
        ->select(
            'kelas.nama_kelas',
            DB::raw('COUNT(anggota_kelas.id) as total_siswa')
        )
        ->where('kelas.status', 'Aktif')
        ->groupBy('kelas.id', 'kelas.nama_kelas')
        ->orderBy('kelas.nama_kelas')
        ->get();

    $totalRapor = 0;

    if ($tahunAktif) {
        $totalRapor = DB::table('rapors')
            ->where('tahun_ajaran_id', $tahunAktif->id)
            ->where('is_generate', 1)
            ->count();
    }

    return view('kepala.informasi-akademik', compact(
        'tahunAktif',
        'totalGuru',
        'totalSiswa',
        'totalKelas',
        'totalMapel',
        'totalJadwal',
        'totalEkstrakurikuler',
        'totalRapor',
        'grafikSiswa'
    ));
}
}
<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KenaikanKelasController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

        /*
        |--------------------------------------------------------------------------
        | Data Kelas
        |--------------------------------------------------------------------------
        */

        $kelas = collect();

        if ($tahunAktif) {
            $kelas = Kelas::where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        // Semua siswa yang terdaftar pada tahun ajaran aktif
        $anggotaAktif = collect();

        if ($tahunAktif) {
            $anggotaAktif = AnggotaKelas::with('kelas')
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | Total Siswa
        |--------------------------------------------------------------------------
        |
        | Menggunakan siswa yang benar-benar terdaftar pada tahun ajaran aktif.
        | Siswa dihitung satu kali.
        |
        */

        $totalSiswa = $anggotaAktif
            ->pluck('siswa_id')
            ->unique()
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Total Kelas
        |--------------------------------------------------------------------------
        */

        $totalKelas = $kelas->count();

        /*
        |--------------------------------------------------------------------------
        | Siswa Siap Naik
        |--------------------------------------------------------------------------
        |
        | Hanya kelas 1-5.
        |
        | Syarat:
        | 1. Siswa mempunyai nilai.
        | 2. Seluruh nilai akhir >= 75.
        |
        | Kelas 6 tidak dihitung sebagai Siap Naik karena
        | statusnya adalah Lulus.
        |
        */

        $siapNaik = 0;

        foreach ($anggotaAktif as $anggota) {

            // Pastikan kelas tersedia
            if (!$anggota->kelas) {
                continue;
            }

            // Kelas 6 bukan kategori Siap Naik
            if ((int) $anggota->kelas->tingkat === 6) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Ambil semua nilai siswa
            |--------------------------------------------------------------------------
            */

            $nilaiSiswa = Nilai::where(
                'siswa_id',
                $anggota->siswa_id
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->get();

            /*
            |--------------------------------------------------------------------------
            | Belum punya nilai = belum siap naik
            |--------------------------------------------------------------------------
            */

            if ($nilaiSiswa->isEmpty()) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Cek apakah ada nilai di bawah KKM
            |--------------------------------------------------------------------------
            */

            $adaNilaiKurang = $nilaiSiswa->contains(function ($nilai) {

                return $nilai->nilai_akhir === null
                    || $nilai->nilai_akhir < 75;
            });

            /*
            |--------------------------------------------------------------------------
            | Semua nilai memenuhi KKM
            |--------------------------------------------------------------------------
            */

            if (!$adaNilaiKurang) {
                $siapNaik++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Kelas yang Dipilih
        |--------------------------------------------------------------------------
        */

        $kelasId = $request->kelas;

        $kelasAsal = null;
        $kelasTujuan = null;
        $anggota = collect();

        /*
        |--------------------------------------------------------------------------
        | Data Anggota Kelas
        |--------------------------------------------------------------------------
        */

        if ($kelasId && $tahunAktif) {

            $kelasAsal = Kelas::find($kelasId);

            if ($kelasAsal) {

                /*
                |--------------------------------------------------------------------------
                | Tentukan Rombel
                |--------------------------------------------------------------------------
                */

                $rombel = substr(
                    $kelasAsal->nama_kelas,
                    -1
                );

                /*
                |--------------------------------------------------------------------------
                | Kelas Tujuan
                |--------------------------------------------------------------------------
                */

                $kelasTujuan = Kelas::where(
                    'tingkat',
                    $kelasAsal->tingkat + 1
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->where(
                    'nama_kelas',
                    'LIKE',
                    '%' . $rombel
                )
                ->first();

                /*
                |--------------------------------------------------------------------------
                | Anggota Kelas
                |--------------------------------------------------------------------------
                */

                $anggota = AnggotaKelas::with([
                    'siswa',
                    'kelasTujuan'
                ])
                ->where(
                    'kelas_id',
                    $kelasAsal->id
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->orderBy('siswa_id')
                ->get();

                /*
                |--------------------------------------------------------------------------
                | Tentukan Status Kenaikan
                |--------------------------------------------------------------------------
                */

                foreach ($anggota as $row) {

                    /*
                    |--------------------------------------------------------------------------
                    | Nilai di bawah KKM
                    |--------------------------------------------------------------------------
                    */

                    $nilaiKurang = Nilai::with('mapel')
                        ->where(
                            'siswa_id',
                            $row->siswa_id
                        )
                        ->where(
                            'tahun_ajaran_id',
                            $tahunAktif->id
                        )
                        ->where(function ($query) {
                            $query->where(
                                'nilai_akhir',
                                '<',
                                75
                            )
                            ->orWhereNull(
                                'nilai_akhir'
                            );
                        })
                        ->get();

                    /*
                    |--------------------------------------------------------------------------
                    | Kelas 6 = Lulus
                    |--------------------------------------------------------------------------
                    */

                    if ((int) $kelasAsal->tingkat === 6) {

                        $row->status_kenaikan = 'Lulus';
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Kelas 1-5 = Naik / Tidak Naik
                    |--------------------------------------------------------------------------
                    */

                    else {

                        $row->status_kenaikan =
                            $nilaiKurang->count() === 0
                                ? 'Naik'
                                : 'Tidak Naik';
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Alasan
                    |--------------------------------------------------------------------------
                    */

                    $row->alasan = $nilaiKurang
                        ->map(function ($n) {

                            $namaMapel = $n->mapel
                                ? $n->mapel->nama_mapel
                                : 'Mata Pelajaran';

              $nilai = ($n->nilai_akhir === null || $n->nilai_akhir == 0)
    ? 'Belum ada nilai'
    : number_format($n->nilai_akhir, 2);

                            return $namaMapel .
                                ' (' .
                                $nilai .
                                ')';
                        })
                        ->implode(', ');
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Kirim Data ke Blade
        |--------------------------------------------------------------------------
        */

        return view(
            'kenaikan.index',
            compact(
                'tahunAktif',
                'kelas',
                'totalSiswa',
                'totalKelas',
                'siapNaik',
                'kelasAsal',
                'kelasTujuan',
                'anggota'
            )
        );
    }

public function proses(Request $request)
{
    $request->validate([
        'kelas_id' => 'required|exists:kelas,id'
    ]);

    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    if (!$tahunAktif) {

        return back()->with(
            'error',
            'Tahun ajaran aktif tidak ditemukan.'
        );
    }

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | Ambil Kelas yang Dipilih
        |--------------------------------------------------------------------------
        */

        $kelasAsal = Kelas::find($request->kelas_id);

        if (!$kelasAsal) {

            DB::rollBack();

            return back()->with(
                'error',
                'Kelas asal tidak ditemukan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil Kelas Tujuan
        |--------------------------------------------------------------------------
        */

        $rombel = substr(
            $kelasAsal->nama_kelas,
            -1
        );

        $kelasTujuan = Kelas::where(
            'tingkat',
            $kelasAsal->tingkat + 1
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'nama_kelas',
            'LIKE',
            '%' . $rombel
        )
        ->first();

        /*
        |--------------------------------------------------------------------------
        | Ambil SEMUA Siswa dari Kelas yang Dipilih
        |--------------------------------------------------------------------------
        */

        $anggotaList = AnggotaKelas::with([
            'siswa',
            'kelas'
        ])
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->where(
            'kelas_id',
            $request->kelas_id
        )
        ->get();

        $gagal = [];

        /*
        |--------------------------------------------------------------------------
        | Validasi Nilai KKM
        |--------------------------------------------------------------------------
        */

        foreach ($anggotaList as $anggota) {

            if (!$anggota->kelas) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Kelas 6 = Lulus
            |--------------------------------------------------------------------------
            */

            if ((int) $anggota->kelas->tingkat === 6) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Ambil Nilai di Bawah KKM
            |--------------------------------------------------------------------------
            */

            $nilaiKurang = Nilai::with('mapel')
                ->where(
                    'siswa_id',
                    $anggota->siswa_id
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->where(function ($query) {

                    $query->where(
                        'nilai_akhir',
                        '<',
                        75
                    )
                    ->orWhereNull(
                        'nilai_akhir'
                    );

                })
                ->get();

            /*
            |--------------------------------------------------------------------------
            | Belum Memiliki Nilai
            |--------------------------------------------------------------------------
            */

            $jumlahNilai = Nilai::where(
                'siswa_id',
                $anggota->siswa_id
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->count();

            if ($jumlahNilai === 0) {

                $gagal[] =
                    $anggota->siswa->nama_siswa .
                    ' : belum memiliki nilai.';

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Ada Nilai di Bawah KKM
            |--------------------------------------------------------------------------
            */

            if ($nilaiKurang->count()) {

                $detailNilai = $nilaiKurang
                    ->map(function ($n) {

                        $namaMapel = $n->mapel
                            ? $n->mapel->nama_mapel
                            : 'Mata Pelajaran';

                        $nilai = ($n->nilai_akhir === null || $n->nilai_akhir == 0)
    ? 'Belum ada nilai'
    : number_format($n->nilai_akhir, 2);

                        return $namaMapel .
                            ' (' .
                            $nilai .
                            ')';

                    })
                    ->implode(', ');

                $gagal[] =
                    $anggota->siswa->nama_siswa .
                    ' : ' .
                    $detailNilai;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Jika Masih Ada yang Belum Memenuhi KKM
        |--------------------------------------------------------------------------
        */

        if (count($gagal)) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    "<strong>Generate kenaikan kelas tidak dapat diproses.</strong><br><br>" .
                    "Kelas: <strong>" .
                    $kelasAsal->nama_kelas .
                    "</strong><br><br>" .
                    "Siswa yang belum memenuhi KKM:<br><br>" .
                    implode("<br>", $gagal) .
                    "<br><br>" .
                    "<strong>Silakan lakukan remedial terlebih dahulu.</strong>"
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan Hasil Kenaikan
        |--------------------------------------------------------------------------
        */

        foreach ($anggotaList as $anggota) {

            if (!$anggota->kelas) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Kelas 6 = Lulus
            |--------------------------------------------------------------------------
            */

            if ((int) $anggota->kelas->tingkat === 6) {

                $anggota->siswa->update([
                    'status_siswa' => 'Lulus'
                ]);

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Kelas 1-5 = Simpan Kelas Tujuan
            |--------------------------------------------------------------------------
            */

            if ($kelasTujuan) {

                $anggota->update([
                    'kelas_tujuan_id' => $kelasTujuan->id
                ]);
            }
        }

        DB::commit();

        return redirect()
            ->route('kenaikan.index')
            ->with(
                'success',
                'Generate kenaikan kelas berhasil diproses. Data kelas tujuan siswa telah berhasil disimpan dan akan digunakan pada proses Pembagian Kelas.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );
    }
}
}
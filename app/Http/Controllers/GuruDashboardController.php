<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\TahunAjaran;

class GuruDashboardController extends Controller
{
    public function index(Request $request)
    {
        $guru = Auth::user()->guru;

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */

        $tahunAjaran = $request->filled('tahun_ajaran_id')
            ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
            : TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaran) {
            return back()->with(
                'error',
                'Tahun ajaran belum tersedia.'
            );
        }

        // Untuk tampilan card tahun ajaran
        $tahunAktif = $tahunAjaran;

        // Menentukan apakah dashboard sedang melihat arsip
        $modeArsip = $tahunAjaran->status !== 'Aktif';

        /*
        |--------------------------------------------------------------------------
        | TAHUN ARSIP
        |--------------------------------------------------------------------------
        */

        $tahunArsip = TahunAjaran::where(
            'status',
            'Tidak Aktif'
        )
        ->orderByDesc('id')
        ->first();

        /*
        |--------------------------------------------------------------------------
        | DATA DASAR
        |--------------------------------------------------------------------------
        */

        $kelasDiampu = '-';

        $totalSiswa = 0;

        $jadwalHariIni = collect();

        /*
        |--------------------------------------------------------------------------
        | WALI KELAS
        |--------------------------------------------------------------------------
        */

        if (
            $guru &&
            $guru->jenis_pengajar == 'Wali Kelas'
        ) {

            $tahunGanjil = TahunAjaran::where(
    'tahun_ajaran',
    $tahunAjaran->tahun_ajaran
)
->where(
    'semester',
    'Ganjil'
)
->first();

$kelas = null;

if ($tahunGanjil) {

    $kelas = Kelas::where(
        'wali_kelas_id',
        $guru->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunGanjil->id
    )
    ->first();
}

if ($kelas) {

    $kelasDiampu = $kelas->nama_kelas;

    $totalSiswa = DB::table('anggota_kelas')
        ->where(
            'kelas_id',
            $kelas->id
        )
        ->where(
            'tahun_ajaran_id',
            $tahunGanjil->id
        )
        ->count();
}
        }

        /*
        |--------------------------------------------------------------------------
        | GURU MAPEL / PJOK / PAI
        |--------------------------------------------------------------------------
        */

        else if ($guru) {

            $kelasIds = JadwalPelajaran::where(
                'guru_id',
                $guru->id
            )
            ->pluck('kelas_id')
            ->unique();

            $kelasDiampu = $kelasIds->count() . ' Kelas';

            $totalSiswa = DB::table('anggota_kelas')
                ->whereIn(
                    'kelas_id',
                    $kelasIds
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAjaran->id
                )
                ->count();
        }

        /*
        |--------------------------------------------------------------------------
        | JADWAL HARI INI
        |--------------------------------------------------------------------------
        */

        if ($guru && !$modeArsip) {

            $namaHari = now()
                ->locale('id')
                ->dayName;

            $hari = match ($namaHari) {

                'Monday'    => 'Senin',
                'Tuesday'   => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday'  => 'Kamis',
                'Friday'    => 'Jumat',

                default => $namaHari
            };

            $jadwalHariIni = JadwalPelajaran::with([
                'kelas',
                'mapel'
            ])
            ->where(
                'guru_id',
                $guru->id
            )
            ->where(
                'hari',
                $hari
            )
            ->orderBy('jam_ke')
            ->get();
        }

        $tahunAjarans = TahunAjaran::orderByDesc('id')->get();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

       return view(
    'guru.dashboard',
    compact(
        'guru',
        'tahunAktif',
        'tahunAjaran',
        'tahunArsip',
        'tahunAjarans',
        'modeArsip',
        'kelasDiampu',
        'totalSiswa',
        'jadwalHariIni'
    )
);
}
}
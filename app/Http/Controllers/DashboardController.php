<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Rapor;
use App\Models\AnggotaKelas;

class DashboardController extends Controller
{public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | PERIODE AKADEMIK
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    /*
    |--------------------------------------------------------------------------
    | BELUM ADA TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    if (!$tahunAjaran) {

        return view(
            'dashboard',
            [
                'tahunAjaran' => null,
                'modeArsip' => false,
                'totalGuru' => Guru::count(),
                'totalSiswa' => 0,
                'totalKelas' => 0,
                'totalMapel' => Mapel::count(),
                'totalTahun' => TahunAjaran::count(),
                'totalRapor' => 0,
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DATA MASTER
    |--------------------------------------------------------------------------
    */

    $totalGuru = Guru::count();

    $totalMapel = Mapel::count();

    $totalTahun = TahunAjaran::count();

    /*
    |--------------------------------------------------------------------------
    | DATA SISWA PERIODE
    |--------------------------------------------------------------------------
    */

    $totalSiswa = AnggotaKelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->distinct('siswa_id')
    ->count('siswa_id');

    /*
    |--------------------------------------------------------------------------
    | DATA KELAS PERIODE
    |--------------------------------------------------------------------------
    */

    $totalKelas = AnggotaKelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->distinct('kelas_id')
    ->count('kelas_id');

    /*
    |--------------------------------------------------------------------------
    | DATA RAPOR
    |--------------------------------------------------------------------------
    */

    $totalRapor = Rapor::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->where(
        'semester',
        $tahunAjaran->semester
    )
    ->count();

    /*
    |--------------------------------------------------------------------------
    | MODE ARSIP
    |--------------------------------------------------------------------------
    */

    $modeArsip = $tahunAjaran->status !== 'Aktif';

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    return view(
        'dashboard',
        compact(
            'tahunAjaran',
            'modeArsip',
            'totalGuru',
            'totalSiswa',
            'totalKelas',
            'totalMapel',
            'totalTahun',
            'totalRapor'
        )
    );
}
}
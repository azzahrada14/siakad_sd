<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Rapor;
use App\Models\RankingSiswa;
use App\Models\Nilai; 
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Kelulusan;

class KepalaSekolahDashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->role != 'kepala_sekolah'){
            abort(403);
        }

        $totalGuru = Guru::count();

        $totalSiswa = Siswa::count();

        $totalRapor = Rapor::count();

        $totalRanking = RankingSiswa::count();

$totalLulus = Kelulusan::where('status','Lulus')->count();

$totalTidakLulus = Kelulusan::where('status','Tidak Lulus')->count();

$totalKelulusan = Kelulusan::count();

$persenKelulusan = $totalKelulusan > 0
    ? round(($totalLulus/$totalKelulusan)*100)
    : 0;
    $rankingTerbaru = RankingSiswa::with('siswa')
    ->orderBy('ranking')
    ->take(5)
    ->get();

        $totalKelas = Kelas::count();

        $tahunAktif = TahunAjaran::latest()->first();

    /*
|--------------------------------------------------------------------------
| Grafik Rata-rata Nilai per Kelas
|--------------------------------------------------------------------------
*/

$kelasChart = Kelas::orderBy('tingkat')->get();

$labelKelas = [];
$rataNilai = [];

foreach($kelasChart as $kelas){

    $labelKelas[] = $kelas->nama_kelas;

    $avg = Nilai::whereHas('siswa', function($q) use($kelas){

        $q->where('kelas_id',$kelas->id);

    })->avg('nilai_akhir');

    $rataNilai[] = round($avg ?? 0,2);

}

        return view(
            'kepala.dashboard',
            compact(
                'totalGuru',
                'totalSiswa',
                'totalRapor',
                'totalRanking',
                'totalKelas',
                'tahunAktif',
                'totalLulus',
'totalTidakLulus',
'persenKelulusan',
'rankingTerbaru',
                'labelKelas',
                'rataNilai'
            )
        );
    }
}
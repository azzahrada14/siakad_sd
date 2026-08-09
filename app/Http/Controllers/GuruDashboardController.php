<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\DB;

class GuruDashboardController extends Controller
{
    public function index()
    {
        $guru = Auth::user()->guru;

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        $kelasDiampu = '-';

        $totalSiswa = 0;

        $jadwalHariIni = 0;

        /*
        |--------------------------------------------------------------------------
        | WALI KELAS
        |--------------------------------------------------------------------------
        */

        if($guru && $guru->jenis_pengajar == 'Wali Kelas'){

            $kelas = Kelas::where(
                'wali_kelas_id',
                $guru->id
            )->first();

            if($kelas){

                $kelasDiampu = $kelas->nama_kelas;

              $totalSiswa = DB::table('anggota_kelas')
    ->where('kelas_id', $kelas->id)
    ->count();

            }

        }

        /*
        |--------------------------------------------------------------------------
        | GURU PJOK / PAI / GURU MAPEL
        |--------------------------------------------------------------------------
        */

        else if($guru){

            $kelasIds = JadwalPelajaran::where(
                'guru_id',
                $guru->id
            )
            ->pluck('kelas_id')
            ->unique();

            $kelasDiampu = $kelasIds->count().' Kelas';

            $totalSiswa = DB::table('anggota_kelas')
    ->whereIn('kelas_id', $kelasIds)
    ->count();

        }

        /*
        |--------------------------------------------------------------------------
        | JADWAL HARI INI
        |--------------------------------------------------------------------------
        */

        $hari = now()->locale('id')->dayName;

        if($guru){

            $jadwalHariIni = JadwalPelajaran::where(
                'guru_id',
                $guru->id
            )
            ->where(
                'hari',
                $hari
            )
            ->count();

        /*
|--------------------------------------------------------------------------
| JADWAL HARI INI
|--------------------------------------------------------------------------
*/

$namaHari = now()->locale('id')->dayName;

$hari = match($namaHari){
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    default => $namaHari
};

$jadwalHariIni = JadwalPelajaran::with([
        'kelas',
        'mapel'
    ])
    ->where('guru_id',$guru->id)
    ->where('hari',$hari)
    ->orderBy('jam_ke')
    ->get();
        }



        return view(
            'guru.dashboard',
            compact(

                'guru',

                'tahunAktif',

                'kelasDiampu',

                'totalSiswa',

                'jadwalHariIni'

            )
        );
    }
}
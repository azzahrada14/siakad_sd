<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;

use Carbon\Carbon;

class WaliAbsensiController extends Controller
{
    public function index(Request $request)
    {
       
        /*
        |--------------------------------------------------------------------------
        | LOGIN GURU
        |--------------------------------------------------------------------------
        */

        $guru = Auth::user()->guru;

        /*
        |--------------------------------------------------------------------------
        | KELAS WALI
        |--------------------------------------------------------------------------
        */

        $kelas = Kelas::where(
            'wali_kelas_id',
            $guru->id
        )->first();

        /*
        |--------------------------------------------------------------------------
        | SISWA SESUAI KELAS
        |--------------------------------------------------------------------------
        */

        $siswas = [];

        if ($kelas) {

            $siswas = Siswa::where(
                'kelas_id',
                $kelas->id
            )
            ->orderBy('nama_siswa')
            ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $bulan = $request->bulan ?? date('m');

        $tahun = $request->tahun ?? date('Y');

        $guruId = $request->guru_id;

        $mapelId = $request->mapel_id;
  

        /*
        |--------------------------------------------------------------------------
        | DROPDOWN
        |--------------------------------------------------------------------------
        */

        $gurus = Guru::orderBy('nama_guru')->get();
        $mapels = Mapel::orderBy('nama_mapel')->get();

        /*
        |--------------------------------------------------------------------------
        | JUMLAH HARI
        |--------------------------------------------------------------------------
        */

        $jumlahHari = Carbon::create(
            $tahun,
            $bulan
        )->daysInMonth;

        /*
        |--------------------------------------------------------------------------
        | DATA ABSENSI
        |--------------------------------------------------------------------------
        */

        $data = [];

        foreach ($siswas as $siswa) {

            $tanggalData = [];

            $hadir = 0;
            $izin = 0;
            $sakit = 0;
            $alfa = 0;

            for ($i = 1; $i <= $jumlahHari; $i++) {

                $tanggal = Carbon::create(
                    $tahun,
                    $bulan,
                    $i
                )->format('Y-m-d');

                /*
                |--------------------------------------------------------------------------
                | QUERY ABSENSI
                |--------------------------------------------------------------------------
                */

                $absen = Absensi::where(
                    'siswa_id',
                    $siswa->id
                )
                ->whereDate(
                    'tanggal',
                    $tanggal
                );

               
                /*
                |--------------------------------------------------------------------------
                | FILTER MAPEL
                |--------------------------------------------------------------------------
                */
             

                if ($mapelId) {

                    $absen->where(
                        'mapel_id',
                        $mapelId
                    );

                }

                

                /*
                |--------------------------------------------------------------------------
                | STATUS ABSENSI
                |--------------------------------------------------------------------------
                */

         
             


  



    

$absen = $absen->first();

if ($absen) {

    $status = strtolower($absen->status);

    if ($status == 'hadir') {

        $tanggalData[$i] = 'H';
        $hadir++;

    } elseif ($status == 'sakit') {

        $tanggalData[$i] = 'S';
        $sakit++;

    } elseif ($status == 'izin') {

        $tanggalData[$i] = 'I';
        $izin++;

    } elseif ($status == 'alfa') {

        $tanggalData[$i] = 'A';
        $alfa++;

    } else {

        $tanggalData[$i] = '-';

    }

} else {

    $tanggalData[$i] = '-';

}

            } 
            

            /*
            |--------------------------------------------------------------------------
            | TOTAL & PERSENTASE
            |--------------------------------------------------------------------------
            */

          $total = $hadir + $izin + $sakit + $alfa;

$persen = $jumlahHari > 0
    ? round(($hadir / $jumlahHari) * 100)
    : 0;

            /*
            |--------------------------------------------------------------------------
            | ARRAY DATA
            |--------------------------------------------------------------------------
            */

           
$data[] = [

    'siswa' => $siswa,
    'tanggal' => $tanggalData,
    'hadir' => $hadir,
    'sakit' => $sakit,
    'izin' => $izin,
    'alfa' => $alfa,
    'total' => $total,
    'persen' => $persen

];
        }

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('wali.absensi', compact(

            'kelas',

            'siswas',

            'bulan',

            'tahun',

            'jumlahHari',

            'gurus',

            'mapels',

            'guruId',

            'mapelId',

            'data'

        ));
    }
}

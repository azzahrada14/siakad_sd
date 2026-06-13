<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\TahunAjaran;

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

        $siswas = collect();

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

        $tahunAjaran = $request->tahun_ajaran;

        $semester = $request->semester;

        /*
        |--------------------------------------------------------------------------
        | MAPEL
        |--------------------------------------------------------------------------
        */

        $mapels = Mapel::all();

        /*
        |--------------------------------------------------------------------------
        | DATA NILAI
        |--------------------------------------------------------------------------
        */

        $data = [];

        foreach ($siswas as $siswa) {

            $nilaiMapel = [];

            $totalSemua = 0;

            $jumlahMapelAdaNilai = 0;

            foreach ($mapels as $mapel) {

                $nilai = Nilai::where(
                    'siswa_id',
                    $siswa->id
                )
                ->where(
                    'mapel_id',
                    $mapel->id
                );

                /*
                |--------------------------------------------------------------------------
                | FILTER TAHUN AJARAN
                |--------------------------------------------------------------------------
                */

                if ($tahunAjaran) {

                    $nilai->where(
                        'tahun_ajaran_id',
                        $tahunAjaran
                    );

                }

                /*
                |--------------------------------------------------------------------------
                | FILTER SEMESTER
                |--------------------------------------------------------------------------
                */

                if ($semester) {

                    $nilai->where(
                        'semester',
                        $semester
                    );

                }

                $nilai = $nilai
                    ->orderBy('id', 'desc')
                    ->first();

                /*
                |--------------------------------------------------------------------------
                | HITUNG NILAI
                |--------------------------------------------------------------------------
                */

                if ($nilai) {

                    $rata = round(

                        (
                            ($nilai->tugas ?? 0) +
                            ($nilai->uts ?? 0) +
                            ($nilai->uas ?? 0)

                        ) / 3,

                        2

                    );

                } else {

                    $rata = 0;

                }

                $nilaiMapel[$mapel->nama_mapel] = $rata;

                if ($rata > 0) {

                    $totalSemua += $rata;

                    $jumlahMapelAdaNilai++;

                }
            }

            /*
            |--------------------------------------------------------------------------
            | RATA RATA
            |--------------------------------------------------------------------------
            */

            $rataRata = $jumlahMapelAdaNilai > 0

                ? round(
                    $totalSemua / $jumlahMapelAdaNilai,
                    2
                )

                : 0;

            /*
            |--------------------------------------------------------------------------
            | PREDIKAT
            |--------------------------------------------------------------------------
            */

            if ($rataRata >= 86) {

                $predikat = 'A';

            } elseif ($rataRata >= 76) {

                $predikat = 'B';

            } elseif ($rataRata >= 66) {

                $predikat = 'C';

            } elseif ($rataRata >= 56) {

                $predikat = 'D';

            } else {

                $predikat = 'E';

            }

            /*
            |--------------------------------------------------------------------------
            | ARRAY DATA
            |--------------------------------------------------------------------------
            */

            $data[] = [

                'siswa' => $siswa,

                'nilai' => $nilaiMapel,

                'jumlah' => round($totalSemua, 2),

                'rata' => $rataRata,

                'predikat' => $predikat

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | SORT RANKING
        |--------------------------------------------------------------------------
        */

        usort($data, function ($a, $b) {

            return $b['rata'] <=> $a['rata'];

        });

        foreach ($data as $key => $d) {

            $data[$key]['ranking'] = $key + 1;

        }

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */

        $tahunajarans = TahunAjaran::all();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('wali.nilai', compact(

            'kelas',

            'siswas',

            'mapels',

            'data',

            'tahunajarans'

        ));
    }
}
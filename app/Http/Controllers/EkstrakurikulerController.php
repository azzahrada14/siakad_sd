<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\MasterEkstrakurikuler;
class EkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
public function index(Request $request)
{
    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    $kelas = Kelas::where(
        'status',
        'Aktif'
    )
    ->orderBy('nama_kelas')
    ->get();

    $masterEkstrakurikuler = MasterEkstrakurikuler::where(
        'status',
        'Aktif'
    )
    ->orderBy('nama_ekstrakurikuler')
    ->get();

   $siswas = collect();

if ($request->filled('kelas_id')) {

    $siswas = Siswa::with([
            'ekstrakurikulers',
            'anggotaKelas'
        ])
        ->whereHas('anggotaKelas', function ($q) use ($request, $tahunAktif) {

            $q->where('kelas_id', $request->kelas_id)
              ->where('tahun_ajaran_id', $tahunAktif->id);

        })
        ->orderBy('nama_siswa')
        ->get();

}

    return view(
        'ekstrakurikuler.index',
        compact(
            'tahunAktif',
            'kelas',
            'masterEkstrakurikuler',
            'siswas'
        )
    );
}

public function getData(Siswa $siswa, Request $request)
{
    $data = Ekstrakurikuler::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->get();

    return response()->json($data);
}

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

   
           public function store(Request $request)
{
    $request->validate([

        'siswa_id' => 'required',

        'tahun_ajaran_id' => 'required',

        'semester' => 'required'

    ]);

    foreach ($request->ekstrakurikuler as $item) {

        if (isset($item['dipilih'])) {

            Ekstrakurikuler::updateOrCreate(

                [

                    'siswa_id' => $request->siswa_id,

                    'master_ekstrakurikuler_id' => $item['master_id'],

                    'tahun_ajaran_id' => $request->tahun_ajaran_id,

                    'semester' => $request->semester

                ],

                [

                    'catatan_guru' => $item['catatan_guru']

                ]

            );

        }

    }

    return redirect()
        ->back()
        ->with(
            'success',
            'Data ekstrakurikuler berhasil disimpan.'
        );
}
}
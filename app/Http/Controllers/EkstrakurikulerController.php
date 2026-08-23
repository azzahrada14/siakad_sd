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
    /*
    |--------------------------------------------------------------------------
    | PERIODE AKADEMIK
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {

        return back()->with(
            'error',
            'Belum ada tahun ajaran yang tersedia.'
        );

    }

    $tahunAktif = $tahunAjaran;

    $modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
    |--------------------------------------------------------------------------
    | KELAS BERDASARKAN TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    $kelas = Kelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->orderBy('tingkat')
    ->orderBy('nama_kelas')
    ->get();


    /*
    |--------------------------------------------------------------------------
    | MASTER EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */

    $masterEkstrakurikuler = MasterEkstrakurikuler::where(
        'status',
        'Aktif'
    )
    ->orderBy('nama_ekstrakurikuler')
    ->get();


    /*
    |--------------------------------------------------------------------------
    | SISWA BERDASARKAN PERIODE
    |--------------------------------------------------------------------------
    */

    $siswas = collect();

    if ($request->filled('kelas_id')) {

        $siswas = Siswa::with([
            'ekstrakurikulers',
            'anggotaKelas'
        ])
        ->whereHas('anggotaKelas', function ($q) use (
            $request,
            $tahunAjaran
        ) {

            $q->where(
                'kelas_id',
                $request->kelas_id
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAjaran->id
            );

        })
        ->orderBy('nama_siswa')
        ->get();

    }


    return view(
        'ekstrakurikuler.index',
        compact(
            'tahunAktif',
            'tahunAjaran',
            'modeArsip',
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

    $tahunAjaran = TahunAjaran::findOrFail(
    $request->tahun_ajaran_id
);

if ($tahunAjaran->status !== 'Aktif') {

    return back()
        ->withInput()
        ->with(
            'error',
            'Data ekstrakurikuler pada periode arsip tidak dapat diubah.'
        );

}

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
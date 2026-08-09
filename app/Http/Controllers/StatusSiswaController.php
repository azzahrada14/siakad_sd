<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKelas;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class StatusSiswaController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Data Kelas
        |--------------------------------------------------------------------------
        */

        $kelas = Kelas::where(
                'tahun_ajaran_id',
                $tahunAktif?->id
            )
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();
            $kelasDipilih = Kelas::find($request->kelas);

        /*
        |--------------------------------------------------------------------------
        | Data Siswa
        |--------------------------------------------------------------------------
        */

        $siswa = collect();

        if ($request->filled('kelas')) {

            $ids = AnggotaKelas::where(
                    'kelas_id',
                    $request->kelas
                )
                ->where(
                    'tahun_ajaran_id',
                    $tahunAktif->id
                )
                ->pluck('siswa_id');

            $siswa = Siswa::whereIn(
                    'id',
                    $ids
                )
                ->orderBy('nama_siswa')
                ->get();

        }
        $kelasDipilih = null;

if ($request->kelas) {
    $kelasDipilih = Kelas::find($request->kelas);
}

        return view(
    'status_siswa.index',
    compact(
        'tahunAktif',
        'kelas',
        'kelasDipilih',
        'siswa'
    )
);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS SISWA
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([

            'status_siswa' => 'required'

        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([

            'status_siswa' => $request->status_siswa

        ]);

        return back()->with(
            'success',
            'Status siswa berhasil diperbarui.'
        );
    }
}
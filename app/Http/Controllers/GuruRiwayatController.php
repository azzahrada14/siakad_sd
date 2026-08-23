<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruRiwayatController extends Controller
{
    /**
     * Menampilkan halaman riwayat akademik guru.
     */
    public function index(Request $request)
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403, 'Data guru tidak ditemukan.');
        }

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN
        |--------------------------------------------------------------------------
        */

        $tahunAjaran = TahunAjaran::orderByDesc('id')->get();

        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $tahunAjaranDipilih = null;
        $semesterDipilih = $request->semester;

        if ($request->tahun_ajaran_id) {

            $tahunAjaranDipilih = TahunAjaran::find(
                $request->tahun_ajaran_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | KELAS GURU
        |--------------------------------------------------------------------------
        */

        $kelas = null;

        if ($guru->role_guru === 'wali') {

            $kelas = $guru->kelas;
        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('guru.riwayat', compact(
            'guru',
            'tahunAjaran',
            'tahunAjaranDipilih',
            'semesterDipilih',
            'kelas'
        ));
    }
}
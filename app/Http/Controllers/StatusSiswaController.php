<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class StatusSiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas');

        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswa = $query->get();

        $kelas = Kelas::all();

        $tahunajaran = TahunAjaran::all();

        return view(
            'status_siswa.index',
            compact(
                'siswa',
                'kelas',
                'tahunajaran'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'status_siswa' => $request->status_siswa
        ]);

        return back()->with(
            'success',
            'Status siswa berhasil diperbarui'
        );
    }
}
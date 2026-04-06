<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
{
    $query = Siswa::with('kelas');

    if ($request->search) {
        $query->where('nama_siswa', 'like', '%' . $request->search . '%')
              ->orWhere('nisn', 'like', '%' . $request->search . '%');
    }

    $siswa = $query->get();

    return view('siswa.index', compact('siswa'));
}

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
            'nipd' => 'nullable|digits:9',
            'nisn' => 'nullable|digits:10',
        ], [
            'nama_siswa.required' => 'Nama wajib diisi',
            'kelas_id.required' => 'Kelas wajib dipilih',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'nipd.digits' => 'NIPD harus 9 digit',
            'nisn.digits' => 'NISN harus 10 digit',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'nipd' => $request->nipd,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',
            'nipd' => 'nullable|digits:9',
            'nisn' => 'nullable|digits:10',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'nipd' => $request->nipd,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
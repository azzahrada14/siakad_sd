<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
{
    $query = Kelas::with('waliKelas');

    if ($request->search) {

        $query->where('nama_kelas', 'like', '%' . $request->search . '%');

    }

    $kelas = $query->get();

    return view('kelas.index', compact('kelas'));
}

    public function create()
    {
        $guru = Guru::orderBy('nama_guru')->get();
        return view('kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:10',
            'tingkat' => 'required|string|max:5',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::orderBy('nama_guru')->get();
        return view('kelas.edit', compact('kelas', 'guru'));
    }

   public function update(Request $request, $id)
{
    $request->validate([

        'edit_kelas' => 'required',

        'tingkat_kelas' => 'required',

        'wali_kelas_id' => 'nullable'

    ]);

    $kelas = Kelas::findOrFail($id);

    $kelas->update([

        'edit_kelas' => $request->edit_kelas,

        'tingkat_kelas' => $request->tingkat_kelas,

        'wali_kelas_id' => $request->wali_kelas_id

    ]);

    return redirect()
        ->route('kelas.index')
        ->with(
            'success',
            'Data kelas berhasil diupdate'
        );
}

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunajaran = TahunAjaran::all();

        return view('tahunajaran.index', compact('tahunajaran'));
    }

    public function create()
    {
        return view('tahunajaran.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'tahun_ajaran' => 'required',
        'semester' => 'required',
        'status' => 'required',
    ]);

    TahunAjaran::create([
        'tahun_ajaran' => $request->tahun_ajaran,
        'semester' => $request->semester,
        'status' => $request->status,
    ]);

    return redirect()->route('tahunajaran.index')
        ->with('success', 'Data berhasil ditambahkan');
}

    public function edit($id)
{
    $tahunajaran = TahunAjaran::findOrFail($id);

    return view('tahunajaran.edit', compact('tahunajaran'));
}

    public function update(Request $request, $id)
{
    $request->validate([
        'tahun_ajaran' => 'required',
        'semester' => 'required',
        'status' => 'required',
    ]);

    $tahunajaran = TahunAjaran::findOrFail($id);

    $tahunajaran->update([
        'tahun_ajaran' => $request->tahun_ajaran,
        'semester' => $request->semester,
        'status' => $request->status,
    ]);

    return redirect()->route('tahunajaran.index')
        ->with('success', 'Data berhasil diperbarui');
}


public function destroy($id)
{
    $tahunajaran = TahunAjaran::findOrFail($id);

    $tahunajaran->delete();

    return redirect()->route('tahunajaran.index')
        ->with('success', 'Data berhasil dihapus');
}
}
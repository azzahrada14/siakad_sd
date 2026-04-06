<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with('guru')->get();
        return view('mapel.index', compact('mapels'));
    }

   public function create()
{
    $guru = Guru::all();

    return view('mapel.create', compact('guru'));
}

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|unique:mapels',
            'nama_mapel' => 'required',
        ]);

        Mapel::create($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $guru = Guru::all();

        return view('mapel.edit', compact('mapel','guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mapel' => 'required|unique:mapels,kode_mapel,' . $id,
            'nama_mapel' => 'required',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Data mapel berhasil diupdate');
    }

    public function destroy($id)
    {
        Mapel::findOrFail($id)->delete();

        return redirect()->route('mapel.index')
            ->with('success', 'Data mapel berhasil dihapus');
    }
}
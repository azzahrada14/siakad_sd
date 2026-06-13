<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

use App\Imports\MapelImport;
use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
   public function index()
{
    $mapels = Mapel::all();

    return view('mapel.index', compact('mapels'));
}

  public function create()
{
    return view('mapel.create');
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

    return view('mapel.edit', compact('mapel'));
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

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(
        new MapelImport,
        $request->file('file')
    );

    return back()->with(
        'success',
        'Data mapel berhasil diimport'
    );
}

public function export()
{
    return Excel::download(
        new MapelExport,
        'data_mapel.xlsx'
    );
}
}
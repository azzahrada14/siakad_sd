<?php

namespace App\Http\Controllers;

use App\Models\Kelulusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class KelulusanController extends Controller
{
    public function index()
{
    $kelulusan = Kelulusan::with([
        'siswa.kelas',
        'tahunAjaran'
    ])
    ->whereHas('siswa.kelas',function($q){

        $q->where('nama_kelas','like','6%');

    })
    ->orderBy('tahun_ajaran_id','desc')
    ->get();

    return view(
        'kelulusan.index',
        compact('kelulusan')
    );
}

public function create()
{
    $kelas = Kelas::where('nama_kelas','like','6%')->get();

    $tahun = TahunAjaran::all();

    return view('kelulusan.create', compact(
        'kelas',
        'tahun'
    ));
}

public function store(Request $request)
{
    $request->validate([
        'kelas_id' => 'required',
        'tahun_ajaran_id' => 'required',
        'status' => 'required'
    ]);

    $siswa = Siswa::where(
        'kelas_id',
        $request->kelas_id
    )->get();

    foreach($siswa as $item){

        Kelulusan::updateOrCreate(

            [
                'siswa_id'=>$item->id,
                'tahun_ajaran_id'=>$request->tahun_ajaran_id
            ],

            [
                'status'=>$request->status
            ]

        );

    }

    return redirect()
            ->route('kelulusan.index')
            ->with(
                'success',
                'Kelulusan berhasil diproses.'
            );
}


    public function edit(Kelulusan $kelulusan)
    {
        $siswa=Siswa::all();

        $tahun=TahunAjaran::all();

        return view(
            'kelulusan.edit',
            compact(
                'kelulusan',
                'siswa',
                'tahun'
            )
        );
    }

    public function update(Request $request,Kelulusan $kelulusan)
    {
        $kelulusan->update($request->all());

        return redirect()
        ->route('kelulusan.index')
        ->with('success','Berhasil diubah');
    }

    public function destroy(Kelulusan $kelulusan)
    {
        $kelulusan->delete();

        return back()
        ->with('success','Berhasil dihapus');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class EkstrakurikulerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

   public function index()
{
    $ekstrakurikuler = Ekstrakurikuler::with([
        'siswa',
        'tahunAjaran'
    ])
    ->latest()
    ->get();

    return view(
        'ekstrakurikuler.index',
        compact('ekstrakurikuler')
    );
}
   

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

   public function create()
{
    if(auth()->user()->role != 'operator')
{
    abort(403);
}

    $siswa = Siswa::orderBy('nama_siswa')->get();

    $tahunAjaran = TahunAjaran::orderBy('id','desc')->get();

    return view(
        'ekstrakurikuler.create',
        compact(
            'siswa',
            'tahunAjaran'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
{
    if(auth()->user()->role != 'operator')
    {
        abort(403);
    }

    $request->validate([
        'siswa_id' => 'required',
        'tahun_ajaran_id' => 'required',
        'semester' => 'required',
        'nama_kegiatan' => 'required',
        'keterangan' => 'required'
    ]);

    Ekstrakurikuler::create($request->all());

    return redirect()
        ->route('ekstrakurikuler.index')
        ->with(
            'success',
            'Data ekstrakurikuler berhasil ditambahkan.'
        );
}
      
    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
{
    if(auth()->user()->role != 'operator')
    {
        abort(403);
    }

    $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

    $siswa = Siswa::orderBy('nama_siswa')->get();

    $tahunAjaran = TahunAjaran::orderBy('id','desc')->get();

    return view(
        'ekstrakurikuler.edit',
        compact(
            'ekstrakurikuler',
            'siswa',
            'tahunAjaran'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        if(auth()->user()->role != 'operator')
        {
            abort(403);
        }
        $request->validate([

            'siswa_id' => 'required',

            'tahun_ajaran_id' => 'required',

            'semester' => 'required',

            'nama_kegiatan' => 'required',

            'keterangan' => 'required'

        ]);

        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikuler->update(

            $request->all()

        );

        return redirect()
            ->route('ekstrakurikuler.index')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil diubah.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        if(auth()->user()->role != 'operator')
        {
            abort(403);
        }
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikuler->delete();

        return redirect()
            ->route('ekstrakurikuler.index')
            ->with(
                'success',
                'Data ekstrakurikuler berhasil dihapus.'
            );
    }
}
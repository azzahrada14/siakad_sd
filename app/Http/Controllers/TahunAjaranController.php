<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\TahunAjaranExport;

use Maatwebsite\Excel\Facades\Excel;

class TahunAjaranController extends Controller
{

public function index(Request $request)
{
    $query = TahunAjaran::query();

    if ($request->filled('search')) {

        $query->where(
            'tahun_ajaran',
            'like',
            '%'.$request->search.'%'
        );

    }

    if ($request->filled('semester')) {

        $query->where(
            'semester',
            $request->semester
        );

    }

    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }

    
    $tahunAjaran = $query
            ->orderBy('tahun_ajaran')
            ->paginate(10)
            ->withQueryString();


    $totalTahun = TahunAjaran::count();

    $aktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->count();

    $ganjil = TahunAjaran::where(
        'semester',
        'Ganjil'
    )->count();

    $genap = TahunAjaran::where(
        'semester',
        'Genap'
    )->count();

    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    return view(
        'tahunajaran.index',
        compact(
            'tahunAjaran',
            'totalTahun',
            'aktif',
            'ganjil',
            'genap',
            'tahunAktif'
        )
    );
}
public function create()
{
    return view('tahunajaran.create');
}
public function store(Request $request)
{
    $request->validate([

        'tahun_ajaran'=>'required|unique:tahun_ajarans',

        'semester'=>'required',

        'tanggal_mulai'=>'required|date',

        'tanggal_selesai'=>'required|date'

    ]);

    DB::beginTransaction();

    try{

        TahunAjaran::create([

            'tahun_ajaran'=>$request->tahun_ajaran,

            'semester'=>$request->semester,

            'tanggal_mulai'=>$request->tanggal_mulai,

            'tanggal_selesai'=>$request->tanggal_selesai,

            'status'=>'Nonaktif'

        ]);

        DB::commit();

        return redirect()
    ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Tahun ajaran berhasil ditambahkan.'
            );

    }catch(\Exception $e){

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );

    }
}
public function show($id)
{
    $tahun = TahunAjaran::findOrFail($id);

    return view(
        'tahunajaran.show',
        compact('tahun')
    );
}
public function edit($id)
{
    $tahun = TahunAjaran::findOrFail($id);

    return view(
        'tahunajaran.edit',
        compact('tahun')
    );
}
public function update(Request $request,$id)
{
    $tahun = TahunAjaran::findOrFail($id);

    $request->validate([

        'tahun_ajaran'=>'required|unique:tahun_ajarans,tahun_ajaran,'.$tahun->id,

        'semester'=>'required',

        'tanggal_mulai'=>'required|date',

        'tanggal_selesai'=>'required|date',

        'status'=>'required'

    ]);

    $tahun->update([

        'tahun_ajaran'=>$request->tahun_ajaran,

        'semester'=>$request->semester,

        'tanggal_mulai'=>$request->tanggal_mulai,

        'tanggal_selesai'=>$request->tanggal_selesai,

        'status'=>$request->status

    ]);

    return redirect()
        ->route('tahun-ajaran.index')
        ->with(
            'success',
            'Data berhasil diperbarui.'
        );
}
public function destroy($id)
{
    $tahun = TahunAjaran::findOrFail($id);

    $tahun->update([

        'status'=>'Nonaktif'

    ]);

    return redirect()
        ->route('tahun-ajaran.index')
        ->with(
            'success',
            'Status berhasil diubah.'
        );
}
public function aktifkan($id)
{
    DB::transaction(function() use ($id){

        TahunAjaran::query()->update([

            'status'=>'Nonaktif'

        ]);

        TahunAjaran::findOrFail($id)
            ->update([

                'status'=>'Aktif'

            ]);

    });

    return redirect()
        ->route('tahunajaran.index')
        ->with(
            'success',
            'Tahun ajaran berhasil diaktifkan.'
        );
}
public function export()
{
    return Excel::download(

        new TahunAjaranExport(),

        'Tahun_Ajaran_'.date('Ymd_His').'.xlsx'

    );
}
}
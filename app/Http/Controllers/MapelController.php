<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\KategoriMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\MapelImport;
use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

   public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | PERIODE AKADEMIK
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? \App\Models\TahunAjaran::findOrFail(
            $request->tahun_ajaran_id
        )
        : \App\Models\TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

    if (!$tahunAjaran) {

        return back()->with(
            'error',
            'Belum ada tahun ajaran yang tersedia.'
        );

    }

    /*
    |--------------------------------------------------------------------------
    | MODE ARSIP
    |--------------------------------------------------------------------------
    */

    $modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
    |--------------------------------------------------------------------------
    | DATA MAPEL
    |--------------------------------------------------------------------------
    */

    $query = Mapel::with('kategori');


    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where(
                'kode_mapel',
                'like',
                '%' . $request->search . '%'
            )

            ->orWhere(
                'nama_mapel',
                'like',
                '%' . $request->search . '%'
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | KELOMPOK
    |--------------------------------------------------------------------------
    */

    if ($request->filled('kelompok')) {

        $query->where(
            'kelompok',
            $request->kelompok
        );

    }


    /*
    |--------------------------------------------------------------------------
    | STATUS
    |--------------------------------------------------------------------------
    */

    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }


    /*
    |--------------------------------------------------------------------------
    | PAGINATION
    |--------------------------------------------------------------------------
    */

    $mapels = $query
        ->orderBy('nama_mapel')
        ->paginate(10)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | STATISTIK
    |--------------------------------------------------------------------------
    */

    $totalMapel = (clone $query)->count();

    $mapelAktif = (clone $query)
        ->where('status', 'Aktif')
        ->count();

    $mapelIntrakurikuler = (clone $query)
        ->where(
            'kelompok',
            'Intrakurikuler'
        )
        ->count();

    $mapelMulok = (clone $query)
        ->where(
            'kelompok',
            'Muatan Lokal'
        )
        ->count();


    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    return view(
        'mapel.index',
        compact(
            'mapels',
            'totalMapel',
            'mapelAktif',
            'mapelIntrakurikuler',
            'mapelMulok',
            'tahunAjaran',
            'modeArsip'
        )
    );
}

    public function nonaktif($id)
{
    $mapel = Mapel::findOrFail($id);

    $mapel->update([
        'status' => 'Nonaktif'
    ]);

    return back()->with(
        'success',
        'Mata pelajaran berhasil dinonaktifkan.'
    );
}

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
{
    $kategoriMapels = KategoriMapel::where(
        'status',
        'Aktif'
    )->orderBy('kode_kategori')->get();

    return view(
        'mapel.create',
        compact('kategoriMapels')
    );
}

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
       $request->validate([
    'kategori_mapel_id' => 'required',
    'guru_id' => 'nullable|exists:gurus,id',
    'kode_mapel' => 'required|unique:mapels,kode_mapel',
    'nama_mapel' => 'required',
    'kelompok' => 'required',
    'jenis' => 'required',
    'kkm' => 'required|numeric|min:0|max:100',
    'status' => 'required',
]);


        DB::beginTransaction();

        try {

            Mapel::create([

                'kode_mapel' => $request->kode_mapel,

                'nama_mapel' => $request->nama_mapel,

                'kelompok' => $request->kelompok,

                'kategori_mapel_id'=>$request->kategori_mapel_id,

                
                'kkm' => $request->kkm,

                'status' => 'Aktif'

            ]);

            DB::commit();

            return redirect()
                ->route('mapel.index')
                ->with(
                    'success',
                    'Data mata pelajaran berhasil ditambahkan.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $mapel = Mapel::findOrFail($id);

        return view(
            'mapel.show',
            compact('mapel')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
{
    $mapel = Mapel::findOrFail($id);

    $kategoriMapels = KategoriMapel::where(
        'status',
        'Aktif'
    )->orderBy('kode_kategori')->get();

    return view(
        'mapel.edit',
        compact(
            'mapel',
            'kategoriMapels'
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
    $mapel = Mapel::findOrFail($id);

    $request->validate([
        'kategori_mapel_id' => 'required|exists:kategori_mapels,id',
        'guru_id'           => 'nullable|exists:gurus,id',
        'kode_mapel'        => 'required|unique:mapels,kode_mapel,' . $mapel->id,
        'nama_mapel'        => 'required',
        'jenis'             => 'required',
        'kelompok'          => 'required',
        'kkm'               => 'required|numeric|min:0|max:100',
        'status'            => 'required',
    ]);

    $mapel->update([
        'kategori_mapel_id' => $request->kategori_mapel_id,
        'guru_id'           => $request->guru_id,
        'kode_mapel'        => $request->kode_mapel,
        'nama_mapel'        => $request->nama_mapel,
        'jenis'             => $request->jenis,
        'kelompok'          => $request->kelompok,
        'kkm'               => $request->kkm,
        'status'            => $request->status,
    ]);

    return redirect()
        ->route('mapel.index')
        ->with(
            'success',
            'Data mata pelajaran berhasil diperbarui.'
        );
}

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);

        $mapel->update([

            'status' => 'Nonaktif'

        ]);

        return redirect()
            ->route('mapel.index')
            ->with(
                'success',
                'Status mata pelajaran berhasil diubah menjadi Nonaktif.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | IMPORT
    |--------------------------------------------------------------------------
    */

   public function import(Request $request)
{
    $request->validate([

        'file'=>'required|mimes:xlsx,xls'

    ]);

    Excel::import(

        new MapelImport(),

        $request->file('file')

    );

    return redirect()
        ->route('mapel.index')
        ->with(
            'success',
            'Data mapel berhasil diimport.'
        );
}

    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    public function export()
{
    return Excel::download(

        new MapelExport(),

        'Master_Mapel_'.date('Ymd_His').'.xlsx'

    );
}

    /*
    |--------------------------------------------------------------------------
    | TEMPLATE
    |--------------------------------------------------------------------------
    */

   /*
|--------------------------------------------------------------------------
| TEMPLATE
|--------------------------------------------------------------------------
*/

public function template()
{
    return response()->download(

        public_path('template/template_mapel.xlsx')

    );
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\KategoriMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\MapelImport;
use App\Exports\MapelExport;
use App\Models\MasterMapel;
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

    $query = Mapel::with('kategori')
    ->where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    );


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

        $jumlahMasterMapel = MasterMapel::where(
    'status',
    'Aktif'
)->count();


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
        'modeArsip',
        'jumlahMasterMapel'
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
    $tahunAjaran = \App\Models\TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    if (!$tahunAjaran) {

        return back()->with(
            'error',
            'Belum ada tahun ajaran yang aktif.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | MASTER MATA PELAJARAN
    |--------------------------------------------------------------------------
    */

    $masterMapels = MasterMapel::where(
        'status',
        'Aktif'
    )
    ->with('kategori')
    ->orderBy('nama_mapel')
    ->get();


    /*
    |--------------------------------------------------------------------------
    | KATEGORI
    |--------------------------------------------------------------------------
    */

    $kategoriMapels = KategoriMapel::where(
        'status',
        'Aktif'
    )
    ->orderBy('kode_kategori')
    ->get();


    return view(
        'mapel.create',
        compact(
            'tahunAjaran',
            'masterMapels',
            'kategoriMapels'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    /*
|--------------------------------------------------------------------------
| STORE
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    $request->validate([
        'nama_mapel' => 'required|exists:master_mapels,id',
        'kkm'        => 'required|numeric|min:0|max:100',
    ], [
        'nama_mapel.required' =>
            'Mata pelajaran wajib dipilih.',

        'nama_mapel.exists' =>
            'Mata pelajaran yang dipilih tidak tersedia.',

        'kkm.required' =>
            'KKM wajib diisi.',

        'kkm.numeric' =>
            'KKM harus berupa angka.',

        'kkm.min' =>
            'KKM minimal 0.',

        'kkm.max' =>
            'KKM maksimal 100.',
    ]);


    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN AKTIF
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = \App\Models\TahunAjaran::where(
        'status',
        'Aktif'
    )->first();


    if (!$tahunAjaran) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Belum ada tahun ajaran yang aktif.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | AMBIL MASTER MAPEL
    |--------------------------------------------------------------------------
    */

    $masterMapel = MasterMapel::with('kategori')
        ->where('status', 'Aktif')
        ->findOrFail(
            $request->nama_mapel
        );


    /*
    |--------------------------------------------------------------------------
    | CEK DUPLIKASI PADA TAHUN AJARAN AKTIF
    |--------------------------------------------------------------------------
    */

    $sudahAda = Mapel::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->where(
        'master_mapel_id',
        $masterMapel->id
    )
    ->exists();


    if ($sudahAda) {

        return back()
            ->withInput()
            ->with(
                'warning',
                'Mata pelajaran "' .
                $masterMapel->nama_mapel .
                '" sudah diinputkan pada tahun ajaran ' .
                $tahunAjaran->tahun_ajaran .
                '.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN MAPEL TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    Mapel::create([

        'tahun_ajaran_id' =>
            $tahunAjaran->id,

        'master_mapel_id' =>
            $masterMapel->id,

        'kategori_mapel_id' =>
            $masterMapel->kategori_mapel_id,

        'kode_mapel' =>
            $masterMapel->kode_mapel,

        'nama_mapel' =>
            $masterMapel->nama_mapel,

        'jenis' =>
            $masterMapel->jenis,

        'kelompok' =>
            $masterMapel->kelompok,

        'kkm' =>
            $request->kkm,

        'status' =>
            'Aktif',

        'guru_id' =>
            null,

    ]);


    /*
    |--------------------------------------------------------------------------
    | BERHASIL
    |--------------------------------------------------------------------------
    */

    return redirect()
    ->route('mapel.index')
    ->with(
        'success',
        'Mata pelajaran "' .
        $masterMapel->nama_mapel .
        '" berhasil ditambahkan ke tahun ajaran ' .
        $tahunAjaran->tahun_ajaran .
        '.'
    );
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
    $mapel = Mapel::with([
        'masterMapel',
        'kategori'
    ])->findOrFail($id);

    return view(
        'mapel.edit',
        compact('mapel')
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


    /*
    |--------------------------------------------------------------------------
    | CEK TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = \App\Models\TahunAjaran::findOrFail(
        $mapel->tahun_ajaran_id
    );


    /*
    |--------------------------------------------------------------------------
    | JIKA ARSIP
    |--------------------------------------------------------------------------
    */

    if ($tahunAjaran->status !== 'Aktif') {

        return back()->with(
            'error',
            'Data pada tahun ajaran arsip tidak dapat diubah.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    $request->validate([
        'guru_id' => [
            'nullable',
            'exists:gurus,id',
        ],

        'kkm' => [
            'required',
            'numeric',
            'min:0',
            'max:100',
        ],

        'status' => [
            'required',
            'in:Aktif,Nonaktif',
        ],
    ], [
        'kkm.required' =>
            'KKM wajib diisi.',

        'kkm.numeric' =>
            'KKM harus berupa angka.',

        'kkm.min' =>
            'KKM minimal 0.',

        'kkm.max' =>
            'KKM maksimal 100.',

        'guru_id.exists' =>
            'Guru yang dipilih tidak tersedia.',

        'status.required' =>
            'Status wajib dipilih.',
    ]);


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    $mapel->update([

        'guru_id' =>
            $request->guru_id,

        'kkm' =>
            $request->kkm,

        'status' =>
            $request->status,

    ]);


    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route('mapel.index')
        ->with(
            'success',
            'Data mata pelajaran "' .
            $mapel->nama_mapel .
            '" berhasil diperbarui.'
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
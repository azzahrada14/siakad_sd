<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterEkstrakurikuler;
use App\Models\TahunAjaran;

class MasterEkstrakurikulerController extends Controller
{

public function __construct()
{
    $this->middleware(function ($request, $next) {

        if (auth()->user()->role != 'operator') {
            abort(403);
        }

        return $next($request);

    });
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = MasterEkstrakurikuler::query();

    if ($request->filled('search')) {

        $query->where(function($q) use ($request){

    $q->where(
        'nama_ekstrakurikuler',
        'like',
        '%'.$request->search.'%'
    )
    ->orWhere(
        'pembina',
        'like',
        '%'.$request->search.'%'
    );

});

    }

    $data = $query
        ->orderBy('nama_ekstrakurikuler')
        ->paginate(10)
        ->withQueryString();

        $tahunAktif = TahunAjaran::where(
    'status',
    'Aktif'
)->first();
   return view(
    'master-ekstrakurikuler.index',
    compact(
        'data',
        'tahunAktif'
    )
);
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    return view(
        'master-ekstrakurikuler.create',
        compact('tahunAktif')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
    'nama_ekstrakurikuler' => 'required|max:100|unique:master_ekstrakurikulers,nama_ekstrakurikuler',
    'pembina' => 'nullable|max:100',
    'wajib' => 'required|boolean',
    'status' => 'required|in:Aktif,Nonaktif',
]);

    MasterEkstrakurikuler::create([

        'nama_ekstrakurikuler' => $request->nama_ekstrakurikuler,

        'pembina' => $request->pembina,

        'wajib' => $request->wajib,

        'status' => $request->status

    ]);

    return redirect()
        ->route('master-ekstrakurikuler.index')
        ->with(
            'success',
            'Data berhasil ditambahkan.'
        );
}

    

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(
    MasterEkstrakurikuler $masterEkstrakurikuler
)
{
    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    return view(
        'master-ekstrakurikuler.edit',
        compact(
            'masterEkstrakurikuler',
            'tahunAktif'
        )
    );
}

    /**
     * Update the specified resource in storage.
     */
   public function update(
    Request $request,
    MasterEkstrakurikuler $masterEkstrakurikuler
)
{
    $request->validate([

        'nama_ekstrakurikuler' =>
'required|max:100|unique:master_ekstrakurikulers,nama_ekstrakurikuler,' .
$masterEkstrakurikuler->id,

'pembina' => 'nullable|max:100',

'wajib' => 'required|boolean',

'status' => 'required|in:Aktif,Nonaktif',
    ]);

    $masterEkstrakurikuler->update([

        'nama_ekstrakurikuler' => $request->nama_ekstrakurikuler,

        'pembina' => $request->pembina,

        'wajib' => $request->wajib,

        'status' => $request->status

    ]);

    return redirect()
    ->route('master-ekstrakurikuler.index')
    ->with(
        'success',
        'Data berhasil diperbarui.'
    );
}

    /**
     * Remove the specified resource from storage.
     */

public function toggleStatus(
    MasterEkstrakurikuler $masterEkstrakurikuler
)
{

    $masterEkstrakurikuler->status =
        $masterEkstrakurikuler->status == 'Aktif'
            ? 'Nonaktif'
            : 'Aktif';

    $masterEkstrakurikuler->save();

    return redirect()
        ->route('master-ekstrakurikuler.index')
        ->with(
            'success',
            'Status berhasil diperbarui.'
        );
}
}

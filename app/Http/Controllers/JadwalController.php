<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Jadwal;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $kelas = Kelas::all();
    $tahun = TahunAjaran::all();

    $query = Jadwal::with([
        'kelas',
        'guru',
        'mapel',
        'tahunAjaran'
    ]);

    if ($request->kelas_id) {
        $query->where('kelas_id', $request->kelas_id);
    }

    if ($request->tahun_ajaran_id) {
        $query->where('tahun_ajaran_id', $request->tahun_ajaran_id);
    }

    $jadwal = $query->get();

    $jam = [
        '07:00-08:00',
        '08:00-09:00',
        '09:00-10:00',
        '10:00-11:00',
        '11:00-12:00',
    ];

    $jadwalGrid = [];

    foreach ($jadwal as $item) {
        $key = substr($item->jam_mulai, 0, 5) . '-' . substr($item->jam_selesai, 0, 5);

        $jadwalGrid[$item->hari][$key] = $item;
    }

    return view('jadwal.index', compact(
        'kelas',
        'tahun',
        'jadwalGrid',
        'jam'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('jadwal.create',[
        'tahun' => TahunAjaran::all(),
        'kelas' => Kelas::all(),
        'guru'  => Guru::all(),
        'mapel' => Mapel::all(),
    ]);
}
    /**
     * Store a newly created resource in storage.
     */
   
    public function store(Request $request)
{
    $request->validate([
    'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
    'kelas_id'        => 'required|exists:kelas,id',
    'guru_id'         => 'required|exists:gurus,id',
    'mapel_id'        => 'required|exists:mapels,id',
    'hari'            => 'required',
    'jam_mulai'       => 'required',
    'jam_selesai'     => 'required',
]);

    Jadwal::create($request->only([
    'tahun_ajaran_id',
    'kelas_id',
    'guru_id',
    'mapel_id',
    'hari',
    'jam_mulai',
    'jam_selesai'
]));

    return redirect()
        ->route('jadwal.index')
        ->with('success','Jadwal berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Jadwal $jadwal)
{
    return view('jadwal.edit',[

        'jadwal'=>$jadwal,

        'kelas'=>Kelas::all(),

        'guru'=>Guru::all(),

        'mapel'=>Mapel::all(),

        'tahunAjaran'=>TahunAjaran::all()

    ]);
}
    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Jadwal $jadwal)
{
    $request->validate([
        'kelas_id'    => 'required|exists:kelas,id',
        'guru_id'     => 'required|exists:gurus,id',
        'mapel_id'    => 'required|exists:mapels,id',
        'hari'        => 'required',
        'jam_mulai'   => 'required',
        'jam_selesai' => 'required',
    ]);

    $jadwal->update($request->only([
        'kelas_id',
        'guru_id',
        'mapel_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ]));

    return redirect()
        ->route('jadwal.index')
        ->with('success','Jadwal berhasil diubah.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Jadwal $jadwal)
{
    $jadwal->delete();

    return back()
    ->with('success','Berhasil dihapus');
}
public function export()
{
    return Excel::download(
        new JadwalExport,
        'Jadwal_Pelajaran.xlsx'
    );
}
}

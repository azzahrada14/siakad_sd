<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Kelulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
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
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {

        return back()->with(
            'error',
            'Belum ada tahun ajaran yang tersedia.'
        );

    }

    $tahunAktif = $tahunAjaran;

    $modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
    |--------------------------------------------------------------------------
    | DATA KELAS BERDASARKAN PERIODE
    |--------------------------------------------------------------------------
    */

    $query = Kelas::with([
        'waliKelas'
    ])
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

        $query->where(
            'nama_kelas',
            'like',
            '%' . $request->search . '%'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | TINGKAT
    |--------------------------------------------------------------------------
    */

    if ($request->filled('tingkat')) {

        $query->where(
            'tingkat',
            $request->tingkat
        );

    }


    /*
    |--------------------------------------------------------------------------
    | DATA KELAS
    |--------------------------------------------------------------------------
    */

    $kelas = $query
        ->orderBy('tingkat')
        ->orderBy('nama_kelas')
        ->paginate(10)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | STATISTIK
    |--------------------------------------------------------------------------
    */

    $totalKelas = (clone $query)->count();

    $totalWali = Guru::where(
        'jenis_pengajar',
        'Wali Kelas'
    )->count();

    $totalSiswa = \App\Models\AnggotaKelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->distinct('siswa_id')
    ->count('siswa_id');

    $totalTingkat = (clone $query)
        ->distinct('tingkat')
        ->count('tingkat');


    /*
    |--------------------------------------------------------------------------
    | GURU WALI KELAS
    |--------------------------------------------------------------------------
    */

    $guru = Guru::where(
        'jenis_pengajar',
        'Wali Kelas'
    )
    ->where(
        'status_guru',
        'Aktif'
    )
    ->orderBy('nama_guru')
    ->get();


    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    return view(
        'kelas.index',
        compact(
            'kelas',
            'totalKelas',
            'totalWali',
            'totalSiswa',
            'guru',
            'totalTingkat',
            'tahunAktif',
            'tahunAjaran',
            'modeArsip'
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
    $request->validate([

        'nama_kelas' => 'required|string|max:20',

        'tingkat' => 'required|integer|min:1|max:6',

        'ruang_kelas' => 'nullable|string|max:10',

        'wali_kelas_id' => 'nullable|exists:gurus,id',

        'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',

    ]);


    /*
    |--------------------------------------------------------------------------
    | PERIODE YANG DIPILIH
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = TahunAjaran::findOrFail(
        $request->tahun_ajaran_id
    );


    /*
    |--------------------------------------------------------------------------
    | ARSIP TIDAK BOLEH DITAMBAH
    |--------------------------------------------------------------------------
    */

    if ($tahunAjaran->status !== 'Aktif') {

        return back()->with(
            'error',
            'Data kelas pada periode arsip tidak dapat ditambahkan.'
        );

    }


    DB::beginTransaction();

    try {

        Kelas::create([

            'nama_kelas' => $request->nama_kelas,

            'tingkat' => $request->tingkat,

            'wali_kelas_id' => $request->wali_kelas_id,

            'ruang_kelas' => $request->ruang_kelas,

            'tahun_ajaran_id' => $tahunAjaran->id

        ]);


        DB::commit();

        return redirect()
            ->route(
                'kelas.index',
                [
                    'tahun_ajaran_id' => $tahunAjaran->id
                ]
            )
            ->with(
                'success',
                'Data kelas berhasil ditambahkan.'
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
    $kelas = Kelas::with([
        'waliKelas',
        'siswa'
    ])->findOrFail($id);

    return view(
        'kelas.show',
        compact('kelas')
    );
}

    /*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{
    $kelas = Kelas::findOrFail($id);

    $tahunAjaran = TahunAjaran::findOrFail(
        $kelas->tahun_ajaran_id
    );


    if ($tahunAjaran->status !== 'Aktif') {

        return back()->with(
            'error',
            'Data kelas pada periode arsip tidak dapat diubah.'
        );

    }


    $guru = Guru::where(
        'jenis_pengajar',
        'Wali Kelas'
    )
    ->where(
        'status_guru',
        'Aktif'
    )
    ->orderBy('nama_guru')
    ->get();


    return view(
        'kelas.edit',
        compact(
            'kelas',
            'guru',
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
    $request->validate([

        'nama_kelas' => 'required',

        'tingkat' => 'required',

        'ruang_kelas' => 'nullable|string|max:10',

        'wali_kelas_id' => 'nullable|exists:gurus,id'

    ]);

    DB::beginTransaction();

    try {

       $kelas = Kelas::findOrFail($id);

$tahunAjaran = TahunAjaran::findOrFail(
    $kelas->tahun_ajaran_id
);

if ($tahunAjaran->status !== 'Aktif') {

    return back()->with(
        'error',
        'Data kelas pada periode arsip tidak dapat diubah.'
    );

}

        $kelas->update([

            'nama_kelas' => $request->nama_kelas,

            'tingkat' => $request->tingkat,

            'ruang_kelas' => $request->ruang_kelas,

            'wali_kelas_id' => $request->wali_kelas_id

        ]);

        DB::commit();

       return redirect()
    ->route('kelas.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]);

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


public function create(Request $request)
{
    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {
        return back()->with('error', 'Belum ada tahun ajaran yang tersedia.');
    }

    if ($tahunAjaran->status !== 'Aktif') {
        return back()->with('error', 'Periode arsip tidak dapat menambahkan data.');
    }

    $guru = Guru::where('jenis_pengajar', 'Wali Kelas')
        ->where('status_guru', 'Aktif')
        ->orderBy('nama_guru')
        ->get();

    return view('kelas.create', compact(
        'tahunAjaran',
        'guru'
    ));
}


    /*
|--------------------------------------------------------------------------
| DESTROY
|--------------------------------------------------------------------------
*/

public function destroy($id)
{
    $kelas = Kelas::findOrFail($id);

    $tahunAjaran = TahunAjaran::findOrFail(
        $kelas->tahun_ajaran_id
    );


    if ($tahunAjaran->status !== 'Aktif') {

        return back()->with(
            'error',
            'Data kelas pada periode arsip tidak dapat dihapus.'
        );

    }


    if ($kelas->anggotaKelas()->exists()) {

        return back()->with(
            'error',
            'Kelas tidak dapat dihapus karena sudah digunakan.'
        );

    }


    $kelas->delete();


    return redirect()
        ->route('kelas.index', [
            'tahun_ajaran_id' => $tahunAjaran->id
        ])
        ->with(
            'success',
            'Data kelas berhasil dihapus.'
        );
}
}
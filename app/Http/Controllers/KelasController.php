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
        $query = Kelas::with([
            'waliKelas'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $query->where('nama_kelas', 'like', '%' . $request->search . '%');

        }

        /*
        |--------------------------------------------------------------------------
        | Tingkat
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tingkat')) {

            $query->where('tingkat', $request->tingkat);

        }

        $kelas = $query
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $totalKelas = Kelas::count();

        $totalWali = Guru::where(
            'jenis_pengajar',
            'Wali Kelas'
        )->count();

        $totalSiswa = Siswa::count();


        $totalTingkat = Kelas::distinct('tingkat')->count();

        $guru = Guru::where('jenis_pengajar', 'Wali Kelas')
    ->where('status_guru', 'Aktif')
    ->orderBy('nama_guru')
    ->get();
$tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

        return view('kelas.index', compact(
    'kelas',
    'totalKelas',
    'totalWali',
    'totalSiswa',
    'guru',
    'totalTingkat',
    'tahunAktif',
));
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
        
        'wali_kelas_id' => 'nullable|exists:gurus,id'

    ]);

    DB::beginTransaction();

    try {

        Kelas::create([

            'nama_kelas'    => $request->nama_kelas,

            'tingkat'       => $request->tingkat,

            'wali_kelas_id' => $request->wali_kelas_id,

            'ruang_kelas' => $request->ruang_kelas
        ]);

        DB::commit();

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil ditambahkan.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
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
            'guru'
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

        $kelas->update([

            'nama_kelas' => $request->nama_kelas,

            'tingkat' => $request->tingkat,

            'ruang_kelas' => $request->ruang_kelas,

            'wali_kelas_id' => $request->wali_kelas_id

        ]);

        DB::commit();

        return redirect()
            ->route('kelas.index')
            ->with(
                'success',
                'Data kelas berhasil diperbarui.'
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
| DESTROY
|--------------------------------------------------------------------------
*/

public function destroy($id)
{
    $kelas = Kelas::findOrFail($id);

    if ($kelas->anggotaKelas()->exists()) {

    return back()->with(
        'error',
        'Kelas tidak dapat dihapus karena sudah digunakan.'
    );

}

    $kelas->delete();

    return redirect()
        ->route('kelas.index')
        ->with(
            'success',
            'Data kelas berhasil dihapus.'
        );
}
}
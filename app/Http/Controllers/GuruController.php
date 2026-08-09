<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;
use App\Exports\GuruExport;

class GuruController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
      $query = Guru::with([
    'user',
    'waliKelas'
]);


        // Search
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('nama_guru', 'like', '%' . $request->search . '%')
                  ->orWhere('nip', 'like', '%' . $request->search . '%')
                  ->orWhere('nuptk', 'like', '%' . $request->search . '%');

            });

        }

        // Filter Jenis Pengajar
        if ($request->filled('jenis_pengajar')) {

            $query->where(
                'jenis_pengajar',
                $request->jenis_pengajar
            );

        }

        // Filter Status Guru
        if ($request->filled('status_guru')) {

            $query->where(
                'status_guru',
                $request->status_guru
            );

        }

        $gurus = $query
            ->orderBy('nama_guru')
            ->paginate(10)
            ->withQueryString();

        $totalGuru = Guru::count();

        $totalWali = Guru::where('jenis_pengajar', 'Wali Kelas')
            ->where('status_guru', 'Aktif')
            ->count();

        $totalPai = Guru::where('jenis_pengajar', 'Guru PAI')
            ->where('status_guru', 'Aktif')
            ->count();

        $totalPjok = Guru::where('jenis_pengajar', 'Guru PJOK')
            ->where('status_guru', 'Aktif')
            ->count();

        $totalMutasi = Guru::where(
            'status_guru',
            'Mutasi Keluar'
        )->count();

        return view(
            'guru.index',
            compact(
                'gurus',
                'totalGuru',
                'totalWali',
                'totalPai',
                'totalPjok',
                'totalMutasi'
            )
        );
    }
    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('guru.create');
    }


    /*
|--------------------------------------------------------------------------
| SHOW
|--------------------------------------------------------------------------
*/

public function show($id)
{
    $guru = Guru::with('user')
        ->findOrFail($id);

    return view(
        'guru.show',
        compact('guru')
    );
}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{
    $guru = Guru::with('user')
        ->findOrFail($id);

    return view(
        'guru.edit',
        compact('guru')
    );
}
/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/

public function update(Request $request, $id)
{
    $guru = Guru::with('user')->findOrFail($id);

    $request->validate([
        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($guru->user_id),
        ],
        'status_guru' => 'required',
    ]);

    DB::beginTransaction();

    try {

        // Update tabel users
        if ($guru->user) {
            $guru->user->update([
                'email' => $request->email,
            ]);
        }

        // Update tabel gurus
        $guru->update([
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
            'status_guru'  => $request->status_guru,
        ]);

        DB::commit();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with('error', $e->getMessage());
    }
}

    
/*
|--------------------------------------------------------------------------
| IMPORT
|--------------------------------------------------------------------------
*/

public function import(Request $request)
{
    $request->validate([

        'file' => 'required|mimes:xlsx,xls'

    ]);

    DB::beginTransaction();

    try {

        Excel::import(

            new GuruImport(),

            $request->file('file')

        );

        DB::commit();

        return redirect()
            ->route('guru.index')
            ->with(
                'success',
                'Data guru berhasil diimport.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->with(
                'error',
                $e->getMessage()
            );

    }
}

public function mutasi($id)
{
    $guru = Guru::findOrFail($id);

    // Jangan mutasi jika masih menjadi wali kelas
    if ($guru->waliKelas()->exists()) {

        return back()->with(
            'error',
            'Guru masih menjadi wali kelas. Pindahkan wali kelas terlebih dahulu.'
        );

    }

    $guru->update([

        'status_guru' => 'Mutasi Keluar'

    ]);

    return back()->with(
        'success',
        'Status guru berhasil diubah menjadi Mutasi Keluar.'
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

        new GuruExport(),

        'Master_Guru_'.date('Ymd_His').'.xlsx'

    );
}
/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/

public function resetPassword($id)
{
    $guru = Guru::findOrFail($id);

    if ($guru->user) {

        $guru->user->update([

            'password' => Hash::make('12345678')

        ]);

    }

    return back()->with(

        'success',

        'Password berhasil direset menjadi 12345678.'

    );
}

public function template()
{
    return response()->download(
        public_path('template/template_ptk.xlsx')
    );
}



}
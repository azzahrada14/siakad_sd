<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use App\Models\Mapel;
use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
{
    $query = Guru::with(['user','mapel']);

    if ($request->search) {

        $query->where(
            'nama_guru',
            'like',
            '%' . $request->search . '%'
        );
    }

    $gurus = $query->latest()->get();

    return view(
        'guru.index',
        compact('gurus')
    );
}

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $mapels = Mapel::all();

        return view(
            'guru.create',
            compact('mapels')
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

            'nip' => 'required|digits:16|unique:gurus,nip',

            'nama_guru' => 'required',

            'jenis_kelamin' => 'required',

            'email' => 'required|email|unique:users,email',

            'role_guru' => 'required'

        ]);

        $user = User::create([

            'name' => $request->nama_guru,

            'email' => $request->email,

            'password' => Hash::make('12345678'),

            'role' => 'guru'

        ]);

        Guru::create([

            'user_id' => $user->id,

            'nip' => $request->nip,

            'nama_guru' => $request->nama_guru,

            'jenis_kelamin' => $request->jenis_kelamin,

            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => $request->tanggal_lahir,

            'alamat' => $request->alamat,

            'email' => $request->email,

            'role_guru' => $request->role_guru,

            'mapel_id' => $request->mapel_id,

            'kelas_id' => $request->kelas_id

        ]);

        return redirect()
            ->route('guru.index')
            ->with(
                'success',
                'Data guru berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        $mapels = Mapel::all();

        return view(
            'guru.edit',
            compact(
                'guru',
                'mapels'
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
        $guru = Guru::findOrFail($id);

        $guru->update([

            'nip' => $request->nip,

            'nama_guru' => $request->nama_guru,

            'jenis_kelamin' => $request->jenis_kelamin,

            'tempat_lahir' => $request->tempat_lahir,

            'tanggal_lahir' => $request->tanggal_lahir,

            'alamat' => $request->alamat,

            'email' => $request->email,

            'role_guru' => $request->role_guru,

            'mapel_id' => $request->mapel_id,

            'kelas_id' => $request->kelas_id

        ]);

        return redirect()
            ->route('guru.index')
            ->with(
                'success',
                'Data guru berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        User::where(
            'id',
            $guru->user_id
        )->delete();

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with(
                'success',
                'Data guru berhasil dihapus'
            );
    }
 public function export()
{
    return Excel::download(
        new GuruExport,
        'data_guru.xlsx'
    );
}

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(
        new GuruImport,
        $request->file('file')
    );

    return redirect()
        ->route('guru.index')
        ->with(
            'success',
            'Data guru berhasil diimport'
        );
}
public function show($id)
{
    return redirect()->route('guru.index');
}
}
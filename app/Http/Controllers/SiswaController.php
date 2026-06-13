<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TahunAjaran;

class SiswaController extends Controller
{
   public function index(Request $request)
{
    $kelas = Kelas::all();

    $query = Siswa::with('kelas');

    if ($request->search) {

        $query->where(function($q) use ($request){

            $q->where(
                'nama_siswa',
                'like',
                '%' . $request->search . '%'
            )
            ->orWhere(
                'nipd',
                'like',
                '%' . $request->search . '%'
            )
            ->orWhere(
                'nisn',
                'like',
                '%' . $request->search . '%'
            );

        });
    }

    if ($request->kelas) {

        $query->where(
            'kelas_id',
            $request->kelas
        );
    }

    $siswa = $query->get();

    return view(
        'siswa.index',
        compact(
            'siswa',
            'kelas'
        )
    );
  $query = Siswa::with('kelas');

    if(request('kelas_id')){
        $query->where('kelas_id', request('kelas_id'));
    }

    $siswa = $query->get();

    $kelas = Kelas::all();
    $tahunajaran = TahunAjaran::all();

    return view('status_siswa.index', compact(
        'siswa',
        'kelas',
        'tahunajaran'
    ));
}

    public function create()
    {
        $kelas = Kelas::all();

        return view(
            'siswa.create',
            compact('kelas')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jenis_kelamin' => 'required',

            'nipd' => 'nullable|digits:9',
            'nisn' => 'nullable|digits:10',
            

        ]);

        Siswa::create([

            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,

            'nipd' => $request->nipd,
            'nisn' => $request->nisn,

            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,

            'agama' => $request->agama,
            'alamat' => $request->alamat,

            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,

            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,

            'status_siswa' => $request->status_siswa ?? 'Aktif',
            'nama_wali' => $request->nama_wali,

'pekerjaan_wali' => $request->pekerjaan_wali,

'telepon_orangtua' => $request->telepon_orangtua,

'tahun_masuk' => $request->tahun_masuk,

        ]);

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        $kelas = Kelas::all();

        return view(
            'siswa.edit',
            compact(
                'siswa',
                'kelas'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([

    'nama_siswa' => 'required',
    'kelas_id' => 'required',
    'jenis_kelamin' => 'required',

    'nipd' => 'nullable|digits:9',
    'nisn' => 'nullable|digits:10',

]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([

            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,

            'nipd' => $request->nipd,
            'nisn' => $request->nisn,

            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,

            'agama' => $request->agama,
            'alamat' => $request->alamat,

            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,

            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,

            'status_siswa' => $request->status_siswa,
            'nama_wali' => $request->nama_wali,

'pekerjaan_wali' => $request->pekerjaan_wali,

'telepon_orangtua' => $request->telepon_orangtua,

'tahun_masuk' => $request->tahun_masuk,

        ]);

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)
            ->delete();

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil dihapus'
            );
    }

    public function show($id)
{
    $siswa = Siswa::with('kelas')
        ->findOrFail($id);

    return view(
        'siswa.show',
        compact('siswa')
    );
}

 public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(
        new SiswaImport,
        $request->file('file')
    );

    return back()->with(
        'success',
        'Data siswa berhasil diimport'
    );
}

public function export()
{
    return Excel::download(
        new SiswaExport,
        'data_siswa.xlsx'
    );
}  
}
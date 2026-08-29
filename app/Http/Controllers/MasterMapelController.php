<?php

namespace App\Http\Controllers;

use App\Models\MasterMapel;
use App\Models\KategoriMapel;
use Illuminate\Http\Request;

class MasterMapelController extends Controller
{
    public function create()
    {
        $kategoriMapels = KategoriMapel::where(
            'status',
            'Aktif'
        )
        ->orderBy('kode_kategori')
        ->get();

        return view(
            'mapel.master-create',
            compact('kategoriMapels')
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => [
                'required',
                'string',
                'max:20',
                'unique:master_mapels,kode_mapel',
            ],

            'nama_mapel' => [
                'required',
                'string',
                'max:255',
            ],

            'kategori_mapel_id' => [
                'required',
                'exists:kategori_mapels,id',
            ],

            'jenis' => [
                'required',
                'in:Wajib,Muatan Lokal,Pilihan',
            ],

            'kelompok' => [
                'required',
                'in:Intrakurikuler,Mapel Pilihan',
            ],
        ], [
            'kode_mapel.required' =>
                'Kode mata pelajaran wajib diisi.',

            'kode_mapel.unique' =>
                'Kode mata pelajaran tersebut sudah digunakan.',

            'nama_mapel.required' =>
                'Nama mata pelajaran wajib diisi.',

            'kategori_mapel_id.required' =>
                'Kategori mata pelajaran wajib dipilih.',

            'jenis.required' =>
                'Jenis mata pelajaran wajib dipilih.',

            'kelompok.required' =>
                'Kelompok mata pelajaran wajib dipilih.',
        ]);


        MasterMapel::create([
            'kode_mapel' =>
                strtoupper(trim($request->kode_mapel)),

            'nama_mapel' =>
                trim($request->nama_mapel),

            'kategori_mapel_id' =>
                $request->kategori_mapel_id,

            'jenis' =>
                $request->jenis,

            'kelompok' =>
                $request->kelompok,

            'status' =>
                'Aktif',
        ]);


        return redirect()
            ->route('mapel.create')
            ->with(
                'success',
                'Master mata pelajaran berhasil ditambahkan.'
            );
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LingkupMateri;
use App\Models\Mapel;
use App\Models\TahunAjaran;

class LingkupMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        $mapelId = $request->mapel;
        $tingkat = $request->tingkat;

        $query = LingkupMateri::with([
            'mapel',
            'tahunAjaran'
        ]);

        $semester = request('semester');

if ($semester) {
    $query->where('semester', $semester);
}
        /*
        |--------------------------------------------------------------------------
        | Filter Tahun Ajaran Aktif
        |--------------------------------------------------------------------------
        */
        if ($tahunAktif) {
            $query->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Filter Mata Pelajaran
        |--------------------------------------------------------------------------
        */
        if ($mapelId) {
            $query->where(
                'mapel_id',
                $mapelId
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Filter Tingkat
        |--------------------------------------------------------------------------
        */
        if ($tingkat) {
            $query->where(
                'tingkat',
                $tingkat
            );
        }

        $data = $query
            ->orderBy('tingkat')
            ->orderBy('kode_lm')
            ->get();

        $mapel = Mapel::find($mapelId);

        return view(
            'lingkupmateri.index',
            compact(
                'data',
                'tahunAktif',
                'mapel',
                'tingkat'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $mapelId = $request->mapel;
        $tingkat = $request->tingkat;

        return view(
            'lingkupmateri.create',
            [

                'mapels' => Mapel::where(
                    'status',
                    'Aktif'
                )
                ->orderBy('nama_mapel')
                ->get(),

                'tahunAktif' => TahunAjaran::where(
                    'status',
                    'Aktif'
                )->first(),

                'mapelId' => $mapelId,

                'tingkat' => $tingkat,

            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'mapel_id' => 'required',

            'tahun_ajaran_id' => 'required',

            'tingkat' => 'required|integer|min:1|max:6',

            'kode_lm' => 'required',

            'nama_lm' => 'required',

            'semester' => 'required',

        ]);


        LingkupMateri::create([

            'mapel_id' => $request->mapel_id,

            'tahun_ajaran_id' => $request->tahun_ajaran_id,

            'tingkat' => $request->tingkat,

            'kode_lm' => $request->kode_lm,

            'nama_lm' => $request->nama_lm,

            'semester' => $request->semester,

            'status' => 'Aktif',

        ]);


        return redirect()
            ->route(
                'lingkup-materi.index',
                [
                    'mapel' => $request->mapel_id,
                    'tingkat' => $request->tingkat,
                ]
            )
            ->with(
                'success',
                'Lingkup Materi berhasil ditambahkan.'
            );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        LingkupMateri $lingkupMateri
    ) {
        return view(
            'lingkupmateri.edit',
            [

                'lingkupMateri' => $lingkupMateri,

                'mapels' => Mapel::where(
                    'status',
                    'Aktif'
                )
                ->orderBy('nama_mapel')
                ->get(),

                'tahunAktif' => TahunAjaran::where(
                    'status',
                    'Aktif'
                )->first(),

            ]
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        LingkupMateri $lingkupMateri
    ) {
        $request->validate([

            'mapel_id' => 'required',

            'tingkat' => 'required|integer|min:1|max:6',

            'kode_lm' => 'required',

            'nama_lm' => 'required',

            'semester' => 'required',

        ]);


        $lingkupMateri->update([

            'mapel_id' => $request->mapel_id,

            'tingkat' => $request->tingkat,

            'kode_lm' => $request->kode_lm,

            'nama_lm' => $request->nama_lm,

            'semester' => $request->semester,

            'status' => $request->status ?? 'Aktif',

        ]);


        return redirect()
            ->route(
                'lingkup-materi.index',
                [
                    'mapel' => $request->mapel_id,
                    'tingkat' => $request->tingkat,
                ]
            )
            ->with(
                'success',
                'Lingkup Materi berhasil diperbarui.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        LingkupMateri $lingkupMateri
    ) {
        $lingkupMateri->delete();

        return back()
            ->with(
                'success',
                'Lingkup Materi berhasil dihapus.'
            );
    }
}
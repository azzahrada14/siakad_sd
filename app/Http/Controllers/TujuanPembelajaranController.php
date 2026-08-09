<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TujuanPembelajaran;
use App\Models\LingkupMateri;
use App\Models\TahunAjaran;

class TujuanPembelajaranController extends Controller
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

        $lingkupMateriId = $request->lingkup_materi;

        $query = TujuanPembelajaran::with([
            'lingkupMateri',
            'lingkupMateri.mapel',
            'lingkupMateri.tahunAjaran'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Filter berdasarkan Lingkup Materi
        |--------------------------------------------------------------------------
        */
        if ($lingkupMateriId) {

            $query->where(
                'lingkup_materi_id',
                $lingkupMateriId
            );
        }

        $data = $query
            ->orderBy('lingkup_materi_id')
            ->orderBy('urutan')
            ->get();

        $lingkupMateri = LingkupMateri::with([
            'mapel',
            'tahunAjaran'
        ])->find($lingkupMateriId);

        return view(
            'tujuanpembelajaran.index',
            compact(
                'data',
                'lingkupMateri',
                'tahunAktif'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        $lingkupMateriId = $request->lingkup_materi;

        /*
        |--------------------------------------------------------------------------
        | LM yang dipilih
        |--------------------------------------------------------------------------
        */
        $lingkupMateri = LingkupMateri::with([
            'mapel',
            'tahunAjaran'
        ])->find($lingkupMateriId);


        /*
        |--------------------------------------------------------------------------
        | Ambil LM yang sesuai dengan konteks LM yang dipilih
        |--------------------------------------------------------------------------
        */
        $query = LingkupMateri::where(
            'status',
            'Aktif'
        );

        if ($lingkupMateri) {

            $query
                ->where(
                    'mapel_id',
                    $lingkupMateri->mapel_id
                )
                ->where(
                    'tahun_ajaran_id',
                    $lingkupMateri->tahun_ajaran_id
                )
                ->where(
                    'tingkat',
                    $lingkupMateri->tingkat
                )
                ->where(
                    'semester',
                    $lingkupMateri->semester
                );
        }

        $lingkupMateris = $query
            ->orderBy('kode_lm')
            ->get();


        return view(
            'tujuanpembelajaran.create',
            [

                'lingkupMateris' => $lingkupMateris,

                'lingkupMateriId' => $lingkupMateriId,

                'lingkupMateri' => $lingkupMateri,

                'tahunAktif' => $tahunAktif

            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'lingkup_materi_id'
                => 'required|exists:lingkup_materis,id',

            'deskripsi'
                => 'required',

            'jumlah_jp'
                => 'required|integer|min:1',

            'urutan'
                => 'required|integer|min:1',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Ambil LM
        |--------------------------------------------------------------------------
        */
        $lingkupMateri = LingkupMateri::findOrFail(
            $request->lingkup_materi_id
        );


        /*
        |--------------------------------------------------------------------------
        | Cek nomor TP
        |--------------------------------------------------------------------------
        */
        $cek = TujuanPembelajaran::where(
            'lingkup_materi_id',
            $request->lingkup_materi_id
        )
        ->where(
            'urutan',
            $request->urutan
        )
        ->exists();


        if ($cek) {

            return back()
                ->withInput()
                ->withErrors([

                    'urutan'
                        => 'TP Ke-' .
                           $request->urutan .
                           ' sudah digunakan pada Lingkup Materi ini.'

                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Generate kode TP
        |--------------------------------------------------------------------------
        */
        $kodeTP = 'TP' . str_pad(
            $request->urutan,
            2,
            '0',
            STR_PAD_LEFT
        );


        /*
        |--------------------------------------------------------------------------
        | Simpan
        |--------------------------------------------------------------------------
        */
        TujuanPembelajaran::create([

            'lingkup_materi_id'
                => $request->lingkup_materi_id,

            'kode_tp'
                => $kodeTP,

            'deskripsi'
                => $request->deskripsi,

            'jumlah_jp'
                => $request->jumlah_jp,

            'urutan'
                => $request->urutan,

            'status'
                => 'Aktif'

        ]);


        return redirect()
            ->route(
                'tujuan-pembelajaran.index',
                [
                    'lingkup_materi'
                        => $request->lingkup_materi_id
                ]
            )
            ->with(
                'success',
                'Tujuan Pembelajaran berhasil ditambahkan.'
            );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        TujuanPembelajaran $tujuanPembelajaran
    ) {
        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();


        /*
        |--------------------------------------------------------------------------
        | LM milik TP
        |--------------------------------------------------------------------------
        */
        $lingkupMateri =
            LingkupMateri::with([
                'mapel',
                'tahunAjaran'
            ])
            ->findOrFail(
                $tujuanPembelajaran->lingkup_materi_id
            );


        /*
        |--------------------------------------------------------------------------
        | Ambil LM dengan konteks yang sama
        |--------------------------------------------------------------------------
        */
        $lingkupMateris = LingkupMateri::where(
            'status',
            'Aktif'
        )
        ->where(
            'mapel_id',
            $lingkupMateri->mapel_id
        )
        ->where(
            'tahun_ajaran_id',
            $lingkupMateri->tahun_ajaran_id
        )
        ->where(
            'tingkat',
            $lingkupMateri->tingkat
        )
        ->where(
            'semester',
            $lingkupMateri->semester
        )
        ->orderBy('kode_lm')
        ->get();


        return view(
            'tujuanpembelajaran.edit',
            [

                'tujuanPembelajaran'
                    => $tujuanPembelajaran,

                'lingkupMateris'
                    => $lingkupMateris,

                'lingkupMateri'
                    => $lingkupMateri,

                'tahunAktif'
                    => $tahunAktif

            ]
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        TujuanPembelajaran $tujuanPembelajaran
    ) {
        $request->validate([

            'lingkup_materi_id'
                => 'required|exists:lingkup_materis,id',

            'deskripsi'
                => 'required',

            'jumlah_jp'
                => 'required|integer|min:1',

            'urutan'
                => 'required|integer|min:1',

            'status'
                => 'required'

        ]);


        /*
        |--------------------------------------------------------------------------
        | Cek nomor TP
        |--------------------------------------------------------------------------
        */
        $cek = TujuanPembelajaran::where(
            'lingkup_materi_id',
            $request->lingkup_materi_id
        )
        ->where(
            'urutan',
            $request->urutan
        )
        ->where(
            'id',
            '!=',
            $tujuanPembelajaran->id
        )
        ->exists();


        if ($cek) {

            return back()
                ->withInput()
                ->withErrors([

                    'urutan'
                        => 'TP Ke-' .
                           $request->urutan .
                           ' sudah digunakan pada Lingkup Materi ini.'

                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Generate kode TP
        |--------------------------------------------------------------------------
        */
        $kodeTP = 'TP' . str_pad(
            $request->urutan,
            2,
            '0',
            STR_PAD_LEFT
        );


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */
        $tujuanPembelajaran->update([

            'lingkup_materi_id'
                => $request->lingkup_materi_id,

            'kode_tp'
                => $kodeTP,

            'deskripsi'
                => $request->deskripsi,

            'jumlah_jp'
                => $request->jumlah_jp,

            'urutan'
                => $request->urutan,

            'status'
                => $request->status

        ]);


        return redirect()
            ->route(
                'tujuan-pembelajaran.index',
                [
                    'lingkup_materi'
                        => $request->lingkup_materi_id
                ]
            )
            ->with(
                'success',
                'Tujuan Pembelajaran berhasil diperbarui.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        TujuanPembelajaran $tujuanPembelajaran
    ) {
        $lingkupMateriId =
            $tujuanPembelajaran->lingkup_materi_id;


        $tujuanPembelajaran->delete();


        return redirect()
            ->route(
                'tujuan-pembelajaran.index',
                [
                    'lingkup_materi'
                        => $lingkupMateriId
                ]
            )
            ->with(
                'success',
                'Tujuan Pembelajaran berhasil dihapus.'
            );
    }
}
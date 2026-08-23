<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\TahunAjaranExport;
use Maatwebsite\Excel\Facades\Excel;

class TahunAjaranController extends Controller
{
    public function index(Request $request)
    {
        $query = TahunAjaran::query();

        // Pencarian tahun ajaran
        if ($request->filled('search')) {

            $query->where(
                'tahun_ajaran',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter semester
        if ($request->filled('semester')) {

            $query->where(
                'semester',
                $request->semester
            );
        }

        // Filter status
        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }

        // Data tahun ajaran
        $tahunAjaran = $query
            ->orderBy('tahun_ajaran')
            ->orderBy('semester')
            ->paginate(10)
            ->withQueryString();

        // Statistik
        $totalTahun = TahunAjaran::count();

        $aktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->count();

        $ganjil = TahunAjaran::where(
            'semester',
            'Ganjil'
        )->count();

        $genap = TahunAjaran::where(
            'semester',
            'Genap'
        )->count();

        // Tahun ajaran aktif
        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        return view(
            'tahunajaran.index',
            compact(
                'tahunAjaran',
                'totalTahun',
                'aktif',
                'ganjil',
                'genap',
                'tahunAktif'
            )
        );
    }


    public function create()
    {
        return view('tahunajaran.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'tahun_ajaran' => 'required',

            'semester' => 'required',

            'tanggal_mulai' => 'required|date',

            'tanggal_selesai' => 'required|date'

        ]);

        DB::beginTransaction();

        try {

            TahunAjaran::create([

                'tahun_ajaran' => $request->tahun_ajaran,

                'semester' => $request->semester,

                'tanggal_mulai' => $request->tanggal_mulai,

                'tanggal_selesai' => $request->tanggal_selesai,

                // Periode baru dibuat sebagai arsip
                'status' => 'Tidak Aktif'

            ]);

            DB::commit();

            return redirect()
                ->route('tahun-ajaran.index')
                ->with(
                    'success',
                    'Tahun ajaran berhasil ditambahkan.'
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


    public function show($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        return view(
            'tahunajaran.show',
            compact('tahun')
        );
    }


    public function edit($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        return view(
            'tahunajaran.edit',
            compact('tahun')
        );
    }


    public function update(Request $request, $id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        $request->validate([

            'tahun_ajaran' => 'required',

            'semester' => 'required',

            'tanggal_mulai' => 'required|date',

            'tanggal_selesai' => 'required|date',

            'status' => 'required'

        ]);

        $tahun->update([

            'tahun_ajaran' => $request->tahun_ajaran,

            'semester' => $request->semester,

            'tanggal_mulai' => $request->tanggal_mulai,

            'tanggal_selesai' => $request->tanggal_selesai,

            'status' => $request->status

        ]);

        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Data berhasil diperbarui.'
            );
    }


    public function destroy($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        // Jangan hapus data, hanya jadikan arsip
        $tahun->update([

            'status' => 'Tidak Aktif'

        ]);

        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Status berhasil diubah.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | RIWAYAT AKADEMIK
    |--------------------------------------------------------------------------
    */

    public function riwayat($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);

        return view(
            'tahunajaran.riwayat',
            compact('tahunAjaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | AKTIFKAN TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    public function aktifkan($id)
    {
        DB::transaction(function () use ($id) {

            // Semua periode menjadi tidak aktif
            TahunAjaran::query()->update([
                'status' => 'Tidak Aktif'
            ]);

            // Periode yang dipilih menjadi aktif
            TahunAjaran::findOrFail($id)->update([
                'status' => 'Aktif'
            ]);
        });

        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Tahun ajaran berhasil diaktifkan.'
            );
    }

    public function dashboard($id)
{
    $tahunAjaran = TahunAjaran::findOrFail($id);

    return redirect()->route('dashboard', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]);
}


    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    public function export()
    {
        return Excel::download(

            new TahunAjaranExport(),

            'Tahun_Ajaran_' . date('Ymd_His') . '.xlsx'

        );
    }
}
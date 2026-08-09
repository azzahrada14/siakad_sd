<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Alumni;
use App\Models\Siswa;
use App\Models\Kelulusan;
use App\Models\TahunAjaran;

use App\Exports\AlumniExport;

class AlumniController extends Controller
{
    public function index()
{
    /*
    |--------------------------------------------------------------------------
    | Tahun Ajaran Aktif
    |--------------------------------------------------------------------------
    */

    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    /*
    |--------------------------------------------------------------------------
    | Data Alumni
    |--------------------------------------------------------------------------
    */

    $alumni = Alumni::with([
        'siswa',
        'tahunAjaran'
    ])
    ->orderByDesc('tanggal_lulus')
    ->get();

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    $totalAlumni = $alumni->count();

    $laki = $alumni->filter(function($item){

        return $item->siswa->jenis_kelamin == 'L';

    })->count();

    $perempuan = $alumni->filter(function($item){

        return $item->siswa->jenis_kelamin == 'P';

    })->count();

    return view(
        'alumni.index',
        compact(
            'tahunAktif',
            'alumni',
            'totalAlumni',
            'laki',
            'perempuan'
        )
    );
}
public function generate()
{
    DB::beginTransaction();

    try {

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAktif) {

            return back()->with(
                'error',
                'Tahun ajaran aktif tidak ditemukan.'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Ambil seluruh siswa yang Lulus
        |--------------------------------------------------------------------------
        */

        $kelulusan = Kelulusan::with('siswa')
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->where(
                'status',
                'Lulus'
            )
            ->get();

        $berhasil = 0;

        foreach ($kelulusan as $row) {

            /*
            |--------------------------------------------------------------------------
            | Cegah data ganda
            |--------------------------------------------------------------------------
            */

            if (
                Alumni::where(
                    'siswa_id',
                    $row->siswa_id
                )->exists()
            ) {

                continue;

            }

            /*
            |--------------------------------------------------------------------------
            | Nomor Ijazah Otomatis
            |--------------------------------------------------------------------------
            */

            $nomor = Alumni::count() + 1;

            $nomorIjazah =
                sprintf("%03d", $nomor)
                . "/SDN-CMH/"
                . date('Y');

            Alumni::create([

                'siswa_id'          => $row->siswa_id,

                'tahun_ajaran_id'   => $tahunAktif->id,

                'tanggal_lulus'     => $row->tanggal_kelulusan,

                'nomor_ijazah'      => $nomorIjazah,

                'nomor_skhun'       => null,

                'status'            => 'Aktif',

            ]);

            $berhasil++;

        }

        DB::commit();

        return redirect()
            ->route('alumni.index')
            ->with(
                'success',
                "{$berhasil} data alumni berhasil dibuat."
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            $e->getMessage()
        );

    }
}


public function show($id)
{
    // =====================================================
    // DATA ALUMNI
    // =====================================================

    $alumni = Alumni::findOrFail($id);


    // =====================================================
    // DATA SISWA
    // =====================================================

    $siswa = Siswa::where(
        'id',
        $alumni->siswa_id
    )->first();


    // =====================================================
    // DATA TAHUN AJARAN
    // =====================================================

    $tahunAjaran = TahunAjaran::where(
        'id',
        $alumni->tahun_ajaran_id
    )->first();


    // =====================================================
    // DATA NILAI
    // =====================================================

    $nilai = Nilai::with('mapel')
        ->where(
            'siswa_id',
            $alumni->siswa_id
        )
        ->where(
            'tahun_ajaran_id',
            $alumni->tahun_ajaran_id
        )
        ->get();


    // =====================================================
    // RATA-RATA
    // =====================================================

    $rataRata = $nilai->count() > 0
        ? round($nilai->avg('nilai_akhir'), 2)
        : 0;


    // =====================================================
    // KEPALA SEKOLAH
    // =====================================================

    $kepalaSekolah = Guru::where(
        'jabatan_ptk',
        'Kepala Sekolah'
    )->first();


    // =====================================================
    // KIRIM KE VIEW
    // =====================================================

    return view(
        'alumni.show',
        compact(
            'alumni',
            'siswa',
            'tahunAjaran',
            'nilai',
            'rataRata',
            'kepalaSekolah'
        )
    );
}

public function export()
{
    return Excel::download(

        new AlumniExport,

        'Data_Alumni.xlsx'

    );
}
public function destroy(Alumni $alumni)
{
    $alumni->delete();

    return back()->with(

        'success',

        'Data Alumni berhasil dihapus.'

    );
}
}
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
    public function index(Request $request)
{
    $tahunAktif = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAktif) {
        return back()->with(
            'error',
            'Belum ada tahun ajaran yang tersedia.'
        );
    }

    $modeArsip = $tahunAktif->status !== 'Aktif';

    $bolehProses = (
        $tahunAktif->status === 'Aktif'
        && strtolower($tahunAktif->semester) === 'genap'
    );

    $alumni = Alumni::with([
        'siswa',
        'tahunAjaran'
    ])
    ->where(
        'tahun_ajaran_id',
        $tahunAktif->id
    )
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
    'modeArsip',
    'bolehProses',
    'alumni',
    'totalAlumni',
    'laki',
    'perempuan'
)
    );
}


public function generate(Request $request)
{
    DB::beginTransaction();

    try {

        $tahunAktif = $request->filled('tahun_ajaran_id')
            ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
            : TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAktif) {

            return back()->with(
                'error',
                'Tahun ajaran tidak ditemukan.'
            );

        }

        // Periode arsip tidak boleh diproses
        if ($tahunAktif->status !== 'Aktif') {

            return back()->with(
                'error',
                'Data pada periode arsip tidak dapat diproses.'
            );

        }

        // Alumni hanya diproses pada semester Genap
        if (strtolower($tahunAktif->semester) !== 'genap') {

            return back()->with(
                'error',
                'Proses Alumni hanya dapat dilakukan pada semester Genap.'
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Ambil siswa yang sudah Lulus
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
            | Cegah data alumni ganda
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

                'siswa_id'        => $row->siswa_id,

                'tahun_ajaran_id' => $tahunAktif->id,

                'tanggal_lulus'   => $row->tanggal_kelulusan,

                'nomor_ijazah'    => $nomorIjazah,

                'nomor_skhun'     => null,

                'status'          => 'Aktif',

            ]);

            $berhasil++;
        }

        DB::commit();

        return redirect()
            ->route('alumni.index', [
                'tahun_ajaran_id' => $tahunAktif->id
            ])
            ->with(
                'success',
                "{$berhasil} data alumni berhasil dibuat."
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
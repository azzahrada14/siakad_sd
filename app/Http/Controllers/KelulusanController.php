<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\KelulusanExport;

use App\Models\Kelulusan;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;

class KelulusanController extends Controller
{
 /*
|--------------------------------------------------------------------------
| Dashboard Kelulusan
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{
    $tahunAktif = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAktif) {
        return back()->with(
            'error',
            'Tahun ajaran aktif belum tersedia.'
        );
    }

    $modeArsip = $tahunAktif->status !== 'Aktif';

    $bolehProses = (
        $tahunAktif->status === 'Aktif'
        && strtolower($tahunAktif->semester) === 'genap'
    );

    /*
    |--------------------------------------------------------------------------
    | Ambil seluruh kelas VI
    |--------------------------------------------------------------------------
    */

    $kelasVI = Kelas::where(
            'tingkat',
            6
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->pluck('id');

    /*
    |--------------------------------------------------------------------------
    | Ambil seluruh siswa kelas VI
    |--------------------------------------------------------------------------
    */

    $anggota = AnggotaKelas::with('siswa')
        ->whereIn(
            'kelas_id',
            $kelasVI
        )
        ->where(
            'tahun_ajaran_id',
            $tahunAktif->id
        )
        ->orderBy('kelas_id')
        ->get();

    /*
    |--------------------------------------------------------------------------
    | Cek Kelulusan
    |--------------------------------------------------------------------------
    */

    foreach ($anggota as $row) {

        $hasil = $this->cekKelulusan(

            $row->siswa_id,

            $tahunAktif->id

        );

        $row->status = $hasil['status'];

        $row->keterangan = $hasil['keterangan'];

    }

    /*
    |--------------------------------------------------------------------------
    | Statistik Dashboard
    |--------------------------------------------------------------------------
    */

    $totalSiswa = $anggota->count();

    $lulus = $anggota
        ->where(
            'status',
            'Lulus'
        )
        ->count();

    $belum = $anggota
        ->where(
            'status',
            'Belum Lulus'
        )
        ->count();

    return view(

        'kelulusan.index',
    compact(
        'tahunAktif',
        'modeArsip',
        'bolehProses',
        'anggota',
        'totalSiswa',
        'lulus',
        'belum'
    )
);

}   
/*
|--------------------------------------------------------------------------
| Generate Kelulusan
|--------------------------------------------------------------------------
*/

public function generate()
{
    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    if ($tahunAktif->status !== 'Aktif') {
    return back()->with(
        'error',
        'Data pada periode arsip tidak dapat diproses.'
    );
}

if (strtolower($tahunAktif->semester) !== 'genap') {
    return back()->with(
        'error',
        'Proses kelulusan hanya dapat dilakukan pada semester Genap.'
    );
}

    if (!$tahunAktif) {

        return redirect()
           ->route('kelulusan.index', [
    'tahun_ajaran_id' => $tahunAktif->id
])
            ->with(
                'error',
                'Tahun ajaran aktif belum tersedia.'
            );

    }

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | Ambil seluruh kelas VI
        |--------------------------------------------------------------------------
        */

        $kelasVI = Kelas::where(
                'tingkat',
                6
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->pluck('id');

        /*
        |--------------------------------------------------------------------------
        | Ambil seluruh siswa kelas VI
        |--------------------------------------------------------------------------
        */

        $anggota = AnggotaKelas::with('siswa')
            ->whereIn(
                'kelas_id',
                $kelasVI
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->get();

        $jumlahLulus = 0;

        $jumlahBelum = 0;

        /*
        |--------------------------------------------------------------------------
        | Generate Kelulusan
        |--------------------------------------------------------------------------
        */

        foreach ($anggota as $row) {

            $hasil = $this->cekKelulusan(

                $row->siswa_id,

                $tahunAktif->id

            );

            Kelulusan::updateOrCreate(

                [

                    'siswa_id' => $row->siswa_id,

                    'tahun_ajaran_id' => $tahunAktif->id

                ],

                [

                    'tanggal_kelulusan' => now(),

                    'status' => $hasil['status'],

                    'keterangan' => $hasil['keterangan']

                ]

            );

            if ($hasil['status'] == 'Lulus') {

                $jumlahLulus++;

                $row->siswa->update([

                    'status_siswa' => 'Lulus'

                ]);

            } else {

                $jumlahBelum++;

            }

        }

        DB::commit();

        if ($jumlahBelum > 0) {

            return redirect()
                ->route('kelulusan.index')
                ->with(
                    'warning',
                    "Generate selesai. {$jumlahLulus} siswa lulus dan {$jumlahBelum} siswa belum memenuhi syarat kelulusan."
                );

        }

        return redirect()
            ->route('kelulusan.index')
            ->with(
                'success',
                'Seluruh siswa kelas VI berhasil diproses dan dinyatakan lulus.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->route('kelulusan.index')
            ->with(
                'error',
                $e->getMessage()
            );

    }
}

/*
|--------------------------------------------------------------------------
| Cek Kelulusan
|--------------------------------------------------------------------------
*/

private function cekKelulusan($siswaId, $tahunId)
{
    /*
    |--------------------------------------------------------------------------
    | Mata Pelajaran Kelas VI
    |--------------------------------------------------------------------------
    */

    $mapels = Mapel::where('status', 'Aktif')
        ->whereIn('kategori_mapel_id', [1, 2, 3])
        ->orderBy('nama_mapel')
        ->get();

    /*
    |--------------------------------------------------------------------------
    | Nilai Akhir Siswa
    |--------------------------------------------------------------------------
    */

    $nilais = Nilai::with('mapel')
        ->where('siswa_id', $siswaId)
        ->where('tahun_ajaran_id', $tahunId)
        ->get()
        ->keyBy('mapel_id');

    $keterangan = [];

    /*
    |--------------------------------------------------------------------------
    | Validasi Kelulusan
    |--------------------------------------------------------------------------
    */

    foreach ($mapels as $mapel) {

        /*
        |--------------------------------------------------------------------------
        | Nilai belum diinput
        |--------------------------------------------------------------------------
        */

        if (!isset($nilais[$mapel->id])) {

            $keterangan[] =
                $mapel->nama_mapel .
                ' belum diinput';

            continue;

        }

        $nilai = $nilais[$mapel->id];

        /*
        |--------------------------------------------------------------------------
        | Nilai Akhir belum ada
        |--------------------------------------------------------------------------
        */

        if ($nilai->nilai_akhir === null) {

            $keterangan[] =
                $mapel->nama_mapel .
                ' belum memiliki nilai akhir';

            continue;

        }

        /*
        |--------------------------------------------------------------------------
        | Belum memenuhi KKM
        |--------------------------------------------------------------------------
        */

        if ($nilai->nilai_akhir < $mapel->kkm) {

            $keterangan[] =
                $mapel->nama_mapel .
                ' (' .
                $nilai->nilai_akhir .
                ')';

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Hasil Kelulusan
    |--------------------------------------------------------------------------
    */

    if (count($keterangan) > 0) {

        return [

            'status' => 'Belum Lulus',

            'keterangan' => implode(', ', $keterangan)

        ];

    }

    return [

        'status' => 'Lulus',

        'keterangan' => 'Memenuhi seluruh KKM'

    ];
}
/*
|--------------------------------------------------------------------------
| Export Excel
|--------------------------------------------------------------------------
*/

public function export()
{
    return Excel::download(
        new KelulusanExport(),
        'Data_Kelulusan.xlsx'
    );
}
}
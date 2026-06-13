<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Mapel;

use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
class AbsensiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $kelas = Kelas::all();

        $tahunajaran = TahunAjaran::all();

        $semester = ['Ganjil', 'Genap'];

        /*
        |--------------------------------------------------------------------------
        | GURU LOGIN
        |--------------------------------------------------------------------------
        */

        $guru = Auth::user()->guru;
        $mapels = collect();

if(
    str_contains(strtoupper($guru->nama_guru), 'PAI')
)
{
    $mapels = Mapel::where(
        'kode_mapel',
        'PAI'
    )->get();
}
elseif(
    str_contains(strtoupper($guru->nama_guru), 'PJOK')
)
{
    $mapels = Mapel::where(
        'kode_mapel',
        'PJOK'
    )->get();
}
else
{
    $mapels = Mapel::all();
}



        /*
        |--------------------------------------------------------------------------
        | SISWA
        |--------------------------------------------------------------------------
        */

        $siswas = collect();

        $absensiSiswa = [];

        /*
        |--------------------------------------------------------------------------
        | AMBIL SISWA
        |--------------------------------------------------------------------------
        */

        if ($request->kelas) {

            $siswas = Siswa::where(

                    'kelas_id',
                    $request->kelas

                )

                ->orderBy('nama_siswa')

                ->get();
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL ABSENSI
        |--------------------------------------------------------------------------
        */

      if (
    $request->kelas &&
    $request->tanggal
) {

    $query = Absensi::where(
            'tanggal',
            $request->tanggal
        )
        ->where(
            'kelas_id',
            $request->kelas
        );

    if ($request->tahun_ajaran) {
        $query->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran
        );
    }

    if ($request->semester) {
        $query->where(
            'semester',
            $request->semester
        );
    }

    if ($request->mapel) {
        $query->where(
            'mapel_id',
            $request->mapel
        );
    }

    $absensi = $query->get();

    $absensiSiswa = [];

    foreach ($absensi as $a) {

        $absensiSiswa[
            $a->siswa_id
        ] = $a;

    }
}

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

       return view( 'absensi.index', compact(
        'kelas',
        'tahunajaran',
        'semester',
        'siswas',
        'absensiSiswa',
        'mapels'
    )
);
    }

    /*
    |--------------------------------------------------------------------------
    | MASS STORE
    |--------------------------------------------------------------------------
    */

   public function massStore(Request $request)
{
    foreach ($request->siswa_id as $siswaId) {

        Absensi::updateOrCreate(
            [
                'siswa_id'=>$siswaId,
                'tanggal'=>$request->tanggal,
                'kelas_id'=>$request->kelas_id,
                'tahun_ajaran_id'=>$request->tahun_ajaran_id,
                'semester'=>$request->semester,
                'mapel_id'=>$request->mapel
            ],
            [
                'status'=>strtolower(
                    $request->status[$siswaId]
                )
            ]
        );
    }

    return redirect()->route(
        'absensi.index',
        [
            'kelas'=>$request->kelas_id,
            'tahun_ajaran'=>$request->tahun_ajaran_id,
            'mapel'=>$request->mapel,
            'semester'=>$request->semester,
            'tanggal'=>$request->tanggal
        ]
    )->with(
        'success',
        'Absensi berhasil disimpan'
    );
}

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);

        $absensi->delete();

        return redirect()->back()

            ->with(

                'success',

                'Absensi berhasil dihapus'

            );
    }

    public function export()
{
    return Excel::download(
        new AbsensiExport,
        'data_absensi.xlsx'
    );
}
}
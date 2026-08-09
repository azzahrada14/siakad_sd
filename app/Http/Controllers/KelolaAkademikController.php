<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;

class KelolaAkademikController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN AKTIF
    |--------------------------------------------------------------------------
    */

    private function tahunAktif()
    {
        return TahunAjaran::where(
            'status',
            'Aktif'
        )->firstOrFail();
    }

    /*
    |--------------------------------------------------------------------------
    | STATISTIK
    |--------------------------------------------------------------------------
    */

    private function statistik()
    {
        $data = [];

        for ($tingkat = 1; $tingkat <= 6; $tingkat++) {

            $jumlah = Siswa::where(
                    'tingkat',
                    $tingkat
                )
                ->where(
                    'status_siswa',
                    'Aktif'
                )
                ->count();

            if ($jumlah == 0) {

                $rombel = 0;

            } elseif ($jumlah <= 30) {

                $rombel = 1;

            } elseif ($jumlah <= 60) {

                $rombel = 2;

            } else {

                $rombel = 2;

            }

            $data[] = [

                'tingkat' => $tingkat,

                'jumlah' => $jumlah,

                'rombel' => $rombel

            ];

        }

        return collect($data);
    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL SISWA
    |--------------------------------------------------------------------------
    */

    private function ambilSiswa($tingkat)
    {
        return Siswa::where(
                'tingkat',
                $tingkat
            )
            ->where(
                'status_siswa',
                'Aktif'
            )
            ->orderBy('nama_siswa')
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RESET PEMBAGIAN
    |--------------------------------------------------------------------------
    */

    private function resetPembagian(
        $tingkat,
        $tahunAjaranId
    )
    {
        $kelas = Kelas::where(
                'tingkat',
                $tingkat
            )
            ->where(
                'tahun_ajaran_id',
                $tahunAjaranId
            )
            ->pluck('id');

        AnggotaKelas::whereIn(
            'kelas_id',
            $kelas
        )->delete();

        Kelas::whereIn(
            'id',
            $kelas
        )->delete();
    }

    /*
    |--------------------------------------------------------------------------
    | BUAT ROMBEL
    |--------------------------------------------------------------------------
    */

    private function buatRombel(
        $tingkat,
        $tahunAjaranId,
        $jumlah
    )
    {
        if ($jumlah > 60) {

            throw new \Exception(
                'Jumlah siswa melebihi kapasitas maksimal 60 siswa.'
            );

        }

        $kelas = [];

        if ($jumlah <= 30) {

            $kelas[] = Kelas::create([

                'nama_kelas' => $tingkat,

                'tingkat' => $tingkat,

                'tahun_ajaran_id' => $tahunAjaranId

            ]);

        } else {

            $kelas[] = Kelas::create([

                'nama_kelas' => $tingkat.'A',

                'tingkat' => $tingkat,

                'tahun_ajaran_id' => $tahunAjaranId

            ]);

            $kelas[] = Kelas::create([

                'nama_kelas' => $tingkat.'B',

                'tingkat' => $tingkat,

                'tahun_ajaran_id' => $tahunAjaranId

            ]);

        }

        return $kelas;
    }

    /*
    |--------------------------------------------------------------------------
    | KELOMPOKKAN SISWA
    |--------------------------------------------------------------------------
    */

    private function kelompokkanSiswa($siswa)
    {
        return [

            'L' => $siswa
                ->where('jenis_kelamin', 'L')
                ->sortBy('nama_siswa')
                ->values(),

            'P' => $siswa
                ->where('jenis_kelamin', 'P')
                ->sortBy('nama_siswa')
                ->values()

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN ANGGOTA KELAS
    |--------------------------------------------------------------------------
    */

    private function simpanAnggota(
        $kelasId,
        $tahunAjaranId,
        $siswa
    )
    {
        foreach ($siswa as $row) {

            AnggotaKelas::create([

                'kelas_id' => $kelasId,

                'tahun_ajaran_id' => $tahunAjaranId,

                'siswa_id' => $row->id

            ]);

        }
    }
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $tahunAktif = $this->tahunAktif();

        /*
        |--------------------------------------------------------------------------
        | DATA KELAS
        |--------------------------------------------------------------------------
        */

        $kelas = Kelas::with([

                'waliKelas',

                'anggotaKelas.siswa'

            ])
            ->where(
                'tahun_ajaran_id',
                $tahunAktif->id
            )
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | HITUNG STATISTIK KELAS
        |--------------------------------------------------------------------------
        */

        foreach ($kelas as $item) {

            $item->jumlah_siswa = $item->anggotaKelas->count();

            $item->jumlah_l = $item->anggotaKelas
                ->filter(fn($row) => $row->siswa?->jenis_kelamin == 'L')
                ->count();

            $item->jumlah_p = $item->anggotaKelas
                ->filter(fn($row) => $row->siswa?->jenis_kelamin == 'P')
                ->count();

            $item->status_kapasitas = match (true) {

    $item->jumlah_siswa == 0  => 'Kosong',

    $item->jumlah_siswa >= 30 => 'Penuh',

    default => 'Tersedia',

};
        }

        /*
        |--------------------------------------------------------------------------
        | GURU
        |--------------------------------------------------------------------------
        */

        $guru = Guru::orderBy(
            'nama_guru'
        )->get();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $statistik = $this->statistik();

        /*
        |--------------------------------------------------------------------------
        | RETURN
        |--------------------------------------------------------------------------
        */

        return view(

            'kelola-akademik.index',

            compact(

                'tahunAktif',

                'kelas',

                'guru',

                'statistik'

            )

        );
    }
    /*
|--------------------------------------------------------------------------
| GENERATE PEMBAGIAN KELAS
|--------------------------------------------------------------------------
*/

public function generate(Request $request)
{
    $request->validate([

        'tingkat' => 'required|integer|min:1|max:6'

    ]);

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN AKTIF
        |--------------------------------------------------------------------------
        */

        $tahunAktif = $this->tahunAktif();

        $tingkat = $request->tingkat;

       /*
|--------------------------------------------------------------------------
| CEK PEMBAGIAN LAMA
|--------------------------------------------------------------------------
*/

$cek = Kelas::where(
        'tingkat',
        $tingkat
    )
    ->where(
        'tahun_ajaran_id',
        $tahunAktif->id
    )
    ->exists();

if ($cek) {

    $this->resetPembagian(

        $tingkat,

        $tahunAktif->id

    );

}
        /*
        |--------------------------------------------------------------------------
        | AMBIL SISWA
        |--------------------------------------------------------------------------
        */

        $siswa = $this->ambilSiswa($tingkat);

        if ($siswa->count() == 0) {

            DB::rollBack();

            return back()->with(

                'error',

                'Belum ada siswa aktif.'

            );

        }

        /*
        |--------------------------------------------------------------------------
        | MAKSIMAL 60 SISWA
        |--------------------------------------------------------------------------
        */

        if ($siswa->count() > 60) {

            DB::rollBack();

            return back()->with(

                'error',

                'Jumlah siswa melebihi kapasitas maksimal 60 siswa.'

            );

        }

        /*
        |--------------------------------------------------------------------------
        | BUAT ROMBEL
        |--------------------------------------------------------------------------
        */

        $kelas = $this->buatRombel(

            $tingkat,

            $tahunAktif->id,

            $siswa->count()

        );

        /*
        |--------------------------------------------------------------------------
        | KELOMPOKKAN SISWA
        |--------------------------------------------------------------------------
        */

        $kelompok = $this->kelompokkanSiswa(

            $siswa

        );

        /*
        |--------------------------------------------------------------------------
        | SATU ROMBEL
        |--------------------------------------------------------------------------
        */

        if(count($kelas)==1){

            $gabung = collect()

                ->merge($kelompok['L'])

                ->merge($kelompok['P'])

                ->sortBy('nama_siswa')

                ->values();

            $this->simpanAnggota(

                $kelas[0]->id,

                $tahunAktif->id,

                $gabung

            );

        }

        /*
        |--------------------------------------------------------------------------
        | DUA ROMBEL
        |--------------------------------------------------------------------------
        */

        else{

            $kelasA = collect();

            $kelasB = collect();

            /*
            -------------------------
            LAKI-LAKI
            -------------------------
            */

            $laki = $kelompok['L']->values();

            $batasL = ceil(

                $laki->count()/2

            );

            foreach($laki as $i=>$row){

                if($i < $batasL){

                    $kelasA->push($row);

                }else{

                    $kelasB->push($row);

                }

            }

            /*
            -------------------------
            PEREMPUAN
            -------------------------
            */

            $perempuan = $kelompok['P']->values();

            $batasP = ceil(

                $perempuan->count()/2

            );

            foreach($perempuan as $i=>$row){

                if($i < $batasP){

                    $kelasA->push($row);

                }else{

                    $kelasB->push($row);

                }

            }

            /*
            -------------------------
            URUTKAN
            -------------------------
            */

            $kelasA = $kelasA
                ->sortBy('nama_siswa')
                ->values();

            $kelasB = $kelasB
                ->sortBy('nama_siswa')
                ->values();

            /*
            -------------------------
            SIMPAN
            -------------------------
            */

            $this->simpanAnggota(

                $kelas[0]->id,

                $tahunAktif->id,

                $kelasA

            );

            $this->simpanAnggota(

                $kelas[1]->id,

                $tahunAktif->id,

                $kelasB

            );

        }

        DB::commit();

        return redirect()

            ->route('kelola-akademik.index')

            ->with(

                'success',

                'Pembagian kelas berhasil dibuat.'

            );

    }

    catch(\Throwable $e){

        DB::rollBack();

        return back()->with(

            'error',

            $e->getMessage()

        );

    }
}

/*
|--------------------------------------------------------------------------
| RESET PEMBAGIAN
|--------------------------------------------------------------------------
*/

public function reset($tingkat)
{
    DB::beginTransaction();

    try {

        $tahunAktif = $this->tahunAktif();

        $this->resetPembagian(

            $tingkat,

            $tahunAktif->id

        );

        DB::commit();

        return redirect()
            ->route('kelola-akademik.index')
            ->with(
                'success',
                'Pembagian kelas berhasil direset.'
            );

    } catch (\Throwable $e) {

        DB::rollBack();

        return back()->with(
            'error',
            $e->getMessage()
        );

    }
}

/*
|--------------------------------------------------------------------------
| SIMPAN WALI KELAS
|--------------------------------------------------------------------------
*/

public function simpan(Request $request)
{

   $request->validate([
    'wali_kelas'  => 'nullable|array',
    'ruang_kelas' => 'nullable|array',
]);
    DB::beginTransaction();

    try {

        foreach ($request->wali_kelas as $kelasId => $guruId) {

            if (!$guruId) {

                continue;

            }

            Kelas::where('id', $kelasId)->update([
    'wali_kelas_id' => $guruId,
    'ruang_kelas'   => $request->ruang_kelas[$kelasId] ?? null,
]);

        }

        DB::commit();

        return redirect()

            ->route('kelola-akademik.index')

            ->with(

                'success',

                'Wali kelas berhasil disimpan.'

            );

    } catch (\Throwable $e) {

        DB::rollBack();

        return back()->with(

            'error',

            $e->getMessage()

        );

    }
}
public function cetak(Kelas $kelas)
{
    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    $kelas->load([
        'waliKelas',
        'anggotaKelas.siswa'
    ]);

    $anggota = $kelas->anggotaKelas
        ->sortBy('siswa.nama_siswa');

    $jumlahL = $anggota
        ->where('siswa.jenis_kelamin','L')
        ->count();

    $jumlahP = $anggota
        ->where('siswa.jenis_kelamin','P')
        ->count();

    $pdf = Pdf::loadView(
        'kelola-akademik.pdf',
        compact(
            'kelas',
            'tahunAktif',
            'anggota',
            'jumlahL',
            'jumlahP'
        )
    );

    $pdf->setPaper('A4','portrait');

    return $pdf->stream(
        'Daftar_Kelas_'.$kelas->nama_kelas.'.pdf'
    );
}

public function export(Kelas $kelas)
{
    return Excel::download(
        new KelasExport($kelas),
        'Daftar_Kelas_'.$kelas->nama_kelas.'.xlsx'
    );
}

}
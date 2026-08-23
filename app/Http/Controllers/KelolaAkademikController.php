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

   private function tahunAktif(Request $request)
{
    $tahunAjaran = $request->filled('tahun_ajaran_id')
    ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
    : TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    if (!$tahunAjaran) {
    abort(404, 'Tahun ajaran belum tersedia.');
}

    return $tahunAjaran;
}
    /*
    |--------------------------------------------------------------------------
    | STATISTIK
    |--------------------------------------------------------------------------
    */
private function statistik($tahunAjaranId)
{
    $data = [];

    for ($tingkat = 1; $tingkat <= 6; $tingkat++) {

        $jumlah = AnggotaKelas::where(
                'tahun_ajaran_id',
                $tahunAjaranId
            )
            ->whereHas('kelas', function ($q) use ($tingkat) {

                $q->where(
                    'tingkat',
                    $tingkat
                );

            })
            ->distinct('siswa_id')
            ->count('siswa_id');

        if ($jumlah == 0) {

            $rombel = 0;

        } elseif ($jumlah <= 30) {

            $rombel = 1;

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

    public function index(Request $request)
{
  $tahunAjaran = $this->tahunAktif($request);

$modeArsip = $tahunAjaran->status !== 'Aktif';

/*
|--------------------------------------------------------------------------
| TAHUN STRUKTUR KELAS
|--------------------------------------------------------------------------
*/

$tahunStruktur = $tahunAjaran;

if ($tahunAjaran->semester === 'Genap') {

    $tahunStruktur = TahunAjaran::where(
        'tahun_ajaran',
        $tahunAjaran->tahun_ajaran
    )
    ->where(
        'semester',
        'Ganjil'
    )
    ->first();

}
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
    $tahunStruktur?->id ?? $tahunAjaran->id
)
->orderBy('tingkat')
->orderBy('nama_kelas')
->get();



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

       $statistik = $this->statistik(
    $tahunAjaran->id
);

        /*
        |--------------------------------------------------------------------------
        | RETURN
        |--------------------------------------------------------------------------
        */

        return view(
    'kelola-akademik.index',
    compact(
        'tahunAjaran',
        'kelas',
        'guru',
        'statistik',
        'modeArsip'
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

        $tahunAjaran = $this->tahunAktif($request);

if ($tahunAjaran->status !== 'Aktif') {
    return back()->with(
        'error',
        'Pembagian kelas pada periode arsip tidak dapat diubah.'
    );
}

        $tingkat = $request->tingkat;

       /*
|--------------------------------------------------------------------------
| CEK PEMBAGIAN LAMA
|--------------------------------------------------------------------------
*/

$this->resetPembagian(
    $tingkat,
    $tahunAjaran->id
);

if ($cek) {

    $this->resetPembagian(

        $tingkat,

        $tahunAjaran->id

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

            $tahunAjaran->id,

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

                $tahunAjaran->id,

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

                $tahunAjaran->id,

                $kelasA

            );

            $this->simpanAnggota(

                $kelas[1]->id,

                $tahunAjaran->id,

                $kelasB

            );

        }

        DB::commit();

       return redirect()
    ->route('kelola-akademik.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ])
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

public function reset(Request $request, $tingkat)
{
    DB::beginTransaction();

    try {

        $tahunAjaran = $this->tahunAktif($request);

if ($tahunAjaran->status !== 'Aktif') {
    return back()->with(
        'error',
        'Pembagian kelas pada periode arsip tidak dapat diubah.'
    );
}

if ($tahunAjaran->semester !== 'Ganjil') {
    return back()->with(
        'error',
        'Pembagian kelas hanya dapat dilakukan pada Semester Ganjil.'
    );
}

        $this->resetPembagian(

            $tingkat,

            $tahunAjaran->id

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

$tahunAjaran = $this->tahunAktif($request);

if ($tahunAjaran->status !== 'Aktif') {
    return back()->with(
        'error',
        'Data pembagian kelas pada periode arsip tidak dapat diubah.'
    );
}

if ($tahunAjaran->semester !== 'Ganjil') {
    return back()->with(
        'error',
        'Pembagian kelas hanya dapat dilakukan pada Semester Ganjil.'
    );
}

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

public function cetak(Request $request, Kelas $kelas)
{
    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')
            ->where('semester', 'Ganjil')
            ->firstOrFail();


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
        'tahunAjaran',
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
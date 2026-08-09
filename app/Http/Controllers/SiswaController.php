<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use App\Exports\SiswaExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TahunAjaran;

class SiswaController extends Controller
{
 public function index(Request $request)
{
    $tahunAktif = TahunAjaran::where('status', 'Aktif')->first();

    $kelas = Kelas::when($tahunAktif, function ($q) use ($tahunAktif) {
        $q->where('tahun_ajaran_id', $tahunAktif->id);
    })->orderBy('nama_kelas')->get();

 $query = Siswa::with([
    'kelasAktif.kelas'
]);

    // Search
    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where('nama_siswa', 'like', '%' . $request->search . '%')
              ->orWhere('nipd', 'like', '%' . $request->search . '%')
              ->orWhere('nisn', 'like', '%' . $request->search . '%');

        });

    }

    // Tingkat
    if ($request->filled('tingkat')) {

        $query->where('tingkat', $request->tingkat);

    }

   // Rombel
if ($request->filled('kelas')) {

   $query->whereHas('kelasAktif', function ($q) use ($request) {
    $q->where('kelas_id', $request->kelas);
});

}

    // Status
    if ($request->filled('status')) {

        $query->where('status_siswa', $request->status);

    }

    $siswa = $query
                ->orderBy('tingkat')
                ->orderBy('nama_siswa')
                ->paginate(10)
                ->withQueryString();
    $jumlahLaki = (clone $query)
    ->where('jenis_kelamin', 'L')
    ->count();

$jumlahPerempuan = (clone $query)
    ->where('jenis_kelamin', 'P')
    ->count();
    
    $totalSiswa = (clone $query)->count();

    return view('siswa.index', compact(
    'siswa',
    'kelas',
    'tahunAktif',
    'jumlahLaki',
    'jumlahPerempuan',
    'totalSiswa'
));
}
   
    public function store(Request $request)
    {
        $request->validate([

    // Identitas
    'nama_siswa'     => 'required|string|max:255',
    'nipd'           => 'nullable|digits:9',
    'nisn'           => 'nullable|digits:10',
    'nik'            => 'nullable|digits_between:16,20',
    'jenis_kelamin'  => 'required|in:L,P',
    'tempat_lahir'   => 'nullable|string|max:100',
    'tanggal_lahir'  => 'nullable|date',
    'agama'          => 'nullable|string|max:50',
    'kewarganegaraan'=> 'nullable|string|max:50',
    'tingkat'        => 'nullable|integer|min:1|max:6',
    'tahun_masuk'    => 'nullable|digits:4',
    'status_siswa'   => 'nullable|string|max:50',

    // Tempat tinggal
    'alamat'         => 'nullable|string',
    'jalan'          => 'nullable|string|max:255',
    'rt'             => 'nullable|max:5',
    'rw'             => 'nullable|max:5',
    'dusun'          => 'nullable|max:100',
    'desa'           => 'nullable|max:100',
    'kecamatan'      => 'nullable|max:100',
    'kabupaten'      => 'nullable|max:100',
    'provinsi'       => 'nullable|max:100',
    'kode_pos'       => 'nullable|max:10',
    'jenis_tinggal'  => 'nullable|max:100',
    'transportasi'   => 'nullable|max:100',
    'jarak_rumah'    => 'nullable|max:20',

    // Kontak
    'telepon_orangtua' => 'nullable|max:20',
    'email'            => 'nullable|email',

    // Koordinat
    'latitude'       => 'nullable|numeric|between:-90,90',
    'longitude'      => 'nullable|numeric|between:-180,180',

    // Bank
    'bank'           => 'nullable|max:100',
    'rekening'       => 'nullable|max:50',
    'nama_rekening'  => 'nullable|max:100',

    // PIP
    'no_kip'         => 'nullable|max:30',
    'nama_kip'       => 'nullable|max:255',

]);
Siswa::create([

    // Identitas
    'nama_siswa'       => $request->nama_siswa,
    'nipd'             => $request->nipd,
    'nisn'             => $request->nisn,
    'nik'              => $request->nik,
    'jenis_kelamin'    => $request->jenis_kelamin,
    'tempat_lahir'     => $request->tempat_lahir,
    'tanggal_lahir'    => $request->tanggal_lahir,
    'agama'            => $request->agama,
    'kewarganegaraan'  => $request->kewarganegaraan,
    'tingkat'          => $request->tingkat,
    'tahun_masuk'      => $request->tahun_masuk,
    'status_siswa'     => $request->status_siswa ?? 'Aktif',

    // Tempat Tinggal
    'alamat'           => $request->alamat,
    'jalan'            => $request->jalan,
    'rt'               => $request->rt,
    'rw'               => $request->rw,
    'dusun'            => $request->dusun,
    'desa'             => $request->desa,
    'kecamatan'        => $request->kecamatan,
    'kabupaten'        => $request->kabupaten,
    'provinsi'         => $request->provinsi,
    'kode_pos'         => $request->kode_pos,
    'jenis_tinggal'    => $request->jenis_tinggal,
    'transportasi'     => $request->transportasi,
    'jarak_rumah'      => $request->jarak_rumah,

    // Ayah
    'nama_ayah'        => $request->nama_ayah,
    'nik_ayah'         => $request->nik_ayah,
    'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
    'pendidikan_ayah'  => $request->pendidikan_ayah,
    'pekerjaan_ayah'   => $request->pekerjaan_ayah,
    'penghasilan_ayah' => $request->penghasilan_ayah,

    // Ibu
    'nama_ibu'         => $request->nama_ibu,
    'nik_ibu'          => $request->nik_ibu,
    'tahun_lahir_ibu'  => $request->tahun_lahir_ibu,
    'pendidikan_ibu'   => $request->pendidikan_ibu,
    'pekerjaan_ibu'    => $request->pekerjaan_ibu,
    'penghasilan_ibu'  => $request->penghasilan_ibu,

    // Wali
    'nama_wali'        => $request->nama_wali,
    'nik_wali'         => $request->nik_wali,
    'tahun_lahir_wali' => $request->tahun_lahir_wali,
    'pendidikan_wali'  => $request->pendidikan_wali,
    'pekerjaan_wali'   => $request->pekerjaan_wali,
    'penghasilan_wali' => $request->penghasilan_wali,

    // Periodik
    'telepon_orangtua' => $request->telepon_orangtua,
    'kk'               => $request->kk,
    'anak_ke'          => $request->anak_ke,
    'jumlah_saudara'   => $request->jumlah_saudara,
    'tinggi_badan'     => $request->tinggi_badan,
    'berat_badan'      => $request->berat_badan,
    'lingkar_kepala'   => $request->lingkar_kepala,

    // PIP
    'kip'              => $request->kip,
    'no_kip'           => $request->no_kip,
    'nama_kip'         => $request->nama_kip,
    'layak_pip'        => $request->layak_pip,
    'alasan_layak'     => $request->alasan_layak,

    // Bank
    'bank'             => $request->bank,
    'rekening'         => $request->rekening,
    'nama_rekening'    => $request->nama_rekening,

    // Koordinat
    'latitude'         => $request->latitude,
    'longitude'        => $request->longitude,

]);

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil ditambahkan'
            );
    }


    public function template()
{
    return response()->download(
        public_path('template/template_dapodik.xlsx')
    );
}

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

       $kelas = Kelas::orderBy('nama_kelas')->get();

        return view(
            'siswa.edit',
            compact(
                'siswa',
                'kelas'
            )
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $request->validate([

    // Identitas
    'nama_siswa'     => 'required|string|max:255',
    'nipd'           => 'nullable|digits:9',
    'nisn'           => 'nullable|digits:10',
    'nik'            => 'nullable|digits_between:16,20',
    'jenis_kelamin'  => 'required|in:L,P',
    'tempat_lahir'   => 'nullable|string|max:100',
    'tanggal_lahir'  => 'nullable|date',
    'agama'          => 'nullable|string|max:50',
    'kewarganegaraan'=> 'nullable|string|max:50',
    'tingkat'        => 'nullable|integer|min:1|max:6',
    'tahun_masuk'    => 'nullable|digits:4',
    'status_siswa'   => 'nullable|string|max:50',

    // Tempat tinggal
    'alamat'         => 'nullable|string',
    'jalan'          => 'nullable|string|max:255',
    'rt'             => 'nullable|max:5',
    'rw'             => 'nullable|max:5',
    'dusun'          => 'nullable|max:100',
    'desa'           => 'nullable|max:100',
    'kecamatan'      => 'nullable|max:100',
    'kabupaten'      => 'nullable|max:100',
    'provinsi'       => 'nullable|max:100',
    'kode_pos'       => 'nullable|max:10',
    'jenis_tinggal'  => 'nullable|max:100',
    'transportasi'   => 'nullable|max:100',
    'jarak_rumah'    => 'nullable|max:20',

    // Kontak
    'telepon_orangtua' => 'nullable|max:20',
    'email'            => 'nullable|email',

    // Koordinat
    'latitude'       => 'nullable|numeric|between:-90,90',
    'longitude'      => 'nullable|numeric|between:-180,180',

    // Bank
    'bank'           => 'nullable|max:100',
    'rekening'       => 'nullable|max:50',
    'nama_rekening'  => 'nullable|max:100',

    // PIP
    'no_kip'         => 'nullable|max:30',
    'nama_kip'       => 'nullable|max:255',

]);

        $siswa = Siswa::findOrFail($id);

$siswa->update([

    // =========================
    // IDENTITAS
    // =========================
    'nama_siswa'       => $request->nama_siswa,
    'nipd'             => $request->nipd,
    'nisn'             => $request->nisn,
    'nik'              => $request->nik,
    'jenis_kelamin'    => $request->jenis_kelamin,
    'tempat_lahir'     => $request->tempat_lahir,
    'tanggal_lahir'    => $request->tanggal_lahir,
    'agama'            => $request->agama,
    'kewarganegaraan'  => $request->kewarganegaraan,
    'tingkat'          => $request->tingkat,
    'tahun_masuk'      => $request->tahun_masuk,
    'status_siswa'     => $request->status_siswa,

    // =========================
    // TEMPAT TINGGAL
    // =========================
    'alamat'           => $request->alamat,
    'jalan'            => $request->jalan,
    'rt'               => $request->rt,
    'rw'               => $request->rw,
    'dusun'            => $request->dusun,
    'desa'             => $request->desa,
    'kecamatan'        => $request->kecamatan,
    'kabupaten'        => $request->kabupaten,
    'provinsi'         => $request->provinsi,
    'kode_pos'         => $request->kode_pos,
    'jenis_tinggal'    => $request->jenis_tinggal,
    'transportasi'     => $request->transportasi,
    'jarak_rumah'      => $request->jarak_rumah,

    // =========================
    // DATA AYAH
    // =========================
    'nama_ayah'        => $request->nama_ayah,
    'nik_ayah'         => $request->nik_ayah,
    'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
    'pendidikan_ayah'  => $request->pendidikan_ayah,
    'pekerjaan_ayah'   => $request->pekerjaan_ayah,
    'penghasilan_ayah' => $request->penghasilan_ayah,

    // =========================
    // DATA IBU
    // =========================
    'nama_ibu'         => $request->nama_ibu,
    'nik_ibu'          => $request->nik_ibu,
    'tahun_lahir_ibu'  => $request->tahun_lahir_ibu,
    'pendidikan_ibu'   => $request->pendidikan_ibu,
    'pekerjaan_ibu'    => $request->pekerjaan_ibu,
    'penghasilan_ibu'  => $request->penghasilan_ibu,

    // =========================
    // DATA WALI
    // =========================
    'nama_wali'        => $request->nama_wali,
    'nik_wali'         => $request->nik_wali,
    'tahun_lahir_wali' => $request->tahun_lahir_wali,
    'pendidikan_wali'  => $request->pendidikan_wali,
    'pekerjaan_wali'   => $request->pekerjaan_wali,
    'penghasilan_wali' => $request->penghasilan_wali,

    // =========================
    // DATA PERIODIK
    // =========================
    'telepon_orangtua' => $request->telepon_orangtua,
    'kk'               => $request->kk,
    'anak_ke'          => $request->anak_ke,
    'jumlah_saudara'   => $request->jumlah_saudara,
    'tinggi_badan'     => $request->tinggi_badan,
    'berat_badan'      => $request->berat_badan,
    'lingkar_kepala'   => $request->lingkar_kepala,

    // =========================
    // PIP
    // =========================
    'kip'              => $request->kip,
    'no_kip'           => $request->no_kip,
    'nama_kip'         => $request->nama_kip,
    'layak_pip'        => $request->layak_pip,
    'alasan_layak'     => $request->alasan_layak,

    // =========================
    // DATA BANK
    // =========================
    'bank'             => $request->bank,
    'rekening'         => $request->rekening,
    'nama_rekening'    => $request->nama_rekening,

    // =========================
    // KOORDINAT
    // =========================
    'latitude'         => $request->latitude,
    'longitude'        => $request->longitude,

]);


        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil diupdate'
            );
    }


    public function destroy($id)
    {
        Siswa::findOrFail($id)
            ->delete();

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil dihapus'
            );
    }

    public function show($id)
{
   $siswa = Siswa::with([
    'kelasAktif.kelas.waliKelas'
])->findOrFail($id);

    return view('siswa.show', compact('siswa'));
}



   public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    DB::beginTransaction();

    try {

        Excel::import(
            new SiswaImport,
            $request->file('file')
        );

        DB::commit();

        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa berhasil diimport.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            $e->getMessage()
        );

    }
}

public function export()
{
    $export = new \App\Exports\SiswaExport();

    return $export->download();
}
}

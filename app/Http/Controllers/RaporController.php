<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rapor;
use App\Models\RaporDetail;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Guru;
use App\Models\NilaiTP;
use App\Models\AnggotaKelas;
use App\Models\RankingSiswa;
use App\Models\Ekstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf;

class RaporController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

public function index(Request $request)
{
    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {
        return back()->with(
            'error',
            'Tahun ajaran belum tersedia.'
        );
    }

    $modeArsip = $tahunAjaran->status !== 'Aktif';

    $guru = auth()->user()->guru;

    if (!$guru) {
        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | Kelas wali pada tahun ajaran yang dipilih
    |--------------------------------------------------------------------------
    */

   $tahunGanjil = TahunAjaran::where(
    'tahun_ajaran',
    $tahunAjaran->tahun_ajaran
)
->where(
    'semester',
    'Ganjil'
)
->first();

if (!$tahunGanjil) {
    return back()->with(
        'error',
        'Data tahun ajaran Ganjil untuk struktur kelas belum tersedia.'
    );
}

$kelasGuru = Kelas::where(
    'wali_kelas_id',
    $guru->id
)
->where(
    'tahun_ajaran_id',
    $tahunGanjil->id
)
->first();

if (!$kelasGuru) {
    return back()->with(
        'error',
        'Anda belum menjadi wali kelas pada tahun ajaran ini.'
    );
}

    /*
    |--------------------------------------------------------------------------
    | Ambil rapor kelas wali
    |--------------------------------------------------------------------------
    */

    $rapor = Rapor::with([
        'siswa',
        'kelas'
    ])
    ->where(
        'kelas_id',
        $kelasGuru->id
    )
    ->where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->where(
        'semester',
        $tahunAjaran->semester
    )
    ->orderBy('siswa_id')
    ->paginate(10)
    ->withQueryString();

    return view(
        'rapor.index',
        compact(
            'tahunAjaran',
            'kelasGuru',
            'rapor',
            'modeArsip'
        )
    );
}

        /*
    |--------------------------------------------------------------------------
    | GENERATE RAPOR
    |--------------------------------------------------------------------------
    */

  public function generate(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | HAK AKSES
    |--------------------------------------------------------------------------
    */

    if (auth()->user()->role == 'kepala_sekolah') {
        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    $request->validate([
        'tahun_ajaran_id' => 'required',
        'semester' => 'required',
    ]);

    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = TahunAjaran::find($request->tahun_ajaran_id);

    if (!$tahunAjaran) {
        return back()->with(
            'error',
            'Tahun ajaran tidak ditemukan.'
        );
    }

    $tahunGanjil = TahunAjaran::where(
    'tahun_ajaran',
    $tahunAjaran->tahun_ajaran
)
->where(
    'semester',
    'Ganjil'
)
->first();

if (!$tahunGanjil) {
    return back()->with(
        'error',
        'Data tahun ajaran Ganjil untuk struktur kelas belum tersedia.'
    );
}

    /*
    |--------------------------------------------------------------------------
    | GURU
    |--------------------------------------------------------------------------
    */

    $guru = auth()->user()->guru;

    if (!$guru) {
        abort(403);
    }

    /*
    |--------------------------------------------------------------------------
    | KELAS WALI
    |--------------------------------------------------------------------------
    */

    $kelasGuru = Kelas::where(
    'wali_kelas_id',
    $guru->id
)
->where(
    'tahun_ajaran_id',
    $tahunGanjil->id
)
->first();

    if (!$kelasGuru) {
        return back()->with(
            'error',
            'Anda belum menjadi wali kelas pada tahun ajaran tersebut.'
        );
    }

    $kelasId = $kelasGuru->id;

    /*
    |--------------------------------------------------------------------------
    | HAPUS RAPOR LAMA KELAS INI
    |--------------------------------------------------------------------------
    */

    $raporLama = Rapor::where(
        'kelas_id',
        $kelasId
    )
    ->where(
        'tahun_ajaran_id',
        $request->tahun_ajaran_id
    )
    ->where(
        'semester',
        $request->semester
    )
    ->pluck('id');

    if ($raporLama->isNotEmpty()) {

        RaporDetail::whereIn(
            'rapor_id',
            $raporLama
        )->delete();

        Rapor::whereIn(
            'id',
            $raporLama
        )->delete();
    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL SISWA DARI ANGGOTA KELAS
    |--------------------------------------------------------------------------
    |
    | HANYA siswa yang benar-benar terdaftar
    | di kelas wali tersebut yang akan dibuatkan rapor.
    |
    */

    $anggotaKelas = AnggotaKelas::with('siswa')
    ->where(
        'kelas_id',
        $kelasId
    )
    ->where(
        'tahun_ajaran_id',
        $tahunGanjil->id
    )
    ->get();

    if ($anggotaKelas->isEmpty()) {

        return back()->with(
            'error',
            'Belum ada siswa pada kelas ' .
            $kelasGuru->nama_kelas .
            '.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | GENERATE RAPOR
    |--------------------------------------------------------------------------
    */

    $jumlahGenerate = 0;

    foreach ($anggotaKelas as $anggota) {

        $siswa = $anggota->siswa;

        if (!$siswa) {
            continue;
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL NILAI SISWA
        |--------------------------------------------------------------------------
        */

        $nilai = Nilai::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->get();

        /*
        |--------------------------------------------------------------------------
        | JIKA BELUM ADA NILAI, JANGAN BUAT RAPOR
        |--------------------------------------------------------------------------
        */

        if ($nilai->isEmpty()) {
            continue;
        }

        /*
        |--------------------------------------------------------------------------
        | RATA-RATA NILAI
        |--------------------------------------------------------------------------
        */

        $rata = $nilai->avg('nilai_akhir');

        /*
        |--------------------------------------------------------------------------
        | RANKING
        |--------------------------------------------------------------------------
        */

        $ranking = RankingSiswa::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'kelas_id',
            $kelasId
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->first();

        /*
        |--------------------------------------------------------------------------
        | ABSENSI
        |--------------------------------------------------------------------------
        */

        $hadir = Absensi::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->where(
            'status',
            'hadir'
        )
        ->count();

        $izin = Absensi::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->where(
            'status',
            'izin'
        )
        ->count();

        $sakit = Absensi::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->where(
            'status',
            'sakit'
        )
        ->count();

        $alfa = Absensi::where(
            'siswa_id',
            $siswa->id
        )
        ->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        )
        ->where(
            'semester',
            $request->semester
        )
        ->where(
            'status',
            'alfa'
        )
        ->count();

        /*
        |--------------------------------------------------------------------------
        | SIMPAN HEADER RAPOR
        |--------------------------------------------------------------------------
        */

        $rapor = Rapor::create([

            'siswa_id' => $siswa->id,

            // Kelas asal siswa saat ini
            'kelas_id' => $kelasId,

            'tahun_ajaran_id' =>
                $request->tahun_ajaran_id,

            'semester' =>
                $request->semester,

            'rata_rata' =>
                round($rata ?? 0, 2),

            'ranking' =>
                $ranking->ranking ?? null,

            'hadir' =>
                $hadir,

            'izin' =>
                $izin,

            'sakit' =>
                $sakit,

            'alfa' =>
                $alfa,

            'is_generate' =>
                true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | DETAIL RAPOR
        |--------------------------------------------------------------------------
        */

        foreach ($nilai as $item) {

            $tpTertinggi = $item->detailTP()
                ->with('tp')
                ->orderByDesc('nilai')
                ->first();

            $tpTerendah = $item->detailTP()
                ->with('tp')
                ->orderBy('nilai')
                ->first();

            $pengetahuan = "-";
            $keterampilan = "-";

            /*
            | Capaian pengetahuan
            */

            if (
                $tpTertinggi &&
                $tpTertinggi->tp
            ) {

                $pengetahuan =
                    "Ananda sangat menguasai dalam " .
                    strtolower(
                        $tpTertinggi->tp->deskripsi
                    ) .
                    ".";
            }

            /*
            | Capaian keterampilan
            */

            if (
                $tpTerendah &&
                $tpTerendah->tp
            ) {

                $keterampilan =
                    "Ananda perlu bimbingan dalam " .
                    strtolower(
                        $tpTerendah->tp->deskripsi
                    ) .
                    ".";
            }

            /*
            | Simpan detail
            */

            RaporDetail::create([

                'rapor_id' =>
                    $rapor->id,

                'mapel_id' =>
                    $item->mapel_id,

                'nilai_akhir' =>
                    $item->nilai_akhir,

                'capaian_pengetahuan' =>
                    $pengetahuan,

                'capaian_keterampilan' =>
                    $keterampilan,
            ]);
        }

        $jumlahGenerate++;
    }

    /*
    |--------------------------------------------------------------------------
    | SELESAI
    |--------------------------------------------------------------------------
    */

    if ($jumlahGenerate == 0) {

        return back()->with(
            'error',
            'Tidak ada siswa yang memiliki nilai untuk dibuatkan rapor.'
        );
    }

    return redirect()
        ->route('rapor.index')
        ->with(
            'success',
            'Rapor berhasil digenerate untuk ' .
            $jumlahGenerate .
            ' siswa kelas ' .
            $kelasGuru->nama_kelas .
            '.'
        );
}
        /*
    |--------------------------------------------------------------------------
    | EDIT RAPOR
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $rapor = Rapor::with([

            'siswa',

            'kelas',

            'tahunAjaran',

            'details.mapel'

        ])->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | EKSTRAKURIKULER
        |--------------------------------------------------------------------------
        */

        $ekstrakurikuler = Ekstrakurikuler::where(
            'siswa_id',
            $rapor->siswa_id
        )
        ->where(
            'tahun_ajaran_id',
            $rapor->tahun_ajaran_id
        )
        ->where(
            'semester',
            $rapor->semester
        )
        ->get();

        return view(

            'rapor.edit',

            compact(

                'rapor',

                'ekstrakurikuler'

            )

        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE RAPOR
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        if(auth()->user()->role == 'kepala_sekolah'){
    abort(403);
}
$request->validate([
    'catatan' => 'nullable|string',
    'semester_ke' => 'nullable|string',
    'naik_kelas' => 'nullable|string',
    'tinggal_kelas' => 'nullable|string',
]);

        $rapor = Rapor::findOrFail($id);
        $rapor->update([

            'catatan' => $request->catatan,

            'semester_ke' => $request->semester_ke,

            'naik_kelas' => $request->naik_kelas,

            'tinggal_kelas' => $request->tinggal_kelas

        ]); 
  

      
       

        /*
        |--------------------------------------------------------------------------
        | UPDATE CAPAIAN KOMPETENSI
        |--------------------------------------------------------------------------
        */


    if ($request->has('detail')) {

        foreach ($request->detail as $detailId => $detail) {

            RaporDetail::where('id', $detailId)->update([

                'capaian_pengetahuan'  => $detail['capaian_pengetahuan'],

                'capaian_keterampilan' => $detail['capaian_keterampilan'],

            ]);

        }

    }

    return redirect()

        ->route('rapor.show', $rapor->id)

        ->with(

            'success',

            'Rapor berhasil diperbarui.'

        );
}


        /*
    |--------------------------------------------------------------------------
    | SHOW RAPOR
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $rapor = Rapor::with([

            'siswa',

            'kelas',

            'tahunAjaran',

            'details',

            'details.mapel'

        ])->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | EKSTRAKURIKULER
        |--------------------------------------------------------------------------
        */

        $ekstrakurikuler = Ekstrakurikuler::where(

            'siswa_id',

            $rapor->siswa_id

        )
        ->where(

            'tahun_ajaran_id',

            $rapor->tahun_ajaran_id

        )
        ->where(

            'semester',

            $rapor->semester

        )
        ->get();

     


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN RAPOR
        |--------------------------------------------------------------------------
        */

        return view(

            'rapor.show',

            compact(

                'rapor',

                'ekstrakurikuler'

            )

        );
    }
    
    
    public function print($id)
{
    if(auth()->user()->role != 'guru'){
        abort(403);
    }

    $rapor = Rapor::with([
        'siswa',
        'kelas',
        'tahunAjaran',
        'details.mapel'
    ])->findOrFail($id);

    $ekstrakurikuler = Ekstrakurikuler::where(
        'siswa_id',
        $rapor->siswa_id
    )
    ->where(
        'tahun_ajaran_id',
        $rapor->tahun_ajaran_id
    )
    ->where(
        'semester',
        $rapor->semester
    )
    ->get();

    // kepala sekolah
    $kepalaSekolah = Guru::where(
        'jabatan_ptk',
        'Kepala Sekolah'
    )->first();

    // halaman 2
    $page2 = $rapor->details->take(6);

    // halaman 3
    $page3 = $rapor->details->slice(6);

    return view(
        'rapor.print',
        compact(
            'rapor',
            'ekstrakurikuler',
            'kepalaSekolah',
            'page2',
            'page3'
        )
    );
}
}
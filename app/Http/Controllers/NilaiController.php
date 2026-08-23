<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\NilaiTP;
use App\Models\LingkupMateri;
use App\Models\TujuanPembelajaran;
use App\Models\TahunAjaran;
use App\Models\NilaiAstsDetail;
use App\Models\AnggotaKelas;

class NilaiController extends Controller
{

public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | GURU LOGIN
    |--------------------------------------------------------------------------
    */

    $guru = Auth::user()->guru;

    if (!$guru) {
        abort(403, 'Data guru tidak ditemukan.');
    }

    /*
    |--------------------------------------------------------------------------
    | TAHUN AJARAN YANG DILIHAT
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = $request->filled('tahun_ajaran_id')
    ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
    : TahunAjaran::where('status', 'Aktif')->first();

if (!$tahunAjaran) {
    abort(404, 'Tahun ajaran belum tersedia.');
}

$modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
    |--------------------------------------------------------------------------
    | TAHUN GANJIL SEBAGAI SUMBER STRUKTUR KELAS
    |--------------------------------------------------------------------------
    |
    | Pembagian kelas dilakukan pada semester Ganjil.
    | Pada semester Genap, kelas dan anggota siswa tetap menggunakan
    | struktur yang dibentuk pada semester Ganjil.
    |
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
        abort(
            404,
            'Data tahun ajaran Ganjil untuk struktur kelas belum tersedia.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | INISIALISASI
    |--------------------------------------------------------------------------
    */

    $kelas = collect();

    $mapels = collect();

    $siswas = collect();

    $lingkupMateris = collect();

    $tujuanPembelajarans = collect();

    $nilaiSiswa = [];

    $nilaiTP = [];

    $rataFormatif = [];

    $nilaiAkhir = [];

    $asts = [];

    /*
    |--------------------------------------------------------------------------
    | HAK AKSES GURU
    |--------------------------------------------------------------------------
    */

    switch ($guru->jenis_pengajar) {

        case 'Wali Kelas':

            /*
            |--------------------------------------------------------------
            | Kelas Wali Selalu Mengikuti Struktur Ganjil
            |--------------------------------------------------------------
            */

            $kelasWali = Kelas::where(
                'wali_kelas_id',
                $guru->id
            )
            ->where(
                'tahun_ajaran_id',
                $tahunGanjil->id
            )
            ->first();

            if ($kelasWali) {

                $kelas = collect([
                    $kelasWali
                ]);

            }

            $mapels = Mapel::where(
                'status',
                'Aktif'
            )
            ->orderBy('nama_mapel')
            ->get();

            break;


        case 'Guru PAI':

            /*
            |--------------------------------------------------------------
            | Kelas berasal dari struktur Ganjil
            |--------------------------------------------------------------
            */

            $kelas = Kelas::where(
                'tahun_ajaran_id',
                $tahunGanjil->id
            )
            ->orderBy('nama_kelas')
            ->get();

            $mapels = Mapel::where(
                'kode_mapel',
                'PAI'
            )
            ->get();

            break;


        case 'Guru PJOK':

            /*
            |--------------------------------------------------------------
            | Kelas berasal dari struktur Ganjil
            |--------------------------------------------------------------
            */

            $kelas = Kelas::where(
                'tahun_ajaran_id',
                $tahunGanjil->id
            )
            ->orderBy('nama_kelas')
            ->get();

            $mapels = Mapel::where(
                'kode_mapel',
                'PJOK'
            )
            ->get();

            break;


        default:

            /*
            |--------------------------------------------------------------
            | Guru Mapel
            |--------------------------------------------------------------
            */

            $kelas = Kelas::where(
                'tahun_ajaran_id',
                $tahunGanjil->id
            )
            ->orderBy('nama_kelas')
            ->get();

            $mapels = Mapel::where(
                'status',
                'Aktif'
            )
            ->orderBy('nama_mapel')
            ->get();

            break;
    }

    /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

    $kelasId = $request->kelas;

    $mapelId = $request->mapel;


    /*
    |--------------------------------------------------------------------------
    | WALI KELAS HANYA BOLEH MEMILIH KELASNYA SENDIRI
    |--------------------------------------------------------------------------
    */

    if ($guru->jenis_pengajar == 'Wali Kelas') {

        $kelasId = $kelas->first()?->id;

    }


    /*
    |--------------------------------------------------------------------------
    | DATA SISWA
    |--------------------------------------------------------------------------
    |
    | Anggota kelas selalu diambil dari tahun Ganjil.
    |
    */

    if ($kelasId) {

        $ids = AnggotaKelas::where(
            'kelas_id',
            $kelasId
        )
        ->where(
            'tahun_ajaran_id',
            $tahunGanjil->id
        )
        ->pluck('siswa_id');

        $siswas = Siswa::whereIn(
            'id',
            $ids
        )
        ->orderBy('nama_siswa')
        ->get();
    }


    /*
    |--------------------------------------------------------------------------
    | DATA ASTS
    |--------------------------------------------------------------------------
    |
    | Nilai tetap mengikuti tahun ajaran + semester yang sedang dilihat.
    |
    */

    $astsData = DB::table('nilai_asts')
        ->where(
            'kelas_id',
            $kelasId
        )
        ->where(
            'mapel_id',
            $mapelId
        )
        ->where(
    'tahun_ajaran_id',
    $tahunAjaran->id
)
->where(
    'semester',
    $tahunAjaran->semester
)
        ->get();

    foreach ($astsData as $item) {

        $asts[$item->siswa_id][$item->lingkup_materi_id]
            = $item->nilai;
    }


    /*
    |--------------------------------------------------------------------------
    | MAPEL YANG DIPILIH
    |--------------------------------------------------------------------------
    */

    $mapel = null;

    if ($mapelId) {

        $mapel = Mapel::find($mapelId);
    }


    /*
    |--------------------------------------------------------------------------
    | LINGKUP MATERI
    |--------------------------------------------------------------------------
    */

    if ($mapel && $kelasId) {

        $kelasDipilih = Kelas::find($kelasId);

        if ($kelasDipilih) {

            $lingkupMateris = LingkupMateri::with([
                'tujuanPembelajarans' => function ($query) {

                    $query->where(
                        'status',
                        'Aktif'
                    )
                    ->orderBy('urutan');

                }
            ])
            ->where(
                'mapel_id',
                $mapel->id
            )
            ->where(
                'tingkat',
                $kelasDipilih->tingkat
            )
            ->where(
                'status',
                'Aktif'
            )
            ->where(
    'tahun_ajaran_id',
    $tahunAjaran->id
)
->where(
    'semester',
    $tahunAjaran->semester
)
            ->orderBy('id')
            ->get();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | TUJUAN PEMBELAJARAN
    |--------------------------------------------------------------------------
    */

    foreach ($lingkupMateris as $lm) {

        foreach ($lm->tujuanPembelajarans as $tp) {

            $tujuanPembelajarans->push($tp);

        }
    }


    /*
    |--------------------------------------------------------------------------
    | NILAI SISWA
    |--------------------------------------------------------------------------
    |
    | Nilai mengikuti tahun ajaran + semester yang sedang dilihat.
    |
    */

    if (
    $kelasId &&
    $mapel &&
    $tahunAjaran
) {

        foreach ($siswas as $siswa) {

            $nilai = Nilai::with('detailTP')
                ->where(
                    'siswa_id',
                    $siswa->id
                )
                ->where(
                    'mapel_id',
                    $mapel->id
                )
                ->where(
    'tahun_ajaran_id',
    $tahunAjaran->id
)
->where(
    'semester',
    $tahunAjaran->semester
)
                ->first();

            if (!$nilai) {
                continue;
            }

            $nilaiSiswa[$siswa->id] = $nilai;

            foreach ($nilai->detailTP as $detail) {

                $nilaiTP[$siswa->id][$detail->tp_id]
                    = $detail->nilai;
            }

            $rataFormatif[$siswa->id]
                = $nilai->rata_formatif;

            $nilaiAkhir[$siswa->id]
                = $nilai;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FILTER
    |--------------------------------------------------------------------------
    */

    $filter = [

    'kelas_id' => $kelasId,

    'mapel_id' => $mapelId,

    'tahun_ajaran_id' => $tahunAjaran->id,

    'semester' => $tahunAjaran->semester,

];


    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    return view(
    'nilai.index',
    compact(
        'guru',
        'kelas',
        'mapels',
        'siswas',
        'mapel',
        'lingkupMateris',
        'tujuanPembelajarans',
        'nilaiSiswa',
        'nilaiTP',
        'rataFormatif',
        'nilaiAkhir',
        'tahunAjaran',
        'asts',
        'modeArsip',
        'filter'
    )
);
}

public function massStore(Request $request)
{
    $request->validate([
        'kelas_id'        => 'required',
        'mapel_id'        => 'required',
        'tahun_ajaran_id' => 'required',
        'semester'        => 'required',
        'siswa_id'        => 'required|array',
    ]);

    $tahunAjaran = TahunAjaran::findOrFail(
        $request->tahun_ajaran_id
    );

    if ($tahunAjaran->status !== 'Aktif') {

        return back()
            ->withInput()
            ->with(
                'error',
                'Periode tahun ajaran ini sudah diarsipkan. Input nilai tidak dapat dilakukan.'
            );
    }

    DB::beginTransaction();


    
    try {

    foreach ($request->siswa_id as $siswaId) {

        $nilai = Nilai::updateOrCreate(
            [
                'siswa_id' => $siswaId,
                'mapel_id' => $request->mapel_id,
                'tahun_ajaran_id' => $request->tahun_ajaran_id,
                'semester' => $request->semester,
            ],
            [
                'rata_formatif' => 0,
                'asts' => 0,
                'asas' => 0,
                'asat' => 0,
                'nilai_akhir' => 0,
                'deskripsi' => null,
            ]
        );

        

/*
|--------------------------------------------------------------------------
| SIMPAN ASTS PER LM
|--------------------------------------------------------------------------
*/

$rataAsts = 0;

if(isset($request->asts[$siswaId])){

    $nilaiLm = collect($request->asts[$siswaId])
        ->filter(fn($v) => $v !== null && $v !== '');

        foreach ($request->asts[$siswaId] as $lmId => $nilaiLmItem) {

    // lewati kalau kosong
    if ($nilaiLmItem === null || $nilaiLmItem === '') {
        continue;
    }

    NilaiAstsDetail::updateOrCreate(
        [
            'nilai_id' => $nilai->id,
            'lingkup_materi_id' => $lmId,
        ],
        [
            'nilai' => (float) $nilaiLmItem,
        ]
    );
}

  $rataAsts = $nilaiLm->count()
    ? round($nilaiLm->avg(),2)
    : 0;

}

            /*
            |--------------------------------------------------------------------------
            | SIMPAN NILAI TP
            |--------------------------------------------------------------------------
            */

            $total = 0;
            $jumlah = 0;

            foreach ($request->nilai_tp[$siswaId] ?? [] as $tpId => $nilaiTp) {

                NilaiTP::updateOrCreate(

                    [
                        'nilai_id' => $nilai->id,
                        'tp_id'    => $tpId,
                    ],

                    [
                        'nilai' => $nilaiTp,
                    ]

                );

                $total += $nilaiTp;
                $jumlah++;

            }

            /*
            |--------------------------------------------------------------------------
            | HITUNG FORMATIF
            |--------------------------------------------------------------------------
            */

            $rataFormatif = $jumlah > 0
                ? round($total / $jumlah,2)
                : 0;

        

           /*
|--------------------------------------------------------------------------
| ASAS / ASAT
|--------------------------------------------------------------------------
*/

$asas = 0;
$asat = 0;

if ($request->semester == 'Ganjil') {

    $asas = $request->asas[$siswaId] ?? 0;

    $asesmenAkhir = $asas;

} else {

    $asat = $request->asat[$siswaId] ?? 0;

    $asesmenAkhir = $asat;

}
            /*
            |--------------------------------------------------------------------------
            | NILAI AKHIR
            |--------------------------------------------------------------------------
            */
$nilaiAkhir = round(
    ($rataFormatif + $rataAsts + $asesmenAkhir) / 3
);

// jika sudah pernah remedial,
// gunakan nilai yang lebih tinggi
if ($nilai->nilai_remedial > $nilaiAkhir) {
    $nilaiAkhir = $nilai->nilai_remedial;
}

            /*
            |--------------------------------------------------------------------------
            | UPDATE NILAI
            |--------------------------------------------------------------------------
            */

         $nilai->update([

    'rata_formatif' => $rataFormatif,

    'asts'          => $rataAsts,

    'asas'          => $asas,

    'asat'          => $asat,

    'nilai_akhir'   => $nilaiAkhir,

]);

        }

       

       DB::commit();

return redirect()
    ->route('nilai.index', [
        'kelas' => $request->kelas_id,
        'mapel' => $request->mapel_id,
        'tahun_ajaran_id' => $request->tahun_ajaran_id,
    ])
    ->with(
        'success',
        'Nilai berhasil disimpan.'
    );


}


catch(\Exception $e){

    DB::rollBack();

    return back()

    ->withInput()

    ->with(

        'error',

        $e->getMessage()

    );

}


}

public function remedial(Request $request)
{
    $request->validate([
        'nilai_id'       => 'required|exists:nilais,id',
        'nilai_remedial' => 'required|numeric|min:0|max:100',
    ]);

    $nilai = Nilai::findOrFail($request->nilai_id);

    $tahunAjaran = TahunAjaran::findOrFail(
        $nilai->tahun_ajaran_id
    );

    if ($tahunAjaran->status !== 'Aktif') {

        return back()
            ->with(
                'error',
                'Periode tahun ajaran ini sudah diarsipkan. Remedial tidak dapat dilakukan.'
            );
    }

    if (!$nilai->nilai_awal) {
        $nilai->nilai_awal = $nilai->nilai_akhir;
    }

    $nilai->nilai_remedial = $request->nilai_remedial;
    $nilai->tanggal_remedial = now();

    $nilai->nilai_akhir = max(
        $nilai->nilai_akhir,
        $request->nilai_remedial
    );

    $nilai->save();

    return back()->with(
        'success',
        'Nilai remedial berhasil disimpan.'
    );
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\TahunAjaran;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use App\Exports\JadwalExport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalPelajaranController extends Controller
{
    /**
     * Menampilkan daftar jadwal.
     */
   public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | PERIODE AKADEMIK
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = $request->filled('tahun_ajaran_id')
        ? TahunAjaran::findOrFail($request->tahun_ajaran_id)
        : TahunAjaran::where('status', 'Aktif')->first();

    if (!$tahunAjaran) {
        return back()->with(
            'error',
            'Belum ada tahun ajaran yang tersedia.'
        );
    }

    $tahunAktif = $tahunAjaran;

    $modeArsip = $tahunAjaran->status !== 'Aktif';


    /*
    |--------------------------------------------------------------------------
    | QUERY JADWAL BERDASARKAN PERIODE
    |--------------------------------------------------------------------------
    */

    $query = JadwalPelajaran::with([
        'kelas',
        'guru',
        'mapel',
        'tahunAjaran'
    ])
    ->where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    );


    /*
    |--------------------------------------------------------------------------
    | FILTER KELAS
    |--------------------------------------------------------------------------
    */

    if ($request->filled('kelas_id')) {

        $query->where(
            'kelas_id',
            $request->kelas_id
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FILTER HARI
    |--------------------------------------------------------------------------
    */

    if ($request->filled('hari')) {

        $query->where(
            'hari',
            $request->hari
        );

    }


    /*
    |--------------------------------------------------------------------------
    | FILTER STATUS
    |--------------------------------------------------------------------------
    */

    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );

    }


    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->whereHas('guru', function ($guru) use ($search) {

                $guru->where(
                    'nama_guru',
                    'like',
                    '%' . $search . '%'
                );

            })
            ->orWhereHas('mapel', function ($mapel) use ($search) {

                $mapel->where(
                    'nama_mapel',
                    'like',
                    '%' . $search . '%'
                );

            })
            ->orWhere(
                'nama_kegiatan',
                'like',
                '%' . $search . '%'
            );

        });

    }


    /*
    |--------------------------------------------------------------------------
    | DATA JADWAL
    |--------------------------------------------------------------------------
    */

    $jadwals = $query
        ->orderBy('kelas_id')
        ->orderBy('hari')
        ->orderBy('jam_ke')
        ->paginate(10)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | DATA VIEW
    |--------------------------------------------------------------------------
    */

    return view('jadwal.index', [

        'jadwals' => $jadwals,

        'kelas' => Kelas::where(
            'tahun_ajaran_id',
            $tahunAjaran->id
        )
        ->orderBy('tingkat')
        ->get(),

        'tahunAjarans' => TahunAjaran::orderByDesc(
            'tahun_ajaran'
        )->get(),

        'tahunAktif' => $tahunAktif,

        'tahunAjaran' => $tahunAjaran,

        'modeArsip' => $modeArsip,

    ]);
}

    /**
     * Form edit jadwal.
     */
   public function edit(Request $request, $id)
{
    $jadwal = JadwalPelajaran::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | PERIODE JADWAL
    |--------------------------------------------------------------------------
    */

    $tahunAjaran = TahunAjaran::findOrFail(
        $jadwal->tahun_ajaran_id
    );


    /*
    |--------------------------------------------------------------------------
    | ARSIP TIDAK BOLEH DIUBAH
    |--------------------------------------------------------------------------
    */

    if ($tahunAjaran->status !== 'Aktif') {

        return redirect()
            ->route('jadwal.index', [
                'tahun_ajaran_id' => $tahunAjaran->id
            ])
            ->with(
                'error',
                'Jadwal pada periode arsip tidak dapat diubah.'
            );

    }


    /*
    |--------------------------------------------------------------------------
    | DATA FORM
    |--------------------------------------------------------------------------
    */

    $kelas = Kelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->orderBy('tingkat')
    ->orderBy('nama_kelas')
    ->get();

    $gurus = Guru::where(
        'status_guru',
        'Aktif'
    )
    ->orderBy('nama_guru')
    ->get();

    $mapels = Mapel::where(
        'status',
        'Aktif'
    )
    ->orderBy('nama_mapel')
    ->get();


    return view('jadwal.edit', [

        'jadwal' => $jadwal,

        'kelas' => $kelas,

        'gurus' => $gurus,

        'mapels' => $mapels,

        'tahunAjaran' => $tahunAjaran,

        'tahunAktif' => $tahunAjaran,

    ]);
}


    /**
     * Mengambil mata pelajaran berdasarkan kelas.
     */
    public function getMapelByKelas($kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);

        $query = Mapel::query();

        if ($kelas->tingkat <= 2) {

            $query->whereHas('kategori', function ($q) {

                $q->where(
                    'kode_kategori',
                    'KD01'
                );

            });

        } elseif ($kelas->tingkat <= 4) {

            $query->whereHas('kategori', function ($q) {

                $q->whereIn(
                    'kode_kategori',
                    [
                        'KD01',
                        'KD02'
                    ]
                );

            });

        } else {

            $query->whereHas('kategori', function ($q) {

                $q->whereIn(
                    'kode_kategori',
                    [
                        'KD01',
                        'KD02',
                        'KD03'
                    ]
                );

            });
        }

        return response()->json(
            $query
                ->orderBy('nama_mapel')
                ->get()
        );
    }


    /**
     * Menyimpan jadwal baru.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI DASAR
        |--------------------------------------------------------------------------
        */

        $rules = [

            'tahun_ajaran_id' => 'required',

            'kelas_id' => 'required',

            'hari' => 'required',

            'jam_ke' => 'required',

            'waktu' => 'required',

            'jenis_jadwal' => 'required|in:Wajib,Kokurikuler,Kegiatan',

        ];

       $tahunAjaran = TahunAjaran::findOrFail(
    $request->tahun_ajaran_id
);

if ($tahunAjaran->status !== 'Aktif') {

    return back()
        ->withInput()
        ->with(
            'error',
            'Jadwal pada periode arsip tidak dapat ditambahkan.'
        );


}


        /*
        |--------------------------------------------------------------------------
        | JADWAL PELAJARAN
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $request->jenis_jadwal,
                [
                    'Wajib',
                    'Kokurikuler'
                ]
            )
        ) {

            $rules['mapel_id'] = 'required';

            $rules['guru_id'] = 'required';

            $rules['status'] = 'required|in:Aktif,Nonaktif';

            $rules['nama_kegiatan'] = 'nullable';

        }


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (
            $request->jenis_jadwal === 'Kegiatan'
        ) {

            $rules['nama_kegiatan'] =
                'required|in:Upacara,Sholat Dhuha,Istirahat';

        }


        $request->validate($rules);


        /*
        |--------------------------------------------------------------------------
        | CEK BENTROK KELAS
        |--------------------------------------------------------------------------
        */

        $kelasBentrok = JadwalPelajaran::where(
                'kelas_id',
                $request->kelas_id
            )

            ->where(
                'tahun_ajaran_id',
                $request->tahun_ajaran_id
            )

            ->where(
                'hari',
                $request->hari
            )

            ->where(
                'jam_ke',
                $request->jam_ke
            )

            ->exists();


        if ($kelasBentrok) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jadwal kelas pada hari dan jam tersebut sudah ada.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK BENTROK GURU
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $request->jenis_jadwal,
                [
                    'Wajib',
                    'Kokurikuler'
                ]
            )
        ) {

            $guruBentrok = JadwalPelajaran::where(
                    'guru_id',
                    $request->guru_id
                )

                ->where(
                    'tahun_ajaran_id',
                    $request->tahun_ajaran_id
                )

                ->where(
                    'hari',
                    $request->hari
                )

                ->where(
                    'jam_ke',
                    $request->jam_ke
                )

                ->exists();


            if ($guruBentrok) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Guru sudah memiliki jadwal pada hari dan jam tersebut.'
                    );
            }

        }


        /*
        |--------------------------------------------------------------------------
        | ATUR DATA KEGIATAN
        |--------------------------------------------------------------------------
        */

        if (
            $request->jenis_jadwal === 'Kegiatan'
        ) {

            $request->merge([

                'mapel_id' => null,

                'guru_id' => null,

                'status' => 'Aktif',

            ]);

        } else {

            /*
            | Jadwal Wajib / Kokurikuler
            | tidak memiliki nama kegiatan.
            */

            $request->merge([

                'nama_kegiatan' => null,

            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        JadwalPelajaran::create(
            $request->all()
        );


      return redirect()
    ->route('jadwal.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ])
    ->with(
        'success',
        'Jadwal pelajaran berhasil ditambahkan.'
    );
    }


    /**
     * Update jadwal.
     */
   public function update(
    Request $request,
    JadwalPelajaran $jadwal
) {

    $tahunAjaran = TahunAjaran::findOrFail(
        $jadwal->tahun_ajaran_id
    );

    if ($tahunAjaran->status !== 'Aktif') {

        return back()->with(
            'error',
            'Jadwal pada periode arsip tidak dapat diubah.'
        );

    }

    
        /*
        |--------------------------------------------------------------------------
        | VALIDASI DASAR
        |--------------------------------------------------------------------------
        */

        $rules = [

            'tahun_ajaran_id' => 'required',

            'kelas_id' => 'required',

            'hari' => 'required',

            'jam_ke' => 'required',

            'waktu' => 'required',

            'jenis_jadwal' =>
                'required|in:Wajib,Kokurikuler,Kegiatan',

        ];


        /*
        |--------------------------------------------------------------------------
        | JADWAL PELAJARAN
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $request->jenis_jadwal,
                [
                    'Wajib',
                    'Kokurikuler'
                ]
            )
        ) {

            $rules['mapel_id'] = 'required';

            $rules['guru_id'] = 'required';

            $rules['status'] =
                'required|in:Aktif,Nonaktif';

            $rules['nama_kegiatan'] =
                'nullable';

        }


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN SEKOLAH
        |--------------------------------------------------------------------------
        */

        if (
            $request->jenis_jadwal === 'Kegiatan'
        ) {

            $rules['nama_kegiatan'] =
                'required|in:Upacara,Sholat Dhuha,Istirahat';

        }


        $request->validate($rules);


        /*
        |--------------------------------------------------------------------------
        | CEK BENTROK KELAS
        |--------------------------------------------------------------------------
        */

        $kelasBentrok = JadwalPelajaran::where(
                'kelas_id',
                $request->kelas_id
            )

            ->where(
                'tahun_ajaran_id',
                $request->tahun_ajaran_id
            )

            ->where(
                'hari',
                $request->hari
            )

            ->where(
                'jam_ke',
                $request->jam_ke
            )

            ->where(
                'id',
                '!=',
                $jadwal->id
            )

            ->exists();


        if ($kelasBentrok) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jadwal kelas pada hari dan jam tersebut sudah ada.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK BENTROK GURU
        |--------------------------------------------------------------------------
        */

        if (
            in_array(
                $request->jenis_jadwal,
                [
                    'Wajib',
                    'Kokurikuler'
                ]
            )
        ) {

            $guruBentrok = JadwalPelajaran::where(
                    'guru_id',
                    $request->guru_id
                )

                ->where(
                    'tahun_ajaran_id',
                    $request->tahun_ajaran_id
                )

                ->where(
                    'hari',
                    $request->hari
                )

                ->where(
                    'jam_ke',
                    $request->jam_ke
                )

                ->where(
                    'id',
                    '!=',
                    $jadwal->id
                )

                ->exists();


            if ($guruBentrok) {

                return back()
                    ->withInput()
                    ->with(
                        'error',
                        'Guru sudah memiliki jadwal pada hari dan jam tersebut.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | ATUR DATA BERDASARKAN JENIS
        |--------------------------------------------------------------------------
        */

        if (
            $request->jenis_jadwal === 'Kegiatan'
        ) {

            $request->merge([

                'mapel_id' => null,

                'guru_id' => null,

                'status' => 'Aktif',

            ]);

        } else {

            $request->merge([

                'nama_kegiatan' => null,

            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $jadwal->update(
            $request->all()
        );


        return redirect()
    ->route('jadwal.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ])
    ->with(
        'success',
        'Jadwal pelajaran berhasil diperbarui.'
    );
    }


    /**
     * Export jadwal.
     */
    public function export(Request $request)
    {
        return Excel::download(

            new JadwalExport(
                $request->tahun_ajaran_id,
                $request->kelas_id,
                $request->hari,
                $request->status
            ),

            'jadwal-pelajaran.xlsx'
        );
    }
}
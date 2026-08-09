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
        $query = JadwalPelajaran::with([
            'kelas',
            'guru',
            'mapel',
            'tahunAjaran'
        ]);

        $tahunAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        // Filter tahun ajaran
        if ($request->filled('tahun_ajaran_id')) {
            $query->where(
                'tahun_ajaran_id',
                $request->tahun_ajaran_id
            );
        }

        // Filter kelas
        if ($request->filled('kelas_id')) {
            $query->where(
                'kelas_id',
                $request->kelas_id
            );
        }

        // Filter hari
        if ($request->filled('hari')) {
            $query->where(
                'hari',
                $request->hari
            );
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Search guru, mapel, atau kegiatan
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

        $jadwals = $query
            ->orderBy('kelas_id')
            ->orderBy('hari')
            ->orderBy('jam_ke')
            ->paginate(10)
            ->withQueryString();

        return view('jadwal.index', [

            'jadwals' => $jadwals,

            'kelas' => Kelas::orderBy('tingkat')->get(),

            'tahunAjarans' => TahunAjaran::orderByDesc(
                'tahun_ajaran'
            )->get(),

            'tahunAktif' => $tahunAktif,

        ]);
    }


    /**
     * Form tambah jadwal.
     */
    public function create()
    {
        return view('jadwal.create', [

            'kelas' => Kelas::orderBy('tingkat')->get(),

            'gurus' => Guru::orderBy('nama_guru')->get(),

            'mapels' => Mapel::orderBy('nama_mapel')->get(),

            'tahunAktif' => TahunAjaran::where(
                'status',
                'Aktif'
            )->first(),

            'jadwal' => new JadwalPelajaran(),

        ]);
    }


    /**
     * Form edit jadwal.
     */
    public function edit(JadwalPelajaran $jadwal)
    {
        return view('jadwal.edit', [

            'jadwal' => $jadwal,

            'kelas' => Kelas::orderBy('tingkat')->get(),

            'gurus' => Guru::orderBy('nama_guru')->get(),

            'mapels' => Mapel::orderBy('nama_mapel')->get(),

            'tahunAktif' => TahunAjaran::where(
                'status',
                'Aktif'
            )->first(),

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
            ->route('jadwal.index')
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
            ->route('jadwal.index')
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
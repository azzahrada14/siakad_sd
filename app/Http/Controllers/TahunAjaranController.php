<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Exports\TahunAjaranExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class TahunAjaranController extends Controller
{
    public function index(Request $request)
    {
        $query = TahunAjaran::query();

        // Pencarian tahun ajaran
        if ($request->filled('search')) {

            $query->where(
                'tahun_ajaran',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter semester
        if ($request->filled('semester')) {

            $query->where(
                'semester',
                $request->semester
            );
        }

        // Filter status
        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );
        }

        // Data tahun ajaran
        $tahunAjaran = $query
            ->orderBy('tahun_ajaran')
            ->orderBy('semester')
            ->paginate(10)
            ->withQueryString();

        // Statistik
        $totalTahun = TahunAjaran::count();

        $aktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->count();

        $ganjil = TahunAjaran::where(
            'semester',
            'Ganjil'
        )->count();

        $genap = TahunAjaran::where(
            'semester',
            'Genap'
        )->count();

        // Tahun ajaran aktif
$tahunAktif = TahunAjaran::where(
    'status',
    'Aktif'
)->first();

$periodeAktifBelumSelesai = false;

if ($tahunAktif && $tahunAktif->tanggal_selesai) {

    $periodeAktifBelumSelesai =
        now()->lt(
            Carbon::parse(
                $tahunAktif->tanggal_selesai
            )->endOfDay()
        );
}

       return view(
    'tahunajaran.index',
    compact(
        'tahunAjaran',
        'totalTahun',
        'aktif',
        'ganjil',
        'genap',
        'tahunAktif',
        'periodeAktifBelumSelesai'
    )
);
    }


    public function create()
    {
        return view('tahunajaran.create');
    }


    
       
       





       public function store(Request $request)
{
    $request->validate([
        'tahun_ajaran' => 'required|string',
        'semester' => 'required|in:Ganjil,Genap',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after:tanggal_mulai',
    ]);

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | 1. Cegah periode yang sama dibuat dua kali
        |--------------------------------------------------------------------------
        */

        $sudahAda = TahunAjaran::where(
            'tahun_ajaran',
            $request->tahun_ajaran
        )
        ->where(
            'semester',
            $request->semester
        )
        ->exists();

        if ($sudahAda) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Tahun ajaran dan semester tersebut sudah tersedia.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Cari periode aktif sekarang
        |--------------------------------------------------------------------------
        */

       $periodeAktif = TahunAjaran::where(
    'status',
    'Aktif'
)->first();



        /*
        |--------------------------------------------------------------------------
        | 3. Kalau periode aktif belum selesai,
        |    tidak boleh membuat periode berikutnya
        |--------------------------------------------------------------------------
        */

        if ($periodeAktif) {

    if (
        $periodeAktif->tanggal_selesai &&
        now()->lt($periodeAktif->tanggal_selesai)
    ) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Anda tidak dapat menambahkan tahun ajaran atau semester baru karena periode tahun ajaran yang sedang aktif belum selesai.'
            );
    }

        }


        /*
        |--------------------------------------------------------------------------
        | 4. Cari periode sebelumnya
        |--------------------------------------------------------------------------
        */

        $periodeSebelumnya = null;

        if ($request->semester === 'Genap') {

            /*
             * Contoh:
             * 2026/2027 Ganjil
             *        ↓
             * 2026/2027 Genap
             */

            $periodeSebelumnya = TahunAjaran::where(
                'tahun_ajaran',
                $request->tahun_ajaran
            )
            ->where(
                'semester',
                'Ganjil'
            )
            ->first();

        } else {

            /*
             * Contoh:
             * 2026/2027 Genap
             *        ↓
             * 2027/2028 Ganjil
             */

            $bagianTahun = explode(
                '/',
                $request->tahun_ajaran
            );

            $periodeSebelumnya = null;

            if (count($bagianTahun) === 2) {

                $tahunAwal = (int) $bagianTahun[0];

                $tahunSebelumnya =
                    ($tahunAwal - 1)
                    . '/'
                    . $tahunAwal;

                $periodeSebelumnya = TahunAjaran::where(
                    'tahun_ajaran',
                    $tahunSebelumnya
                )
                ->where(
                    'semester',
                    'Genap'
                )
                ->first();
            }
        }


        /*
        |--------------------------------------------------------------------------
        | 5. Kalau bukan periode pertama,
        |    periode sebelumnya wajib ditemukan
        |--------------------------------------------------------------------------
        */

        if (!$periodeSebelumnya && TahunAjaran::count() > 0) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Periode sebelumnya tidak ditemukan. '
                    . 'Pastikan urutan tahun ajaran dan semester sudah benar.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | 6. Pastikan tanggal tidak bentrok
        |--------------------------------------------------------------------------
        */

        $tanggalMulai = Carbon::parse(
            $request->tanggal_mulai
        )->startOfDay();

        $tanggalSelesai = Carbon::parse(
            $request->tanggal_selesai
        )->startOfDay();


        $periodeBentrok = TahunAjaran::where(function ($query) use (
            $tanggalMulai,
            $tanggalSelesai
        ) {

            $query
                ->whereBetween(
                    'tanggal_mulai',
                    [$tanggalMulai, $tanggalSelesai]
                )
                ->orWhereBetween(
                    'tanggal_selesai',
                    [$tanggalMulai, $tanggalSelesai]
                )
                ->orWhere(function ($q) use (
                    $tanggalMulai,
                    $tanggalSelesai
                ) {

                    $q->where(
                        'tanggal_mulai',
                        '<=',
                        $tanggalMulai
                    )
                    ->where(
                        'tanggal_selesai',
                        '>=',
                        $tanggalSelesai
                    );

                });

        })
        ->exists();


        if ($periodeBentrok) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Tanggal periode yang dimasukkan bertabrakan dengan periode tahun ajaran yang sudah ada.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | 7. Buat periode baru
        |--------------------------------------------------------------------------
        |
        | Periode baru TIDAK LANGSUNG AKTIF.
        |
        */

        $tahunBaru = TahunAjaran::create([

    'tahun_ajaran' =>
        $request->tahun_ajaran,

    'semester' =>
        $request->semester,

    'tanggal_mulai' =>
        $request->tanggal_mulai,

    'tanggal_selesai' =>
        $request->tanggal_selesai,

    'status' =>
        'Tidak Aktif',

    'periode_sebelumnya_id' =>
        $periodeSebelumnya?->id,

]);





        DB::commit();

        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Tahun ajaran berhasil ditambahkan. Periode masih tidak aktif sampai waktunya dapat diaktifkan.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );
    }
}


    public function show($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        return view(
            'tahunajaran.show',
            compact('tahun')
        );
    }


    public function edit($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        return view(
            'tahunajaran.edit',
            compact('tahun')
        );
    }


    
              public function update(Request $request, $id)
{
    $tahun = TahunAjaran::findOrFail($id);

    $request->validate([
        'tahun_ajaran' => 'required|string',
        'semester' => 'required|in:Ganjil,Genap',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after:tanggal_mulai',
    ]);

    $tahun->update([
        'tahun_ajaran' => $request->tahun_ajaran,
        'semester' => $request->semester,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
    ]);

    return redirect()
        ->route('tahun-ajaran.index')
        ->with(
            'success',
            'Data tahun ajaran berhasil diperbarui.'
        );
}


    public function destroy($id)
    {
        $tahun = TahunAjaran::findOrFail($id);

        // Jangan hapus data, hanya jadikan arsip
        $tahun->update([

            'status' => 'Tidak Aktif'

        ]);

        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Status berhasil diubah.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | RIWAYAT AKADEMIK
    |--------------------------------------------------------------------------
    */

  public function aktifkan($id)
{
    DB::beginTransaction();

    try {

        $tahunBaru = TahunAjaran::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | 1. Cek apakah periode sudah aktif
        |--------------------------------------------------------------------------
        */

        if ($tahunBaru->status === 'Aktif') {

            return back()->with(
                'error',
                'Tahun ajaran tersebut sudah aktif.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 2. Cek tanggal mulai
        |--------------------------------------------------------------------------
        */

        if (
            $tahunBaru->tanggal_mulai &&
            now()->lt($tahunBaru->tanggal_mulai)
        ) {

            return back()->with(
                'error',
                'Tahun ajaran belum dapat diaktifkan karena tanggal mulai periode belum tercapai.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | 3. Cari periode aktif sekarang
        |--------------------------------------------------------------------------
        */

        $periodeAktif = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        $periodeSebelumnya = $tahunBaru->periodeSebelumnya;

        if ($periodeSebelumnya) {

    if (
        $periodeSebelumnya->tanggal_selesai &&
        now()->lt(
            Carbon::parse($periodeSebelumnya->tanggal_selesai)
        )
    ) {

        DB::rollBack();

        return back()->with(
            'error',
            'Tidak dapat mengaktifkan periode ini karena periode sebelumnya '
            . $periodeSebelumnya->tahun_ajaran
            . ' semester '
            . $periodeSebelumnya->semester
            . ' belum selesai. Periode sebelumnya berakhir pada '
            . Carbon::parse(
                $periodeSebelumnya->tanggal_selesai
            )->format('d-m-Y')
            . '.'
        );
    }
}


        /*
        |--------------------------------------------------------------------------
        | 4. Periode aktif sebelumnya harus sudah selesai
        |--------------------------------------------------------------------------
        */

        if ($periodeAktif) {

            if (
                $periodeAktif->tanggal_selesai &&
                now()->lt($periodeAktif->tanggal_selesai)
            ) {

                return back()->with(
                    'error',
                    'Periode tahun ajaran yang sedang aktif belum selesai. Anda belum dapat mengaktifkan periode berikutnya.'
                );
            }

        }


        /*
        |--------------------------------------------------------------------------
        | 5. Nonaktifkan periode lama
        |--------------------------------------------------------------------------
        */

        TahunAjaran::query()->update([
            'status' => 'Tidak Aktif'
        ]);


        /*
        |--------------------------------------------------------------------------
        | 6. Aktifkan periode baru
        |--------------------------------------------------------------------------
        */

        $tahunBaru->update([
            'status' => 'Aktif'
        ]);

        if (
    $tahunBaru->semester === 'Genap'
    && $periodeSebelumnya
) {

    $this->salinStrukturKeGenap(
        $periodeSebelumnya->id,
        $tahunBaru->id
    );
}




        DB::commit();


        return redirect()
            ->route('tahun-ajaran.index')
            ->with(
                'success',
                'Tahun ajaran ' .
                $tahunBaru->tahun_ajaran .
                ' semester ' .
                $tahunBaru->semester .
                ' berhasil diaktifkan.'
            );

    } catch (\Exception $e) {

        DB::rollBack();

        return back()->with(
            'error',
            'Gagal mengaktifkan tahun ajaran: ' .
            $e->getMessage()
        );
    }

}


private function salinStrukturKeGenap($tahunLamaId, $tahunBaruId)
{
    $kelasLama = \App\Models\Kelas::where(
        'tahun_ajaran_id',
        $tahunLamaId
    )->get();

    foreach ($kelasLama as $kelas) {

        /*
        |--------------------------------------------------------------------------
        | Buat kelas untuk semester Genap
        |--------------------------------------------------------------------------
        */

        $kelasBaru = \App\Models\Kelas::firstOrCreate(
            [
                'nama_kelas'      => $kelas->nama_kelas,
                'tingkat'         => $kelas->tingkat,
                'tahun_ajaran_id' => $tahunBaruId,
            ],
            [
                'wali_kelas_id' => $kelas->wali_kelas_id,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Salin anggota kelas
        |--------------------------------------------------------------------------
        */

        $anggotaLama = \App\Models\AnggotaKelas::where(
            'kelas_id',
            $kelas->id
        )
        ->where(
            'tahun_ajaran_id',
            $tahunLamaId
        )
        ->get();


        foreach ($anggotaLama as $anggota) {

            \App\Models\AnggotaKelas::firstOrCreate(
                [
                    'siswa_id'        => $anggota->siswa_id,
                    'tahun_ajaran_id' => $tahunBaruId,
                ],
                [
                    'kelas_id' => $kelasBaru->id,
                ]
            );
        }
    }
}

    public function dashboard($id)
{
    $tahunAjaran = TahunAjaran::findOrFail($id);

    return redirect()->route('dashboard', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]);
}


    /*
    |--------------------------------------------------------------------------
    | EXPORT
    |--------------------------------------------------------------------------
    */

    public function export()
    {
        return Excel::download(

            new TahunAjaranExport(),

            'Tahun_Ajaran_' . date('Ymd_His') . '.xlsx'

        );
    }
}
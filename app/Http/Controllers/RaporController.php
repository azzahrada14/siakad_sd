<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rapor;
use App\Models\RaporDetail;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\RankingSiswa;
use App\Models\Ekstrakurikuler;
use App\Models\TahunAjaran;
use Barryvdh\DomPDF\Facade\Pdf;

class RaporController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

   public function index()
{
    $rapor = Rapor::with([
        'siswa',
        'kelas',
        'tahunAjaran'
    ])->get();

    $tahunAjaran = TahunAjaran::all();

    return view(
        'rapor.index',
        compact(
            'rapor',
            'tahunAjaran'
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
        if(auth()->user()->role == 'kepala_sekolah'){
    abort(403);
}
       RaporDetail::whereIn(
    'rapor_id',
    Rapor::where('tahun_ajaran_id', $request->tahun_ajaran_id)
        ->where('semester', $request->semester)
        ->pluck('id')
)->delete();

Rapor::where('tahun_ajaran_id', $request->tahun_ajaran_id)
    ->where('semester', $request->semester)
    ->delete();

       
        
      
           

        /*
        |--------------------------------------------------------------------------
        | AMBIL SISWA
        |--------------------------------------------------------------------------
        */

        if(auth()->user()->role == 'guru')
        {

            $guru = auth()->user()->guru;

            $siswas = Siswa::where(
                'kelas_id',
                $guru->kelas_id
            )->get();

        }
        else
        {

            $siswas = Siswa::all();

        }

        /*
        |--------------------------------------------------------------------------
        | GENERATE RAPOR
        |--------------------------------------------------------------------------
        */

        foreach($siswas as $siswa)

        {
       
            /*
            |--------------------------------------------------------------------------
            | NILAI RATA-RATA
            |--------------------------------------------------------------------------
            */

            $rata = Nilai::where(
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
            ->avg('nilai_akhir');

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

                'kelas_id' => $siswa->kelas_id,

                'tahun_ajaran_id' => $request->tahun_ajaran_id,

                'semester' => $request->semester,

                'rata_rata' => round($rata ?? 0,2),

                'ranking' => $ranking->ranking ?? null,

                'hadir' => $hadir,

                'izin' => $izin,

                'sakit' => $sakit,

                'alfa' => $alfa,

                'is_generate' => true

            ]);
              if(auth()->user()->role == 'kepala_sekolah'){
    abort(403);
}

            

            /*
            |--------------------------------------------------------------------------
            | SIMPAN DETAIL RAPOR
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

            foreach($nilai as $item)
            {

             RaporDetail::create([

    'rapor_id' => $rapor->id,

    'mapel_id' => $item->mapel_id,

    'nilai_akhir' => $item->nilai_akhir,

    'capaian_pengetahuan' => null,

    'capaian_keterampilan' => null,

]);

            }
    

        }

        return redirect()
            ->route('rapor.index')
            ->with(
                'success',
                'Rapor berhasil digenerate.'
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
return view(
    'rapor.print',
    compact(
        'rapor',
        'ekstrakurikuler'
    )
);
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\TahunAjaran;
use App\Models\RankingSiswa;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    
  public function index(Request $request)
{
    $query = RankingSiswa::with([
        'siswa',
        'kelas',
        'tahunAjaran'
    ]);

    if(auth()->user()->role == 'guru')
    {
        $guru = auth()->user()->guru;

        if($guru->role_guru == 'wali')
        {
            $query->where(
                'kelas_id',
                $guru->kelas_id
            );
        }
    }

    if($request->tahun_ajaran_id)
    {
        $query->where(
            'tahun_ajaran_id',
            $request->tahun_ajaran_id
        );
    }

    if($request->semester)
    {
        $query->where(
            'semester',
            $request->semester
        );
    }

    if($request->kelas_id)
{
    $query->where(
        'kelas_id',
        $request->kelas_id
    );
}

    $ranking = $query
        ->orderBy('ranking')
        ->get();

    $kelas = Kelas::all();

    $tahunAjaran = TahunAjaran::all();

    return view(
        'ranking.index',
        compact(
            'ranking',
            'kelas',
            'tahunAjaran'
        )
    );
}

        

    public function generate(Request $request)
{
    $request->validate([
        'tahun_ajaran_id' => 'required',
        'semester' => 'required'
    ]);

    if(auth()->user()->role == 'operator')
    {
        $request->validate([
            'kelas_id' => 'required'
        ]);

        $kelasId = $request->kelas_id;
    }
    else
    {
        $guru = auth()->user()->guru;

        $kelasId = $guru->kelas_id;
    }

    $tahunAjaranId = $request->tahun_ajaran_id;
    $semester = $request->semester;

    RankingSiswa::where('kelas_id', $kelasId)
        ->where('tahun_ajaran_id', $tahunAjaranId)
        ->where('semester', $semester)
        ->delete();

   $nilai = Nilai::join(
        'siswas',
        'siswas.id',
        '=',
        'nilais.siswa_id'
    )
    ->selectRaw('
        nilais.siswa_id,
        AVG(nilais.nilai_akhir) as rata_rata
    ')
    ->where('siswas.kelas_id', $kelasId)
    ->where('nilais.tahun_ajaran_id', $tahunAjaranId)
    ->where('nilais.semester', $semester)
    ->groupBy('nilais.siswa_id')
    ->get();

    foreach ($nilai as $item)
{
    $item->total_absen = Absensi::where(
            'siswa_id',
            $item->siswa_id
        )
        ->whereIn(
            'status',
            ['sakit','izin','alfa']
        )
        ->count();
}

foreach ($nilai as $item)
{
    $item->total_absen = Absensi::where(
            'siswa_id',
            $item->siswa_id
        )
        ->whereIn(
            'status',
            ['sakit','izin','alfa']
        )
        ->count();
}

    $rank = 1;

    foreach($nilai as $item)
    {
        RankingSiswa::create([
            'siswa_id'        => $item->siswa_id,
            'kelas_id'        => $kelasId,
            'tahun_ajaran_id' => $tahunAjaranId,
            'semester'        => $semester,
            'rata_rata'       => round($item->rata_rata, 2),
            'ranking'         => $rank++
        ]);
    }

    return redirect()
        ->route('ranking.index', [
            'kelas_id' => $kelasId,
            'tahun_ajaran_id' => $tahunAjaranId,
            'semester' => $semester
        ])
        ->with('success', 'Ranking berhasil dibuat');
}
}
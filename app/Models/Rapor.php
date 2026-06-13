<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $fillable = [

        'siswa_id',

        'kelas_id',

        'tahun_ajaran_id',

        'semester',

        'rata_rata',

        'ranking',

        'hadir',

        'izin',

        'sakit',

        'alfa',

        'catatan',

        'semester_ke',
'naik_kelas',
'tinggal_kelas',

        'keputusan',

        'is_generate'


    ];

   public function details()
{
    return $this->hasMany(RaporDetail::class);
}

public function siswa()
{
    return $this->belongsTo(Siswa::class);
}

public function kelas()
{
    return $this->belongsTo(
        Kelas::class,
        'kelas_id',
        'id'
    );
}

public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class);
}

}
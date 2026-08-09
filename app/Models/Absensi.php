<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
    'siswa_id',
    'kelas_id',
    'tahun_ajaran_id',
    'semester',
    'tanggal',
    'mapel_id',
    'status'
];

   public function siswa()
{
    return $this->belongsTo(Siswa::class);
}

public function kelas()
{
    return $this->belongsTo(Kelas::class);
}

public function mapel()
{
    return $this->belongsTo(Mapel::class);
}

public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class,'tahun_ajaran_id');
}
}

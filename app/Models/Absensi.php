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

    public function mapel()
{
    return $this->belongsTo(Mapel::class);
}
}

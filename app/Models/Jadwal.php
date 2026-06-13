<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
    'tahun_ajaran_id',
    'kelas_id',
    'guru_id',
    'mapel_id',
    'hari',
    'jam_mulai',
    'jam_selesai'
];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class);
}
}
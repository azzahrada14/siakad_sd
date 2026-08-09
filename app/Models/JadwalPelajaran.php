<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPelajaran extends Model
{
    use HasFactory;

   protected $fillable = [

    'tahun_ajaran_id',

    'kelas_id',

    'mapel_id',

    'guru_id',

    'hari',

    'jam_ke',

    'waktu',

    'jenis_jadwal',

    'nama_kegiatan',

    'status',

];
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
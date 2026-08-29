<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajarans';

    protected $fillable = [
        'tahun_ajaran_id',
        'kelas_id',
        'hari',
        'jam_ke',
        'waktu',
        'jenis_jadwal',
        'mapel_id',
        'guru_id',
        'nama_kegiatan',
        'status',
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(
            TahunAjaran::class,
            'tahun_ajaran_id'
        );
    }

    public function kelas()
    {
        return $this->belongsTo(
            Kelas::class,
            'kelas_id'
        );
    }

    public function mapel()
    {
        return $this->belongsTo(
            Mapel::class,
            'mapel_id'
        );
    }

    public function guru()
    {
        return $this->belongsTo(
            Guru::class,
            'guru_id'
        );
    }
}
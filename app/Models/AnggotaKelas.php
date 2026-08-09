<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKelas extends Model
{
    use HasFactory;

    protected $table = 'anggota_kelas';

    protected $fillable = [

        'tahun_ajaran_id',

        'kelas_id',

        'siswa_id'

    ];

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class,
            'siswa_id'
        );
    }

    public function kelas()
    {
        return $this->belongsTo(
            Kelas::class,
            'kelas_id'
        );
    }

    public function ekstrakurikulers()
{
    return $this->hasMany(Ekstrakurikuler::class);
}

    public function tahunAjaran()
    {
        return $this->belongsTo(
            TahunAjaran::class,
            'tahun_ajaran_id'
        );
    }

    public function kelasTujuan()
{
    return $this->belongsTo(
        Kelas::class,
        'kelas_tujuan_id'
    );
}
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'siswa_id',
        'master_ekstrakurikuler_id',
        'tahun_ajaran_id',
        'semester',
        'catatan_guru',
        'status',
    ];

    /**
     * Relasi ke siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Relasi ke tahun ajaran
     */
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    /**
     * Relasi ke master ekstrakurikuler
     */
    public function masterEkstrakurikuler()
    {
        return $this->belongsTo(
            MasterEkstrakurikuler::class,
            'master_ekstrakurikuler_id'
        );
    }

    public function anggotaKelas()
{
    return $this->hasMany(AnggotaKelas::class);
}
}
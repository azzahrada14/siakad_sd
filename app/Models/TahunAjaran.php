<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'periode_sebelumnya_id',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function anggotaKelas()
    {
        return $this->hasMany(AnggotaKelas::class);
    }

    public function ekstrakurikulers()
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }

    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }

    public function periodeSebelumnya()
    {
        return $this->belongsTo(
            TahunAjaran::class,
            'periode_sebelumnya_id'
        );
    }

    public function periodeBerikutnya()
    {
        return $this->hasOne(
            TahunAjaran::class,
            'periode_sebelumnya_id'
        );
    }

    public function isAktif()
    {
        return $this->status === 'Aktif';
    }
}
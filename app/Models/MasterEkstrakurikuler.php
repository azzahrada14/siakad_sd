<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterEkstrakurikuler extends Model
{
    protected $fillable = [
        'nama_ekstrakurikuler',
        'pembina',
        'wajib',
        'status',
    ];

    /**
     * Relasi ke data ekstrakurikuler siswa
     */
    public function ekstrakurikulers()
    {
        return $this->hasMany(Ekstrakurikuler::class);
    }
}
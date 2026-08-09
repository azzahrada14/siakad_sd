<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jam_pelajarans';

    protected $fillable = [
    'tahun_ajaran_id',
    'kelas_id',
    'hari',
    'jam_ke',
    'waktu',
    'jenis_jadwal',
    'nama_kegiatan',
    'mapel_id',
    'guru_id',
    'status',
];

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getJamAttribute()
    {
        return substr($this->jam_mulai,0,5)
            .' - '.
            substr($this->jam_selesai,0,5);
    }
}
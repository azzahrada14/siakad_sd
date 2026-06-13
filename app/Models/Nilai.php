<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [

    'siswa_id',
    'mapel_id',
    'tahun_ajaran_id',
    'semester',

    'tugas',
    'uts',
    'uas',

    'jumlah',
    'rata_rata',
    'nilai_akhir',

    'deskripsi'

];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
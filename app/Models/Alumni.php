<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [

        'siswa_id',

        'tahun_ajaran_id',

        'tanggal_lulus',

        'nomor_ijazah',

        'nomor_skhun',

        'status'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI SISWA
    |--------------------------------------------------------------------------
    */

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI TAHUN AJARAN
    |--------------------------------------------------------------------------
    */

    public function tahunAjaran()
    {
        return $this->belongsTo(
            TahunAjaran::class
        );
    }

}
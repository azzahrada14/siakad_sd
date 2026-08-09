<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelulusan extends Model
{
    protected $table = 'kelulusans';

    protected $fillable = [

        'siswa_id',

        'tahun_ajaran_id',

        'tanggal_kelulusan',

        'status',

        'keterangan'

    ];

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class
        );
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(
            TahunAjaran::class
        );
    }
}
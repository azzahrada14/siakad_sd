<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanPembelajaran extends Model
{
    use HasFactory;

    protected $fillable = [

        'lingkup_materi_id',

        'kode_tp',

        'deskripsi',

        'deskripsi_tinggi',

        'deskripsi_rendah',

        'jumlah_jp',

        'urutan',

        'status',

    ];


    /*
    |--------------------------------------------------------------------------
    | Relasi ke Lingkup Materi
    |--------------------------------------------------------------------------
    */
    public function lingkupMateri()
    {
        return $this->belongsTo(
            LingkupMateri::class,
            'lingkup_materi_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Relasi ke Nilai TP
    |--------------------------------------------------------------------------
    */
    public function nilaiTP()
    {
        return $this->hasMany(
            NilaiTP::class,
            'tp_id'
        );
    }
}
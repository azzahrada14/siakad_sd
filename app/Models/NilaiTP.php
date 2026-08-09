<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiTP extends Model
{
    protected $table = 'nilai_tp';

    protected $fillable = [

        'nilai_id',
        'tp_id',
        'nilai'

    ];

    public function nilai()
    {
        return $this->belongsTo(
            Nilai::class
        );
    }

    public function tp()
    {
        return $this->belongsTo(
            TujuanPembelajaran::class,
            'tp_id'
        );
    }
}
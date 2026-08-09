<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAstsDetail extends Model
{
    protected $fillable = [
        'nilai_id',
        'lingkup_materi_id',
        'nilai'
    ];

   public function header()
{
    return $this->belongsTo(Nilai::class, 'nilai_id');
}

    public function lingkupMateri()
    {
        return $this->belongsTo(LingkupMateri::class);
    }
}
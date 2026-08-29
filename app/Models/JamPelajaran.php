<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jam_pelajarans';

    protected $appends = ['waktu'];
    
    protected $fillable = [
        'tingkat',
        'jam_ke',
        'jam_mulai',
        'jam_selesai',
        'durasi',
    ];

    public function getWaktuAttribute()
    {
        return substr($this->jam_mulai, 0, 5)
            . ' - ' .
            substr($this->jam_selesai, 0, 5);
    }
}
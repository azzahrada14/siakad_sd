<?php

namespace App\Models;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'guru_id'
    ];
public function guru()
{
    return $this->belongsTo(Guru::class);
}
}
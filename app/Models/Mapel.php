<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
   protected $fillable = [
    'kode_mapel',
    'nama_mapel',
    'guru_id'
];

public function absensi()
{
    return $this->hasMany(Absensi::class);
}
public function details()
{
    return $this->hasMany(RaporDetail::class);
}
}
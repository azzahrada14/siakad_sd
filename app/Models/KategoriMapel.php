<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriMapel extends Model
{
    protected $fillable = [
        'kode_kategori',
        'keterangan',
        'status',
    ];

    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterMapel extends Model
{
    protected $table = 'master_mapels';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'kategori_mapel_id',
        'jenis',
        'kelompok',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriMapel::class,
            'kategori_mapel_id'
        );
    }

    public function mapels()
    {
        return $this->hasMany(
            Mapel::class,
            'master_mapel_id'
        );
    }
}
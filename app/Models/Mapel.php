<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table='mapels';

    protected $fillable = [
    'kategori_mapel_id',
    'guru_id',
    'kode_mapel',
    'nama_mapel',
    'kelompok',
    'jenis',
    'kkm',
    'status',
    'tahun_ajaran_id',
];

public function tahunAjaran()
{
    return $this->belongsTo(
        TahunAjaran::class,
        'tahun_ajaran_id'
    );
}

    public function kategori()
    {
        return $this->belongsTo(
            KategoriMapel::class,
            
            'kategori_mapel_id'
        );
    }

    public function guru()
{
    return $this->belongsTo(Guru::class);
}
public function mapels()
{
    return $this->hasMany(Mapel::class);
}
public function lingkupMateris()
{
    return $this->hasMany(LingkupMateri::class);
}


}
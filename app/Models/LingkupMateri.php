<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LingkupMateri extends Model
{
    use HasFactory;

    protected $fillable = [

        'mapel_id',
        'tahun_ajaran_id',
        'kode_lm',
        'nama_lm',
        'semester',
        'tingkat',
        'status',

    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

   public function tujuanPembelajarans()
{
    return $this->hasMany(
        TujuanPembelajaran::class,
        'lingkup_materi_id'
    )->orderBy('urutan');
}
}
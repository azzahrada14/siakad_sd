<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NilaiTP;
class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [

    'siswa_id',
    'mapel_id',
    'tahun_ajaran_id',
    'semester',

    'asts',
    'asas',
    'asat',

    'rata_formatif',
    'nilai_akhir',

    'ujian_tulis',
'ujian_lisan',

    'nilai_remedial',
    'tanggal_remedial',

    'deskripsi'

];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(
            TahunAjaran::class,
            'tahun_ajaran_id'
        );
    }

   public function detailTP()
{
    return $this->hasMany(
        NilaiTP::class,
        'nilai_id'
    );
}

public function astsDetails()
{
    return $this->hasMany(NilaiAstsDetail::class);
}
}
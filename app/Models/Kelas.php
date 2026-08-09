<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [

    'nama_kelas',

    'tingkat',

    'tahun_ajaran_id',

    'wali_kelas_id',

    'ruang_kelas'

];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    /*
    | Wali Kelas
    */

    public function waliKelas()
    {
        return $this->belongsTo(
            Guru::class,
            'wali_kelas_id'
        );
    }

    /*
    | Siswa dalam kelas
    */

   public function anggotaKelas()
{
    return $this->hasMany(
        AnggotaKelas::class,
        'kelas_id'
    );
}

/*
|--------------------------------------------------------------------------
| Siswa Aktif (sementara agar modul lama tidak rusak)
|--------------------------------------------------------------------------
*/

public function siswa()
{
    return $this->belongsToMany(
        Siswa::class,
        'anggota_kelas',
        'kelas_id',
        'siswa_id'
    );
}

    /*
    | Jumlah siswa
    */

    public function getJumlahSiswaAttribute()
    {
        return $this->siswa()->count();
    }
    /*
|--------------------------------------------------------------------------
| TAHUN AJARAN
|--------------------------------------------------------------------------
*/

public function tahunAjaran()
{
    return $this->belongsTo(
        TahunAjaran::class,
        'tahun_ajaran_id'
    );
}

public function jadwals()
{
    return $this->hasMany(JadwalPelajaran::class);
}

}

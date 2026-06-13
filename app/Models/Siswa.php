<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'kelas_id',
        'tempat_lahir',
        'tanggal_lahir',
        'nipd',
        'agama',
        'pendidikan_sebelumnya',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'status_siswa',
        'nama_wali',
'pekerjaan_wali',
'telepon_orangtua',
'tahun_masuk',
        
    ];

    // 🔥 RELASI KE KELAS
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function ekstrakurikuler()
{
    return $this->hasMany(Ekstrakurikuler::class);
}
public function kelulusan()
{
    return $this->hasOne(Kelulusan::class);
}
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

 
    protected $fillable = [

    // ======================
    // IDENTITAS
    // ======================
    'nama_siswa',
    'nipd',
    'nisn',
    'nik',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_lahir',
    'agama',
    'kewarganegaraan',
    'tingkat',
    'kelas_id',
    'tahun_masuk',
    'status_siswa',

    // ======================
    // TEMPAT TINGGAL
    // ======================
    'alamat',
    'jalan',
    'rt',
    'rw',
    'dusun',
    'desa',
    'kecamatan',
    'kabupaten',
    'provinsi',
    'kode_pos',
    'jenis_tinggal',
    'transportasi',
    'jarak_rumah',

    // ======================
    // ORANG TUA
    // ======================
    'nama_ayah',
    'nik_ayah',
    'tahun_lahir_ayah',
    'pendidikan_ayah',
    'pekerjaan_ayah',
    'penghasilan_ayah',

    'nama_ibu',
    'nik_ibu',
    'tahun_lahir_ibu',
    'pendidikan_ibu',
    'pekerjaan_ibu',
    'penghasilan_ibu',

    // ======================
    // WALI
    // ======================
    'nama_wali',
    'nik_wali',
    'tahun_lahir_wali',
    'pendidikan_wali',
    'pekerjaan_wali',
    'penghasilan_wali',

    // ======================
    // DATA PERIODIK
    // ======================
    'telepon_orangtua',
    'kk',
    'anak_ke',
    'jumlah_saudara',
    'tinggi_badan',
    'berat_badan',
    'lingkar_kepala',

    // ======================
    // DOKUMEN
    // ======================
    'no_akta',
    'no_registrasi_akta',
    'tanggal_kk',
    'email',
    'skhun',

    // ======================
    // PIP
    // ======================
    'penerima_kps',
    'no_kps',
    'kip',
    'no_kip',
    'nama_kip',
    'layak_pip',
    'alasan_layak',

    // ======================
    // BANK
    // ======================
    'bank',
    'rekening',
    'nama_rekening',

    // ======================
    // KOORDINAT
    // ======================
    'latitude',
    'longitude',

];

    // 🔥 RELASI KE KELAS
   
    public function ekstrakurikuler()
{
    return $this->hasMany(Ekstrakurikuler::class);
}
public function kelulusan()
{
    return $this->hasOne(Kelulusan::class);
}

public function anggotaKelas()
{
    return $this->hasMany(AnggotaKelas::class);
}
/*
|--------------------------------------------------------------------------
| KELAS
|--------------------------------------------------------------------------
*/

public function kelas()
{
    return $this->belongsToMany(
        Kelas::class,
        'anggota_kelas',
        'siswa_id',
        'kelas_id'
    );
}
public function kelasAktif()
{
    return $this->hasOne(
        AnggotaKelas::class,
        'siswa_id'
    )->latestOfMany();
}

public function ekstrakurikulers()
{
    return $this->hasMany(Ekstrakurikuler::class);
}

public function alumni()
{
    return $this->hasOne(
        Alumni::class
    );
}

}
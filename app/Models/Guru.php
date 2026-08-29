<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kelas;
use App\Models\JadwalPelajaran;

class Guru extends Model
{
    protected $fillable = [

        'user_id',

        'nip',
        'nuptk',
        'nik',

        'nama_guru',

        'jenis_kelamin',

        'tempat_lahir',
        'tanggal_lahir',

        'alamat',

        'no_hp',

        'email',

        'status_kepegawaian',

        'jenis_ptk',

        'jabatan_ptk',

        'jenis_pengajar',

        'status_guru',

        'kelas_id'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
|--------------------------------------------------------------------------
| KELAS
|--------------------------------------------------------------------------
*/

public function waliKelas()
{
    return $this->hasOne(
        Kelas::class,
        'wali_kelas_id'
    );
}

public function jadwals()
{
    return $this->hasMany(JadwalPelajaran::class);
}
public function kelas()
{
    return $this->belongsTo(Kelas::class);
}
}
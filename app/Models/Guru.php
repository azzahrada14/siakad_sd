<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nip',
        'nama_guru',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
    
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'wali_kelas_id');
    }

    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
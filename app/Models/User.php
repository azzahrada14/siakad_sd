<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [

        'name',
        'email',
        'password',
        'role'

    ];

    protected $hidden = [

        'password',
        'remember_token'

    ];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function isOperator()
    {
        return $this->role == 'operator';
    }

    public function isGuru()
    {
        return $this->role == 'guru';
    }

    public function isKepalaSekolah()
    {
        return $this->role == 'kepala_sekolah';
    }
}
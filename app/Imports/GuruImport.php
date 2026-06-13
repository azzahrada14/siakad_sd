<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] == 'nip') {
            return null;
        }

        $user = User::create([
            'name' => $row[1],
            'email' => $row[3],
            'password' => Hash::make('12345678'),
            'role' => 'guru'
        ]);

        return new Guru([
            'user_id' => $user->id,
            'nip' => $row[0],
            'nama_guru' => $row[1],
            'jenis_kelamin' => $row[2],
            'email' => $row[3],
        ]);
    }
}
<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class GuruExport implements FromCollection
{
    public function collection()
    {
        return Guru::select(
            'nip',
            'nama_guru',
            'jenis_kelamin',
            'email'
        )->get();
    }
}
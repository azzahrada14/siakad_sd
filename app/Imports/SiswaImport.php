<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    public function model(array $row)
    {
        return new Siswa([
            'nama_siswa' => $row[0],
            'nipd' => $row[1],
            'nisn' => $row[2],
            'jenis_kelamin' => $row[3],
            'kelas_id' => $row[4],
        ]);
    }
}
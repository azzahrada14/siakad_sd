<?php

namespace App\Imports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\ToModel;

class NilaiImport implements ToModel
{
    public function model(array $row)
    {
        $jumlah = $row[4] + $row[5] + $row[6];
        $rataRata = $jumlah / 3;

        return new Nilai([
            'siswa_id' => $row[0],
            'mapel_id' => $row[1],
            'tahun_ajaran_id' => $row[2],
            'semester' => $row[3],

            'tugas' => $row[4],
            'uts' => $row[5],
            'uas' => $row[6],

            'jumlah' => $jumlah,
            'rata_rata' => $rataRata,
            'nilai_akhir' => $rataRata
        ]);
    }
}
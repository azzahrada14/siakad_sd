<?php

namespace App\Imports;

use App\Models\Mapel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapelImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            if (empty($row['kode_mapel'])) {
                continue;
            }

            if (Mapel::where(
                'kode_mapel',
                $row['kode_mapel']
            )->exists()) {

                continue;

            }

            Mapel::create([

                'kode_mapel' => trim($row['kode_mapel']),

                'nama_mapel' => trim($row['nama_mata_pelajaran']),

                'kelompok' => trim($row['kelompok']),

                'kkm' => $row['kkm'],

                'status' => 'Aktif'

            ]);

        }
    }
}
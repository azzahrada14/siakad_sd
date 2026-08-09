<?php

namespace App\Imports;

use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TahunAjaranImport implements
    ToModel,
    WithHeadingRow
{
    public function model(array $row)
    {
        return new TahunAjaran([

            'tahun_ajaran'    => $row['tahun_ajaran'],

            'semester'        => $row['semester'],

            'tanggal_mulai'   => $row['tanggal_mulai'],

            'tanggal_selesai' => $row['tanggal_selesai'],

            'status'          => $row['status'] ?? 'Nonaktif'

        ]);
    }
}
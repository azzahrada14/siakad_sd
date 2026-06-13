<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;

class MapelExport implements FromCollection
{
    public function collection()
    {
        return Mapel::select(
            'kode_mapel',
            'nama_mapel'
        )->get();
    }
}
<?php

namespace App\Exports;

use App\Models\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MapelExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected $no = 1;

    public function collection()
    {
        return Mapel::orderBy('nama_mapel')->get();
    }

    public function headings(): array
    {
        return [

            'No',

            'Kode Mapel',

            'Nama Mata Pelajaran',

            'Kelompok',

            'KKM',

            'Status'

        ];
    }

    public function map($mapel): array
    {
        return [

            $this->no++,

            $mapel->kode_mapel,

            $mapel->nama_mapel,

            $mapel->kelompok,

            $mapel->kkm,

            $mapel->status

        ];
    }
}
<?php

namespace App\Exports;

use App\Models\TahunAjaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TahunAjaranExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected $no = 1;

    public function collection()
    {
        return TahunAjaran::orderByDesc('tahun_ajaran')->get();
    }

    public function headings(): array
    {
        return [

            'No',

            'Tahun Ajaran',

            'Semester',

            'Tanggal Mulai',

            'Tanggal Selesai',

            'Status'

        ];
    }

    public function map($item): array
    {
        return [

            $this->no++,

            $item->tahun_ajaran,

            $item->semester,

            $item->tanggal_mulai,

            $item->tanggal_selesai,

            $item->status

        ];
    }
}
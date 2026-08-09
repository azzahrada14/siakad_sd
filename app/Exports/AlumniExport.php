<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumniExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Tanggal Lulus',
            'Nomor Ijazah',
            'Status',
        ];
    }

    public function array(): array
    {
        return Alumni::with('siswa')
            ->get()
            ->map(function ($item) {
                return [
                    $item->siswa->nisn,
                    $item->siswa->nama_siswa,
                    $item->tanggal_lulus,
                    $item->nomor_ijazah,
                    $item->status,
                ];
            })
            ->toArray();
    }
}
<?php

namespace App\Exports;

use App\Models\Kelulusan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelulusanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kelulusan::with([
            'siswa.kelas',
            'tahunAjaran'
        ])
        ->get()
        ->map(function ($item) {

            return [

                'NISN'           => $item->siswa->nisn,

                'Nama Siswa'     => $item->siswa->nama_siswa,

                'Kelas'          => $item->siswa->kelas->nama_kelas,

                'Tahun Ajaran'   => $item->tahunAjaran->tahun_ajaran,

                'Status'         => $item->status,

            ];

        });

    }

    public function headings(): array
    {
        return [

            'NISN',

            'Nama Siswa',

            'Kelas',

            'Tahun Ajaran',

            'Status',

        ];
    }
}
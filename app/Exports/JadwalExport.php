<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Jadwal::with(
            'tahunAjaran',
            'kelas',
            'guru',
            'mapel'
        )->get()->map(function ($item) {

            return [

                'Hari'           => $item->hari,

                'Jam Mulai'      => $item->jam_mulai,

                'Jam Selesai'    => $item->jam_selesai,

                'Kelas'          => $item->kelas->nama_kelas,

                'Mata Pelajaran' => $item->mapel->nama_mapel,

                'Guru'           => $item->guru->nama_guru,

                'Tahun Ajaran'   => $item->tahunAjaran->tahun_ajaran,

            ];

        });
    }

    public function headings(): array
    {
        return [

            'Hari',

            'Jam Mulai',

            'Jam Selesai',

            'Kelas',

            'Mata Pelajaran',

            'Guru',

            'Tahun Ajaran',

        ];
    }
}
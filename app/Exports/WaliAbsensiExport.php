<?php

namespace App\Exports;

use App\Models\Absensi;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WaliAbsensiExport implements
    FromCollection,
    WithHeadings
{
    protected $kelas;

    protected $bulan;

    protected $tahun;

    protected $mapel;

    public function __construct(
        $kelas,
        $bulan,
        $tahun,
        $mapel = null
    ){

        $this->kelas = $kelas;

        $this->bulan = $bulan;

        $this->tahun = $tahun;

        $this->mapel = $mapel;

    }

    public function collection()
    {

        $query = Absensi::with([

                'siswa',

                'mapel'

            ])

            ->where(

                'kelas_id',

                $this->kelas

            )

            ->whereMonth(

                'tanggal',

                $this->bulan

            )

            ->whereYear(

                'tanggal',

                $this->tahun

            );

        if($this->mapel){

            $query->where(

                'mapel_id',

                $this->mapel

            );

        }

        return $query->get()->map(function($item){

            return [

                $item->tanggal,

                $item->siswa->nipd,

                $item->siswa->nama_siswa,

                $item->mapel->nama_mapel ?? '-',

                ucfirst($item->status)

            ];

        });

    }

    public function headings():array
    {

        return [

            'Tanggal',

            'NIPD',

            'Nama Siswa',

            'Mata Pelajaran',

            'Status'

        ];

    }

}
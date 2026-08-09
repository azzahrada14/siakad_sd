<?php

namespace App\Exports;

use App\Models\JadwalPelajaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalExport implements FromCollection, WithHeadings
{
    protected $tahun;
    protected $kelas;
    protected $hari;
    protected $status;

    public function __construct($tahun, $kelas, $hari, $status)
    {
        $this->tahun = $tahun;
        $this->kelas = $kelas;
        $this->hari = $hari;
        $this->status = $status;
    }

    public function collection()
    {
        $query = JadwalPelajaran::with([
            'kelas',
            'guru',
            'mapel',
            'tahunAjaran'
        ]);

        if ($this->tahun) {
            $query->where('tahun_ajaran_id', $this->tahun);
        }

        if ($this->kelas) {
            $query->where('kelas_id', $this->kelas);
        }

        if ($this->hari) {
            $query->where('hari', $this->hari);
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        return $query
            ->orderBy('kelas_id')
            ->orderBy('hari')
            ->orderBy('jam_ke')
            ->get()
            ->map(function ($item) {

                return [

                    $item->kelas->nama_kelas,

                    $item->tahunAjaran->tahun_ajaran,

                    $item->hari,

                    $item->jam_ke,

                    $item->jenis_jadwal,

                    $item->mapel->nama_mapel,

                    $item->guru->nama_guru,

                    $item->status,

                ];

            });
    }

    public function headings(): array
    {
        return [

            'Kelas',

            'Tahun Ajaran',

            'Hari',

            'Jam Ke',

            'Jenis Jadwal',

            'Mata Pelajaran',

            'Guru',

            'Status',

        ];
    }
}
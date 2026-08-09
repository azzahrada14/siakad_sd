<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GuruExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $no = 1;

    public function collection()
    {
        return Guru::orderBy('nama_guru')->get();
    }

    public function headings(): array
    {
        return [

            'No',

            'Nama Guru',

            'NIP',

            'NUPTK',

            'NIK',

            'Jenis Kelamin',

            'Tempat Lahir',

            'Tanggal Lahir',

            'Status PTK',

            'Jenis PTK',

            'Jabatan PTK',

            'Jenis Pengajar',

            'Status Guru',

            'Email',

            'No HP'

        ];
    }

    public function map($guru): array
    {
        return [

            $this->no++,

            $guru->nama_guru,

            $guru->nip,

            $guru->nuptk,

            $guru->nik,

            $guru->jenis_kelamin == 'L'
                ? 'Laki-laki'
                : 'Perempuan',

            $guru->tempat_lahir,

            $guru->tanggal_lahir,

            $guru->status_kepegawaian,

            $guru->jenis_ptk,

            $guru->jabatan_ptk,

            $guru->jenis_pengajar,

            $guru->status_guru,

            $guru->email,

            $guru->no_hp

        ];
    }
}
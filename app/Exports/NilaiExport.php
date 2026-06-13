<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiExport implements FromCollection
{
    public function collection()
    {
        return Nilai::select(
            'siswa_id',
            'mapel_id',
            'semester',
            'tugas',
            'uts',
            'uas',
            'nilai_akhir'
        )->get();
    }
}
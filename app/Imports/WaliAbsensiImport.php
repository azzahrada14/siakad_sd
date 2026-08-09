<?php

namespace App\Imports;

use App\Models\Absensi;

use App\Models\Siswa;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

class WaliAbsensiImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        foreach($rows->skip(1) as $row){

            $siswa = Siswa::where(

                'nipd',

                $row[1]

            )->first();

            if(!$siswa){

                continue;

            }

            Absensi::updateOrCreate(

                [

                    'siswa_id'=>$siswa->id,

                    'tanggal'=>$row[0]

                ],

                [

                    'status'=>strtolower($row[4])

                ]

            );

        }

    }

}
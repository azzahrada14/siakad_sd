<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\Mapel;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

class WaliNilaiImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        $mapels=Mapel::orderBy(

            'nama_mapel'

        )->get();

        foreach(

            $rows->skip(1)

            as $row

        ){

            $siswa=Siswa::where(

                'nipd',

                $row[0]

            )->first();

            if(!$siswa){

                continue;

            }

            foreach($mapels as $index=>$mapel){

                $nilai=$row[$index+2] ?? 0;

                if($nilai==''){

                    continue;

                }

                Nilai::updateOrCreate(

                    [

                        'siswa_id'=>$siswa->id,

                        'mapel_id'=>$mapel->id

                    ],

                    [

                        'nilai_akhir'=>$nilai

                    ]

                );

            }

        }

    }

}
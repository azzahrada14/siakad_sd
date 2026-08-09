<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JamPelajaran;

class JamPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        JamPelajaran::truncate();

        $jam = [

            ['06:30','07:05',35],
            ['07:05','07:40',35],
            ['07:40','08:15',35],
            ['08:15','08:50',35],
            ['09:05','09:40',35],
            ['09:40','10:15',35],
            ['10:15','10:50',35],
            ['10:50','11:25',35],
            ['11:40','12:15',35],

        ];

        for($tingkat=1;$tingkat<=6;$tingkat++){

            foreach($jam as $i=>$row){

                JamPelajaran::create([

                    'tingkat'=>$tingkat,

                    'jam_ke'=>$i+1,

                    'jam_mulai'=>$row[0],

                    'jam_selesai'=>$row[1],

                    'durasi'=>$row[2]

                ]);

            }

        }

    }
}
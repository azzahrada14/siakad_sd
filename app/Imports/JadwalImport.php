<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\JamPelajaran;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\TahunAjaran;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JadwalImport implements
ToCollection,
WithHeadingRow
{

    public function collection(Collection $rows)
    {

        foreach($rows as $row){

            $tahun=TahunAjaran::where(

                'tahun_ajaran',

                $row['tahun_ajaran']

            )->first();

            $kelas=Kelas::where(

                'nama_kelas',

                $row['kelas']

            )->first();

            $guru=Guru::where(

                'nama_guru',

                $row['guru']

            )->first();

            $mapel=Mapel::where(

                'nama_mapel',

                $row['mapel']

            )->first();

            $jam=JamPelajaran::where(

                'jam_ke',

                $row['jam_ke']

            )->first();

            if(

                !$tahun ||

                !$kelas ||

                !$guru ||

                !$mapel ||

                !$jam

            ){

                continue;

            }

            Jadwal::updateOrCreate(

                [

                    'tahun_ajaran_id'=>$tahun->id,

                    'kelas_id'=>$kelas->id,

                    'hari'=>$row['hari'],

                    'jam_ke'=>$row['jam_ke']

                ],

                [

                    'guru_id'=>$guru->id,

                    'mapel_id'=>$mapel->id,

                    'jam_mulai'=>$jam->jam_mulai,

                    'jam_selesai'=>$jam->jam_selesai

                ]

            );

        }

    }

}
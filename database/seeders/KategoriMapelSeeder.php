<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriMapelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_mapels')->insert([

            [
                'kode_kategori' => 'KD01',
                'nama_kategori' => 'Mapel Wajib',
                'keterangan'    => 'Berlaku untuk kelas 1–6',
                'status'        => 'Aktif',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'kode_kategori' => 'KD02',
                'nama_kategori' => 'Mapel Lanjutan',
                'keterangan'    => 'Berlaku mulai kelas 3–6',
                'status'        => 'Aktif',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'kode_kategori' => 'KD03',
                'nama_kategori' => 'Program Khusus',
                'keterangan'    => 'KKA dan Anyaman, memiliki jadwal dan nilai rapor tetapi tidak dihitung sebagai JP wajib',
                'status'        => 'Aktif',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ]);
    }
}
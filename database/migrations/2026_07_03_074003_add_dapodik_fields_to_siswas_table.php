<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->string('nik')->nullable()->after('nisn');

            $table->string('kk')->nullable();

            $table->string('kewarganegaraan')->nullable();

            $table->string('anak_ke')->nullable();

            $table->string('jumlah_saudara')->nullable();

            $table->string('tinggi_badan')->nullable();

            $table->string('berat_badan')->nullable();

            $table->string('lingkar_kepala')->nullable();

            $table->string('jarak_rumah')->nullable();

            $table->string('transportasi')->nullable();

            $table->string('jalan')->nullable();

            $table->string('rt')->nullable();

            $table->string('rw')->nullable();

            $table->string('dusun')->nullable();

            $table->string('desa')->nullable();

            $table->string('kecamatan')->nullable();

            $table->string('kabupaten')->nullable();

            $table->string('provinsi')->nullable();

            $table->string('kode_pos')->nullable();

            $table->string('nik_ayah')->nullable();

            $table->string('pendidikan_ayah')->nullable();

            $table->string('penghasilan_ayah')->nullable();

            $table->string('nik_ibu')->nullable();

            $table->string('pendidikan_ibu')->nullable();

            $table->string('penghasilan_ibu')->nullable();

            $table->string('nik_wali')->nullable();

            $table->string('pendidikan_wali')->nullable();

            $table->string('penghasilan_wali')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->dropColumn([

                'nik',
                'kk',
                'kewarganegaraan',
                'anak_ke',
                'jumlah_saudara',
                'tinggi_badan',
                'berat_badan',
                'lingkar_kepala',
                'jarak_rumah',
                'transportasi',
                'jalan',
                'rt',
                'rw',
                'dusun',
                'desa',
                'kecamatan',
                'kabupaten',
                'provinsi',
                'kode_pos',
                'nik_ayah',
                'pendidikan_ayah',
                'penghasilan_ayah',
                'nik_ibu',
                'pendidikan_ibu',
                'penghasilan_ibu',
                'nik_wali',
                'pendidikan_wali',
                'penghasilan_wali'

            ]);

        });
    }
};
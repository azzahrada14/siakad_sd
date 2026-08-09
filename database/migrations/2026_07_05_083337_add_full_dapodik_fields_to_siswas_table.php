<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            // IDENTITAS
            $table->string('jenis_tinggal')->nullable()->after('kode_pos');
            $table->string('email')->nullable();
            $table->string('skhun')->nullable();
            $table->string('penerima_kps')->nullable();
            $table->string('no_kps')->nullable();

            // AYAH
            $table->string('tahun_lahir_ayah')->nullable();

            // IBU
            $table->string('tahun_lahir_ibu')->nullable();

            // WALI
            $table->string('tahun_lahir_wali')->nullable();

            // DOKUMEN
            $table->string('no_akta')->nullable();
            $table->string('bank')->nullable();
            $table->string('rekening')->nullable();
            $table->string('nama_rekening')->nullable();

            // BANTUAN
            $table->string('kip')->nullable();
            $table->string('no_kip')->nullable();
            $table->string('nama_kip')->nullable();
            $table->string('layak_pip')->nullable();
            $table->string('alasan_layak')->nullable();

            // KOORDINAT
            $table->decimal('latitude',10,6)->nullable();
            $table->decimal('longitude',10,6)->nullable();

            // DATA KK
            $table->date('tanggal_kk')->nullable();
            $table->string('no_registrasi_akta')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            $table->dropColumn([

                'jenis_tinggal',
                'email',
                'skhun',
                'penerima_kps',
                'no_kps',

                'tahun_lahir_ayah',
                'tahun_lahir_ibu',
                'tahun_lahir_wali',

                'no_akta',

                'bank',
                'rekening',
                'nama_rekening',

                'kip',
                'no_kip',
                'nama_kip',

                'layak_pip',
                'alasan_layak',

                'latitude',
                'longitude',

                'tanggal_kk',
                'no_registrasi_akta'

            ]);

        });
    }
};
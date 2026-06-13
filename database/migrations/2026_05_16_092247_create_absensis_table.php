<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('siswa_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('kelas_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('tahun_ajaran_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->date('tanggal');

            $table->string('semester');

            $table->enum('status', [

                'hadir',
                'izin',
                'sakit',
                'alfa'

            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
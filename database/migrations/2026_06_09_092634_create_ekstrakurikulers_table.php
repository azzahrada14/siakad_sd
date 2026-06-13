<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('ekstrakurikulers', function (Blueprint $table) {

    $table->id();

    $table->foreignId('siswa_id')
          ->constrained('siswas')
          ->cascadeOnDelete();

    $table->foreignId('tahun_ajaran_id')
          ->constrained('tahun_ajarans')
          ->cascadeOnDelete();

    $table->enum('semester', [
        'Ganjil',
        'Genap'
    ]);

    $table->string('nama_kegiatan');

    $table->string('keterangan');

    $table->timestamps();


});
    }
};

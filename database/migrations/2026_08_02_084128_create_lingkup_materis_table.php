<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lingkup_materis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mapel_id')
                ->constrained('mapels')
                ->cascadeOnDelete();

            $table->foreignId('tahun_ajaran_id')
                ->constrained('tahun_ajarans')
                ->cascadeOnDelete();

            $table->string('kode_lm',20);

            $table->string('nama_lm');

            $table->enum('semester',[
                'Ganjil',
                'Genap'
            ]);

            $table->integer('urutan')->default(1);

            $table->enum('status',[
                'Aktif',
                'Nonaktif'
            ])->default('Aktif');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lingkup_materis');
    }
};
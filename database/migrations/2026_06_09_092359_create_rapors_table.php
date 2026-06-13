<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapors', function (Blueprint $table) {

            $table->id();

            $table->foreignId('siswa_id')
                ->constrained('siswas')
                ->cascadeOnDelete();

            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->cascadeOnDelete();

            $table->foreignId('tahun_ajaran_id')
                ->constrained('tahun_ajarans')
                ->cascadeOnDelete();

            $table->enum('semester',[
                'Ganjil',
                'Genap'
            ]);

            $table->decimal('rata_rata',5,2)->default(0);

            $table->integer('ranking')->nullable();

            $table->integer('hadir')->default(0);

            $table->integer('izin')->default(0);

            $table->integer('sakit')->default(0);

            $table->integer('alfa')->default(0);

            $table->text('catatan')->nullable();

          $table->string('semester_ke')->nullable();
$table->string('naik_kelas')->nullable();
$table->string('tinggal_kelas')->nullable();
          

            $table->boolean('is_generate')
                ->default(false);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};
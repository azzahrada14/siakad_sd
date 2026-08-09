<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tahun_ajaran_id')->constrained()->cascadeOnDelete();

            $table->foreignId('kelas_id')->constrained()->cascadeOnDelete();

            $table->foreignId('mapel_id')->constrained()->cascadeOnDelete();

            $table->foreignId('guru_id')->nullable()->constrained()->nullOnDelete();

            $table->enum('hari',[
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat'
            ]);

            $table->tinyInteger('jp');

            $table->enum('status',[
                'Aktif',
                'Nonaktif'
            ])->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
};

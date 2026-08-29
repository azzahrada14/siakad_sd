<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('master_mapels')) {

            Schema::create('master_mapels', function (Blueprint $table) {

                $table->id();

                $table->string('kode_mapel', 20)->unique();

                $table->string('nama_mapel');

                $table->foreignId('kategori_mapel_id')
                    ->constrained('kategori_mapels')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();

                $table->string('jenis');

                $table->string('kelompok');

                $table->enum('status', [
                    'Aktif',
                    'Tidak Aktif'
                ])->default('Aktif');

                $table->timestamps();
            });

        }
    }

    public function down(): void
    {
        Schema::dropIfExists('master_mapels');
    }
};
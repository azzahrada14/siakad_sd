<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tujuan_pembelajarans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('lingkup_materi_id')
                ->constrained('lingkup_materis')
                ->cascadeOnDelete();

            $table->string('kode_tp',20);

            $table->text('deskripsi');

            $table->integer('jumlah_jp');

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
        Schema::dropIfExists('tujuan_pembelajarans');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapor_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('rapor_id')
                ->constrained('rapors')
                ->cascadeOnDelete();

            $table->foreignId('mapel_id')
                ->constrained('mapels')
                ->cascadeOnDelete();

            $table->decimal('nilai_akhir',5,2)
                ->default(0);

            $table->text('capaian_kompetensi')
                ->nullable();

            $table->timestamps();
            

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapor_details');
    }
};
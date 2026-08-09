<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_asts_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('nilai_id')
                  ->constrained('nilais')
                  ->cascadeOnDelete();

            $table->foreignId('lingkup_materi_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->decimal('nilai',5,2)->default(0);

            $table->timestamps();

            $table->unique(
                ['nilai_id','lingkup_materi_id'],
                'asts_detail_unique'
            );

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_asts_details');
    }
};

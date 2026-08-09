<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_tp', function (Blueprint $table) {

            $table->id();

            $table->foreignId('nilai_id')
                ->constrained('nilais')
                ->cascadeOnDelete();

            $table->foreignId('tp_id')
                ->constrained('tujuan_pembelajarans')
                ->cascadeOnDelete();

            $table->decimal('nilai',5,2)->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_tp');
    }
};
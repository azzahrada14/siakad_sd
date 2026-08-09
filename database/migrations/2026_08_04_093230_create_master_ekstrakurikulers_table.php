<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_ekstrakurikulers', function (Blueprint $table) {

            $table->id();

            $table->string('nama_ekstrakurikuler');

            $table->string('pembina')->nullable();

            $table->boolean('wajib')->default(false);

            $table->enum('status', [
                'Aktif',
                'Nonaktif'
            ])->default('Aktif');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_ekstrakurikulers');
    }
};
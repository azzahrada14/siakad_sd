<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mapels', function (Blueprint $table) {

            $table->enum('kelompok', [
                'Wajib',
                'Muatan Lokal'
            ])->default('Wajib')->after('nama_mapel');

            $table->integer('kkm')
                ->default(75)
                ->after('kelompok');

            $table->enum('status', [
                'Aktif',
                'Nonaktif'
            ])->default('Aktif')->after('kkm');

        });
    }

    public function down(): void
    {
        Schema::table('mapels', function (Blueprint $table) {

            $table->dropColumn([
                'kelompok',
                'kkm',
                'status'
            ]);

        });
    }
};
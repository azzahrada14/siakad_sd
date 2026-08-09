<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {

            $table->foreignId('master_ekstrakurikuler_id')
                ->nullable()
                ->after('siswa_id')
                ->constrained('master_ekstrakurikulers')
                ->cascadeOnDelete();

            $table->enum('nilai', [
                'A',
                'B',
                'C',
                'D'
            ])->nullable()->after('semester');

            $table->text('deskripsi')
                ->nullable()
                ->after('nilai');

            $table->enum('status', [
                'Aktif',
                'Nonaktif'
            ])
            ->default('Aktif')
            ->after('deskripsi');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {

            $table->dropForeign(['master_ekstrakurikuler_id']);

            $table->dropColumn([
                'master_ekstrakurikuler_id',
                'nilai',
                'deskripsi',
                'status'
            ]);

        });
    }
};
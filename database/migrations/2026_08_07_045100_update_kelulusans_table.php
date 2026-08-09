<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kelulusans', function (Blueprint $table) {

            // tanggal kelulusan
            $table->date('tanggal_kelulusan')
                ->after('tahun_ajaran_id');

            // ubah status
            $table->enum('status', [
                'Lulus',
                'Belum Lulus'
            ])->default('Belum Lulus')->change();

            // alasan kelulusan / belum lulus
            $table->text('keterangan')
                ->nullable()
                ->after('status');

        });
    }

    public function down(): void
    {
        Schema::table('kelulusans', function (Blueprint $table) {

            $table->dropColumn([
                'tanggal_kelulusan',
                'keterangan'
            ]);

            $table->enum('status', [
                'Lulus',
                'Tidak Lulus'
            ])->change();

        });
    }
};
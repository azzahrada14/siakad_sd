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
    Schema::table('siswas', function ($table) {

        $table->string('nama_wali')->nullable();

        $table->string('pekerjaan_wali')->nullable();

        $table->string('telepon_orangtua')->nullable();

        $table->year('tahun_masuk')->nullable();

    });
}

public function down(): void
{
    Schema::table('siswas', function ($table) {

        $table->dropColumn([
            'nama_wali',
            'pekerjaan_wali',
            'telepon_orangtua',
            'tahun_masuk'
        ]);

    });
}
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

    $table->string('nipd')->nullable();

    $table->string('tempat_lahir')->nullable();

    $table->date('tanggal_lahir')->nullable();

    $table->string('agama')->nullable();


    $table->string('nama_ayah')->nullable();

    $table->string('nama_ibu')->nullable();

    $table->string('pekerjaan_ayah')->nullable();

    $table->string('pekerjaan_ibu')->nullable();

    $table->string('status_siswa')->default('Aktif');

});
    }

   public function down(): void
{
    Schema::table('siswas', function (Blueprint $table) {

        $table->dropColumn([
            'nipd',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'nama_ayah',
            'nama_ibu',
            'pekerjaan_ayah',
            'pekerjaan_ibu',
            'status_siswa'
        ]);

    });
}
};
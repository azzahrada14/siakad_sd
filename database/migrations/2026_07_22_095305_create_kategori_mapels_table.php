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
    Schema::create('kategori_mapels', function (Blueprint $table) {

    $table->id();

    $table->string('kode_kategori',10)->unique();

    $table->string('nama_kategori',50);

    $table->string('keterangan');

    $table->enum('status',['Aktif','Nonaktif'])->default('Aktif');

    $table->timestamps();

});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_mapels');
    }
};

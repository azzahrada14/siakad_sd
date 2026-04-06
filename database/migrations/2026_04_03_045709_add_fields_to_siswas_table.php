<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('nama_siswa')->after('nis');
            $table->enum('jenis_kelamin', ['L', 'P'])->after('nama_siswa');
            $table->unsignedBigInteger('kelas_id')->after('jenis_kelamin');
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn(['nama_siswa', 'jenis_kelamin', 'kelas_id']);
        });
    }
};
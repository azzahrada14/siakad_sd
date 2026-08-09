<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('anggota_kelas', function (Blueprint $table) {

            $table->foreignId('kelas_tujuan_id')
                ->nullable()
                ->after('kelas_id')
                ->constrained('kelas')
                ->nullOnDelete();

        });
    }

    public function down()
    {
        Schema::table('anggota_kelas', function (Blueprint $table) {

            $table->dropForeign(['kelas_tujuan_id']);
            $table->dropColumn('kelas_tujuan_id');

        });
    }
};

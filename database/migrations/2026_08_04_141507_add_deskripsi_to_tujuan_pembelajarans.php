<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tujuan_pembelajarans', function (Blueprint $table) {

            $table->longText('deskripsi_tinggi')
                ->nullable()
                ->after('deskripsi');

            $table->longText('deskripsi_rendah')
                ->nullable()
                ->after('deskripsi_tinggi');

        });
    }

    public function down()
    {
        Schema::table('tujuan_pembelajarans', function (Blueprint $table) {

            $table->dropColumn([
                'deskripsi_tinggi',
                'deskripsi_rendah'
            ]);

        });
    }

};

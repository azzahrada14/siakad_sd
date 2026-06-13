<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('rapor_details', function (Blueprint $table) {

        $table->longText('capaian_pengetahuan')->nullable();

        $table->longText('capaian_keterampilan')->nullable();

    });
}

public function down()
{
    Schema::table('rapor_details', function (Blueprint $table) {

        $table->dropColumn([
            'capaian_pengetahuan',
            'capaian_keterampilan'
        ]);

    });
}
};

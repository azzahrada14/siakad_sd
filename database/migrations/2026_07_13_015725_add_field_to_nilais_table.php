<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->integer('jumlah')->nullable();

            $table->double('rata_rata')->nullable();

        });
    }

    public function down()
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn([
                'jumlah',
                'rata_rata',
            ]);

        });
    }
};
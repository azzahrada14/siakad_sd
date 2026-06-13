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
    Schema::table('nilais', function ($table) {
        $table->text('deskripsi')->nullable();
    });
}

public function down()
{
    Schema::table('nilais', function ($table) {
        $table->dropColumn('deskripsi');
    });
}
};

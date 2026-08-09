<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->decimal(
                'asat',
                5,
                2
            )
            ->default(0)
            ->after('asas');

        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn('asat');

        });
    }
};
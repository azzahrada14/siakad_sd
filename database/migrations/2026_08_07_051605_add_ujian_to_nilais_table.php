<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->decimal('ujian_tulis', 5, 2)
                  ->nullable()
                  ->after('asat');

            $table->decimal('ujian_lisan', 5, 2)
                  ->nullable()
                  ->after('ujian_tulis');

        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn([
                'ujian_tulis',
                'ujian_lisan'
            ]);

        });
    }
};
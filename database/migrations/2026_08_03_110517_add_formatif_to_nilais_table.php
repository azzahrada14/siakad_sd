<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->decimal('rata_formatif',5,2)
                ->nullable()
                ->after('semester');

            $table->decimal('asts',5,2)
                ->nullable()
                ->after('rata_formatif');

            $table->decimal('asas',5,2)
                ->nullable()
                ->after('asts');

            $table->decimal('rata_akhir',5,2)
                ->nullable()
                ->after('asas');

        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn([
                'rata_formatif',
                'asts',
                'asas',
                'rata_akhir'
            ]);

        });
    }
};
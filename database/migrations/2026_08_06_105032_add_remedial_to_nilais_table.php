<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->decimal('nilai_remedial',5,2)
                  ->nullable()
                  ->after('nilai_akhir');

            $table->date('tanggal_remedial')
                  ->nullable()
                  ->after('nilai_remedial');

        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn([
                'nilai_remedial',
                'tanggal_remedial'
            ]);

        });
    }
};


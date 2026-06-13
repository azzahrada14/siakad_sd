<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rapors', function (Blueprint $table) {

            $table->string('semester_ke')->nullable()->after('keputusan');

            $table->string('naik_kelas')->nullable()->after('semester_ke');

            $table->string('tinggal_kelas')->nullable()->after('naik_kelas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rapors', function (Blueprint $table) {

            $table->dropColumn([
                'semester_ke',
                'naik_kelas',
                'tinggal_kelas'
            ]);

        });
    }
};
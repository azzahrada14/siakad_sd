<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            if (!Schema::hasColumn('siswas', 'status_siswa')) {

                $table->enum('status_siswa', [
                    'Aktif',
                    'Mutasi',
                    'Lulus'
                ])->default('Aktif');

            }

        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {

            if (Schema::hasColumn('siswas', 'status_siswa')) {

                $table->dropColumn('status_siswa');

            }

        });
    }
};
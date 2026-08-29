<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mapels', function (Blueprint $table) {

            $table->foreignId('master_mapel_id')
                ->nullable()
                ->after('id')
                ->constrained('master_mapels')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('mapels', function (Blueprint $table) {

            $table->dropForeign([
                'master_mapel_id'
            ]);

            $table->dropColumn('master_mapel_id');

        });
    }
};
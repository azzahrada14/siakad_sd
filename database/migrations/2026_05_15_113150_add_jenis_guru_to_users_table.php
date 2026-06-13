<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('jenis_guru')
                ->nullable();

            $table->foreignId('mapel_id')
                ->nullable()
                ->constrained('mapels')
                ->onDelete('set null');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['mapel_id']);

            $table->dropColumn([
                'jenis_guru',
                'mapel_id'
            ]);

        });
    }
};
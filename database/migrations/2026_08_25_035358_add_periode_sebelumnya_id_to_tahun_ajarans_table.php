<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tahun_ajarans', function (Blueprint $table) {
            $table->foreignId('periode_sebelumnya_id')
                ->nullable()
                ->after('status')
                ->constrained('tahun_ajarans')
                ->nullOnDelete();
        });

        /*
        |--------------------------------------------------------------------------
        | Hubungan periode yang sudah ada
        |--------------------------------------------------------------------------
        |
        | 2026/2027 Genap (ID 2)
        | sebelumnya adalah 2026/2027 Ganjil (ID 3)
        |
        | 2027/2028 Ganjil (ID 4)
        | sebelumnya adalah 2026/2027 Genap (ID 2)
        |
        */

        DB::table('tahun_ajarans')
            ->where('id', 2)
            ->update([
                'periode_sebelumnya_id' => 3
            ]);

        DB::table('tahun_ajarans')
            ->where('id', 4)
            ->update([
                'periode_sebelumnya_id' => 2
            ]);
    }

    public function down(): void
    {
        Schema::table('tahun_ajarans', function (Blueprint $table) {
            $table->dropForeign(['periode_sebelumnya_id']);
            $table->dropColumn('periode_sebelumnya_id');
        });
    }
};
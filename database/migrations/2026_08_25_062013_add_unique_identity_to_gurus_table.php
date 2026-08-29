<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Unique index pada nip, nuptk, dan nik
        // sudah tersedia di tabel gurus.
    }

    public function down(): void
    {
        // Tidak ada perubahan yang dibatalkan.
    }
};
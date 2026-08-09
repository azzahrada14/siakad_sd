<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {

            $table->string('nuptk')->nullable()->after('nip');

            $table->string('nik',20)->nullable()->after('nuptk');

            $table->string('email')->nullable()->after('no_hp');

            $table->string('status_kepegawaian')->nullable()->after('email');

            $table->string('jenis_ptk')->nullable()->after('status_kepegawaian');

            $table->string('jabatan_ptk')->nullable()->after('jenis_ptk');

            $table->enum('jenis_pengajar',[
                'Wali Kelas',
                'Guru PAI',
                'Guru PJOK',
                'Operator',
                'Kepala Sekolah'
                
            ])->default('Wali Kelas')->after('jabatan_ptk');

            $table->enum('status_guru',[
                'Aktif',
                'Mutasi Keluar',
                'Pensiun'
            ])->default('Aktif')->after('jenis_pengajar');

        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {

            $table->dropColumn([

                'nuptk',
                'nik',
                'email',
                'status_kepegawaian',
                'jenis_ptk',
                'jabatan_ptk',
                'jenis_pengajar',
                'status_guru'

            ]);

        });
    }
};
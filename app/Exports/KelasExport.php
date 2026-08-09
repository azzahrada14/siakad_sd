<?php

namespace App\Exports;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class KelasExport implements FromCollection
{
    protected $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        $tahun = TahunAjaran::where('status','Aktif')->first();

        $this->kelas->load([
            'waliKelas',
            'anggotaKelas.siswa'
        ]);

        $rows = collect();

        // Header
        $rows->push(['SD NEGERI CIMANAHAYU']);
        $rows->push(['DAFTAR SISWA KELAS']);
        $rows->push([]);
        $rows->push(['Kelas', $this->kelas->nama_kelas]);
        $rows->push(['Wali Kelas', optional($this->kelas->waliKelas)->nama_guru]);
        $rows->push(['Tahun Ajaran', $tahun->tahun_ajaran]);
        $rows->push(['Semester', $tahun->semester]);
        $rows->push([]);

        // Judul tabel
        $rows->push([
            'No',
            'NIPD',
            'NISN',
            'Nama Siswa',
            'Jenis Kelamin'
        ]);

        foreach ($this->kelas->anggotaKelas->sortBy('siswa.nama_siswa') as $i => $anggota) {

            $rows->push([
                $i + 1,
                $anggota->siswa->nipd,
                $anggota->siswa->nisn,
                $anggota->siswa->nama_siswa,
                $anggota->siswa->jenis_kelamin,
            ]);
        }

        $rows->push([]);
        $rows->push([
            'Jumlah Siswa',
            $this->kelas->anggotaKelas->count()
        ]);

        return $rows;
    }
}
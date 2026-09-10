<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class GuruImport implements ToCollection
{
    public int $baru = 0;
    public int $diperbarui = 0;
    public int $dihapus = 0;

    public function collection(Collection $rows)
    {
        /*
        |--------------------------------------------------------------------------
        | CARI HEADER OTOMATIS
        |--------------------------------------------------------------------------
        */

        $headerIndex = null;
        $header = [];

        foreach ($rows as $index => $row) {

            $data = $row->toArray();

            $normalized = array_map(function ($value) {
                return strtolower(trim((string) $value));
            }, $data);

            if (
                in_array('nama', $normalized) &&
                in_array('nuptk', $normalized) &&
                in_array('nip', $normalized)
            ) {
                $headerIndex = $index;
                $header = $normalized;
                break;
            }
        }

        if ($headerIndex === null) {
            throw new \Exception(
                'Header data guru tidak ditemukan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | POSISI KOLOM
        |--------------------------------------------------------------------------
        */

        $kolom = [];

        foreach ($header as $index => $namaKolom) {
            $kolom[$namaKolom] = $index;
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN IDENTITAS GURU DARI FILE
        |--------------------------------------------------------------------------
        */

        $nipExcel = [];
        $nuptkExcel = [];
        $nikExcel = [];

        /*
        |--------------------------------------------------------------------------
        | PROSES DATA EXCEL
        |--------------------------------------------------------------------------
        */

        foreach ($rows->slice($headerIndex + 1) as $row) {

            $row = array_pad(
                $row->toArray(),
                count($header),
                null
            );

            $nama = $this->cleanUpper(
                $this->getColumn($row, $kolom, 'nama')
            );

            /*
            | Lewati baris kosong
            */

            if (!$nama) {
                continue;
            }

            $nip = $this->clean(
                $this->getColumn($row, $kolom, 'nip')
            );

            $nuptk = $this->clean(
                $this->getColumn($row, $kolom, 'nuptk')
            );

            $nik = $this->clean(
                $this->getColumn($row, $kolom, 'nik')
            );

            /*
            | Simpan identitas dari Excel
            */

            if ($nip) {
                $nipExcel[] = $nip;
            }

            if ($nuptk) {
                $nuptkExcel[] = $nuptk;
            }

            if ($nik) {
                $nikExcel[] = $nik;
            }

            /*
            |--------------------------------------------------------------------------
            | CARI GURU LAMA
            |--------------------------------------------------------------------------
            */

            $guru = null;

            if ($nip) {
                $guru = Guru::where('nip', $nip)->first();
            }

            if (!$guru && $nuptk) {
                $guru = Guru::where('nuptk', $nuptk)->first();
            }

            if (!$guru && $nik) {
                $guru = Guru::where('nik', $nik)->first();
            }

            if (!$guru) {
                $guru = Guru::where(
                    'nama_guru',
                    $nama
                )->first();
            }

            /*
            |--------------------------------------------------------------------------
            | DATA GURU
            |--------------------------------------------------------------------------
            */

            $dataGuru = [

                'nama_guru' => $nama,

                'nip' => $nip,

                'nuptk' => $nuptk,

                'nik' => $nik,

                'jenis_kelamin' => $this->jenisKelamin(
                    $this->getColumn(
                        $row,
                        $kolom,
                        'jk'
                    )
                ),

                'tempat_lahir' => $this->cleanUpper(
                    $this->getColumn(
                        $row,
                        $kolom,
                        'tempat lahir'
                    )
                ),

                'tanggal_lahir' => $this->tanggal(
                    $this->getColumn(
                        $row,
                        $kolom,
                        'tanggal lahir'
                    )
                ),

                /*
                | Data manual jangan dihapus
                */

                'alamat' => $guru?->alamat,

                'no_hp' => $guru?->no_hp,

                'status_kepegawaian' => $this->cleanUpper(
                    $this->getColumn(
                        $row,
                        $kolom,
                        'status kepegawaian'
                    )
                ),

                'jenis_ptk' => $this->cleanUpper(
                    $this->getColumn(
                        $row,
                        $kolom,
                        'jenis ptk'
                    )
                ),

                'jabatan_ptk' => $this->cleanUpper(
    $this->getColumn(
        $row,
        $kolom,
        'jabatan ptk'
    )
),

'jenis_pengajar' => $this->jenisPengajar(
    $this->getColumn(
        $row,
        $kolom,
        'jabatan ptk'
    )
),

'status_guru' => 'Aktif',

                /*
                | Pertahankan kelas yang sudah ada
                */

                'kelas_id' => $guru?->kelas_id,
            ];

            /*
            |--------------------------------------------------------------------------
            | UPDATE
            |--------------------------------------------------------------------------
            */

            if ($guru) {

                $guru->update($dataGuru);

                if ($guru->user) {

                    $guru->user->update([
                        'name' => $nama
                    ]);
                }

                $this->diperbarui++;

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | GURU BARU
            |--------------------------------------------------------------------------
            */

            $email = strtolower(
                preg_replace('/\s+/', '', $nama)
            );

            $email = str_replace(
                "'",
                '',
                $email
            );

            $email .= '@sdncimanahayu.sch.id';

            /*
            | Cek email
            */

            if (User::where('email', $email)->exists()) {

                $email = strtolower(
                    preg_replace('/\s+/', '', $nama)
                );

                $email .= '.' . uniqid();

                $email .= '@sdncimanahayu.sch.id';
            }

            $user = User::create([

                'name' => $nama,

                'email' => $email,

                'password' => Hash::make('12345678'),

                'role' => 'guru',

            ]);

            Guru::create(array_merge(
                $dataGuru,
                [
                    'user_id' => $user->id,
                    'email' => $email,
                ]
            ));

            $this->baru++;
        }

        /*
        |--------------------------------------------------------------------------
        | HAPUS GURU YANG SUDAH TIDAK ADA DI EXCEL
        |--------------------------------------------------------------------------
        */

        $this->hapusGuruYangTidakAda(
            $nipExcel,
            $nuptkExcel,
            $nikExcel
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HAPUS DATA LAMA YANG TIDAK ADA DI FILE
    |--------------------------------------------------------------------------
    */

    private function hapusGuruYangTidakAda(
        array $nipExcel,
        array $nuptkExcel,
        array $nikExcel
    ) {

        $gurus = Guru::all();

        foreach ($gurus as $guru) {

            /*
            | Tentukan apakah guru masih ada di Excel
            */

            $masihAda = false;

            if (
                $guru->nip &&
                in_array($guru->nip, $nipExcel)
            ) {
                $masihAda = true;
            }

            if (
                $guru->nuptk &&
                in_array($guru->nuptk, $nuptkExcel)
            ) {
                $masihAda = true;
            }

            if (
                $guru->nik &&
                in_array($guru->nik, $nikExcel)
            ) {
                $masihAda = true;
            }

            /*
            | Kalau tidak ada identitas,
            | jangan hapus otomatis.
            */

            if (
                !$guru->nip &&
                !$guru->nuptk &&
                !$guru->nik
            ) {
                continue;
            }

            /*
            | Hapus kalau sudah tidak ada di Excel
            */

            if (!$masihAda) {

                /*
                | Jangan hapus kalau masih dipakai
                | sebagai wali kelas
                */

                if ($guru->waliKelas()->exists()) {
                    continue;
                }

                $userId = $guru->user_id;

                $guru->delete();

                /*
                | Hapus akun login guru
                */

                if ($userId) {

                    User::where('id', $userId)
                        ->where('role', 'guru')
                        ->delete();
                }

                $this->dihapus++;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | AMBIL KOLOM
    |--------------------------------------------------------------------------
    */

    private function getColumn(
        array $row,
        array $kolom,
        string $nama
    ) {
        if (!isset($kolom[$nama])) {
            return null;
        }

        return $row[$kolom[$nama]] ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | CLEAN
    |--------------------------------------------------------------------------
    */

    private function clean($value)
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);

        return $value === ''
            ? null
            : $value;
    }

    private function cleanUpper($value)
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);

        return $value === ''
            ? null
            : strtoupper($value);
    }

    /*
    |--------------------------------------------------------------------------
    | JENIS PENGAJAR
    |--------------------------------------------------------------------------
    */

    private function jenisPengajar($jabatan)
{
    if (!$jabatan) {
        return 'Wali Kelas';
    }

    $jabatan = strtolower(
        trim((string) $jabatan)
    );

    // KEPALA SEKOLAH → GURU
    if (str_contains($jabatan, 'kepala sekolah')) {
        return 'Kepala Sekolah';
    }

    // OPERATOR → STAFF
    if (str_contains($jabatan, 'operator')) {
        return 'Operator';
    }

    // STAFF / ADMINISTRASI / TU → STAFF
    if (
        str_contains($jabatan, 'administrasi') ||
        str_contains($jabatan, 'tata usaha') ||
        str_contains($jabatan, 'staff') ||
        str_contains($jabatan, 'staf')
    ) {
        return 'Operator';
    }

    // GURU PJOK
    if (
        str_contains($jabatan, 'penjas') ||
        str_contains($jabatan, 'pjok')
    ) {
        return 'Guru PJOK';
    }

    // GURU PAI
    if (
        str_contains($jabatan, 'agama') ||
        str_contains($jabatan, 'pai')
    ) {
        return 'Guru PAI';
    }

    // GURU KELAS / WALI KELAS
    if (
        str_contains($jabatan, 'kelas') ||
        str_contains($jabatan, 'wali')
    ) {
        return 'Wali Kelas';
    }

    // DEFAULT
    return 'Wali Kelas';
}

    /*
    |--------------------------------------------------------------------------
    | TANGGAL
    |--------------------------------------------------------------------------
    */

    private function tanggal($value)
    {
        if (!$value) {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)
                ->format('Y-m-d');

        } catch (\Exception $e) {
            return null;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | JENIS KELAMIN
    |--------------------------------------------------------------------------
    */

    private function jenisKelamin($value)
    {
        $value = strtoupper(
            trim((string) $value)
        );

        return $value === 'P'
            ? 'P'
            : 'L';
    }
}
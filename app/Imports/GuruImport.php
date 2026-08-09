<?php

namespace App\Imports;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuruImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 7;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $row = $row->toArray();

$row = array_pad($row, 11, null);

            /*
            ------------------------------------
            Lewati baris kosong
            ------------------------------------
            */

            if (empty($row[1])) {
                continue;
            }

            /*
            ------------------------------------
            Ambil NIP
            ------------------------------------
            */

   $nip = $this->clean($row[6] ?? null);

            if ($nip && Guru::where('nip', $nip)->exists()) {
                continue;
            }

            /*
            ------------------------------------
            Email Default
            ------------------------------------
            */

            $email = strtolower(
                str_replace(' ', '', $this->clean($row[1]))
            ) . "@sdncimanahayu.sch.id";

            $email = str_replace("'", "", $email);

            if (User::where('email', $email)->exists()) {

                $email = uniqid() . "@sdncimanahayu.sch.id";

            }

            /*
            ------------------------------------
            User Login
            ------------------------------------
            */

            $user = User::create([

                'name' => $this->cleanUpper($row[1]),

                'email' => $email,

                'password' => Hash::make('12345678'),

                'role' => 'guru'

            ]);

            /*
            ------------------------------------
            Master Guru
            ------------------------------------
            */

          Guru::create([

    'user_id' => $user->id,

    // B - Nama Guru
    'nama_guru' => $this->cleanUpper($row[1] ?? null),

    // G - NIP
    'nip' => $this->clean($row[6] ?? null),

    // C - NUPTK
    'nuptk' => $this->clean($row[2] ?? null),

    // J - NIK
    'nik' => $this->clean($row[9] ?? null),

    // D - Jenis Kelamin
    'jenis_kelamin' => $this->jenisKelamin($row[3] ?? null),

    // E - Tempat Lahir
    'tempat_lahir' => $this->cleanUpper($row[4] ?? null),

    // F - Tanggal Lahir
    'tanggal_lahir' => $this->tanggal($row[5] ?? null),

    // Tidak ada pada Dapodik
    'alamat' => null,

    'no_hp' => null,

    'email' => $email,

    // H
    'status_kepegawaian' => $this->cleanUpper($row[7] ?? null),

    // I
    'jenis_ptk' => $this->cleanUpper($row[8] ?? null),

    // K
    'jabatan_ptk' => $this->cleanUpper($row[10] ?? null),

    /*
    Data Sistem
    */

    'jenis_pengajar' => $this->jenisPengajar($row[10] ?? null),

    'status_guru' => 'Aktif',

    'kelas_id' => null

]);
        }
    }

    /*
------------------------------------
Bersihkan Data
------------------------------------
*/

private function clean($value)
{
    if ($value === null) {
        return null;
    }

    $value = trim((string) $value);

    return $value === '' ? null : $value;
}


private function cleanUpper($value)
{
    if ($value === null) {
        return null;
    }

    $value = trim((string) $value);

    return $value === '' ? null : strtoupper($value);
}
    /*
    ------------------------------------
    Jenis Kelamin
    ------------------------------------
    */

    private function jenisPengajar($jabatan)
{
    if (!$jabatan) {
        return 'Wali Kelas';
    }

    $jabatan = strtolower(trim($jabatan));

    if (str_contains($jabatan,'kelas')) {
        return 'Wali Kelas';
    }

    if (str_contains($jabatan,'penjas')) {
        return 'Guru PJOK';
    }

    if (str_contains($jabatan,'agama')) {
        return 'Guru PAI';
    }

    if (str_contains($jabatan,'administrasi')) {
        return 'Operator';
    }

    if (str_contains($jabatan,'kepala sekolah')) {
    return 'Kepala Sekolah';
}

if (
    str_contains($jabatan,'operator') ||
    str_contains($jabatan,'administrasi') ||
    str_contains($jabatan,'tata usaha')
) {
    return 'Operator';
}
    return 'Wali Kelas';
}

    /*
    ------------------------------------
    Format Tanggal
    ------------------------------------
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

    private function jenisKelamin($value)
{
    $value = strtoupper(trim((string) $value));

    return $value === 'P' ? 'P' : 'L';
}
}
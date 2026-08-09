<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SiswaImport implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 7;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            // Lewati baris kosong
            if (empty($row[1])) {
                continue;
            }

            // Lewati jika NISN kosong
            if (empty($row[4])) {
                continue;
            }

            Siswa::updateOrCreate(

    [
        'nisn' => trim($row[4]),
    ],

    [

       'nama_siswa' => $this->cleanUpper($row[1]),
        'nipd'          => $this->clean($row[2]),
        'jenis_kelamin' => $this->clean($row[3]),

        'tempat_lahir'  => $this->cleanUpper($row[5]),
        'tanggal_lahir' => $this->tanggal($row[6]),

        'nik'           => $this->clean($row[7]),
        'agama'         => $this->clean($row[8]),

        'alamat'        => $this->clean($row[9]),
        'rt'            => $this->clean($row[10]),
        'rw'            => $this->clean($row[11]),
        'dusun'         => $this->clean($row[12]),
        'desa'          => $this->clean($row[13]),
        'kecamatan'     => $this->clean($row[14]),
        'kode_pos'      => $this->clean($row[15]),

        'transportasi'     => $this->clean($row[17]),
        'telepon_orangtua' => $this->clean($row[19]),

        'nama_ayah'        => $this->cleanUpper($row[24]),
        'pendidikan_ayah'  => $this->clean($row[26]),
        'pekerjaan_ayah'   => $this->clean($row[27]),
        'penghasilan_ayah' => $this->clean($row[28]),
        'nik_ayah'         => $this->clean($row[29]),

        'nama_ibu'         => $this->cleanUpper($row[30]),
        'pendidikan_ibu'   => $this->clean($row[32]),
        'pekerjaan_ibu'    => $this->clean($row[33]),
        'penghasilan_ibu'  => $this->clean($row[34]),
        'nik_ibu'          => $this->clean($row[35]),

        'nama_wali'        => $this->cleanUpper($row[36]),
        'pendidikan_wali'  => $this->clean($row[38]),
        'pekerjaan_wali'   => $this->clean($row[39]),
        'penghasilan_wali' => $this->clean($row[40]),
        'nik_wali'         => $this->clean($row[41]),

        'tingkat'          => $this->ambilTingkat($row[42]),

        'status_siswa'     => 'Aktif',
    ]

);
        }
    }



    private function clean($value)
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string)$value);

        return $value === '' ? null : $value;
    }

    private function cleanUpper($value)
{
    if ($value === null) {
        return null;
    }

    $value = trim((string) $value);

    if ($value === '') {
        return null;
    }

    // hapus spasi ganda
    $value = preg_replace('/\s+/', ' ', $value);

    // ubah menjadi huruf kapital semua
    return mb_strtoupper($value, 'UTF-8');
}

    private function tanggal($value)
    {
        if (!$value) {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    private function ambilTingkat($kelas)
    {
        if (!$kelas) {
            return null;
        }

        preg_match('/\d+/', $kelas, $hasil);

        return $hasil[0] ?? null;
    }
}
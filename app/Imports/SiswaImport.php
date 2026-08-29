<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\AnggotaKelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SiswaImport implements ToCollection
{
    public $baru = 0;
    public $diperbarui = 0;

    public function collection(Collection $rows)
    {
        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN AKTIF
        |--------------------------------------------------------------------------
        */

        $tahunAjaran = TahunAjaran::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAjaran) {
            throw new \Exception(
                'Tahun ajaran aktif belum tersedia.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CARI HEADER OTOMATIS
        |--------------------------------------------------------------------------
        */

        $headerIndex = $this->cariHeader($rows);

        if ($headerIndex === null) {
            throw new \Exception(
                'Header data siswa tidak ditemukan.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | MAPPING HEADER
        |--------------------------------------------------------------------------
        */

        $header = $rows[$headerIndex]->toArray();

        $kolom = [];

        foreach ($header as $index => $value) {

            $namaHeader =
                $this->normalisasiHeader($value);

            if ($namaHeader !== '') {

                $kolom[$namaHeader] = $index;
            }
        }


       /*
|--------------------------------------------------------------------------
| MAPPING KELAS
|--------------------------------------------------------------------------
| Kelas akan dicari saat setiap baris siswa diproses.
| Jika belum ada, kelas dibuat otomatis dari Rombel Excel.
|--------------------------------------------------------------------------
*/

$kelasMap = [];


        /*
        |--------------------------------------------------------------------------
        | PROSES DATA
        |--------------------------------------------------------------------------
        */

        for (
            $i = $headerIndex + 1;
            $i < $rows->count();
            $i++
        ) {

            $row = $rows[$i]->toArray();


            /*
            |--------------------------------------------------------------------------
            | NAMA
            |--------------------------------------------------------------------------
            */

            $nama = $this->ambil(
                $row,
                $kolom,
                [
                    'nama peserta didik',
                    'nama siswa',
                    'nama',
                ]
            );


            /*
            |--------------------------------------------------------------------------
            | Lewati baris kosong
            |--------------------------------------------------------------------------
            */

            if (!$nama) {
                continue;
            }


            /*
            |--------------------------------------------------------------------------
            | IDENTITAS
            |--------------------------------------------------------------------------
            */

            $nisn = $this->ambil(
                $row,
                $kolom,
                [
                    'nisn',
                ]
            );

            $nik = $this->ambil(
                $row,
                $kolom,
                [
                    'nik',
                ]
            );

            $nipd = $this->ambil(
                $row,
                $kolom,
                [
                    'nipd',
                ]
            );


          /*
|--------------------------------------------------------------------------
| DATA KELAS / TINGKAT / ROMBEL
|--------------------------------------------------------------------------
*/

$rombel = $this->ambil(
    $row,
    $kolom,
    [
        'rombel saat ini',
        'rombel',
        'rombongan belajar saat ini',
        'rombongan belajar',
        'nama rombel',
        'kelas saat ini',
        'kelas',
    ]
);

$tingkatExcel = $this->ambil(
    $row,
    $kolom,
    [
        'tingkat',
        'tingkat saat ini',
        'kelas',
    ]
);

$kelas = null;
$tingkat = null;

if ($rombel) {

    $rombelNormal = $this->normalisasiKelas($rombel);

    /*
    |--------------------------------------------------------------------------
    | AMBIL TINGKAT
    |--------------------------------------------------------------------------
    */

    if ($tingkatExcel) {
        preg_match('/[1-6]/', $tingkatExcel, $match);
        $tingkat = $match[0] ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | JIKA TINGKAT BELUM ADA
    | Ambil dari angka pertama pada rombel
    |--------------------------------------------------------------------------
    */

    if (!$tingkat) {
        preg_match('/^([1-6])/', $rombelNormal, $match);
        $tingkat = $match[1] ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | CARI KELAS BERDASARKAN TAHUN AJARAN AKTIF
    |--------------------------------------------------------------------------
    */

    $kelas = Kelas::where(
        'tahun_ajaran_id',
        $tahunAjaran->id
    )
    ->where(
        'nama_kelas',
        $rombelNormal
    )
    ->first();

    /*
    |--------------------------------------------------------------------------
    | BUAT KELAS JIKA BELUM ADA
    |--------------------------------------------------------------------------
    */

    if (!$kelas && $tingkat) {

        $kelas = Kelas::create([
            'nama_kelas'      => $rombelNormal,
            'tingkat'         => $tingkat,
            'tahun_ajaran_id' => $tahunAjaran->id,
            'status'          => 'Aktif',
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | PASTIKAN TINGKAT DARI KELAS
    |--------------------------------------------------------------------------
    */

    if ($kelas) {
        $tingkat = $kelas->tingkat;
    }
}


            /*
            |--------------------------------------------------------------------------
            | DATA SISWA
            |--------------------------------------------------------------------------
            */

            $data = [

                'nama_siswa' =>
                    $this->cleanUpper($nama),

                'nipd' =>
                    $this->clean($nipd),

                'nisn' =>
                    $this->clean($nisn),

                'nik' =>
                    $this->clean($nik),

                'kelas_id' => $kelas?->id,

'tingkat' => $tingkat,

                'jenis_kelamin' =>
                    $this->jenisKelamin(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'jk',
                                'jenis kelamin',
                            ]
                        )
                    ),

                'tempat_lahir' =>
                    $this->cleanUpper(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'tempat lahir',
                            ]
                        )
                    ),

                'tanggal_lahir' =>
                    $this->tanggal(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'tanggal lahir',
                            ]
                        )
                    ),

                'agama' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'agama',
                            ]
                        )
                    ),

                /*
                |--------------------------------------------------------------------------
                | ALAMAT
                |--------------------------------------------------------------------------
                */

                'alamat' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'alamat',
                            ]
                        )
                    ),

                'rt' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'rt',
                            ]
                        )
                    ),

                'rw' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'rw',
                            ]
                        )
                    ),

                'dusun' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'dusun',
                            ]
                        )
                    ),

                'desa' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'desa',
                                'kelurahan',
                            ]
                        )
                    ),

                'kecamatan' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'kecamatan',
                            ]
                        )
                    ),

                'kabupaten' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'kabupaten',
                            ]
                        )
                    ),

                'provinsi' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'provinsi',
                            ]
                        )
                    ),

                'kode_pos' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'kode pos',
                            ]
                        )
                    ),

                'transportasi' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'alat transportasi',
                                'transportasi',
                            ]
                        )
                    ),

                'telepon_orangtua' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'telepon orang tua',
                                'telepon orangtua',
                                'nomor telepon orang tua',
                            ]
                        )
                    ),


                /*
                |--------------------------------------------------------------------------
                | AYAH
                |--------------------------------------------------------------------------
                */

                'nama_ayah' =>
                    $this->cleanUpper(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nama ayah',
                            ]
                        )
                    ),

                'nik_ayah' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nik ayah',
                            ]
                        )
                    ),

                'pendidikan_ayah' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pendidikan ayah',
                                'jenjang pendidikan ayah',
                            ]
                        )
                    ),

                'pekerjaan_ayah' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pekerjaan ayah',
                            ]
                        )
                    ),

                'penghasilan_ayah' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'penghasilan ayah',
                            ]
                        )
                    ),


                /*
                |--------------------------------------------------------------------------
                | IBU
                |--------------------------------------------------------------------------
                */

                'nama_ibu' =>
                    $this->cleanUpper(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nama ibu',
                                'nama ibu kandung',
                            ]
                        )
                    ),

                'nik_ibu' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nik ibu',
                                'nik ibu kandung',
                            ]
                        )
                    ),

                'pendidikan_ibu' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pendidikan ibu',
                                'jenjang pendidikan ibu',
                            ]
                        )
                    ),

                'pekerjaan_ibu' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pekerjaan ibu',
                            ]
                        )
                    ),

                'penghasilan_ibu' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'penghasilan ibu',
                            ]
                        )
                    ),


                /*
                |--------------------------------------------------------------------------
                | WALI
                |--------------------------------------------------------------------------
                */

                'nama_wali' =>
                    $this->cleanUpper(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nama wali',
                            ]
                        )
                    ),

                'nik_wali' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'nik wali',
                            ]
                        )
                    ),

                'pendidikan_wali' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pendidikan wali',
                            ]
                        )
                    ),

                'pekerjaan_wali' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'pekerjaan wali',
                            ]
                        )
                    ),

                'penghasilan_wali' =>
                    $this->clean(
                        $this->ambil(
                            $row,
                            $kolom,
                            [
                                'penghasilan wali',
                            ]
                        )
                    ),

                'status_siswa' => 'Aktif',
            ];


            /*
            |--------------------------------------------------------------------------
            | CARI SISWA LAMA
            |--------------------------------------------------------------------------
            */

            $siswa = null;


            /*
            | 1. NISN
            */

            if ($nisn) {

                $siswa = Siswa::where(
                    'nisn',
                    $nisn
                )->first();
            }


            /*
            | 2. NIK
            */

            if (!$siswa && $nik) {

                $siswa = Siswa::where(
                    'nik',
                    $nik
                )->first();
            }


            /*
            | 3. NIPD
            */

            if (!$siswa && $nipd) {

                $siswa = Siswa::where(
                    'nipd',
                    $nipd
                )->first();
            }


            /*
            | 4. Nama + tanggal lahir
            */

            if (!$siswa) {

                $tanggal =
                    $data['tanggal_lahir'];

                $query = Siswa::where(
                    'nama_siswa',
                    $data['nama_siswa']
                );

                if ($tanggal) {

                    $query->where(
                        'tanggal_lahir',
                        $tanggal
                    );
                }

                $siswa = $query->first();
            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE SISWA
            |--------------------------------------------------------------------------
            */

            if ($siswa) {

                /*
                | Kalau Excel tidak mempunyai NISN,
                | jangan hapus NISN lama.
                */

                if (!$nisn && $siswa->nisn) {

                    unset($data['nisn']);
                }

                $siswa->update($data);

                $this->diperbarui++;

            } else {

                /*
                |--------------------------------------------------------------------------
                | SISWA BARU
                |--------------------------------------------------------------------------
                */

                $siswa = Siswa::create($data);

                $this->baru++;
            }


            /*
            |--------------------------------------------------------------------------
            | HUBUNGKAN DENGAN KELAS
            |--------------------------------------------------------------------------
            */

            if ($kelas) {

                /*
                | Cari anggota kelas untuk tahun ajaran aktif.
                */

                $anggota =
                    AnggotaKelas::where(
                        'siswa_id',
                        $siswa->id
                    )
                    ->where(
                        'tahun_ajaran_id',
                        $tahunAjaran->id
                    )
                    ->first();


                if ($anggota) {

                    /*
                    | Sudah ada → UPDATE kelas
                    */

                    $anggota->update([
                        'kelas_id' => $kelas->id,
                    ]);

                } else {

                    /*
                    | Belum ada → CREATE
                    */

                    AnggotaKelas::create([

                        'tahun_ajaran_id' =>
                            $tahunAjaran->id,

                        'kelas_id' =>
                            $kelas->id,

                        'siswa_id' =>
                            $siswa->id,
                    ]);
                }
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | CARI HEADER
    |--------------------------------------------------------------------------
    */

    private function cariHeader(Collection $rows)
    {
        foreach ($rows as $index => $row) {

            $nilai = [];

            foreach ($row->toArray() as $value) {

                $value =
                    $this->normalisasiHeader($value);

                if ($value !== '') {

                    $nilai[] = $value;
                }
            }

            $adaNama = false;
            $adaIdentitas = false;

            foreach ($nilai as $value) {

                if (
                    in_array(
                        $value,
                        [
                            'nama',
                            'nama siswa',
                            'nama peserta didik',
                        ]
                    )
                ) {

                    $adaNama = true;
                }

                if (
                    in_array(
                        $value,
                        [
                            'nisn',
                            'nik',
                            'nipd',
                        ]
                    )
                ) {

                    $adaIdentitas = true;
                }
            }

            if (
                $adaNama &&
                $adaIdentitas
            ) {

                return $index;
            }
        }

        return null;
    }


    /*
    |--------------------------------------------------------------------------
    | AMBIL NILAI
    |--------------------------------------------------------------------------
    */

    private function ambil(
        array $row,
        array $kolom,
        array $alternatif
    ) {

        foreach ($alternatif as $nama) {

            $nama =
                $this->normalisasiHeader($nama);

            if (
                isset($kolom[$nama])
            ) {

                $index =
                    $kolom[$nama];

                return $this->clean(
                    $row[$index] ?? null
                );
            }
        }

        return null;
    }


    /*
    |--------------------------------------------------------------------------
    | NORMALISASI HEADER
    |--------------------------------------------------------------------------
    */

    private function normalisasiHeader($value)
    {
        if ($value === null) {
            return '';
        }

        $value =
            mb_strtolower(
                trim((string) $value),
                'UTF-8'
            );

        $value =
            preg_replace(
                '/\s+/',
                ' ',
                $value
            );

        return trim($value);
    }


    /*
    |--------------------------------------------------------------------------
    | NORMALISASI KELAS
    |--------------------------------------------------------------------------
    */

    private function normalisasiKelas($value)
    {
        if (!$value) {
            return '';
        }

        $value =
            mb_strtoupper(
                trim((string) $value),
                'UTF-8'
            );

        /*
        | 3 A → 3A
        | 3-A → 3A
        | 3 A → 3A
        */

        $value =
            preg_replace(
                '/[\s\-]+/',
                '',
                $value
            );

        return $value;
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

        $value =
            trim((string) $value);

        return $value === ''
            ? null
            : $value;
    }


    /*
    |--------------------------------------------------------------------------
    | CLEAN UPPER
    |--------------------------------------------------------------------------
    */

    private function cleanUpper($value)
    {
        if ($value === null) {
            return null;
        }

        $value =
            trim((string) $value);

        if ($value === '') {
            return null;
        }

        $value =
            preg_replace(
                '/\s+/',
                ' ',
                $value
            );

        return mb_strtoupper(
            $value,
            'UTF-8'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | JENIS KELAMIN
    |--------------------------------------------------------------------------
    */

    private function jenisKelamin($value)
    {
        if (!$value) {
            return null;
        }

        $value =
            strtoupper(
                trim((string) $value)
            );

        if (
            in_array(
                $value,
                [
                    'L',
                    'LAKI-LAKI',
                    'LAKI LAKI',
                ]
            )
        ) {

            return 'L';
        }

        if (
            in_array(
                $value,
                [
                    'P',
                    'PEREMPUAN',
                ]
            )
        ) {

            return 'P';
        }

        return null;
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

            if (is_numeric($value)) {

                return \PhpOffice\PhpSpreadsheet\Shared\Date
                    ::excelToDateTimeObject($value)
                    ->format('Y-m-d');
            }

            return \Carbon\Carbon::parse(
                $value
            )->format('Y-m-d');

        } catch (\Exception $e) {

            return null;
        }
    }
}
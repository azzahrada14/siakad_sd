<?php

namespace App\Exports;

use App\Models\Siswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SiswaExport
{
    public function download()
    {
        // ==========================
        // Membuat Workbook Baru
        // ==========================

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Daftar Peserta Didik');

        // ==========================
        // JUDUL
        // ==========================

        $sheet->mergeCells('A1:BN1');
        $sheet->setCellValue('A1', 'DAFTAR PESERTA DIDIK');

        $sheet->mergeCells('A2:BN2');
        $sheet->setCellValue('A2', 'SD NEGERI CIMANAHAYU');

        $sheet->mergeCells('A3:BN3');
        $sheet->setCellValue('A3', 'Kabupaten Cianjur');

        $sheet->mergeCells('A4:BN4');
        $sheet->setCellValue(
            'A4',
            'Tanggal Export : '.date('d-m-Y H:i')
        );

        // ==========================
        // STYLE JUDUL
        // ==========================

        $sheet->getStyle('A1:A4')->getFont()->setBold(true);

        $sheet->getStyle('A1')->getFont()->setSize(18);

        $sheet->getStyle('A2')->getFont()->setSize(14);

        $sheet->getStyle('A1:A4')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // ==========================
        // HEADER MULAI BARIS 6
        // ==========================

        $headerRow = 6;
        // ==========================
// HEADER KOLOM
// ==========================

$headers = [

    'No',
    'Nama Peserta Didik',
    'NIPD',
    'L/P',
    'NISN',
    'Tempat Lahir',
    'Tanggal Lahir',
    'NIK',
    'Agama',
    'Alamat',
    'RT',
    'RW',
    'Dusun',
    'Desa / Kelurahan',
    'Kecamatan',
    'Kode Pos',
    'Jenis Tinggal',
    'Alat Transportasi',
    'Telepon',
    'HP',
    'Email',
    'SKHUN',
    'Penerima KPS',
    'No KPS',

    'Nama Ayah',
    'Tahun Lahir Ayah',
    'Pendidikan Ayah',
    'Pekerjaan Ayah',
    'Penghasilan Ayah',
    'NIK Ayah',

    'Nama Ibu',
    'Tahun Lahir Ibu',
    'Pendidikan Ibu',
    'Pekerjaan Ibu',
    'Penghasilan Ibu',
    'NIK Ibu',

    'Nama Wali',
    'Tahun Lahir Wali',
    'Pendidikan Wali',
    'Pekerjaan Wali',
    'Penghasilan Wali',
    'NIK Wali',

    'No Akta',
    'No Registrasi Akta',

    'Kewarganegaraan',

    'Anak Ke',

    'Jumlah Saudara',

    'KK',

    'Tinggi Badan',

    'Berat Badan',

    'Lingkar Kepala',

    'Jarak Rumah',

    'Latitude',

    'Longitude',

    'KIP',

    'No KIP',

    'Nama pada KIP',

    'Layak PIP',

    'Alasan Layak',

    'Bank',

    'Nomor Rekening',

    'Nama Rekening',

    'Status',

    'Tingkat',

    'Rombel'

];

$column = 'A';

foreach ($headers as $header) {

    $sheet->setCellValue(
        $column.$headerRow,
        $header
    );

    $sheet->getStyle($column.$headerRow)
        ->getFont()
        ->setBold(true);

    $sheet->getStyle($column.$headerRow)
        ->getAlignment()
        ->setHorizontal(
            Alignment::HORIZONTAL_CENTER
        );

    $sheet->getStyle($column.$headerRow)
        ->getFill()
        ->setFillType(
            Fill::FILL_SOLID
        )
        ->getStartColor()
        ->setARGB('D9EAF7');

    $sheet->getStyle($column.$headerRow)
        ->getBorders()
        ->getAllBorders()
        ->setBorderStyle(
            Border::BORDER_THIN
        );

    $sheet->getColumnDimension($column)
        ->setAutoSize(true);

    $column++;
}

$row = 7;

$siswas = Siswa::with([
    'kelasAktif.kelas'
])
->orderBy('tingkat')
->orderBy('nama_siswa')
->get();

// ==========================
// ISI DATA SISWA
// ==========================

foreach ($siswas as $no => $siswa) {

    $sheet->setCellValue('A'.$row, $no + 1);

    $sheet->setCellValue('B'.$row, $siswa->nama_siswa);

    $sheet->setCellValue('C'.$row, $siswa->nipd);

    $sheet->setCellValue('D'.$row, $siswa->jenis_kelamin);

    $sheet->setCellValue('E'.$row, $siswa->nisn);

    $sheet->setCellValue('F'.$row, $siswa->tempat_lahir);

    $sheet->setCellValue(
        'G'.$row,
        $siswa->tanggal_lahir
            ? date('d-m-Y', strtotime($siswa->tanggal_lahir))
            : ''
    );

    $sheet->setCellValue('H'.$row, $siswa->nik);

    $sheet->setCellValue('I'.$row, $siswa->agama);

    $sheet->setCellValue('J'.$row, $siswa->alamat);

    $sheet->setCellValue('K'.$row, $siswa->rt);

    $sheet->setCellValue('L'.$row, $siswa->rw);

    $sheet->setCellValue('M'.$row, $siswa->dusun);

    $sheet->setCellValue('N'.$row, $siswa->desa);

    $sheet->setCellValue('O'.$row, $siswa->kecamatan);

    $sheet->setCellValue('P'.$row, $siswa->kode_pos);

    $sheet->setCellValue('Q'.$row, $siswa->jenis_tinggal);

    $sheet->setCellValue('R'.$row, $siswa->transportasi);

    $sheet->setCellValue('S'.$row, $siswa->telepon_orangtua);

    $sheet->setCellValue('T'.$row, $siswa->telepon_orangtua);

    $sheet->setCellValue('U'.$row, $siswa->email);

    $sheet->setCellValue('V'.$row, $siswa->skhun);

    $sheet->setCellValue('W'.$row, $siswa->penerima_kps);

    $sheet->setCellValue('X'.$row, $siswa->no_kps);

    $sheet->setCellValue('Y'.$row, $siswa->nama_ayah);

    $sheet->setCellValue('Z'.$row, $siswa->tahun_lahir_ayah);

    $sheet->setCellValue('AA'.$row, $siswa->pendidikan_ayah);

    $sheet->setCellValue('AB'.$row, $siswa->pekerjaan_ayah);

    $sheet->setCellValue('AC'.$row, $siswa->penghasilan_ayah);

    $sheet->setCellValue('AD'.$row, $siswa->nik_ayah);

    $sheet->setCellValue('AE'.$row, $siswa->nama_ibu);

    $sheet->setCellValue('AF'.$row, $siswa->tahun_lahir_ibu);

    $sheet->setCellValue('AG'.$row, $siswa->pendidikan_ibu);

    $sheet->setCellValue('AH'.$row, $siswa->pekerjaan_ibu);

    $sheet->setCellValue('AI'.$row, $siswa->penghasilan_ibu);

    $sheet->setCellValue('AJ'.$row, $siswa->nik_ibu);

    $sheet->setCellValue('AK'.$row, $siswa->nama_wali);

    $sheet->setCellValue('AL'.$row, $siswa->tahun_lahir_wali);

    $sheet->setCellValue('AM'.$row, $siswa->pendidikan_wali);

    $sheet->setCellValue('AN'.$row, $siswa->pekerjaan_wali);

    $sheet->setCellValue('AO'.$row, $siswa->penghasilan_wali);

    $sheet->setCellValue('AP'.$row, $siswa->nik_wali);

    $sheet->setCellValue('AQ'.$row, $siswa->no_akta);

    $sheet->setCellValue('AR'.$row, $siswa->no_registrasi_akta);

    $sheet->setCellValue('AS'.$row, $siswa->kewarganegaraan);

    $sheet->setCellValue('AT'.$row, $siswa->anak_ke);

    $sheet->setCellValue('AU'.$row, $siswa->jumlah_saudara);

    $sheet->setCellValue('AV'.$row, $siswa->kk);

    $sheet->setCellValue('AW'.$row, $siswa->tinggi_badan);

    $sheet->setCellValue('AX'.$row, $siswa->berat_badan);

    $sheet->setCellValue('AY'.$row, $siswa->lingkar_kepala);

    $sheet->setCellValue('AZ'.$row, $siswa->jarak_rumah);

    $sheet->setCellValue('BA'.$row, $siswa->latitude);

    $sheet->setCellValue('BB'.$row, $siswa->longitude);

    $sheet->setCellValue('BC'.$row, $siswa->kip);

    $sheet->setCellValue('BD'.$row, $siswa->no_kip);

    $sheet->setCellValue('BE'.$row, $siswa->nama_kip);

    $sheet->setCellValue('BF'.$row, $siswa->layak_pip);

    $sheet->setCellValue('BG'.$row, $siswa->alasan_layak);

    $sheet->setCellValue('BH'.$row, $siswa->bank);

    $sheet->setCellValue('BI'.$row, $siswa->rekening);

    $sheet->setCellValue('BJ'.$row, $siswa->nama_rekening);

    $sheet->setCellValue('BK'.$row, $siswa->status_siswa);

    $sheet->setCellValue('BL'.$row, $siswa->tingkat);

   $sheet->setCellValue(
    'BM'.$row,
    optional(optional($siswa->kelasAktif)->kelas)->nama_kelas ?? '-'
);
    

    $row++;
}

// ==========================
// STYLE DATA
// ==========================

// Border seluruh tabel
$lastRow = $row - 1;

$sheet->getStyle("A6:BM".$lastRow)
    ->getBorders()
    ->getAllBorders()
    ->setBorderStyle(Border::BORDER_THIN);

// Rata tengah beberapa kolom
$centerColumns = [
    'A','C','D','E','G',
    'K','L','P',
    'W','X',
    'AT','AU',
    'AW','AX','AY','AZ',
    'BA','BB',
    'BC','BD',
    'BK','BL','BM'
];

foreach($centerColumns as $col){

    $sheet->getStyle($col."7:".$col.$lastRow)
        ->getAlignment()
        ->setHorizontal(
            Alignment::HORIZONTAL_CENTER
        );

    $sheet->getStyle($col."7:".$col.$lastRow)
        ->getAlignment()
        ->setVertical(
            Alignment::VERTICAL_CENTER
        );

}

// Wrap Text
$sheet->getStyle("A6:BM".$lastRow)
      ->getAlignment()
      ->setWrapText(true);

// Tinggi Header
$sheet->getRowDimension(6)
      ->setRowHeight(28);

// Tinggi Data
for($i=7;$i<=$lastRow;$i++){

    $sheet->getRowDimension($i)
          ->setRowHeight(22);

}

// Freeze Header
$sheet->freezePane('A7');

// Auto Filter
$sheet->setAutoFilter("A6:BM6");


$filename = 'Daftar_Peserta_Didik_'.date('Ymd_His').'.xlsx';

header(
'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
);

header(
'Content-Disposition: attachment; filename="'.$filename.'"'
);

header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);

$writer->save('php://output');

exit;

    }
}

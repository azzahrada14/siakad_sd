<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\AnggotaKelas;
use App\Models\LingkupMateri;
use App\Models\TahunAjaran;

class WaliNilaiExport implements
    FromView,
    ShouldAutoSize,
    WithStyles,
    WithEvents
{
    protected $mapelId;

    public function __construct($mapelId)
    {
        $this->mapelId = $mapelId;
    }

    public function view(): View
{
    $guru = Auth::user()->guru;

    $kelas = $guru->waliKelas;

    $tahunAktif = TahunAjaran::where(
        'status',
        'Aktif'
    )->first();

    $mapel = Mapel::find($this->mapelId);

    $ids = AnggotaKelas::where(
        'kelas_id',
        $kelas->id
    )->pluck('siswa_id');

    $siswas = Siswa::whereIn(
        'id',
        $ids
    )->orderBy('nama_siswa')->get();

    $lingkupMateris = LingkupMateri::with(
        'tujuanPembelajarans'
    )
    ->where('mapel_id', $this->mapelId)
    ->where('status', 'Aktif')
    ->orderBy('id')
    ->get();

    $tujuanPembelajarans = collect();

    foreach($lingkupMateris as $lm){

        foreach($lm->tujuanPembelajarans as $tp){

            $tujuanPembelajarans->push($tp);

        }

    }

    $nilaiSiswa = [];

    $nilaiTP = [];

    foreach($siswas as $siswa){

        $nilai = Nilai::with('detailTP')

            ->where('siswa_id',$siswa->id)

            ->where('mapel_id',$this->mapelId)

            ->where('tahun_ajaran_id',$tahunAktif->id)

            ->where('semester',$tahunAktif->semester)

            ->first();

        if(!$nilai){

            continue;

        }

        $nilaiSiswa[$siswa->id] = $nilai;

        foreach($nilai->detailTP as $detail){

            $nilaiTP[$siswa->id][$detail->tp_id] =

                $detail->nilai;

        }

    }

    return view(
        'exports.wali_nilai',
        compact(
            'guru',
            'kelas',
            'mapel',
            'tahunAktif',
            'siswas',
            'lingkupMateris',
            'tujuanPembelajarans',
            'nilaiTP',
            'nilaiSiswa'
        )
    );
}

public function styles(Worksheet $sheet)
{
    return [

        1 => [

            'font' => [

                'bold' => true,

                'size' => 14,

            ],

        ],

    ];
}

public function registerEvents(): array
{
    return [

        AfterSheet::class => function (AfterSheet $event) {

            $sheet = $event->sheet->getDelegate();

            /*
            |--------------------------------------------------------------------------
            | JUMLAH TP
            |--------------------------------------------------------------------------
            */

            $jumlahTP = LingkupMateri::with('tujuanPembelajarans')
                ->where('mapel_id', $this->mapelId)
                ->get()
                ->sum(function ($lm) {
                    return $lm->tujuanPembelajarans->count();
                });

            /*
            |--------------------------------------------------------------------------
            | TOTAL KOLOM
            |--------------------------------------------------------------------------
            */

            $lastColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                10 + $jumlahTP
            );

            $lastRow = $sheet->getHighestRow();

            /*
            |--------------------------------------------------------------------------
            | JUDUL
            |--------------------------------------------------------------------------
            */

            $sheet->mergeCells("A1:{$lastColumn}1");

            $sheet->getStyle("A1")->applyFromArray([

                'font' => [
                    'bold' => true,
                    'size' => 16,
                ],

                'alignment' => [
                    'horizontal' => 'center',
                ],

            ]);

            /*
            |--------------------------------------------------------------------------
            | HEADER TABEL
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle("A8:{$lastColumn}10")->applyFromArray([

                'font' => [

                    'bold' => true,

                    'color' => [
                        'rgb' => 'FFFFFF'
                    ],

                ],

                'fill' => [

                    'fillType' => 'solid',

                    'startColor' => [

                        'rgb' => '1E3A8A'

                    ]

                ],

                'alignment' => [

                    'horizontal' => 'center',

                    'vertical' => 'center',

                ],

            ]);

            /*
            |--------------------------------------------------------------------------
            | BORDER
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle("A8:{$lastColumn}{$lastRow}")

                ->getBorders()

                ->getAllBorders()

                ->setBorderStyle(

                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN

                );

            /*
            |--------------------------------------------------------------------------
            | FREEZE
            |--------------------------------------------------------------------------
            */

            $sheet->freezePane('D11');

            /*
            |--------------------------------------------------------------------------
            | LANDSCAPE
            |--------------------------------------------------------------------------
            */

            $sheet->getPageSetup()

                ->setOrientation(

                    \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE

                );

            $sheet->getPageSetup()

                ->setFitToWidth(1);

            /*
            |--------------------------------------------------------------------------
            | CENTER
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle("A8:{$lastColumn}{$lastRow}")

                ->getAlignment()

                ->setVertical(

                    \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER

                );

            /*
            |--------------------------------------------------------------------------
            | TINGGI HEADER
            |--------------------------------------------------------------------------
            */

            $sheet->getRowDimension(8)->setRowHeight(28);

            $sheet->getRowDimension(9)->setRowHeight(25);

            $sheet->getRowDimension(10)->setRowHeight(25);

        }

    ];
}
}
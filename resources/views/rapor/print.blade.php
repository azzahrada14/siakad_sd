<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Preview Rapor</title>

<style>

@page{
    size:A4 portrait;
    margin:15mm;
}

/* ===============================
   BODY
================================= */

body{
    margin:0;
    padding:0;
    background:#e5e7eb;
    font-family:"Times New Roman", serif;
    font-size:12pt;
    color:#000;
}

/* ===============================
   PREVIEW BAR
================================= */

.preview-bar{
    position:sticky;
    top:0;
    z-index:99999;

    background:#1e40af;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:15px 30px;

    color:#fff;
}

.preview-title{
    display:flex;
    flex-direction:column;
}

.preview-title h2{
    margin:0;
    color:#fff;
    font-size:24px;
}

.preview-title small{
    color:#fff;
    margin-top:3px;
    font-size:13px;
}

.preview-action{
    display:flex;
    align-items:center;
    gap:10px;
}

/* ===============================
   BUTTON
================================= */

.btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:10px 18px;

    border-radius:6px;

    text-decoration:none;

    font-weight:bold;

    color:#fff;
}

.btn-back{
    background:#6b7280;
}

.btn-print{
    background:#2563eb;
    border:none;
    color:#fff;
    cursor:pointer;
}

/* ===============================
   PAGE
================================= */

.page{
    width:210mm;
    min-height:297mm;

    margin:20px auto;

    background:#fff;

    padding:25mm 20mm;

    box-sizing:border-box;

    box-shadow:0 0 10px rgba(0,0,0,.15);

    display:flex;
    flex-direction:column;

    page-break-after:always;
}

/* ===============================
   COVER
================================= */

.cover-content{
    flex:1;

    display:flex;
    flex-direction:column;

    align-items:center;
}

.cover-logo{
    width:165px;
    margin:25px auto 20px;
}

.cover-title{
    font-size:20pt;
    font-weight:bold;
    text-align:center;
    line-height:1.35;
}

.cover-sub{
    font-size:15pt;
    font-weight:bold;
    text-align:center;
    line-height:1.5;
}

.cover-info{
    width:72%;
    margin-top:85px;
}

.cover-label{
    text-align:center;
    font-size:14pt;
    margin-bottom:8px;
}

.box{
    width:100%;

    border:2px solid #000;

    padding:8px;

    text-align:center;

    font-size:14pt;

    font-weight:bold;

    box-sizing:border-box;
}

.footer{
    margin-top:auto;

    text-align:center;

    font-size:13pt;

    font-weight:bold;

    line-height:1.4;
}

/* ===============================
   TABLE
================================= */

table{
    width:100%;
    border-collapse:collapse;
}

th{
    border:1px solid #000;
    padding:6px;
    text-align:center;
}

td{
    border:1px solid #000;
    padding:6px;
    vertical-align:top;
}

.no-border td{
    border:none;
    padding:3px;
}

/* ===============================
   PRINT
================================= */

@media print{

    body{
        background:#fff;
    }

    .preview-bar{
        display:none !important;
    }

    .page{
        width:100%;
        margin:0;
        padding:15mm;
        box-shadow:none;
    }

}

</style>

</head>

<body>


<div class="preview-bar">

    <div class="preview-title">
        <h2>📄 Preview Rapor</h2>
        <small>Periksa kembali sebelum dicetak</small>
    </div>

    <div class="preview-action">

        <a href="{{ route('rapor.index') }}" class="btn btn-back">
            ← Kembali
        </a>

        <button onclick="window.print()" class="btn btn-print">
            🖨 Cetak
        </button>

    </div>

</div>


<div class="page">


<div class="cover-content">


    <img src="{{ asset('logo.png') }}" class="cover-logo">

    <div class="cover-title">
        RAPOR SUMATIF TENGAH SEMESTER
    </div>

    <div class="cover-sub">
        PESERTA DIDIK<br>
        SEKOLAH DASAR<br>
        (SD)
    </div>

     <div class="cover-info">

  
    <div class="cover-label">

Nama Peserta Didik


    </div>

<div class="box">

{{ $rapor->siswa->nama_siswa }}

</div>


<div class="cover-label" style="margin-top:28px;">

NIPD / NISN

</div>

<div class="box">

{{ $rapor->siswa->nipd }}

&nbsp;&nbsp;/&nbsp;&nbsp;

{{ $rapor->siswa->nisn }}

</div>

</div>

</div>

<div class="footer">

KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN

<br>

REPUBLIK INDONESIA

</div>

</div>
<div class="page">


<h2 class="center" style="margin-bottom:5px;">

LAPORAN HASIL BELAJAR TENGAH SEMESTER

</h2>

<h3 class="center" style="margin-top:0;">

(RAPOR ATS)

</h3>

<br>

<table class="no-border">

<tr>

<td width="18%">Nama Peserta Didik</td>

<td width="2%">:</td>

<td width="30%">

{{ $rapor->siswa->nama_siswa }}

</td>

<td width="18%">Kelas</td>

<td width="2%">:</td>

<td>

{{ $rapor->kelas->nama_kelas }}

</td>

</tr>

<tr>

<td>NISN</td>

<td>:</td>

<td>

{{ $rapor->siswa->nisn }}

</td>

<td>Fase</td>

<td>:</td>

<td>

{{ $rapor->kelas->tingkat ?? '-' }}

</td>

</tr>

<tr>

<td>Sekolah</td>

<td>:</td>

<td>

SD Negeri Cimanahayu

</td>

<td>Semester</td>

<td>:</td>

<td>

{{ $rapor->semester }}

</td>

</tr>

<tr>

<td>Alamat</td>

<td>:</td>

<td>

Kabupaten Bandung Barat

</td>

<td>Tahun Pelajaran</td>

<td>:</td>

<td>

{{ $rapor->tahunAjaran->tahun_ajaran }}

</td>

</tr>

</table>

<br>

<h3 style="margin-bottom:10px;">

A. Nilai Akademik

</h3>

<table>

<thead>

<tr>

<th width="6%">

No

</th>

<th width="30%">

Muatan Pelajaran

</th>

<th width="10%">

Nilai

</th>

<th>

Capaian Kompetensi

</th>

</tr>

</thead>

<tbody>

@foreach($rapor->details as $detail)

<tr>

<td style="text-align:center;">

{{ $loop->iteration }}

</td>

<td>

{{ $detail->mapel->nama_mapel }}

</td>

<td style="text-align:center;">

{{ $detail->nilai_akhir }}

</td>

<td>

<b>Pengetahuan</b>

<br>

{{ $detail->capaian_pengetahuan ?? '-' }}

<br><br>

<b>Keterampilan</b>

<br>

{{ $detail->capaian_keterampilan ?? '-' }}

</td>

</tr>

@endforeach

</tbody>

</table>

<br>
<!-- ===================================================== -->
<!-- B. EKSTRAKURIKULER -->
<!-- ===================================================== -->

<h3 style="margin-top:20px; margin-bottom:8px;">

B. Ekstrakurikuler

</h3>

<table>

<thead>

<tr>

<th width="8%">No</th>

<th width="45%">Kegiatan Ekstrakurikuler</th>

<th>Keterangan</th>

</tr>

</thead>

<tbody>

@forelse($ekstrakurikuler as $item)

<tr>

<td style="text-align:center;">

{{ $loop->iteration }}

</td>

<td>

{{ $item->nama_kegiatan }}

</td>

<td>

{{ $item->keterangan }}

</td>

</tr>

@empty

<tr>

<td style="text-align:center;">1</td>

<td></td>

<td></td>

</tr>

@endforelse

</tbody>

</table>

<br>

<div style="display:flex; justify-content:space-between; gap:15px; margin-top:20px;">

    <!-- ========================= -->
    <!-- C. KETIDAKHADIRAN -->
    <!-- ========================= -->
    <div style="width:48%;">

        <table style="width:100%; border-collapse:collapse;">

            <tr>
                <th colspan="3">
                    C. Ketidakhadiran
                </th>
            </tr>

            <tr>
                <td>Sakit</td>
                <td style="text-align:center;">
                    {{ $rapor->sakit }}
                </td>
                <td style="text-align:center;">
                    hari
                </td>
            </tr>

            <tr>
                <td>Izin</td>
                <td style="text-align:center;">
                    {{ $rapor->izin }}
                </td>
                <td style="text-align:center;">
                    hari
                </td>
            </tr>

            <tr>
                <td>Tanpa Keterangan</td>
                <td style="text-align:center;">
                    {{ $rapor->alfa }}
                </td>
                <td style="text-align:center;">
                    hari
                </td>
            </tr>

        </table>

    </div>

    <!-- ========================= -->
    <!-- E. KEPUTUSAN -->
    <!-- ========================= -->
    <div style="width:48%;">

        <table style="width:100%; border-collapse:collapse;">

            <tr>
                <th>
                    E. Keputusan
                </th>
            </tr>

            <tr>
                <td>

                    Berdasarkan capaian kompetensi pada Semester
                    <b>{{ $rapor->semester }}</b>,
                    peserta didik dinyatakan :

                    <br><br>

                    <table style="width:100%; border:none;">

                        <tr>
                            <td style="border:none; width:45%;">
                                Naik ke Kelas
                            </td>

                            <td style="border:none; width:5%;">
                                :
                            </td>

                            <td style="border:none;">
                                {{ $rapor->naik_kelas }}
                            </td>
                        </tr>

                        <tr>
                            <td style="border:none;">
                                Tinggal di Kelas
                            </td>

                            <td style="border:none;">
                                :
                            </td>

                            <td style="border:none;">
                                {{ $rapor->tinggal_kelas ?: '-' }}
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>

        </table>

    </div>

</div>








<!-- ===================================================== -->
<!-- TANDA TANGAN -->
<!-- ===================================================== -->

<table style="margin-top:35px; width:100%; border:none;">

<tr>

<td style="width:40%; text-align:center; border:none;">

Orang Tua / Wali

<br><br><br><br><br>

_____________________

</td>

<td style="width:20%; border:none;">

</td>

<td style="width:40%; text-align:center; border:none;">

Cianjur,
{{ date('d F Y') }}

<br>

Wali Kelas

<br><br><br><br>

{{ $waliKelas->nama_guru ?? '....................' }}

<br>

NIP.

{{ $waliKelas->nip ?? '' }}

</td>

</tr>

<tr>

<td colspan="3"
style="border:none; text-align:center; padding-top:35px;">

Mengetahui,

<br>

Kepala Sekolah

<br><br><br><br>

{{ $kepalaSekolah->nama_guru ?? '....................' }}

<br>

NIP.

{{ $kepalaSekolah->nip ?? '' }}

</td>

</tr>

</table>

</html>
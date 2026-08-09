<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<style>

body{

font-family: DejaVu Sans;

font-size:12px;

}

table{

width:100%;

border-collapse:collapse;

margin-top:15px;

}

table th,
table td{

border:1px solid #000;

padding:6px;

}

.judul{

text-align:center;

margin-bottom:25px;

}

.info{

margin-bottom:15px;

}

</style>

</head>

<body>

<div class="judul">

<h2>

SD NEGERI CIMANAHAYU

</h2>

<h3>

DAFTAR SISWA KELAS {{ $kelas->nama_kelas }}

</h3>

</div>

<table style="width:100%; border:none; margin-bottom:20px;">
    <tr>
        <td style="border:none; width:25%;"><strong>Tahun Ajaran</strong></td>
        <td style="border:none; width:25%;">: {{ $tahunAktif->tahun_ajaran }}</td>

        <td style="border:none; width:25%;"><strong>Jumlah Siswa</strong></td>
        <td style="border:none; width:25%;">: {{ $anggota->count() }}</td>
    </tr>

    <tr>
        <td style="border:none;"><strong>Semester</strong></td>
        <td style="border:none;">: {{ $tahunAktif->semester }}</td>

        <td style="border:none;"><strong>Laki-laki</strong></td>
        <td style="border:none;">: {{ $jumlahL }}</td>
    </tr>

    <tr>
        <td style="border:none;"><strong>Wali Kelas</strong></td>
        <td style="border:none;">: {{ optional($kelas->waliKelas)->nama_guru }}</td>

        <td style="border:none;"><strong>Perempuan</strong></td>
        <td style="border:none;">: {{ $jumlahP }}</td>
    </tr>
</table>
<table>

<thead>

<tr>

<th>No</th>

<th>NIPD</th>

<th>NISN</th>

<th>Nama</th>

<th>JK</th>

</tr>

</thead>

<tbody>

@foreach($anggota as $item)

<tr>

<td align="center">

{{ $loop->iteration }}

</td>

<td>

{{ $item->siswa->nipd }}

</td>

<td>

{{ $item->siswa->nisn }}

</td>

<td>

{{ $item->siswa->nama_siswa }}

</td>

<td align="center">

{{ $item->siswa->jenis_kelamin }}

</td>

</tr>

@endforeach

</tbody>

</table>

<br><br>

<table style="border:none">

<tr>

<td style="border:none;text-align:right">

Cianjur,

{{ now()->translatedFormat('d F Y') }}

<br><br><br><br>

<b>

{{ optional($kelas->waliKelas)->nama_guru }}

</b>

</td>

</tr>

</table>

</body>

</html>
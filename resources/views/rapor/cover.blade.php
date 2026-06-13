<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Cover Rapor</title>

<style>

body{

    font-family:"Times New Roman", serif;
    margin:0;
    padding:0;
    background:white;

}

.cover{

    width:210mm;
    height:297mm;
    margin:auto;
    padding:40px;
    box-sizing:border-box;
    position:relative;

}

.center{

    text-align:center;

}

.logo{

    width:120px;
    margin-top:20px;
    margin-bottom:25px;

}

.judul{

    font-size:28px;
    font-weight:bold;
    letter-spacing:1px;

}

.subjudul{

    font-size:18px;
    margin-top:10px;
    line-height:30px;

}

.nama{

    margin-top:80px;
    font-size:22px;
    font-weight:bold;
    text-decoration:underline;

}

.kotak{

    margin-top:70px;
    border:2px solid black;
    padding:20px;
    width:80%;
    margin-left:auto;
    margin-right:auto;

}

table{

    width:100%;
    border-collapse:collapse;
    font-size:16px;

}

td{

    padding:8px;

}

.footer{

    position:absolute;
    bottom:40px;
    left:0;
    right:0;
    text-align:center;
    line-height:28px;

}

</style>

</head>

<body>

<div class="cover">

<div style="display:flex;
justify-content:center;
align-items:center;
gap:80px;
margin-top:30px;
margin-bottom:40px;">

    <img
        src="{{ asset('logo.png') }}"
        width="120">

    <img
        src="{{ asset('logo-sekolah.png') }}"
        width="120">

<div class="center">

    <div
        style="
        font-size:42px;
        font-weight:bold;
        margin-top:20px;">

        RAPOR

    </div>

    <div
        style="
        font-size:22px;
        margin-top:10px;
        line-height:35px;">

        LAPORAN HASIL BELAJAR

        <br>

        PESERTA DIDIK

        <br>

        SEKOLAH DASAR

    </div>

</div>
<div
style="
margin-top:90px;
border:2px solid black;
padding:25px;">

<table
style="
width:100%;
font-size:18px;">

<tr>

<td width="35%">

Nama Peserta Didik

</td>

<td width="5%">

:

</td>

<td>

<b>

{{ $rapor->siswa->nama_siswa }}

</b>

</td>

</tr>

<tr>

<td>

NIS

</td>

<td>

:

</td>

<td>

{{ $rapor->siswa->nis }}

</td>

</tr>

<tr>

<td>

NISN

</td>

<td>

:

</td>

<td>

{{ $rapor->siswa->nisn }}

</td>

</tr>

<tr>

<td>

Kelas

</td>

<td>

:

</td>

<td>

{{ $rapor->kelas->nama_kelas }}

</td>

</tr>

<tr>

<td>

Semester

</td>

<td>

:

</td>

<td>

{{ $rapor->semester }}

</td>

</tr>

<tr>

<td>

Tahun Pelajaran

</td>

<td>

:

</td>

<td>

{{ $rapor->tahunAjaran->tahun_ajaran }}

</td>

</tr>

</table>

</div>
<div
style="
position:absolute;
bottom:50px;
left:0;
right:0;
text-align:center;">

<div
style="
font-size:22px;
font-weight:bold;">

SD NEGERI CIMANAHAYU

</div>

<div
style="
font-size:18px;">

Kabupaten Bandung Barat

</div>

<div
style="
font-size:18px;">

Provinsi Jawa Barat

</div>

</div>


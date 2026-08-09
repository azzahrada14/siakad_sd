<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <table>

<tr>
    <td colspan="{{ 10 + $tujuanPembelajarans->count() }}">
        <strong>REKAP NILAI SISWA</strong>
    </td>
</tr>

<tr>
    <td>Kelas</td>
    <td>:</td>
    <td>{{ $kelas->nama_kelas }}</td>
</tr>

<tr>
    <td>Mata Pelajaran</td>
    <td>:</td>
    <td>{{ $mapel->nama_mapel }}</td>
</tr>

<tr>
    <td>Tahun Ajaran</td>
    <td>:</td>
    <td>{{ $tahunAktif->tahun_ajaran }}</td>
</tr>

<tr>
    <td>Semester</td>
    <td>:</td>
    <td>{{ $tahunAktif->semester }}</td>
</tr>

</table>

<br>
<table>

<thead>
    <tr>

<th rowspan="3">No</th>

<th rowspan="3">NIPD</th>

<th rowspan="3">Nama Siswa</th>

<th colspan="{{ $tujuanPembelajarans->count() }}">

FORMATIF

</th>

<th rowspan="3">

Jumlah

</th>

<th rowspan="3">

Rata Formatif

</th>

<th rowspan="3">

ASTS

</th>

<th rowspan="3">

{{ $tahunAktif->semester=='Ganjil'
? 'ASAS'
: 'ASAT' }}

</th>

<th rowspan="3">

Nilai Akhir

</th>

<th rowspan="3">

Predikat

</th>

</tr>
<tr>

@foreach($lingkupMateris as $lm)

<th colspan="{{ $lm->tujuanPembelajarans->count() }}">

LM {{ $loop->iteration }}

</th>

@endforeach

</tr>
<tr>

@foreach($lingkupMateris as $lm)

    @foreach($lm->tujuanPembelajarans as $tp)

        <th>

            {{ $tp->kode_tp }}

        </th>

    @endforeach

@endforeach

</tr>

</thead>

<tbody>
    @foreach($siswas as $siswa)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $siswa->nipd }}

</td>

<td>

{{ $siswa->nama_siswa }}

</td>

@php

$total = 0;

@endphp
@foreach($lingkupMateris as $lm)

    @foreach($lm->tujuanPembelajarans as $tp)

        @php

            $nilai =

            $nilaiTP[$siswa->id][$tp->id]

            ?? 0;

            $total += $nilai;

        @endphp

        <td>

            {{ $nilai ?: '' }}

        </td>

    @endforeach

@endforeach
<td>

{{ $total }}

</td>
<td>

{{ $nilaiSiswa[$siswa->id]->rata_formatif ?? '' }}

</td>
<td>

{{ $nilaiSiswa[$siswa->id]->asts ?? '' }}

</td>
<td>

@if($tahunAktif->semester=='Ganjil')

{{ $nilaiSiswa[$siswa->id]->asas ?? '' }}

@else

{{ $nilaiSiswa[$siswa->id]->asat ?? '' }}

@endif

</td>

<td>

{{ number_format($nilaiSiswa[$siswa->id]->nilai_akhir ?? 0,2) }}

</td>

<td>

@php

$na = $nilaiSiswa[$siswa->id]->nilai_akhir ?? 0;

@endphp

@if($na>=86)

A

@elseif($na>=76)

B

@elseif($na>=66)

C

@elseif($na>=56)

D

@else

E

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>
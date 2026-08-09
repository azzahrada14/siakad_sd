@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Detail Rapor

        </h1>

        <p class="text-gray-500 mt-1">

            Ringkasan hasil belajar peserta didik.

        </p>

    </div>

    <div class="flex gap-3">

        <a
            href="{{ route('rapor.index') }}"
            class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg">

            ← Kembali

        </a>

        <a
            href="{{ route('rapor.print',$rapor->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

            🖨 Cetak Rapor

        </a>

    </div>

</div>
<div class="bg-white rounded-xl shadow mb-6">

<div class="border-b px-6 py-4">

<h2 class="text-lg font-bold">

Identitas Siswa

</h2>

</div>

<div class="grid grid-cols-2 gap-y-4 px-6 py-6">

<div>

<b>Nama Peserta Didik</b>

</div>

<div>

{{ $rapor->siswa->nama_siswa }}

</div>

<div>

<b>NISN</b>

</div>

<div>

{{ $rapor->siswa->nisn }}

</div>

<div>

<b>Kelas</b>

</div>

<div>

{{ $rapor->kelas->nama_kelas }}

</div>

<div>

<b>Semester</b>

</div>

<div>

{{ $rapor->semester }}

</div>

<div>

<b>Tahun Pelajaran</b>

</div>

<div>

{{ $rapor->tahunAjaran->tahun_ajaran }}

</div>

<div>

<b>Wali Kelas</b>

</div>

<div>

{{ $rapor->kelas->waliKelas->nama_guru }}

</div>

</div>

</div>
<div class="grid md:grid-cols-3 gap-5 mb-6">

<div class="bg-blue-50 rounded-xl shadow p-6">

<div class="text-gray-500">

Rata-rata

</div>

<div class="text-3xl font-bold text-blue-700 mt-2">

{{ number_format($rapor->rata_rata,2) }}

</div>

</div>

<div class="bg-green-50 rounded-xl shadow p-6">

<div class="text-gray-500">

Ranking

</div>

<div class="text-3xl font-bold text-green-700 mt-2">

{{ $rapor->ranking }}

</div>

</div>

<div class="bg-yellow-50 rounded-xl shadow p-6">

<div class="text-gray-500">

Jumlah Mapel

</div>

<div class="text-3xl font-bold text-yellow-700 mt-2">

{{ $rapor->details->count() }}

</div>

</div>

</div>
<div class="bg-white rounded-xl shadow mb-6">

<div class="border-b px-6 py-4">

<h2 class="font-bold">

Daftar Nilai

</h2>

</div>

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-3 border text-center w-16">
No
</th>

<th class="p-3 border">
Mata Pelajaran
</th>

<th class="p-3 border text-center w-28">
Nilai Akhir
</th>

<th class="p-3 border text-center w-28">
Predikat
</th>

</tr>

</thead>
<tbody>

@foreach($rapor->details as $detail)

<tr>

<td class="border p-3 text-center">

{{ $loop->iteration }}

</td>

<td class="border p-3">

{{ $detail->mapel->nama_mapel }}

</td>

<td class="border p-3 text-center font-bold">

{{ number_format($detail->nilai_akhir,0) }}

</td>

<td class="border p-3 text-center">

@php
    $nilai = $detail->nilai_akhir;
@endphp

@if($nilai >= 90)

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
A
</span>

@elseif($nilai >= 80)

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
B
</span>

@elseif($nilai >= 70)

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
C
</span>

@else

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
D
</span>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>
<div class="grid md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-6">

<h3 class="font-bold mb-4">

Ekstrakurikuler

</h3>

@forelse($ekstrakurikuler as $item)

<div class="mb-4">

<div class="font-semibold">

{{ $item->masterEkstrakurikuler->nama_ekstrakurikuler }}

</div>

<div class="text-gray-600">

{{ $item->catatan_guru }}

</div>

</div>

@empty

-

@endforelse

</div>
<div class="bg-white rounded-xl shadow p-6">

<h3 class="font-bold mb-4">

Kehadiran

</h3>

<div class="space-y-3">

<div>

Sakit :
<b>{{ $rapor->sakit }}</b> Hari

</div>

<div>

Izin :
<b>{{ $rapor->izin }}</b> Hari

</div>

<div>

Tanpa Keterangan :
<b>{{ $rapor->alfa }}</b> Hari

</div>

</div>

</div>
<div class="bg-white rounded-xl shadow p-6">

<h3 class="font-bold mb-4">

Keputusan

</h3>

@if($rapor->naik_kelas)

<div class="text-green-700 font-semibold">

Naik ke kelas

{{ $rapor->naik_kelas }}

</div>

@else

<div class="text-red-700 font-semibold">

Tinggal di kelas

{{ $rapor->tinggal_kelas }}

</div>

@endif

</div>
</div>

</div>

@endsection
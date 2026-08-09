@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

<div class="max-w-[1700px] mx-auto px-6 py-6">

<div class="flex justify-between items-start mb-6">

<div>

<h1 class="text-3xl font-bold text-slate-800">

Detail Data Kelas

</h1>

<p class="text-gray-500 mt-1">

Informasi lengkap kelas SD Negeri Cimanahayu.

</p>

</div>
</div>

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold">

Informasi Kelas

</h2>

</div>

<div class="grid md:grid-cols-2 gap-6 p-6">
    <div>

<label class="text-sm text-gray-500">

Nama Kelas

</label>

<p class="mt-1 font-semibold text-lg">

{{ $kelas->nama_kelas }}

</p>

</div>
<div>

<label class="text-sm text-gray-500">

Tingkat

</label>

<p class="mt-1">

<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">

{{ $kelas->tingkat }}

</span>

</p>

</div>
<div>

<label class="text-sm text-gray-500">

Wali Kelas

</label>

<p class="mt-1 font-medium">

{{ $kelas->waliKelas->nama_guru ?? '-' }}

</p>

</div>
<div>

<label class="text-sm text-gray-500">

Jumlah Peserta Didik

</label>

<p class="mt-1 font-semibold">

{{ $kelas->siswa->count() }} Siswa

</p>

</div>

</div>

</div>
<div class="bg-white rounded-xl shadow border">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold">

Daftar Peserta Didik

</h2>

</div>

<div class="overflow-x-auto">
    <table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="border px-4 py-3 text-center">

No

</th>

<th class="border px-4 py-3 text-center">

NIPD

</th>

<th class="border px-4 py-3 text-center">

Nama

</th>

<th class="border px-4 py-3 text-center">

JK

</th>

<th class="border px-4 py-3 text-center">

Status

</th>

</tr>

</thead>

<tbody>
    @forelse($kelas->siswa as $siswa)

<tr class="border-t hover:bg-sky-50">

<td class="border px-4 py-3 text-center">

{{ $loop->iteration }}

</td>

<td class="border px-4 py-3 text-center">

{{ $siswa->nipd }}

</td>

<td class="border px-4 py-3 text-center">

{{ $siswa->nama_siswa }}

</td>

<td class="border px-4 py-3 text-center">


{{ $siswa->jenis_kelamin }}

</td>

<td class="border px-4 py-3 text-center">

    @php
        $warna = match($siswa->status_siswa){
            'Aktif' => 'bg-green-100 text-green-700',
            'Lulus' => 'bg-blue-100 text-blue-700',
            'Pindah' => 'bg-yellow-100 text-yellow-700',
            'Keluar' => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700'
        };
    @endphp

    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
        {{ $siswa->status_siswa }}
    </span>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="py-10 text-center text-gray-500">

Belum ada siswa pada kelas ini.

</td>

</tr>

@endforelse
</tbody>

</table>

</div>

</div>

</div>

</div>
<br>
<a
href="{{ route('kelas.index') }}"
class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white">

<x-heroicon-o-arrow-left class="w-5 h-5"/>

Kembali

</a>

@endsection

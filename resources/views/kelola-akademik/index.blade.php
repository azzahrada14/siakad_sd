@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

{{-- ====================================================== --}}
{{-- ALERT --}}
{{-- ====================================================== --}}

@if(session('success'))

<div class="mb-6 rounded-lg bg-green-100 border border-green-300 px-5 py-4 text-green-700">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="mb-6 rounded-lg bg-red-100 border border-red-300 px-5 py-4 text-red-700">

{{ session('error') }}

</div>

@endif

{{-- ====================================================== --}}
{{-- HEADER --}}
{{-- ====================================================== --}}

<div class="flex justify-between items-center mb-8">

<div>

     <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                     <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600"/>

                    Kelola Akademik

                </h2>

<p class="text-gray-500 mt-2">

Generate pembagian kelas berdasarkan Tahun Ajaran Aktif.

</p>

</div>

@if($tahunAktif)

    <div class="mt-5 lg:mt-0">

        <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

            <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">

                Tahun Ajaran Aktif

            </p>

            <h2 class="text-2xl font-bold text-blue-700 mt-1">

                {{ $tahunAktif->tahun_ajaran }}

            </h2>

            <div class="flex justify-between items-center mt-2">

                <span class="text-gray-600 text-sm">

                    Semester {{ $tahunAktif->semester }}

                </span>

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                    <span class="w-2 h-2 rounded-full bg-green-500"></span>

                    Aktif

                </span>

            </div>

        </div>

    </div>

    @endif

</div>
{{-- ====================================================== --}}
{{-- STATISTIK --}}
{{-- ====================================================== --}}

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

@foreach($statistik as $item)

<div class="bg-white rounded-xl shadow border">

<div class="p-6">

<h2 class="text-xl font-bold text-slate-700">

Kelas {{ $item['tingkat'] }}

</h2>

<div class="mt-4">

<p class="text-4xl font-bold text-blue-600">

{{ $item['jumlah'] }}

</p>

<p class="text-gray-500">

Siswa Aktif

</p>

</div>

<div class="mt-4">

@if($item['rombel']==0)

<span class="px-3 py-1 rounded-full bg-gray-100 text-gray-600 text-sm">

Belum Ada Rombel

</span>

@elseif($item['rombel']==1)

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

1 Rombel

</span>

@else

<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

2 Rombel

</span>

@endif

</div>

<form
action="{{ route('kelola-akademik.generate') }}"
method="POST"
class="mt-6">

@csrf

<input
type="hidden"
name="tingkat"
value="{{ $item['tingkat'] }}">

@if($item['jumlah']==0)

<button
disabled
class="w-full py-3 rounded-lg bg-gray-300 text-gray-600">

Tidak Ada Siswa

</button>

@else

<button
onclick="return confirm('Generate ulang akan menghapus pembagian sebelumnya. Lanjutkan?')"
class="w-full py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

Generate Pembagian

</button>

@endif

</form>

</div>

</div>

@endforeach

</div>
{{-- ====================================================== --}}
{{-- HASIL PEMBAGIAN KELAS --}}
{{-- ====================================================== --}}

<div class="bg-white rounded-xl shadow border">

<div class="px-6 py-5 border-b flex justify-between items-center">

<h2 class="text-xl font-bold text-slate-800">

Hasil Pembagian Kelas

</h2>

</div>

<form
action="{{ route('kelola-akademik.simpan') }}"
method="POST">

@csrf

<div class="overflow-x-auto">

<table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="border px-4 py-3 text-center">

No

</th>

<th class="border px-4 py-3">

Kelas

</th>

<th class="border px-4 py-3">

Wali Kelas

</th>

<th class="border px-4 py-3">

Ruang Kelas

</th>

<th class="border px-4 py-3 text-center">

L

</th>

<th class="border px-4 py-3 text-center">

P

</th>

<th class="border px-4 py-3 text-center">

Total

</th>

<th class="border px-4 py-3 text-center">

Status

</th>

<th class="border px-4 py-3 text-center">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($kelas as $item)

<tr class="hover:bg-slate-50">

<td class="border px-4 py-4 text-center">

{{ $loop->iteration }}

</td>

<td class="border px-4 py-4 font-semibold">

{{ $item->nama_kelas }}

</td>

<td class="border px-4 py-4">

<select

name="wali_kelas[{{ $item->id }}]"

class="w-full rounded-lg border-gray-300">

<option value="">

-- Pilih Guru --

</option>

@foreach($guru as $g)

<option

value="{{ $g->id }}"

{{ $item->wali_kelas_id==$g->id ? 'selected' : '' }}>

{{ $g->nama_guru }}

</option>

@endforeach

</select>

</td>
<td class="border px-4 py-3 align-middle">
    <div class="flex justify-center">
        <input
            type="text"
            name="ruang_kelas[{{ $item->id }}]"
            value="{{ old('ruang_kelas.'.$item->id, $item->ruang_kelas) }}"
            placeholder="R01"
            class="w-24 rounded-lg border border-gray-300 px-3 py-2 text-center focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
    </div>
</td>

<td class="border px-4 py-4 text-center">

{{ $item->jumlah_l }}

</td>

<td class="border px-4 py-4 text-center">

{{ $item->jumlah_p }}

</td>

<td class="border px-4 py-3 text-center font-semibold">
    {{ $item->jumlah_siswa }}/30
</td>

<td class="border px-4 py-3 text-center">
    @if($item->jumlah_siswa == 0)

        <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">
            Kosong
        </span>

    @elseif($item->jumlah_siswa >= 30)

        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
            Penuh
        </span>

    @else

        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
            Tersedia
        </span>

    @endif
</td>

<td class="border px-4 py-4">

<div class="flex justify-center gap-2">

    {{-- Detail --}}
    <button
        type="button"
        onclick="document.getElementById('detail{{ $item->id }}').classList.remove('hidden');document.body.classList.add('overflow-hidden');"
        class="w-9 h-9 rounded-lg bg-blue-100 hover:bg-blue-200 flex items-center justify-center"
        title="Detail">

        <x-heroicon-o-eye class="w-5 h-5 text-blue-600"/>

    </button>

    {{-- Cetak PDF --}}
    <a
        href="{{ route('kelola-akademik.cetak',$item->id) }}"
        target="_blank"
        class="w-9 h-9 rounded-lg bg-red-100 hover:bg-red-200 flex items-center justify-center"
        title="Cetak PDF">

        <x-heroicon-o-printer class="w-5 h-5 text-red-600"/>

    </a>

    {{-- Export Excel --}}
    <a
        href="{{ route('kelola-akademik.export',$item->id) }}"
        class="w-9 h-9 rounded-lg bg-green-100 hover:bg-green-200 flex items-center justify-center"
        title="Export Excel">

        <x-heroicon-o-document-arrow-down class="w-5 h-5 text-green-600"/>

    </a>

</div>

</td>

</div>

</td>

</tr>

@empty

<tr>

<td

colspan="8"

class="border py-10 text-center text-gray-500">

Belum ada pembagian kelas.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>
</div>
<br>
<button
type="submit"
class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white">

<x-heroicon-o-check-circle
class="w-5 h-5"/>

Simpan Wali Kelas

</button>

</div>

</form>

{{-- ====================================================== --}}
{{-- DETAIL KELAS --}}
{{-- ====================================================== --}}

@foreach($kelas as $item)

<div
id="detail{{ $item->id }}"
class="fixed inset-0 bg-black/40 hidden z-50 overflow-y-auto">

<div class="flex items-start justify-center min-h-screen p-6">

<div class="bg-white rounded-xl shadow-xl w-full max-w-5xl h-[90vh] flex flex-col">

<div class="flex justify-between items-center border-b px-6 py-4">

<div>

<h2 class="text-2xl font-bold">

Kelas {{ $item->nama_kelas }}

</h2>

<p class="text-gray-500">

Tahun Ajaran

{{ $tahunAktif->tahun_ajaran }}

Semester {{ $tahunAktif->semester }}

</p>

</div>

<button

type="button"

onclick="document.getElementById('detail{{ $item->id }}').classList.add('hidden')"

class="text-gray-500 hover:text-red-600 text-3xl">

&times;

</button>

</div>

<div class="grid grid-cols-4 gap-5 p-6">

<div class="bg-blue-50 rounded-lg p-5">

<p class="text-gray-500">

Total

</p>

<h2 class="text-3xl font-bold text-blue-600">

{{ $item->jumlah_siswa }}

</h2>

</div>

<div class="bg-green-50 rounded-lg p-5">

<p class="text-gray-500">

Laki-laki

</p>

<h2 class="text-3xl font-bold text-green-600">

{{ $item->jumlah_l }}

</h2>

</div>

<div class="bg-pink-50 rounded-lg p-5">

<p class="text-gray-500">

Perempuan

</p>

<h2 class="text-3xl font-bold text-pink-600">

{{ $item->jumlah_p }}

</h2>

</div>

<div class="bg-yellow-50 rounded-lg p-5">

<p class="text-gray-500">

Wali Kelas

</p>

<h2 class="font-bold">

{{ optional($item->waliKelas)->nama_guru ?? '-' }}

</h2>

</div>

</div>

<div class="flex-1 px-6 pb-6 overflow-hidden">

    <div class="overflow-y-auto overflow-x-auto h-full border rounded-lg">

<table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="border px-3 py-3 text-center">

No

</th>

<th class="border px-3 py-3">

NIPD

</th>

<th class="border px-3 py-3">

NISN

</th>

<th class="border px-3 py-3">

Nama Siswa

</th>

<th class="border px-3 py-3 text-center">

JK

</th>

</tr>

</thead>

<tbody>

@forelse($item->anggotaKelas->sortBy('siswa.nama_siswa') as $anggota)

<tr>

<td class="border px-3 py-3 text-center">

{{ $loop->iteration }}

</td>

<td class="border px-3 py-3">

{{ $anggota->siswa->nipd }}

</td>

<td class="border px-3 py-3">

{{ $anggota->siswa->nisn }}

</td>

<td class="border px-3 py-3">

{{ $anggota->siswa->nama_siswa }}

</td>

<td class="border px-3 py-3 text-center">

{{ $anggota->siswa->jenis_kelamin }}

</td>

</tr>
@empty

<tr>

<td colspan="11" class="py-12">

<div class="text-center">

 <x-heroicon-o-academic-cap class="mx-auto h-16 w-16 text-gray-300"/>

<h3 class="mt-4 text-lg font-semibold text-gray-700">

Belum Ada Pembagian siswa.

</h3>

<p class="mt-2 text-gray-500">

Silakan tambahkan atur pembagian siswa terlebih dahulu.

</p>

</div>

</td>

</tr>

@endforelse


</tbody>

</table>

    </div>

</div>

<div class="border-t px-6 py-4 flex justify-end">

<button

type="button"

onclick="document.getElementById('detail{{ $item->id }}').classList.add('hidden')"

class="px-6 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white">

Tutup

</button>

</div>

</div>

</div>

</div>

@endforeach

</div>

@endsection
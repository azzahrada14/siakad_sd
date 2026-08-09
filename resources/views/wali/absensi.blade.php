@extends('layouts.app')

@section('content')

<div class="max-w-[98%] mx-auto py-6">

    {{-- HEADER --}}
    <div class="bg-white rounded-2xl shadow border p-8 mb-6">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="flex items-center gap-3 text-3xl font-bold text-slate-800">
                        <x-heroicon-o-clipboard-document-check class="w-8 h-8 text-blue-600" />
                    Rekap Absensi Siswa

                </h1>

                <p class="text-gray-500 mt-2">

                    Daftar Hadir Siswa Dalam Bulan

                </p>

            </div>
 {{-- Informasi Kanan --}}
        <div class="flex flex-col lg:flex-row gap-4">

            @if($tahunAktif)
            <div class="bg-blue-50 border border-blue-200 rounded-xl px-6 py-4 shadow-sm min-w-[260px]">

                <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                    Tahun Ajaran Aktif
                </p>

                <h3 class="text-2xl font-bold text-blue-700 mt-1">
                    {{ $tahunAktif->tahun_ajaran }}
                </h3>

                <div class="flex justify-between items-center mt-2">

                    <span class="text-gray-600">
                        Semester {{ $tahunAktif->semester }}
                    </span>

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Aktif
                    </span>

                </div>

            </div>
            @endif
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow border p-6 mb-6">

    <form method="GET" action="{{ route('wali.absensi') }}">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-5">

            {{-- KELAS --}}
            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Kelas
                </label>

                <input
                    type="text"
                    readonly
                    value="{{ $kelas->nama_kelas }}"
                    class="w-full rounded-xl bg-gray-100 border-gray-300">

            </div>

            {{-- BULAN --}}
            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Bulan
                </label>

                   @php
$bulanIndonesia = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];
@endphp

<select name="bulan" class="w-full rounded-xl border-gray-300">

    @for($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}" @selected($bulan == $i)>
            {{ $bulanIndonesia[$i] }}
        </option>
    @endfor

</select>

            </div>

            {{-- MATA PELAJARAN --}}
            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Mata Pelajaran
                </label>

                <select
                    name="mapel_id"
                    class="w-full rounded-xl border-gray-300">

                    <option value="">
                        Semua Mata Pelajaran
                    </option>

                    @foreach($mapels as $mapel)

                        <option
                            value="{{ $mapel->id }}"
                            @selected($mapelId == $mapel->id)>

                            {{ $mapel->nama_mapel }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- TAHUN AJARAN --}}
            <div>

                <label class="block mb-2 text-sm font-semibold">
                    Tahun Ajaran
                </label>

                <input
                    type="text"
                    readonly
                    value="{{ $tahunAktif->tahun_ajaran }}"
                    class="w-full rounded-xl bg-gray-100 border-gray-300">

                

            </div>

            {{-- FILTER --}}
            <div class="flex items-end">

                <button
                    type="submit"
                    class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white py-3">

                    <x-heroicon-o-funnel class="w-5 h-5"/>

                    Tampilkan Rekap

                </button>

            </div>

            {{-- EXPORT --}}
            <div class="flex items-end">

                <a
                    href="{{ route('wali.absensi.export',[
                        'bulan' => $bulan,
                        'mapel_id' => $mapelId
                    ]) }}"
                    class="w-full inline-flex justify-center items-center gap-2 rounded-xl bg-green-600 hover:bg-green-700 text-white py-3">

                    <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

                    Export Excel

                </a>

            </div>

        </div>

    </form>

</div>

</div>
<div class="bg-white rounded-2xl shadow border overflow-auto">

<table class="min-w-max w-full border-collapse text-sm">

<thead>

<tr class="bg-gray-600 text-white">

<th rowspan="2"
class="border px-3 py-3">

No

</th>

<th rowspan="2"
class="border px-5 py-3 min-w-[220px]">

Nama Siswa

</th>

<th rowspan="2"
class="border px-4 py-3">

NIPD

</th>

<th colspan="{{ $jumlahHari }}"
class="border px-4 py-3 text-center">

Tanggal

</th>

<th colspan="5"
class="border px-4 py-3">

Rekap

</th>

</tr>

<tr class="bg-gray-500 text-white">

@for($i=1;$i<=$jumlahHari;$i++)

<th class="border px-3 py-2">

{{ $i }}

</th>

@endfor

<th class="border px-3">

H

</th>

<th class="border px-3">

I

</th>

<th class="border px-3">

S

</th>

<th class="border px-3">

A

</th>

<th class="border px-3">

%

</th>

</tr>

</thead>

<tbody>
    @forelse($data as $item)

<tr class="hover:bg-blue-50">

<td class="border text-center">

{{ $loop->iteration }}

</td>

<td class="border px-3">

<div class="font-semibold">

{{ $item['siswa']->nama_siswa }}

</div>

</td>

<td class="border text-center">

{{ $item['siswa']->nipd }}

</td>
@for($i=1;$i<=$jumlahHari;$i++)

@php

$status = $item['tanggal'][$i];

@endphp

<td class="border text-center">

@if($status=='H')

<span class="font-bold text-green-600">

H

</span>

@elseif($status=='I')

<span class="font-bold text-yellow-600">

I

</span>

@elseif($status=='S')

<span class="font-bold text-blue-600">

S

</span>

@elseif($status=='A')

<span class="font-bold text-red-600">

A

</span>

@else

-

@endif

</td>

@endfor
<td class="border text-center bg-green-50 font-semibold">

{{ $item['hadir'] }}

</td>

<td class="border text-center bg-yellow-50 font-semibold">

{{ $item['izin'] }}

</td>

<td class="border text-center bg-blue-50 font-semibold">

{{ $item['sakit'] }}

</td>

<td class="border text-center bg-red-50 font-semibold">

{{ $item['alfa'] }}

</td>

<td class="border text-center font-bold">

{{ $item['persentase'] }}%

</td>

</tr>
@empty

<tr>

<td
colspan="{{ $jumlahHari+8 }}"
class="py-12 text-center text-gray-500">

Belum ada data absensi.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection
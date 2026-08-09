@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

   {{-- ===================================================== --}}
{{-- HEADER --}}
{{-- ===================================================== --}}
{{-- HEADER --}}

<div class="bg-white rounded-2xl shadow border p-8 mb-8">

    <div class="flex justify-between items-start">

        <div>

            <h1 class="flex items-center gap-3 text-3xl font-bold text-slate-800">
                <x-heroicon-o-clipboard-document-check class="w-9 h-9 text-blue-600" />
                Input Absensi Siswa
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola kehadiran siswa berdasarkan jadwal mengajar.
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
{{-- ===================================================== --}}
{{-- INFORMASI JADWAL --}}
{{-- ===================================================== --}}

<div class="bg-white rounded-2xl shadow border p-6 mb-8">

    <div class="grid grid-cols-2 lg:grid-cols-5 gap-5">

        <div>

            <p class="text-sm text-gray-500">

                Hari

            </p>

            <h3 class="font-bold text-lg">

                {{ now()->translatedFormat('l') }}

            </h3>

        </div>

        <div>

            <p class="text-sm text-gray-500">

                Tanggal

            </p>

            <h3 class="font-bold text-lg">

                {{ now()->format('d M Y') }}

            </h3>

        </div>

        <div>

            <p class="text-sm text-gray-500">

                Tahun Ajaran

            </p>

        <h3 class="font-bold text-lg">
    {{ $tahunAktif->tahun_ajaran ?? '-' }}
</h3>

        </div>

        <div>

            <p class="text-sm text-gray-500">

                Semester

            </p>

            <h3 class="font-bold text-lg">

                {{ $tahunAktif->semester ?? '-' }}

            </h3>

        </div>

        <div>

            <p class="text-sm text-gray-500">

                Mata Pelajaran

            </p>

            <h3 class="font-bold text-lg">

                @php
                    $mapelAktif = $mapels->where('id', request('mapel'))->first();
                @endphp

                {{ $mapelAktif->nama_mapel ?? '-' }}

            </h3>

        </div>

    </div>

</div>

    {{-- ===================================================== --}}
{{-- FILTER --}}
{{-- ===================================================== --}}

<div class="bg-white rounded-2xl shadow border p-6 mb-8">

<form
    method="GET"
    action="{{ route('absensi.index') }}">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">

    {{-- ========================= --}}
{{-- KELAS --}}
{{-- ========================= --}}

@php
    $guru  = Auth::user()->guru;
    $wali  = $guru?->waliKelas;
    $jenis = $guru?->jenis_pengajar;
@endphp

@if($jenis == 'Wali Kelas')

    <div>
        <label class="block text-sm font-semibold mb-2">
            Kelas
        </label>

        <input
            type="text"
            readonly
            value="{{ $wali->nama_kelas ?? '-' }}"
            class="w-full rounded-xl bg-gray-100 border-gray-300">

        <input
            type="hidden"
            name="kelas"
            value="{{ $wali->id ?? '' }}">
    </div>

@else

    <div>
        <label class="block text-sm font-semibold mb-2">
            Kelas
        </label>

        <select
            name="kelas"
            class="w-full rounded-xl border-gray-300">

            <option value="">Pilih Kelas</option>

            @foreach($kelas as $k)
                <option
                    value="{{ $k->id }}"
                    @selected(request('kelas') == $k->id)>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach

        </select>
    </div>

@endif


{{-- ========================= --}}
{{-- TAHUN AJARAN --}}
{{-- ========================= --}}

<div>
    <label class="block text-sm font-semibold mb-2">
        Tahun Ajaran
    </label>

    <input
        type="text"
        readonly
        value="{{ $tahunAktif->tahun_ajaran }}"
        class="w-full rounded-xl bg-gray-100 border-gray-300">

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ $tahunAktif->id }}">
</div>


{{-- ========================= --}}
{{-- SEMESTER --}}
{{-- ========================= --}}

<div>
    <label class="block text-sm font-semibold mb-2">
        Semester
    </label>

    <input
        type="text"
        readonly
        value="{{ $tahunAktif->semester }}"
        class="w-full rounded-xl bg-gray-100 border-gray-300">

    <input
        type="hidden"
        name="semester"
        value="{{ $tahunAktif->semester }}">
</div>


{{-- ========================= --}}
{{-- MATA PELAJARAN --}}
{{-- ========================= --}}

<div>
    <label class="block text-sm font-semibold mb-2">
        Mata Pelajaran
    </label>

    <select
        name="mapel"
        class="w-full rounded-xl border-gray-300">

        <option value="">Pilih Mata Pelajaran</option>

        @foreach($mapels as $mapel)
            <option
                value="{{ $mapel->id }}"
                @selected(request('mapel') == $mapel->id)>
                {{ $mapel->nama_mapel }}
            </option>
        @endforeach

    </select>
</div>


{{-- ========================= --}}
{{-- TANGGAL --}}
{{-- ========================= --}}

<div>
    <label class="block text-sm font-semibold mb-2">
        Tanggal
    </label>

    <input
        type="date"
        name="tanggal"
        value="{{ request('tanggal', date('Y-m-d')) }}"
        class="w-full rounded-xl border-gray-300">
</div>


{{-- ========================= --}}
{{-- BUTTON --}}
{{-- ========================= --}}

<div class="flex items-end">
    <button
        type="submit"
        class="w-full rounded-xl bg-blue-600 py-3 font-semibold text-white hover:bg-blue-700">

        Filter Data

    </button>
</div>

</div>

</form>

</div>
<form
    method="POST"
    action="{{ route('absensi.mass.store') }}">

@csrf

<input type="hidden"
       name="kelas_id"
       value="{{ $filter['kelas_id'] }}">

<input type="hidden"
       name="tahun_ajaran_id"
       value="{{ $filter['tahun_ajaran_id'] }}">

<input type="hidden"
       name="semester"
       value="{{ $filter['semester'] }}">

<input type="hidden"
       name="tanggal"
       value="{{ $filter['tanggal'] }}">

<input type="hidden"
       name="mapel"
       value="{{ $filter['mapel_id'] }}">

    <div class="flex gap-3">


    </div>

      {{-- BUTTON --}}

            <div class="mt-6 flex justify-between items-center">
    @if($siswas->count())

        <button
            type="submit"
            class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

            <x-heroicon-o-check-circle class="w-5 h-5"/>

            Simpan Absensi

        </button>

    @endif

</div>
<br>
        {{-- TABLE --}}
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full text-sm">

<thead class="bg-gray-500 text-white">

<tr>

    <th class="border px-4 py-4 text-center w-16">

        No

    </th>

    <th class="border px-4 py-4 text-center">

        NIPD

    </th>

    <th class="border px-4 py-4 text-center">

        Nama Siswa

    </th>

    <th class="border px-4 py-4 text-center">

        JK

    </th>

    <th class="border px-4 py-4 text-center">

        Status Kehadiran

    </th>

    <th class="border px-4 py-4 text-center">

        Aksi

    </th>

</tr>

</thead>
                <tbody>



@forelse($siswas as $siswa)

@php
    $absen = $absensiSiswa[$siswa->id] ?? null;
@endphp

<tr class="border-b hover:bg-blue-50 transition">

    {{-- NO --}}
    <td class="border px-4 py-4 text-center">
        {{ $loop->iteration }}
    </td>

    {{-- NIPD --}}
    <td class="border px-4 py-4 text-center">
        {{ $siswa->nipd }}
    </td>

    {{-- NAMA --}}
    <td class="border px-4 py-4">

        <div class="font-semibold text-slate-800">
            {{ $siswa->nama_siswa }}
        </div>

        <div class="text-xs text-gray-500 mt-1">
            NISN : {{ $siswa->nisn }}
        </div>

    </td>

    {{-- JK --}}
    <td class="border px-4 py-4 text-center">

        @if($siswa->jenis_kelamin == 'L')

            <span class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                L
            </span>

        @else

            <span class="inline-flex px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">
                P
            </span>

        @endif

    </td>

    {{-- STATUS --}}
    <td class="border px-4 py-4 text-center">

        @if($absen)

            @php
                $status = strtolower($absen->status);
            @endphp

            @switch($status)

                @case('hadir')

                    <span class="inline-flex px-4 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                        Hadir
                    </span>

                @break

                @case('izin')

                    <span class="inline-flex px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                        Izin
                    </span>

                @break

                @case('sakit')

                    <span class="inline-flex px-4 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                        Sakit
                    </span>

                @break

                @default

                    <span class="inline-flex px-4 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                        Alfa
                    </span>

            @endswitch

        @else

            <input
                type="hidden"
                name="siswa_id[]"
                value="{{ $siswa->id }}">

            <select
                name="status[{{ $siswa->id }}]"
                class="w-full rounded-xl border-gray-300">

                <option value="hadir">🟢 Hadir</option>
                <option value="izin">🟡 Izin</option>
                <option value="sakit">🔵 Sakit</option>
                <option value="alfa">🔴 Alfa</option>

            </select>

        @endif

    </td>

    {{-- AKSI --}}
    <td class="border px-4 py-4 text-center">

        @if($absen)

            <a
                href="{{ route('absensi.edit',$absen->id) }}"
                class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-amber-100 hover:bg-amber-200">

                <x-heroicon-o-pencil-square class="w-5 h-5 text-amber-600"/>

            </a>

        @else

            <span class="text-gray-400">-</span>

        @endif

    </td>

</tr>

@empty

<tr>

    <td
        colspan="6"
        class="py-16 text-center text-gray-500">

        Belum ada data siswa.

    </td>

</tr>

@endforelse

</tbody>

            </table>

        </div>

<div>
        {{-- BUTTON --}}

            <div class="mt-6 flex justify-between items-center">
    @if($siswas->count())

        <button
            type="submit"
            class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

            <x-heroicon-o-check-circle class="w-5 h-5"/>

            Simpan Absensi

        </button>

    @endif

</div>
</form>


@endsection
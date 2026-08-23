@extends('layouts.app')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<div class="mb-6">

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-5">

        {{-- JUDUL --}}
        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Rekap Nilai
            </h1>

            <p class="text-gray-500 mt-2">
                Rekap nilai siswa berdasarkan periode tahun ajaran dan semester.
            </p>

        </div>


        {{-- PERIODE AKADEMIK --}}
        <div class="bg-blue-50 border border-blue-200 rounded-xl px-5 py-4 min-w-[280px]">

            <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                Periode Akademik
            </p>

            <h2 class="text-2xl font-bold text-blue-700 mt-1">
                {{ $tahunAjaran->tahun_ajaran }}
            </h2>

            <div class="flex items-center justify-between mt-2">

                <span class="text-sm text-gray-600">
                    Semester {{ $tahunAjaran->semester }}
                </span>

                @if($modeArsip)

                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
                        Arsip
                    </span>

                @else

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Aktif
                    </span>

                @endif

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    MODE ARSIP
========================================================= --}}
@if($modeArsip)

<div class="bg-yellow-50 border border-yellow-200 rounded-xl px-5 py-4 mb-6">

    <div class="flex items-start gap-3">

        <div class="mt-0.5">

            <x-heroicon-o-archive-box
                class="w-6 h-6 text-yellow-600"
            />

        </div>

        <div>

            <h3 class="font-semibold text-yellow-800">
                Mode Arsip
            </h3>

            <p class="text-sm text-yellow-700 mt-1">
                Anda sedang melihat data nilai pada
                {{ $tahunAjaran->tahun_ajaran }}
                semester
                {{ $tahunAjaran->semester }}.
                Data pada periode ini hanya dapat dilihat dan tidak dapat diubah.
            </p>

        </div>

    </div>

</div>

@endif


{{-- =========================================================
    FILTER
========================================================= --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

    <div class="mb-5">

        <h2 class="text-lg font-semibold text-gray-800">
            Filter Rekap Nilai
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Pilih kelas dan mata pelajaran untuk melihat rekap nilai.
        </p>

    </div>


    <form method="GET" action="{{ route('operator.rekap-nilai') }}">

        {{-- Tetap membawa tahun ajaran --}}
        <input
            type="hidden"
            name="tahun_ajaran_id"
            value="{{ $tahunAjaran->id }}"
        >


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

            {{-- KELAS --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kelas
                </label>

                <select
                    name="kelas_id"
                    class="w-full rounded-lg border-gray-300
                           focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    @foreach($kelass as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ request('kelas_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_kelas }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- MAPEL --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Mata Pelajaran
                </label>

                <select
                    name="mapel"
                    class="w-full rounded-lg border-gray-300
                           focus:border-blue-500 focus:ring-blue-500"
                >

                    <option value="">
                        -- Pilih Mata Pelajaran --
                    </option>

                    @foreach($mapels as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ request('mapel') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_mapel }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- BUTTON --}}
            <div class="flex items-end">

                <button
                    type="submit"
                    class="w-full inline-flex items-center justify-center gap-2
                           px-5 py-3
                           bg-blue-600 hover:bg-blue-700
                           text-white rounded-lg
                           font-medium transition"
                >

                    <x-heroicon-o-magnifying-glass class="w-5 h-5"/>

                    Tampilkan

                </button>

            </div>

        </div>

    </form>

</div>


{{-- =========================================================
    HASIL REKAP
========================================================= --}}
@if($kelas && $mapel)

<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

    {{-- HEADER HASIL --}}
    <div class="px-6 py-5 border-b border-gray-200">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>

                <h2 class="text-lg font-semibold text-gray-800">
                    Rekap Nilai Siswa
                </h2>

                <p class="text-sm text-gray-500 mt-1">

                    Kelas:
                    <span class="font-semibold text-gray-700">
                        {{ $kelas->nama_kelas }}
                    </span>

                    &nbsp; | &nbsp;

                    Mata Pelajaran:
                    <span class="font-semibold text-gray-700">
                        {{ $mapel->nama_mapel }}
                    </span>

                </p>

            </div>


            <div class="text-sm text-gray-500">

                Semester
                <span class="font-semibold text-gray-700">
                    {{ $tahunAjaran->semester }}
                </span>

            </div>

        </div>

    </div>


    {{-- TABEL --}}
    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 border-b border-gray-200">

                <tr>

                    <th class="border px-4 py-3 text-center font-semibold text-gray-700">
                        No
                    </th>

                    <th class="border px-4 py-3 text-left font-semibold text-gray-700">
                        NISN
                    </th>

                    <th class="border px-4 py-3 text-left font-semibold text-gray-700">
                        Nama Siswa
                    </th>

                    <th class="border px-4 py-3 text-center font-semibold text-gray-700">
                        Rata-rata Formatif
                    </th>

                    <th class="px-4 py-3 text-center font-semibold text-gray-700">
                        Nilai Akhir
                    </th>

                    <th class="border px-4 py-3 text-center font-semibold text-gray-700">
                        Deskripsi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-100">

                @forelse($siswas as $index => $siswa)

                    @php

                        $nilai = $nilaiSiswa[$siswa->id] ?? null;

                    @endphp

                    <tr class="hover:bg-gray-50">

                        {{-- NO --}}
                        <td class="border px-4 py-3 text-center">
                            {{ $index + 1 }}
                        </td>


                        {{-- NISN --}}
                        <td class="border px-4 py-3">

                            {{ $siswa->nisn ?? '-' }}

                        </td>


                        {{-- NAMA --}}
                        <td class="border px-4 py-3 font-medium text-gray-800">

                            {{ $siswa->nama_siswa }}

                        </td>


                        {{-- FORMATIF --}}
                        <td class="border px-4 py-3 text-center">

                            @if($nilai && $nilai->rata_formatif !== null)

                                {{ $nilai->rata_formatif }}

                            @else

                                -

                            @endif

                        </td>


                        {{-- NILAI AKHIR --}}
                        <td class="border px-4 py-3 text-center font-semibold">

                            @if($nilai && $nilai->nilai_akhir !== null)

                                {{ $nilai->nilai_akhir }}

                            @else

                                -

                            @endif

                        </td>


                        {{-- DESKRIPSI --}}
                        <td class="border px-4 py-3 text-left">

                            {{ $nilai->deskripsi ?? '-' }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-10 text-center text-gray-500"
                        >

                            Belum ada data siswa pada kelas ini.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- FOOTER --}}
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">

        <p class="text-sm text-gray-500">

            Menampilkan
            <span class="font-semibold text-gray-700">
                {{ $siswas->count() }}
            </span>
            siswa.

            Data berasal dari periode
            <span class="font-semibold text-gray-700">
                {{ $tahunAjaran->tahun_ajaran }}
                - {{ $tahunAjaran->semester }}
            </span>.

        </p>

    </div>

</div>


@else


{{-- =========================================================
    BELUM MEMILIH FILTER
========================================================= --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12">

    <div class="flex flex-col items-center justify-center text-center">

        <div class="w-16 h-16 rounded-full bg-blue-100
                    flex items-center justify-center mb-4">

            <x-heroicon-o-chart-bar
                class="w-8 h-8 text-blue-600"
            />

        </div>


        <h3 class="text-lg font-semibold text-gray-800">
            Pilih Kelas dan Mata Pelajaran
        </h3>


        <p class="text-sm text-gray-500 mt-2 max-w-md">

            Silakan pilih kelas dan mata pelajaran
            untuk melihat rekap nilai pada semester
            {{ $tahunAjaran->semester }}.

        </p>

    </div>

</div>

@endif


{{-- =========================================================
    KEMBALI
========================================================= --}}
<div class="mt-6">

    <a
        href="{{ route('tahun-ajaran.riwayat', $tahunAjaran->id) }}"
        class="inline-flex items-center gap-2
               px-4 py-2
               bg-gray-500 hover:bg-gray-600
               text-white rounded-lg
               transition"
    >

        ← Kembali

    </a>

</div>

@endsection
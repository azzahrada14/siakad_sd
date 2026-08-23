@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- ===================================================== --}}
    {{-- HEADER --}}
    {{-- ===================================================== --}}

    <div class="bg-gradient-to-r from-purple-600 to-purple-500
                rounded-3xl shadow-xl overflow-hidden mb-10">

        <div class="px-10 py-12 text-center text-white">

            <img src="{{ asset('logo.png') }}"
                 class="w-24 h-24 mx-auto mb-5 object-contain">

            <h1 class="text-4xl font-extrabold mb-3">
                Riwayat Akademik
            </h1>

            <p class="text-purple-100 text-lg">
                SD Negeri Cimanahayu
            </p>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- INFORMASI GURU --}}
    {{-- ===================================================== --}}

    <div class="bg-white rounded-2xl shadow border p-6 mb-8">

        <div class="flex flex-col md:flex-row
                    md:items-center md:justify-between gap-5">

            <div>

                <p class="text-sm text-gray-500">
                    Guru
                </p>

                <h2 class="text-2xl font-bold text-slate-800">
                    {{ $guru->nama_guru }}
                </h2>

            </div>


            @if($guru->role_guru === 'wali' && $kelas)

                <div class="bg-yellow-50 border border-yellow-200
                            rounded-xl px-5 py-4">

                    <p class="text-xs text-yellow-600 font-semibold">
                        WALI KELAS
                    </p>

                    <p class="text-xl font-bold text-yellow-700">
                        {{ $kelas->nama_kelas }}
                    </p>

                </div>

            @else

                <div class="bg-blue-50 border border-blue-200
                            rounded-xl px-5 py-4">

                    <p class="text-xs text-blue-600 font-semibold">
                        ROLE
                    </p>

                    <p class="text-xl font-bold text-blue-700">
                        Guru Mata Pelajaran
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- FILTER RIWAYAT --}}
    {{-- ===================================================== --}}

    <div class="bg-white rounded-2xl shadow border p-6 mb-8">

        <div class="mb-5">

            <h2 class="text-xl font-bold text-slate-800">
                Pilih Periode Akademik
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                Pilih tahun ajaran dan semester untuk melihat arsip akademik.
            </p>

        </div>


        <form method="GET"
              action="{{ route('guru.riwayat') }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- TAHUN AJARAN --}}

                <div>

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Tahun Ajaran

                    </label>

                    <select
                        name="tahun_ajaran_id"
                        class="w-full border-gray-300 rounded-xl
                               px-4 py-3 focus:ring-purple-500
                               focus:border-purple-500">

                        <option value="">
                            -- Pilih Tahun Ajaran --
                        </option>

                        @foreach($tahunAjaran as $tahun)

                            <option
                                value="{{ $tahun->id }}"
                                {{ request('tahun_ajaran_id') == $tahun->id ? 'selected' : '' }}>

                                {{ $tahun->tahun_ajaran }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- SEMESTER --}}

                <div>

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Semester

                    </label>

                    <select
                        name="semester"
                        class="w-full border-gray-300 rounded-xl
                               px-4 py-3 focus:ring-purple-500
                               focus:border-purple-500">

                        <option value="">
                            -- Pilih Semester --
                        </option>

                        <option value="Ganjil"
                            {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>

                            Ganjil

                        </option>

                        <option value="Genap"
                            {{ request('semester') == 'Genap' ? 'selected' : '' }}>

                            Genap

                        </option>

                    </select>

                </div>


                {{-- BUTTON --}}

                <div class="flex items-end">

                    <button
                        type="submit"
                        class="w-full bg-purple-600
                               hover:bg-purple-700
                               text-white px-5 py-3
                               rounded-xl font-semibold">

                        Tampilkan Riwayat

                    </button>

                </div>

            </div>

        </form>

    </div>


    {{-- ===================================================== --}}
    {{-- INFORMASI PERIODE --}}
    {{-- ===================================================== --}}

    @if($tahunAjaranDipilih || $semesterDipilih)

        <div class="bg-purple-50 border border-purple-200
                    rounded-xl p-5 mb-8">

            <div class="flex flex-col md:flex-row
                        md:justify-between gap-3">

                <div>

                    <p class="text-sm text-purple-600 font-semibold">
                        PERIODE YANG DIPILIH
                    </p>

                    <h3 class="text-xl font-bold text-purple-800 mt-1">

                        {{ $tahunAjaranDipilih->tahun_ajaran ?? 'Tahun ajaran belum dipilih' }}

                    </h3>

                </div>

                <div class="flex items-center">

                    <span class="px-4 py-2 rounded-full
                                 bg-white text-purple-700
                                 font-semibold border border-purple-200">

                        Semester
                        {{ $semesterDipilih ?? '-' }}

                    </span>

                </div>

            </div>

        </div>

    @endif


    {{-- ===================================================== --}}
    {{-- MENU ARSIP --}}
    {{-- ===================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2
                xl:grid-cols-4 gap-6">


        {{-- ================================================= --}}
        {{-- NILAI --}}
        {{-- ================================================= --}}

        <div class="bg-white rounded-2xl shadow border p-6">

            <div class="w-14 h-14 rounded-xl bg-blue-100
                        flex items-center justify-center">

                <x-heroicon-o-chart-bar
                    class="w-7 h-7 text-blue-600"/>

            </div>

            <h3 class="mt-5 text-xl font-bold text-blue-700">
                Nilai
            </h3>

            <p class="text-gray-500 mt-2">
                Lihat data nilai berdasarkan periode akademik.
            </p>

            <a
                href="{{ route('nilai.index', [
                    'tahun_ajaran' => request('tahun_ajaran_id'),
                    'semester' => request('semester')
                ]) }}"
                class="mt-6 inline-flex items-center gap-2
                       rounded-lg bg-blue-600 hover:bg-blue-700
                       text-white px-5 py-2">

                Lihat Nilai

            </a>

        </div>


        {{-- ================================================= --}}
        {{-- ABSENSI --}}
        {{-- ================================================= --}}

        <div class="bg-white rounded-2xl shadow border p-6">

            <div class="w-14 h-14 rounded-xl bg-green-100
                        flex items-center justify-center">

                <x-heroicon-o-calendar-days
                    class="w-7 h-7 text-green-600"/>

            </div>

            <h3 class="mt-5 text-xl font-bold text-green-700">
                Absensi
            </h3>

            <p class="text-gray-500 mt-2">
                Lihat data kehadiran berdasarkan periode akademik.
            </p>

            <a
                href="{{ route('absensi.index', [
                    'tahun_ajaran' => request('tahun_ajaran_id'),
                    'semester' => request('semester')
                ]) }}"
                class="mt-6 inline-flex items-center gap-2
                       rounded-lg bg-green-600 hover:bg-green-700
                       text-white px-5 py-2">

                Lihat Absensi

            </a>

        </div>


        {{-- ================================================= --}}
        {{-- RANKING --}}
        {{-- ================================================= --}}

        <div class="bg-white rounded-2xl shadow border p-6">

            <div class="w-14 h-14 rounded-xl bg-yellow-100
                        flex items-center justify-center">

                <x-heroicon-o-trophy
                    class="w-7 h-7 text-yellow-600"/>

            </div>

            <h3 class="mt-5 text-xl font-bold text-yellow-700">
                Ranking
            </h3>

            <p class="text-gray-500 mt-2">
                Lihat ranking siswa berdasarkan periode akademik.
            </p>

            <a
                href="{{ route('ranking.index', [
                    'tahun_ajaran_id' => request('tahun_ajaran_id'),
                    'semester' => request('semester')
                ]) }}"
                class="mt-6 inline-flex items-center gap-2
                       rounded-lg bg-yellow-500 hover:bg-yellow-600
                       text-white px-5 py-2">

                Lihat Ranking

            </a>

        </div>


        {{-- ================================================= --}}
        {{-- RAPOR --}}
        {{-- ================================================= --}}

        <div class="bg-white rounded-2xl shadow border p-6">

            <div class="w-14 h-14 rounded-xl bg-purple-100
                        flex items-center justify-center">

                <x-heroicon-o-document-text
                    class="w-7 h-7 text-purple-600"/>

            </div>

            <h3 class="mt-5 text-xl font-bold text-purple-700">
                Rapor
            </h3>

            <p class="text-gray-500 mt-2">
                Lihat dan cetak rapor berdasarkan periode akademik.
            </p>

            <a
                href="{{ route('rapor.index', [
                    'tahun_ajaran_id' => request('tahun_ajaran_id'),
                    'semester' => request('semester')
                ]) }}"
                class="mt-6 inline-flex items-center gap-2
                       rounded-lg bg-purple-600 hover:bg-purple-700
                       text-white px-5 py-2">

                Lihat Rapor

            </a>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- KEMBALI --}}
    {{-- ===================================================== --}}

    <div class="mt-8">

        <a href="{{ route('guru.dashboard') }}"
           class="inline-flex items-center gap-2
                  text-gray-600 hover:text-blue-600">

            ← Kembali ke Dashboard Guru

        </a>

    </div>

</div>

@endsection
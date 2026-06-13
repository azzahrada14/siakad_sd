@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6">

    {{-- ===================================================== --}}
    {{-- HEADER --}}
    {{-- ===================================================== --}}

    <div class="bg-gradient-to-r from-blue-600 to-blue-500
                rounded-3xl shadow-xl p-12 text-center text-white mb-10">

        <img src="{{ asset('logo.png') }}"
             class="w-24 h-24 mx-auto mb-4">

        <h1 class="text-5xl font-bold mb-2">
            Dashboard Sistem Informasi Akademik
        </h1>

        <p class="text-blue-100 text-lg">
            SD Negeri Cimanahayu
        </p>

    </div>

    {{-- ===================================================== --}}
    {{-- JUDUL --}}
    {{-- ===================================================== --}}

    <div class="mb-10">

        <h1 class="text-4xl font-bold text-gray-800">
            Dashboard Guru
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Selamat datang,
            {{ Auth::user()->guru->nama_guru ?? Auth::user()->name }}
        </p>

    </div>

    {{-- ===================================================== --}}
    {{-- MENU GURU MAPEL --}}
    {{-- ===================================================== --}}

    <div class="bg-white rounded-3xl shadow-lg p-8 mb-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Guru Mata Pelajaran
                </h1>

                <p class="text-gray-500 mt-2">
                    Menu pengelolaan akademik guru mapel
                </p>

            </div>

            <span class="px-5 py-2 bg-blue-100 text-blue-600
                         rounded-full font-semibold">

                Guru Mapel

            </span>

        </div>

        {{-- CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- NILAI --}}
            <div class="bg-blue-50 rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-blue-700 mb-3">
                    Data Nilai
                </h2>

                <p class="text-gray-600 mb-6">
                    Kelola nilai siswa berdasarkan mata pelajaran.
                </p>

                <a href="{{ route('nilai.index') }}"
                   class="inline-block px-6 py-3 bg-blue-600
                          hover:bg-blue-700 text-white rounded-xl
                          font-medium transition">

                    Kelola Nilai

                </a>

            </div>

            {{-- ABSENSI --}}
            <div class="bg-green-50 rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-green-700 mb-3">
                    Data Absensi
                </h2>

                <p class="text-gray-600 mb-6">
                    Kelola absensi siswa sesuai mata pelajaran.
                </p>

                <a href="{{ route('absensi.index') }}"
                   class="inline-block px-6 py-3 bg-green-600
                          hover:bg-green-700 text-white rounded-xl
                          font-medium transition">

                    Kelola Absensi

                </a>

            </div>

        </div>

    </div>

    {{-- ===================================================== --}}
    {{-- MENU WALI KELAS --}}
    {{-- ===================================================== --}}

    @if(Auth::user()->guru && Auth::user()->guru->is_wali_kelas == 1)

    <div class="bg-white rounded-3xl shadow-lg p-8">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Wali Kelas
                </h1>

                <p class="text-gray-500 mt-2">
                    Monitoring dan rekapitulasi kelas
                </p>

            </div>

            <span class="px-5 py-2 bg-yellow-100 text-yellow-700
                         rounded-full font-semibold">

                Wali Kelas

            </span>

        </div>

        {{-- CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- REKAP NILAI --}}
            <div class="bg-yellow-50 rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-yellow-700 mb-3">
                    Rekap Nilai
                </h2>

                <p class="text-gray-600 mb-6">
                    Lihat seluruh nilai siswa dalam satu kelas.
                </p>

                <a href="{{ route('wali.nilai') }}"
                   class="inline-block px-6 py-3 bg-yellow-500
                          hover:bg-yellow-600 text-white rounded-xl
                          font-medium transition">

                    Lihat Rekap

                </a>

            </div>

            {{-- REKAP ABSENSI --}}
            <div class="bg-orange-50 rounded-2xl p-8">

                <h2 class="text-2xl font-bold text-orange-700 mb-3">
                    Rekap Absensi
                </h2>

                <p class="text-gray-600 mb-6">
                    Monitoring kehadiran siswa dalam satu kelas.
                </p>

                <a href="{{ route('wali.absensi') }}"
                   class="inline-block px-6 py-3 bg-orange-500
                          hover:bg-orange-600 text-white rounded-xl
                          font-medium transition">

                    Lihat Rekap

                </a>

            </div>

        </div>

    </div>

    @endif

</div>

@endsection
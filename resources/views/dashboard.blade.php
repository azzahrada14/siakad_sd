@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 
                rounded-3xl shadow-xl overflow-hidden mb-10">

        <div class="px-10 py-12 text-center text-white">

            {{-- LOGO --}}
            <img src="{{ asset('logo.png') }}"
                 class="w-24 h-24 mx-auto mb-5 object-contain">

            {{-- TITLE --}}
            <h1 class="text-4xl font-bold mb-3">

                Dashboard Sistem Informasi Akademik

            </h1>

            <p class="text-blue-100 text-lg">

                SD Negeri Cimanahayu

            </p>

        </div>

    </div>

    {{-- TITLE --}}
    <div class="mb-8">

        <h2 class="text-3xl font-bold text-gray-800">

            Dashboard Operator

        </h2>

        <p class="text-gray-500 mt-2">

            Selamat datang di halaman Operator dan Administrator.

        </p>

    </div>


       
       {{-- CARD STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

    {{-- TOTAL GURU --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Guru</p>
                <h2 class="text-5xl font-bold text-blue-600 mt-3">
                    {{ \App\Models\Guru::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl">
                👨‍🏫
            </div>
        </div>
    </div>

    {{-- TOTAL SISWA --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Siswa</p>
                <h2 class="text-5xl font-bold text-red-500 mt-3">
                    {{ \App\Models\Siswa::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center text-3xl">
                👨‍🎓
            </div>
        </div>
    </div>

    {{-- TOTAL KELAS --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Kelas</p>
                <h2 class="text-5xl font-bold text-indigo-600 mt-3">
                    {{ \App\Models\Kelas::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-3xl">
                🏫
            </div>
        </div>
    </div>

    {{-- TOTAL MAPEL --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Total Mapel</p>
                <h2 class="text-5xl font-bold text-green-600 mt-3">
                    {{ \App\Models\Mapel::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-3xl">
                📚
            </div>
        </div>
    </div>

    {{-- TAHUN AJARAN --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Tahun Ajaran</p>
                <h2 class="text-5xl font-bold text-orange-500 mt-3">
                    {{ \App\Models\TahunAjaran::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center text-3xl">
                📅
            </div>
        </div>
    </div>

    {{-- RAPOR --}}
    <div class="bg-white rounded-2xl shadow-md p-7 hover:shadow-xl transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">Data Rapor</p>
                <h2 class="text-5xl font-bold text-purple-600 mt-3">
                    {{ \App\Models\Siswa::count() }}
                </h2>
            </div>

            <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center text-3xl">
                📄
            </div>
        </div>
    </div>

</div>

<div class="mb-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-5">
        Akses Cepat
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <a href="{{ route('guru.create') }}"
           class="bg-blue-600 text-white rounded-2xl p-6 shadow-lg hover:scale-105 transition">

            <div class="text-4xl mb-3">👨‍🏫</div>

            <h3 class="text-xl font-bold">
                Tambah Guru
            </h3>

        </a>

        <a href="{{ route('siswa.create') }}"
           class="bg-green-600 text-white rounded-2xl p-6 shadow-lg hover:scale-105 transition">

            <div class="text-4xl mb-3">👨‍🎓</div>

            <h3 class="text-xl font-bold">
                Tambah Siswa
            </h3>

        </a>

        <a href="{{ route('rapor.index') }}"
           class="bg-purple-600 text-white rounded-2xl p-6 shadow-lg hover:scale-105 transition">

            <div class="text-4xl mb-3">📄</div>

            <h3 class="text-xl font-bold">
                Cetak Rapor
            </h3>

        </a>

    </div>

</div>

    {{-- INFORMASI --}}
    <div class="bg-white rounded-2xl shadow-md p-8 mb-10">

    <h2 class="text-2xl font-bold text-gray-800 mb-5">
        Aktivitas Terbaru
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between border-b pb-3">
            <span>Penambahan Data Guru</span>
            <span class="text-gray-500">Hari Ini</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>Input Nilai Semester</span>
            <span class="text-gray-500">Hari Ini</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>Update Data Siswa</span>
            <span class="text-gray-500">Kemarin</span>
        </div>

    </div>

</div>


        <h2 class="text-2xl font-bold text-gray-800 mb-4">

            Informasi Sistem

        </h2>

        <p class="text-gray-600 leading-relaxed text-[15px]">

            Sistem Informasi Akademik SD Negeri Cimanahayu digunakan
            untuk membantu pengelolaan data akademik sekolah secara
            terintegrasi mulai dari data guru, siswa, kelas,
            mata pelajaran, absensi, hingga pengolahan nilai siswa.

        </p>

    </div>

@endsection
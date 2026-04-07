@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6">


    {{-- LOGO --}}
    <div class="text-center mb-10">
        <img src="{{ asset('logo.png') }}" class="w-20 mx-auto mb-3">

        <h1 class="text-3xl font-bold text-gray-800">
            Dasboard Sistem Informasi Akademik
        </h1>

        <p class="text2x1 text-gray-500">
            SD Negeri Cimanahayu
        </p>
    </div><br>

    {{-- CARD --}}
    <div class="flex flex-col md:flex-row gap-6">

        {{-- GURU --}}
        <div class="bg-white p-6 rounded-xl shadow-md text-center w-full md:w-1/3
                    transition duration-300 transform 
                    hover:-translate-y-2 hover:shadow-2xl cursor-pointer">

            <h3 class="text-gray-500 text-sm">Data Guru</h3>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                {{ \App\Models\Guru::count() }}
            </p>
        </div>

        {{-- SISWA --}}
        <div class="bg-white p-6 rounded-xl shadow-md text-center w-full md:w-1/3
                    transition duration-300 transform 
                    hover:-translate-y-2 hover:shadow-2xl cursor-pointer">

            <h3 class="text-gray-500 text-sm">Data Siswa</h3>
            <p class="text-3xl font-bold text-red-500 mt-2">
                {{ \App\Models\Siswa::count() }}
            </p>
        </div>

        {{-- KELAS --}}
        <div class="bg-white p-6 rounded-xl shadow-md text-center w-full md:w-1/3
                    transition duration-300 transform 
                    hover:-translate-y-2 hover:shadow-2xl cursor-pointer">

            <h3 class="text-gray-500 text-sm">Data Kelas</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">
                {{ \App\Models\Kelas::count() }}
            </p>
        </div>

    </div>

    {{-- INFO TAMBAHAN --}}
    <div class="mt-10 bg-white p-6 rounded-xl shadow-md">
        <p class="text-gray-600 text-sm">
            Selamat datang di Sistem Informasi Akademik SDN Cimanahayu. 
            Sistem ini digunakan untuk mengelola data siswa, guru, kelas, dan mata pelajaran secara terintegrasi.
        </p>
    </div>

</div>

@endsection
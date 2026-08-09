@extends('layouts.app')

@section('content')



    {{-- HEADER --}}
<div class="mb-6">

    <div class="flex items-center justify-between">

        <div class="flex items-center gap-3">

            {{-- Icon Informasi Akademik --}}
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                <x-heroicon-o-academic-cap class="w-7 h-7 text-blue-600"/>
            </div>

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Informasi Akademik
                </h1>

                <p class="text-gray-500 mt-1">
                    Informasi dan monitoring data akademik sekolah.
                </p>
            </div>

        </div>


        {{-- TAHUN AJARAN AKTIF --}}
        @if($tahunAktif)

        <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[240px]">

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

        @endif

    </div>

</div>


{{-- RINGKASAN --}}
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 mb-6">


    {{-- GURU --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Guru Aktif
                </p>

                <h2 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalGuru }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                <x-heroicon-o-users class="w-6 h-6 text-blue-600"/>
            </div>

        </div>

    </div>


    {{-- SISWA --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Siswa Aktif
                </p>

                <h2 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $totalSiswa }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                <x-heroicon-o-academic-cap class="w-6 h-6 text-green-600"/>
            </div>

        </div>

    </div>


    {{-- KELAS --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Kelas Aktif
                </p>

                <h2 class="text-3xl font-bold text-purple-600 mt-2">
                    {{ $totalKelas }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                <x-heroicon-o-building-office-2 class="w-6 h-6 text-purple-600"/>
            </div>

        </div>

    </div>


    {{-- MAPEL --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Mata Pelajaran
                </p>

                <h2 class="text-3xl font-bold text-orange-600 mt-2">
                    {{ $totalMapel }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center">
                <x-heroicon-o-book-open class="w-6 h-6 text-orange-600"/>
            </div>

        </div>

    </div>


    {{-- JADWAL --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Jadwal Pelajaran
                </p>

                <h2 class="text-3xl font-bold text-indigo-600 mt-2">
                    {{ $totalJadwal }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                <x-heroicon-o-calendar-days class="w-6 h-6 text-indigo-600"/>
            </div>

        </div>

    </div>


    {{-- EKSTRAKURIKULER --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Ekstrakurikuler
                </p>

                <h2 class="text-3xl font-bold text-pink-600 mt-2">
                    {{ $totalEkstrakurikuler }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center">
                <x-heroicon-o-trophy class="w-6 h-6 text-pink-600"/>
            </div>

        </div>

    </div>


    {{-- RAPOR --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-gray-500">
                    Rapor Ter-Generate
                </p>

                <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                    {{ $totalRapor }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center">
                <x-heroicon-o-document-text class="w-6 h-6 text-emerald-600"/>
            </div>

        </div>

    </div>

</div>


    {{-- DATA SISWA PER KELAS --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200">

        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-slate-800">
                Jumlah Siswa per Kelas
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Rekap jumlah siswa pada setiap kelas aktif.
            </p>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="border px-6 py-4 text-center font-semibold text-gray-600">
                            No
                        </th>

                        <th class="border px-6 py-4 text-center font-semibold text-gray-600">
                            Kelas
                        </th>

                        <th class="border px-6 py-4 text-center font-semibold text-gray-600">
                            Jumlah Siswa
                        </th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($grafikSiswa as $data)

                    <tr class="border-t text-center border-gray-100">

                        <td class="border px-6 py-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border px-6 py-4 text-center font-medium text-slate-700">
                            {{ $data->nama_kelas }}
                        </td>

                        <td class="border px-6 py-4 text-center">
                            {{ $data->total_siswa }} siswa
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                            Belum ada data kelas.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
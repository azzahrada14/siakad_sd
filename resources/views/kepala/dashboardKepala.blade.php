@extends('layouts.app')

@section('title', 'Dashboard Kepala Sekolah')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-6">
    {{-- ================= HERO ================= --}}
<div class="bg-gradient-to-r from-blue-700 to-blue-500 rounded-3xl shadow-lg overflow-hidden mb-8">

    <div class="py-10 text-center text-white">

        <img
            src="{{ asset('logo.png') }}"
            class="w-24 h-24 mx-auto mb-4 object-contain"
            alt="Logo">

        <h1 class="text-4xl font-bold">
            Sistem Informasi Akademik
        </h1>

        <p class="text-blue-100 mt-2 text-lg">
            SD Negeri Cimanahayu
        </p>

    </div>

</div>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Dashboard Kepala Sekolah
            </h1>

            <p class="text-gray-500 mt-1">
                Monitoring data dan hasil akademik sekolah.
            </p>
        </div>


        @if($tahunAktif)

    <div class="mt-5 lg:mt-0">

        <div class="bg-blue-50 border border-blue-200 rounded-xl px-6 py-4 shadow-sm min-w-[280px]">

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

    </div>

    @endif

    </div>


    {{-- ========================================================= --}}
    {{-- STATISTIK UTAMA --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-3 gap-5 mb-6">


        {{-- GURU --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Guru Aktif
                    </p>

                    <p class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalGuru }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Guru aktif
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">

                    <x-heroicon-o-user-group
                        class="w-6 h-6 text-blue-600"
                    />

                </div>

            </div>

        </div>


        {{-- SISWA --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Siswa Aktif
                    </p>

                    <p class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalSiswa }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Siswa aktif
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">

                    <x-heroicon-o-academic-cap
                        class="w-6 h-6 text-green-600"
                    />

                </div>

            </div>

        </div>


        {{-- KELAS --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Kelas Aktif
                    </p>

                    <p class="text-3xl font-bold text-slate-800 mt-1">
                        {{ $totalKelas }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Rombel aktif
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">

                    <x-heroicon-o-building-office-2
                        class="w-6 h-6 text-purple-600"
                    />

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MONITORING AKADEMIK --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-2 gap-5 mb-6">


        {{-- RATA-RATA NILAI --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Rata-rata Nilai Akademik
                    </p>

                    <p class="text-4xl font-bold text-blue-600 mt-2">
                        {{ number_format($rataRataNilai, 2) }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Berdasarkan nilai akhir semester aktif
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">

                    <x-heroicon-o-chart-bar
                        class="w-6 h-6 text-blue-600"
                    />

                </div>

            </div>

        </div>


        {{-- RAPOR --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Rapor Tergenerate
                    </p>

                    <p class="text-4xl font-bold text-green-600 mt-2">
                        {{ $totalRapor }}
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        Rapor semester aktif
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">

                    <x-heroicon-o-document-text
                        class="w-6 h-6 text-green-600"
                    />

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- GRAFIK --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-2 gap-5 mb-6">


        {{-- SISWA PER KELAS --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm">

            <div class="px-6 py-4 border-b border-gray-200">

                <h2 class="font-semibold text-gray-800">
                    Jumlah Siswa per Kelas
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Distribusi siswa berdasarkan rombel aktif.
                </p>

            </div>

            <div class="p-5">

                <div class="h-[300px]">

                    <canvas id="chartSiswa"></canvas>

                </div>

            </div>

        </div>


        {{-- DISTRIBUSI GURU --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm">

            <div class="px-6 py-4 border-b border-gray-200">

                <h2 class="font-semibold text-gray-800">
                    Distribusi Guru
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Jumlah guru berdasarkan jenis pengajar.
                </p>

            </div>

            <div class="p-5">

                <div class="h-[300px]">

                    <canvas id="chartGuru"></canvas>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MONITORING KEHADIRAN --}}
    {{-- ========================================================= --}}

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm mb-6">

        <div class="px-6 py-4 border-b border-gray-200">

            <h2 class="font-semibold text-gray-800">
                Rekap Kehadiran Siswa
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Rekap absensi pada semester aktif.
            </p>

        </div>


        <div class="grid grid-cols-4 gap-5 p-6">


            <div class="bg-green-50 border border-green-100 rounded-xl p-5">

                <p class="text-sm text-gray-600">
                    Hadir
                </p>

                <p class="text-3xl font-bold text-green-600 mt-1">
                    {{ $totalHadir }}
                </p>

            </div>


            <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">

                <p class="text-sm text-gray-600">
                    Izin
                </p>

                <p class="text-3xl font-bold text-blue-600 mt-1">
                    {{ $totalIzin }}
                </p>

            </div>


            <div class="bg-yellow-50 border border-yellow-100 rounded-xl p-5">

                <p class="text-sm text-gray-600">
                    Sakit
                </p>

                <p class="text-3xl font-bold text-yellow-600 mt-1">
                    {{ $totalSakit }}
                </p>

            </div>


            <div class="bg-red-50 border border-red-100 rounded-xl p-5">

                <p class="text-sm text-gray-600">
                    Alfa
                </p>

                <p class="text-3xl font-bold text-red-600 mt-1">
                    {{ $totalAlfa }}
                </p>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- HASIL AKADEMIK --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-3 gap-5">


        {{-- RANKING --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center">

                    <x-heroicon-o-trophy
                        class="w-5 h-5 text-yellow-600"
                    />

                </div>

                <div>

                    <h2 class="font-semibold text-gray-800">
                        Ranking
                    </h2>

                    <p class="text-xs text-gray-500">
                        Data ranking semester aktif
                    </p>

                </div>

            </div>

            <p class="text-3xl font-bold text-slate-800">
                {{ $totalRanking }}
            </p>

            <p class="text-xs text-gray-500 mt-1">
                Data ranking tersedia
            </p>

        </div>


        {{-- KENAIKAN --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">

                    <x-heroicon-o-arrow-trending-up
                        class="w-5 h-5 text-green-600"
                    />

                </div>

                <div>

                    <h2 class="font-semibold text-gray-800">
                        Kenaikan Kelas
                    </h2>

                    <p class="text-xs text-gray-500">
                        Monitoring hasil kenaikan
                    </p>

                </div>

            </div>


            <div class="space-y-3">

                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Naik
                    </span>

                    <span class="font-semibold text-green-600">
                        {{ $totalNaik }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Tidak Naik
                    </span>

                    <span class="font-semibold text-red-600">
                        {{ $totalTidakNaik }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Tingkat 6
                    </span>

                    <span class="font-semibold text-blue-600">
                        {{ $totalLulusKelas6 }}
                    </span>

                </div>

            </div>

        </div>


        {{-- KELULUSAN --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6">

            <div class="flex items-center gap-3 mb-4">

                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">

                    <x-heroicon-o-academic-cap
                        class="w-5 h-5 text-blue-600"
                    />

                </div>

                <div>

                    <h2 class="font-semibold text-gray-800">
                        Kelulusan
                    </h2>

                    <p class="text-xs text-gray-500">
                        Monitoring hasil kelulusan
                    </p>

                </div>

            </div>


            <div class="space-y-3">

                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Lulus
                    </span>

                    <span class="font-semibold text-green-600">
                        {{ $totalLulus }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Tidak Lulus
                    </span>

                    <span class="font-semibold text-red-600">
                        {{ $totalTidakLulus }}
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-sm text-gray-600">
                        Total Data
                    </span>

                    <span class="font-semibold text-gray-800">
                        {{ $totalKelulusan }}
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- CHART JS --}}
{{-- ========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | GRAFIK SISWA
    |--------------------------------------------------------------------------
    */

    const siswaCanvas =
        document.getElementById('chartSiswa');

    if (siswaCanvas) {

        new Chart(siswaCanvas, {

            type: 'bar',

            data: {

                labels: @json($labelKelas),

                datasets: [{

                    label: 'Jumlah Siswa',

                    data: @json($jumlahSiswa),

                    backgroundColor: '#3B82F6',

                    borderRadius: 6,

                    borderSkipped: false,

                    maxBarThickness: 45

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        }

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | GRAFIK GURU
    |--------------------------------------------------------------------------
    */

    const guruCanvas =
        document.getElementById('chartGuru');

    if (guruCanvas) {

        new Chart(guruCanvas, {

            type: 'doughnut',

            data: {

                labels: @json($labelGuru),

                datasets: [{

                    label: 'Jumlah Guru',

                    data: @json($jumlahGuru),

                    backgroundColor: [

                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#8B5CF6',
                        '#EF4444'

                    ]

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        position: 'bottom'

                    }

                }

            }

        });

    }

});

</script>

@endsection
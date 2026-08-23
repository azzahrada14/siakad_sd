@extends('layouts.app')

@section('content')

<div class="mb-6">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-5">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Riwayat Akademik
            </h1>

            <p class="text-gray-500 mt-2">
                Data akademik berdasarkan periode tahun ajaran dan semester.
            </p>
        </div>

        {{-- PERIODE --}}
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

                @if($tahunAjaran->status == 'Aktif')

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                        Aktif
                    </span>

                @else

                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
                        Arsip
                    </span>

                @endif

            </div>

        </div>

    </div>

</div>


{{-- INFORMASI PERIODE --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">

    <h2 class="text-lg font-semibold text-gray-800">
        Informasi Periode
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">

        <div>
            <p class="text-sm text-gray-500">
                Tahun Ajaran
            </p>

            <p class="font-semibold text-gray-800 mt-1">
                {{ $tahunAjaran->tahun_ajaran }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">
                Semester
            </p>

            <p class="font-semibold text-gray-800 mt-1">
                {{ $tahunAjaran->semester }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">
                Periode
            </p>

            <p class="font-semibold text-gray-800 mt-1">
                {{ \Carbon\Carbon::parse($tahunAjaran->tanggal_mulai)->format('d M Y') }}
                -
                {{ \Carbon\Carbon::parse($tahunAjaran->tanggal_selesai)->format('d M Y') }}
            </p>
        </div>

    </div>

</div>


{{-- MENU RIWAYAT --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

    {{-- NILAI --}}
    <a
    href="{{ route('operator.rekap-nilai', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]) }}"
    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5
           hover:shadow-md hover:border-blue-300 transition duration-200 block"
>

    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mb-4">

        <x-heroicon-o-chart-bar class="w-6 h-6 text-blue-600"/>

    </div>

    <h3 class="font-semibold text-gray-800">
        Rekap Nilai
    </h3>

    <p class="text-sm text-gray-500 mt-2">
        Melihat rekap nilai siswa pada semester
        {{ $tahunAjaran->semester }}.
    </p>

    <div class="mt-4 text-sm font-semibold text-blue-600">
        Lihat Data →
    </div>

</a>


    {{-- ABSENSI --}}
<a
    href="{{ route('absensi.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]) }}"
    class="bg-white rounded-xl shadow-sm border border-gray-200 p-5
           hover:shadow-md hover:border-green-300 transition duration-200 block"
>

    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-4">

        <x-heroicon-o-calendar-days class="w-6 h-6 text-green-600"/>

    </div>

    <h3 class="font-semibold text-gray-800">
        Rekap Absensi
    </h3>

    <p class="text-sm text-gray-500 mt-2">
        Melihat rekap absensi siswa pada semester
        {{ $tahunAjaran->semester }}.
    </p>

    <div class="mt-4 text-sm font-semibold text-green-600">
        Lihat Data →
    </div>

</a>


    {{-- RAPOR --}}
    <a
        href="{{ url('/rapor?tahun_ajaran_id=' . $tahunAjaran->id) }}"
        class="bg-white rounded-xl shadow-sm border border-gray-200 p-5
               hover:shadow-md hover:border-purple-300 transition duration-200 block"
    >

        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-4">

            <x-heroicon-o-document-text class="w-6 h-6 text-purple-600"/>

        </div>

        <h3 class="font-semibold text-gray-800">
            Rapor
        </h3>

        <p class="text-sm text-gray-500 mt-2">
            Melihat data rapor siswa pada semester
            {{ $tahunAjaran->semester }}.
        </p>

        <div class="mt-4 text-sm font-semibold text-purple-600">
            Lihat Data →
        </div>

    </a>


    {{-- MATERI --}}
    <a
        href="{{ url('/lingkup-materi?tahun_ajaran_id=' . $tahunAjaran->id) }}"
        class="bg-white rounded-xl shadow-sm border border-gray-200 p-5
               hover:shadow-md hover:border-orange-300 transition duration-200 block"
    >

        <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center mb-4">

            <x-heroicon-o-book-open class="w-6 h-6 text-orange-600"/>

        </div>

        <h3 class="font-semibold text-gray-800">
            Materi Pembelajaran
        </h3>

        <p class="text-sm text-gray-500 mt-2">
            Melihat materi pembelajaran pada semester
            {{ $tahunAjaran->semester }}.
        </p>

        <div class="mt-4 text-sm font-semibold text-orange-600">
            Lihat Data →
        </div>

    </a>

</div>


{{-- KEMBALI --}}
<div class="mt-6">

    <a
        href="{{ route('tahun-ajaran.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2
               bg-gray-500 hover:bg-gray-600
               text-white rounded-lg">

        ← Kembali

    </a>

</div>

@endsection
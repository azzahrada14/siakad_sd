@extends('layouts.app')

@section('title', 'Jadwal Pelajaran')

@section('content')

{{-- =========================================================
     HEADER
========================================================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

    <div>

        <h1 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

            <x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600"/>

            Jadwal Pelajaran

        </h1>

        <p class="mt-2 text-gray-500">
            Kelola data jadwal pelajaran sekolah.
        </p>

    </div>


    {{-- Tahun Ajaran Aktif --}}
  @if($tahunAjaran)

<div class="mt-5 lg:mt-0">

    <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
            Periode Akademik
        </p>

        <h2 class="text-2xl font-bold text-blue-700 mt-1">
            {{ $tahunAjaran->tahun_ajaran }}
        </h2>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600 text-sm">
                Semester {{ $tahunAjaran->semester }}
            </span>

            @if($modeArsip)

                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                    Arsip
                </span>

            @else

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Aktif
                </span>

            @endif

        </div>

    </div>

</div>

@endif

</div>


{{-- =========================================================
     FILTER
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">

        <div class="flex items-center gap-2">

            <x-heroicon-o-funnel class="w-5 h-5 text-blue-600"/>

            <h2 class="font-semibold text-gray-800">
                Filter Jadwal Pelajaran
            </h2>

        </div>

    </div>


    <form method="GET" class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-5 gap-5">


            {{-- =================================================
                 TAHUN AJARAN
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tahun Ajaran
                </label>

                <select
                    name="tahun_ajaran_id"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">
    Pilih Tahun Ajaran
</option>

                    @foreach($tahunAjarans as $tahun)

                        <option
                            value="{{ $tahun->id }}"
                            {{ request('tahun_ajaran_id') == $tahun->id ? 'selected' : '' }}>

                            {{ $tahun->tahun_ajaran }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                 KELAS
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kelas
                </label>

                <select
                    name="kelas_id"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">
                        Semua Kelas
                    </option>

                    @foreach($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ request('kelas_id') == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kelas }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                 HARI
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Hari
                </label>

                <select
                    name="hari"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">
                        Semua Hari
                    </option>

                    @foreach([
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat'
                    ] as $hari)

                        <option
                            value="{{ $hari }}"
                            {{ request('hari') == $hari ? 'selected' : '' }}>

                            {{ $hari }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                 STATUS
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="Aktif"
                        {{ request('status') == 'Aktif' ? 'selected' : '' }}>

                        Aktif

                    </option>

                    <option
                        value="Nonaktif"
                        {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>

                        Nonaktif

                    </option>

                </select>

            </div>


            {{-- =================================================
                 SEARCH
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Cari Guru / Mata Pelajaran / Kegiatan
                </label>

                <div class="flex gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari..."
                        class="w-full rounded-lg border-gray-300">

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 hover:bg-blue-700 px-4 text-white">

                        <x-heroicon-o-magnifying-glass class="w-5 h-5"/>

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- =========================================================
     MANAJEMEN DATA
========================================================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6">

    <div>

        <h2 class="text-xl font-semibold text-gray-800">
            Jadwal Pelajaran
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            Lihat data jadwal pelajaran sekolah.
        </p>

    </div>


    {{-- Hanya Operator --}}
    @if(auth()->user()->role === 'operator' && !$modeArsip)

    <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">

        {{-- EXPORT --}}
        <a
            href="{{ route('jadwal.export', request()->query()) }}"
            class="inline-flex items-center gap-2 rounded-lg bg-green-600 hover:bg-green-700 px-4 py-2 text-white transition">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export Excel

        </a>

        {{-- TAMBAH --}}
        <a
            href="{{ route('jadwal.create', [
                'tahun_ajaran_id' => $tahunAktif->id
            ]) }}"
            class="inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 px-4 py-2 text-white transition">

            <x-heroicon-o-plus class="w-5 h-5"/>

            Tambah Jadwal

        </a>

    </div>

@elseif(auth()->user()->role === 'operator' && $modeArsip)

    <div class="mt-4 lg:mt-0">

        <span class="inline-flex items-center gap-2 rounded-lg bg-gray-100 px-4 py-2 text-gray-500">

            <x-heroicon-o-lock-closed class="w-5 h-5"/>

            Periode Arsip — Hanya Melihat

        </span>

    </div>

@endif

</div>


{{-- =========================================================
     TABEL
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">


    {{-- HEADER TABEL --}}
    <div class="px-6 py-4 border-b bg-slate-50">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center">

            <div>

                <h2 class="text-lg font-semibold text-gray-800">
                    Data Jadwal Pelajaran
                </h2>

                <p class="text-sm text-gray-500 mt-1">

                    Menampilkan

                    {{ $jadwals->firstItem() ?? 0 }}

                    -

                    {{ $jadwals->lastItem() ?? 0 }}

                    dari

                    {{ $jadwals->total() }}

                    data.

                </p>

            </div>


            <span class="mt-3 md:mt-0 inline-flex items-center rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-blue-700">

                {{ $jadwals->total() }} Data

            </span>

        </div>

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}
    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-slate-50">

                <tr class="text-sm font-semibold text-gray-700">

                    <th class="border px-4 py-3 text-center">
                        No
                    </th>

                    <th class="border px-4 py-3">
                        Tahun Ajaran
                    </th>

                    <th class="border px-4 py-3">
                        Kelas
                    </th>

                    <th class="border px-4 py-3">
                        Hari
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Jam Ke
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Waktu
                    </th>

                    <th class="border px-4 py-3">
                        Mata Pelajaran / Kegiatan
                    </th>

                    <th class="border px-4 py-3">
                        Guru
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Jenis Jadwal
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Status
                    </th>

                    @if(auth()->user()->role === 'operator')

                        <th class="border px-4 py-3 text-center">
                            Aksi
                        </th>

                    @endif

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-100 bg-white">


                @forelse($jadwals as $jadwal)

                    <tr class="hover:bg-slate-50 transition">


                        {{-- =================================================
                             NO
                        ================================================== --}}
                        <td class="border px-4 py-3 text-center">

                            {{ $loop->iteration + ($jadwals->firstItem() - 1) }}

                        </td>


                        {{-- =================================================
                             TAHUN AJARAN
                        ================================================== --}}
                        <td class="border px-4 py-3">

                            {{ $jadwal->tahunAjaran->tahun_ajaran ?? '-' }}

                        </td>


                        {{-- =================================================
                             KELAS
                        ================================================== --}}
                        <td class="border px-4 py-3">

                            {{ $jadwal->kelas->nama_kelas ?? '-' }}

                        </td>


                        {{-- =================================================
                             HARI
                        ================================================== --}}
                        <td class="border px-4 py-3">

                            {{ $jadwal->hari }}

                        </td>


                        {{-- =================================================
                             JAM KE
                        ================================================== --}}
                        <td class="border px-4 py-3 text-center">

                            {{ $jadwal->jam_ke }}

                        </td>


                        {{-- =================================================
                             WAKTU
                        ================================================== --}}
                        <td class="border px-4 py-3 text-center">

                            {{ $jadwal->waktu ?? '-' }}

                        </td>


                        {{-- =================================================
                             MAPEL / KEGIATAN
                        ================================================== --}}
                        <td class="border px-4 py-3">

                            @if(
                                in_array(
                                    $jadwal->jenis_jadwal,
                                    ['Wajib', 'Kokurikuler']
                                )
                            )

                                {{-- JADWAL PELAJARAN --}}
                                <span class="font-medium text-gray-800">

                                    {{ $jadwal->mapel->nama_mapel ?? '-' }}

                                </span>

                            @elseif(
                                $jadwal->jenis_jadwal === 'Kegiatan'
                            )

                                {{-- KEGIATAN SEKOLAH --}}
                                <span class="font-medium text-gray-800">

                                    {{ $jadwal->nama_kegiatan ?? '-' }}

                                </span>

                            @else

                                -

                            @endif

                        </td>


                        {{-- =================================================
                             GURU
                        ================================================== --}}
                        <td class="border px-4 py-3">

                            @if(
                                in_array(
                                    $jadwal->jenis_jadwal,
                                    ['Wajib', 'Kokurikuler']
                                )
                            )

                                {{ $jadwal->guru->nama_guru ?? '-' }}

                            @else

                                -

                            @endif

                        </td>


                        {{-- =================================================
                             JENIS JADWAL
                        ================================================== --}}
                        <td class="border px-4 py-3 text-center">

                            @switch($jadwal->jenis_jadwal)


                                {{-- Wajib --}}
                                @case('Wajib')

                                    <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                        Wajib

                                    </span>

                                @break


                                {{-- Kokurikuler --}}
                                @case('Kokurikuler')

                                    <span class="inline-flex rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">

                                        Kokurikuler

                                    </span>

                                @break


                                {{-- Kegiatan --}}
                                @case('Kegiatan')

                                    <span class="inline-flex rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-700">

                                        Kegiatan

                                    </span>

                                @break


                                {{-- Default --}}
                                @default

                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                                        -

                                    </span>

                            @endswitch

                        </td>


                        {{-- =================================================
                             STATUS
                        ================================================== --}}
                        <td class="border px-4 py-3 text-center">

                            @if($jadwal->status === 'Aktif')

                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                    Aktif

                                </span>

                            @else

                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                    Nonaktif

                                </span>

                            @endif

                        </td>


                        {{-- =================================================
                             AKSI
                        ================================================== --}}
                                     @if(auth()->user()->role === 'operator')

    <td class="border px-4 py-3">

        <div class="flex justify-center gap-2">

            @if(!$modeArsip)

                {{-- EDIT --}}
                <a
                    href="{{ route('jadwal.edit', [
                        'jadwal' => $jadwal->id,
                        'tahun_ajaran_id' => $tahunAktif->id
                    ]) }}"
                    class="inline-flex items-center gap-1 rounded-lg bg-yellow-500 hover:bg-yellow-600 px-3 py-2 text-white">

                    <x-heroicon-o-pencil-square class="w-4 h-4"/>
                    Edit

                </a>


                {{-- TOGGLE STATUS --}}
                <form
                    action="{{ route('jadwal.toggleStatus', $jadwal->id) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="inline-flex items-center gap-1 rounded-lg px-3 py-2 text-white
                        {{ $jadwal->status === 'Aktif'
                            ? 'bg-red-600 hover:bg-red-700'
                            : 'bg-green-600 hover:bg-green-700' }}">

                        @if($jadwal->status === 'Aktif')

                            <x-heroicon-o-x-circle class="w-4 h-4"/>
                            Nonaktif

                        @else

                            <x-heroicon-o-check-circle class="w-4 h-4"/>
                            Aktif

                        @endif

                    </button>

                </form>

            @else

                <span class="inline-flex items-center gap-1 rounded-lg bg-gray-100 px-3 py-2 text-gray-500 text-sm">

                    <x-heroicon-o-lock-closed class="w-4 h-4"/>
                    Arsip

                </span>

            @endif

        </div>

    </td>

@endif
                      

                    </tr>


                @empty


                    {{-- =================================================
                         KOSONG
                    ================================================== --}}
                    <tr>

                        <td
                            colspan="{{ auth()->user()->role === 'operator' ? 11 : 10 }}"
                            class="border px-6 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <x-heroicon-o-calendar-days class="w-16 h-16 text-gray-300"/>

                                <h3 class="mt-4 text-lg font-semibold text-gray-700">

                                    Belum Ada Data Jadwal

                                </h3>

                                <p class="mt-1 text-sm text-gray-500">

                                    Silakan tambahkan jadwal pelajaran terlebih dahulu.

                                </p>

                            </div>

                        </td>

                    </tr>


                @endforelse


            </tbody>

        </table>

    </div>

</div>


{{-- =========================================================
     PAGINATION
========================================================= --}}
@if($jadwals->hasPages())

    <div class="mt-6">
        {{ $jadwals->links('pagination::tailwind') }}
    </div>

@endif

@endsection
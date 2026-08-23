@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-3xl shadow-xl overflow-hidden mb-10">

        <div class="px-10 py-12 text-center text-white">

            <img
                src="{{ asset('logo.png') }}"
                class="w-24 h-24 mx-auto mb-5 object-contain">

            <h1 class="text-4xl font-extrabold mb-3">

                Dashboard Sistem Informasi Akademik

            </h1>

            <p class="text-blue-100 text-lg">

                Sekolah Dasar Negeri Cimanahayu

            </p>

        </div>

    </div>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-8">

    <div>

        <h2 class="text-[48px] font-extrabold text-slate-800">

            Dashboard Guru

        </h2>

        <p class="text-gray-500 mt-2 text-lg">

            Selamat datang,

            <span class="font-semibold">

                {{ $guru->nama_guru }}

            </span>

        </p>

    </div>

   @if($tahunAjaran)

<div class="mt-5 lg:mt-0">

    <div class="bg-blue-50 border border-blue-200 rounded-xl px-6 py-4 shadow-sm min-w-[280px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
            Tahun Ajaran
        </p>

        <h3 class="text-2xl font-bold text-blue-700 mt-1">
            {{ $tahunAjaran->tahun_ajaran }}
        </h3>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600">
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

@endif

</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
    <div class="bg-white rounded-xl shadow border p-6">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-gray-500 text-sm">

                Kelas Diampu

            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">

                {{ $kelasDiampu }}

            </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

            <x-heroicon-o-home-modern class="w-8 h-8 text-blue-600"/>

        </div>

    </div>

</div>
<div class="bg-white rounded-xl shadow border p-6">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-gray-500 text-sm">

                Total Siswa

            </p>

            <h2 class="text-4xl font-bold text-red-500 mt-2">

                {{ $totalSiswa }}

            </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

            <x-heroicon-o-user-group class="w-8 h-8 text-red-500"/>

        </div>

    </div>

</div>
<div class="bg-white rounded-xl shadow border p-6">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-gray-500 text-sm">

                Jadwal Hari Ini

            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
{{ $jadwalHariIni->count() }}

            </h2>

        </div>

        <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

            <x-heroicon-o-calendar-days class="w-8 h-8 text-green-600"/>

        </div>

    </div>

</div>
</div>
{{-- ===================================================== --}}
{{-- MENU AKADEMIK --}}
{{-- ===================================================== --}}
@if(!$modeArsip)
<div class="bg-white rounded-2xl shadow border p-8 mb-8">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">

                Menu Akademik

            </h2>

            <p class="text-gray-500 mt-2">

                Kelola kegiatan pembelajaran dan administrasi guru.

            </p>

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-xl border border-blue-200 bg-blue-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

        <x-heroicon-o-clipboard-document-check
            class="w-7 h-7 text-blue-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-blue-700">

        Input Nilai

    </h3>

    <p class="text-gray-600 mt-2">

        Input dan ubah nilai siswa sesuai mata pelajaran.

    </p>

    <a
        href="{{ route('nilai.index') }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka Menu

    </a>

</div>
<div class="rounded-xl border border-green-200 bg-green-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">

        <x-heroicon-o-calendar-days
            class="w-7 h-7 text-green-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-green-700">

        Input Absensi

    </h3>

    <p class="text-gray-600 mt-2">

        Kelola kehadiran siswa berdasarkan jadwal mengajar.

    </p>

    <a
        href="{{ route('absensi.index') }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-green-600 hover:bg-green-700 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka Menu

    </a>

</div>
<div class="rounded-xl border border-orange-200 bg-orange-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center">

        <x-heroicon-o-clock
            class="w-7 h-7 text-orange-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-orange-700">

        Jadwal Mengajar

    </h3>

    <p class="text-gray-600 mt-2">

        Lihat jadwal pelajaran yang diampu pada tahun ajaran aktif.

    </p>

    <a
        href="{{ route('jadwal.index') }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka Menu

    </a>

</div>
    </div>

</div>
@endif

{{-- ===================================================== --}}
{{-- RIWAYAT AKADEMIK --}}
{{-- ===================================================== --}}

<div class="bg-white rounded-2xl shadow border p-8 mb-8">

    <div class="flex flex-col md:flex-row
                md:items-center md:justify-between gap-6">

        {{-- INFORMASI --}}
        <div>

            <div class="w-14 h-14 rounded-xl bg-purple-100
                        flex items-center justify-center mb-5">

                <x-heroicon-o-clock
                    class="w-7 h-7 text-purple-600"/>

            </div>

            <h2 class="text-2xl font-bold text-slate-800">
                Riwayat Akademik
            </h2>

            <p class="text-gray-500 mt-2">
                Lihat data akademik dari tahun ajaran sebelumnya.
            </p>

        </div>

            {{-- TOMBOL RIWAYAT --}}
<div class="flex-shrink-0">

    <button
        type="button"
        onclick="openTahunAjaranModal()"
        class="inline-flex items-center gap-2
               rounded-lg bg-purple-600
               hover:bg-purple-700
               text-white px-6 py-3 font-medium
               transition">

        <x-heroicon-o-clock class="w-5 h-5"/>

        Lihat Riwayat

    </button>

</div>

        </div>

    </div>



{{-- ===================================================== --}}
{{-- MODAL PILIH TAHUN AJARAN --}}
{{-- ===================================================== --}}

<div
    id="tahunAjaranModal"
    class="fixed inset-0 z-50 hidden
           bg-black/50 items-center justify-center p-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">

        {{-- HEADER MODAL --}}
        <div class="px-6 py-5 border-b">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-xl font-bold text-slate-800">
                        Pilih Tahun Ajaran
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Pilih periode akademik yang ingin dilihat.
                    </p>
                </div>

                <button
                    type="button"
                    onclick="closeTahunAjaranModal()"
                    class="text-gray-400 hover:text-gray-600">

                    <x-heroicon-o-x-mark class="w-6 h-6"/>

                </button>

            </div>

        </div>

        {{-- FORM --}}
        <form
            method="GET"
            action="{{ route('guru.dashboard') }}"
            class="p-6">

            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Tahun Ajaran
            </label>

            <select
                name="tahun_ajaran_id"
                class="w-full rounded-xl border-gray-300
                       focus:border-purple-500
                       focus:ring-purple-500">

                @foreach($tahunAjarans as $tahun)

                    <option
                        value="{{ $tahun->id }}"
                        @selected($tahunAjaran->id == $tahun->id)>

                        {{ $tahun->tahun_ajaran }}
                        - Semester {{ $tahun->semester }}

                        @if($tahun->status === 'Aktif')
                            (Aktif)
                        @else
                            (Arsip)
                        @endif

                    </option>

                @endforeach

            </select>

            <div class="flex justify-end gap-3 mt-6">

                <button
                    type="button"
                    onclick="closeTahunAjaranModal()"
                    class="px-5 py-2.5 rounded-xl
                           border border-gray-300
                           text-gray-700 hover:bg-gray-50">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-5 py-2.5 rounded-xl
                           bg-purple-600 hover:bg-purple-700
                           text-white">

                    Lihat

                </button>

            </div>

        </form>

    </div>

</div>

@if($guru->waliKelas)

<div class="bg-white rounded-2xl shadow border p-8 mb-8">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">

                Menu Wali Kelas

            </h2>

            <p class="text-gray-500 mt-2">

                Monitoring akademik dan administrasi kelas
                {{ $guru->waliKelas->nama_kelas }}

            </p>

        </div>

        <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

            {{ $guru->waliKelas->nama_kelas }}

        </span>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="rounded-xl border border-yellow-200 bg-yellow-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-yellow-100 flex items-center justify-center">

        <x-heroicon-o-chart-bar
            class="w-7 h-7 text-yellow-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-yellow-700">

        Rekap Nilai

    </h3>

    <p class="text-gray-600 mt-2">

        Lihat seluruh nilai siswa dalam kelas.

    </p>

    <a
        href="{{ route('wali.nilai.index', [
    'tahun_ajaran_id' => $tahunAjaran->id
]) }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka

    </a>

</div>
<div class="rounded-xl border border-orange-200 bg-orange-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-orange-100 flex items-center justify-center">

        <x-heroicon-o-calendar
            class="w-7 h-7 text-orange-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-orange-700">

        Rekap Absensi

    </h3>

    <p class="text-gray-600 mt-2">

        Monitoring kehadiran seluruh siswa.

    </p>

    <a
        href="{{ route('wali.absensi', [
    'tahun_ajaran_id' => $tahunAjaran->id
]) }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-orange-500 hover:bg-orange-600 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka

    </a>

</div>
<div class="rounded-xl border border-green-200 bg-green-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">

        <x-heroicon-o-trophy
            class="w-7 h-7 text-green-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-green-700">

        Ranking

    </h3>

    <p class="text-gray-600 mt-2">

        Lihat hasil peringkat siswa.

    </p>

    <a
       href="{{ route('ranking.index', [
    'tahun_ajaran_id' => $tahunAjaran->id
]) }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-green-600 hover:bg-green-700 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka

    </a>

</div>
<div class="rounded-xl border border-blue-200 bg-blue-50 p-6">

    <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

        <x-heroicon-o-document-text
            class="w-7 h-7 text-blue-600"/>

    </div>

    <h3 class="mt-5 text-xl font-bold text-blue-700">

        Rapor

    </h3>

    <p class="text-gray-600 mt-2">

        Cetak dan lihat rapor siswa.

    </p>

    <a
    href="{{ route('rapor.index', [
    'tahun_ajaran_id' => $tahunAjaran->id
]) }}"
        class="mt-6 inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white px-5 py-2">

        <x-heroicon-o-arrow-right class="w-4 h-4"/>

        Buka

    </a>

</div>
    </div>

</div>

@endif



{{-- ===================================================== --}}
{{-- JADWAL HARI INI --}}
{{-- ===================================================== --}}
@if(!$modeArsip)
<div class="bg-white rounded-2xl shadow border p-8 mb-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">

                Jadwal Mengajar Hari Ini

            </h2>

            <p class="text-gray-500 mt-2">
{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l d F Y') }}

            </p>

        </div>

        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

            <x-heroicon-o-calendar-days
                class="w-7 h-7 text-blue-600"/>

        </div>

    </div>
    @if($jadwalHariIni->count())

<div class="space-y-4">
    @foreach($jadwalHariIni as $jadwal)

<div class="rounded-xl border border-gray-200 p-5">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="text-lg font-bold text-slate-800">

                {{ $jadwal->mapel->nama_mapel }}

            </h3>

            <p class="text-gray-500 mt-1">

                Kelas {{ $jadwal->kelas->nama_kelas }}

            </p>

        </div>

        <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">

            Jam {{ $jadwal->jam_ke }}

        </span>

    </div>

    <div class="mt-4 flex items-center gap-8 text-gray-600">

        <div class="flex items-center gap-2">

            <x-heroicon-o-clock class="w-5 h-5"/>

            {{ substr($jadwal->jam_mulai,0,5) }}

            -

            {{ substr($jadwal->jam_selesai,0,5) }}

        </div>

        <div>

            {{ $jadwal->hari }}

        </div>

    </div>

    <div class="mt-5 flex gap-3">

        <a
            href="{{ route('absensi.index') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-green-600 hover:bg-green-700 text-white px-4 py-2">

            <x-heroicon-o-check-circle class="w-5 h-5"/>

            Absensi

        </a>

        <a
            href="{{ route('nilai.index') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white px-4 py-2">

            <x-heroicon-o-pencil-square class="w-5 h-5"/>

            Nilai

        </a>

    </div>

</div>

@endforeach

</div>
@else

<div class="py-16 text-center">

    <x-heroicon-o-calendar-days
        class="mx-auto w-16 h-16 text-gray-300"/>

    <h3 class="mt-5 text-lg font-semibold text-gray-600">

        Tidak ada jadwal mengajar hari ini

    </h3>

    <p class="mt-2 text-gray-500">

        Guru tidak memiliki jadwal mengajar pada hari ini.

    </p>

</div>
@endif
@endif
</div>

@push('scripts')

<script>

function openTahunAjaranModal()
{
    const modal = document.getElementById('tahunAjaranModal');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeTahunAjaranModal()
{
    const modal = document.getElementById('tahunAjaranModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

</script>

@endpush
@endsection
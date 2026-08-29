@extends('layouts.app')

@section('content')

@if(!$modeArsip)

<div
    id="modalImport"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-md p-6">

        <h2 class="text-xl font-bold mb-4">
            Import Data Guru
        </h2>

        <form
            action="{{ route('guru.import') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <input
                type="file"
                name="file"
                accept=".xlsx,.xls"
                class="w-full border rounded-lg p-3"
                required>

            <div class="flex justify-end gap-3 mt-6">

                <button
                    type="button"
                    onclick="tutupModalGuru()"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg">
                    Batal
                </button>

                <button
                    class="px-4 py-2 bg-green-600 text-white rounded-lg">
                    Import
                </button>

            </div>

        </form>

    </div>

</div>

@endif

@if(session('success'))

<div
class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div
class="mb-5 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

{{ session('error') }}

</div>

@endif

   {{-- ================= HEADER ================= --}}
{{-- ================= HEADER ================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">


    <div>

    <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

    <x-heroicon-o-user-group class="w-8 h-8 text-blue-600"/>

    {{ $isStaff ? 'Data Staff' : 'Data Guru' }}

</h2>

       <p class="text-gray-500 mt-2 text-lg">

    {{ $isStaff
        ? 'Kelola data staff sekolah.'
        : 'Kelola seluruh data guru SD Negeri Cimanahayu.'
    }}

</p>

    </div>

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
{{-- ================= CARD STATISTIK ================= --}}


<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Total Guru --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Guru
                </p>

                <h2 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalGuru }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <x-heroicon-o-user-group class="w-8 h-8 text-blue-600"/>

            </div>

        </div>

    </div>

    {{-- Wali Kelas --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Wali Kelas
                </p>

                <h2 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $totalWali }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                <x-heroicon-o-home class="w-8 h-8 text-green-600"/>

            </div>

        </div>

    </div>

    {{-- Guru PAI --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Guru PAI
                </p>

                <h2 class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $totalPai }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">

                <x-heroicon-o-book-open class="w-8 h-8 text-yellow-600"/>

            </div>

        </div>

    </div>

    {{-- Guru PJOK --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Guru PJOK
                </p>

                <h2 class="text-3xl font-bold text-red-500 mt-2">
                    {{ $totalPjok }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

                <x-heroicon-o-trophy class="w-8 h-8 text-red-600"/>

            </div>

        </div>

    </div>

</div>
{{-- ================= FILTER ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">

        <div class="flex items-center gap-2">

            <x-heroicon-o-funnel class="w-5 h-5 text-blue-600"/>

           <h2 class="font-semibold text-gray-800">
    Filter Data {{ $isStaff ? 'Staff' : 'Guru' }}
</h2>

        </div>

    </div>

    <form action="{{ route('guru.index') }}" method="GET">

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ $tahunAjaran->id }}"
    >

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

                {{-- SEARCH --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Pencarian

                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Nama / NIP / NUPTK"
                        class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- JENIS PENGAJAR --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Jenis Pengajar

                    </label>

                    
                            <select
    name="jenis_pengajar"
    class="w-full h-11 rounded-lg border-gray-300">

    <option value="">Semua</option>

    @if($isStaff)

        <option value="Operator"
            {{ request('jenis_pengajar') == 'Operator' ? 'selected' : '' }}>
            Operator
        </option>

        <option value="Staff"
            {{ request('jenis_pengajar') == 'Staff' ? 'selected' : '' }}>
            Staff
        </option>

    @else

        <option value="Wali Kelas"
            {{ request('jenis_pengajar') == 'Wali Kelas' ? 'selected' : '' }}>
            Wali Kelas
        </option>

        <option value="Guru PAI"
            {{ request('jenis_pengajar') == 'Guru PAI' ? 'selected' : '' }}>
            Guru PAI
        </option>

        <option value="Guru PJOK"
            {{ request('jenis_pengajar') == 'Guru PJOK' ? 'selected' : '' }}>
            Guru PJOK
        </option>

        <option value="Kepala Sekolah"
            {{ request('jenis_pengajar') == 'Kepala Sekolah' ? 'selected' : '' }}>
            Kepala Sekolah
        </option>

    @endif

</select>

                </div>

                {{-- STATUS --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Status Guru

                    </label>

                    <select
                        name="status_guru"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua</option>

                        <option value="Aktif"
                            {{ request('status_guru')=='Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Mutasi Keluar"
                            {{ request('status_guru')=='Mutasi Keluar' ? 'selected' : '' }}>
                            Mutasi Keluar
                        </option>

                        <option value="Pensiun"
                            {{ request('status_guru')=='Pensiun' ? 'selected' : '' }}>
                            Pensiun
                        </option>

                    </select>

                </div>

                {{-- BUTTON --}}
                <div class="flex items-end gap-3">

                    <button
                        type="submit"
                        class="flex-1 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">

                        Cari

                    </button>

                    <a
    href="{{ route('guru.index', [
        'tahun_ajaran_id' => $tahunAjaran->id
    ]) }}"
                        class="h-11 px-5 flex items-center justify-center rounded-lg bg-gray-300 hover:bg-gray-400">

                        Reset

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

{{-- ================= AKSI ================= --}}

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6">

    <div>

        <h2 class="text-lg font-semibold text-slate-800">
    Manajemen Data {{ $isStaff ? 'Staff' : 'Guru' }}
</h2>

<p class="text-sm text-gray-500 mt-1">
    {{ $isStaff
        ? 'Kelola data staff sekolah.'
        : 'Import, export data guru.'
    }}
</p>

    </div>

    <div class="flex flex-wrap gap-3 mt-5 lg:mt-0">

    @if(!$modeArsip && !$isStaff)

        {{-- IMPORT --}}
        <button
            type="button"
            onclick="bukaModalGuru()"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-green-600 text-white hover:bg-green-700 transition">

            <x-heroicon-o-arrow-up-tray class="w-5 h-5"/>

            Import Excel

        </button>

        {{-- EXPORT --}}
        <a
            href="{{ route('guru.export') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export Excel

        </a>

    @endif

</div>
</div>
{{-- ================= DATA GURU ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-slate-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">
    Data {{ $isStaff ? 'Staff' : 'Guru' }}
</h2>

            <p class="text-sm text-gray-500 mt-1">

                Menampilkan

                <span class="font-semibold">

                    {{ $gurus->firstItem() ?? 0 }}

                </span>

                -

                <span class="font-semibold">

                    {{ $gurus->lastItem() ?? 0 }}

                </span>

                dari

                <span class="font-semibold">

                    {{ $gurus->total() }}

                </span>

                data {{ strtolower($isStaff ? 'Staff' : 'Guru') }}

            </p>

        </div>

        <div>

            <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                {{ $totalGuru }} {{ $isStaff ? 'Staff' : 'Guru' }}

            </span>

        </div>

    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">

        <table class="min-w-[1350px] w-full border-collapse">

            <thead class="bg-slate-100">

                <tr class="text-sm text-gray-700">

                    <th class="border px-3 py-3 text-center w-14">
                        No
                    </th>

                    <th class="border px-4 py-3 text-left w-72">
                        Nama Guru
                    </th>

                    <th class="border px-4 py-3 text-left w-52">
                        NIP / NUPTK
                    </th>

                    <th class="border px-3 py-3 text-center w-16">
                        JK
                    </th>

                    <th class="border px-3 py-3 text-left w-40">
                        Jenis PTK
                    </th>

                    <th class="border px-3 py-3 text-left w-40">
                        Status PTK
                    </th>

                    <th class="border px-3 py-3 text-center w-44">
                        Pengajar
                    </th>

<th class="border px-3 py-3 text-center w-44">
                        Wali Kelas
                    </th>


                    <th class="border px-3 py-3 text-center w-28">
                        Status
                    </th>

                    <th class="border px-3 py-3 text-left w-36">
                        No. HP
                    </th>

                    <th class="border px-3 py-3 text-center w-56">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">
                <tbody class="divide-y divide-gray-200">

@forelse($gurus as $guru)

<tr class="hover:bg-sky-50 transition duration-150">

    {{-- NO --}}
    <td class="border px-3 py-3 text-center">

        {{ $gurus->firstItem() + $loop->index }}

    </td>

    {{-- NAMA --}}
    <td class="border px-4 py-3">

        <div class="font-semibold text-slate-800">

           
 {{ strtoupper($guru->nama_guru) }}

        </div>

        <div class="text-xs text-gray-500 mt-1">

            {{ $guru->email ?? '-' }}

        </div>

    </td>

    {{-- NIP --}}
    <td class="border px-4 py-3">

        <div>

            <span class="font-medium">

                NIP :

            </span>

            {{ $guru->nip ?: '-' }}

        </div>

        <div class="text-xs text-gray-500 mt-1">

            NUPTK : {{ $guru->nuptk ?: '-' }}

        </div>

    </td>

    {{-- JK --}}
    <td class="border px-3 py-3 text-center">

        @if($guru->jenis_kelamin=='L')

            <span class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">

                L

            </span>

        @else

            <span class="inline-flex px-3 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold">

                P

            </span>

        @endif

    </td>

    {{-- JENIS PTK --}}
    <td class="border px-3 py-3">

        {{ $guru->jenis_ptk ?? '-' }}

    </td>

    {{-- STATUS PTK --}}
    <td class="border px-3 py-3">

        {{ $guru->status_kepegawaian ?? '-' }}

    </td>

   {{-- JENIS PENGAJAR --}}
<td class="border px-3 py-3 text-center">

    @switch($guru->jenis_pengajar)

        @case('Wali Kelas')
            <span class="inline-flex rounded-full bg-blue-100 text-blue-700 px-3 py-1 text-xs font-semibold">
                Wali Kelas
            </span>
        @break

        @case('Guru PAI')
            <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold">
                Guru PAI
            </span>
        @break

        @case('Guru PJOK')
            <span class="inline-flex rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-xs font-semibold">
                Guru PJOK
            </span>
        @break

        @case('Kepala Sekolah')
            <span class="inline-flex rounded-full bg-purple-100 text-purple-700 px-3 py-1 text-xs font-semibold">
                Kepala Sekolah
            </span>
        @break

        @case('Operator')
            <span class="inline-flex rounded-full bg-gray-100 text-gray-700 px-3 py-1 text-xs font-semibold">
                Operator
            </span>
        @break

        @case('Staff')
            <span class="inline-flex rounded-full bg-indigo-100 text-indigo-700 px-3 py-1 text-xs font-semibold">
                Staff
            </span>
        @break

        @default
            <span class="inline-flex rounded-full bg-gray-100 text-gray-700 px-3 py-1 text-xs font-semibold">
                {{ $guru->jenis_pengajar ?? '-' }}
            </span>
        @break

    @endswitch

</td>


<td>
    @if($guru->waliKelas)
        <span class="block text-center px-2 py-1">
            {{ $guru->waliKelas->nama_kelas }}
        </span>
    @else
        <span class="block text-center">-</span>
    @endif
</td>

    {{-- STATUS --}}
    <td class="border px-3 py-3 text-center">

        @if($guru->status_guru=='Aktif')

            <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold">

                Aktif

            </span>

        @elseif($guru->status_guru=='Pensiun')

            <span class="inline-flex rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-xs font-semibold">

                Pensiun

            </span>

        @else

            <span class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-xs font-semibold">

                Mutasi

            </span>

        @endif

    </td>

    {{-- NO HP --}}
    <td class="border px-3 py-3">

        {{ $guru->no_hp ?? '-' }}

    </td>

  {{-- AKSI --}}
<td class="border px-3 py-3">

    <div class="flex justify-center items-center gap-2 whitespace-nowrap">

        {{-- DETAIL --}}
        <a
            href="{{ route('guru.show', $guru->id) }}"
            class="p-1.5 rounded-lg bg-blue-100 hover:bg-blue-200 transition"
            title="Detail">

            <x-heroicon-o-eye class="w-5 h-5 text-blue-600"/>

        </a>


        {{-- AKSI HANYA PERIODE AKTIF --}}
        @if(!$modeArsip)

            {{-- EDIT --}}
            <a
                href="{{ route('guru.edit', $guru->id) }}"
                class="p-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 transition"
                title="Edit">

                <x-heroicon-o-pencil-square
                    class="w-5 h-5 text-yellow-600"/>

            </a>


            {{-- RESET PASSWORD --}}
            <form
                action="{{ route('guru.reset-password', $guru->id) }}"
                method="POST"
                class="inline">

                @csrf

                <button
                    type="submit"
                    onclick="return confirm('Reset password guru ini?')"
                    class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 transition"
                    title="Reset Password">

                    <x-heroicon-o-key
                        class="w-5 h-5 text-red-600"/>

                </button>

            </form>


            {{-- MUTASI --}}
            <form
                action="{{ route('guru.mutasi', $guru->id) }}"
                method="POST"
                class="inline">

                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    onclick="return confirm('Mutasikan guru ini?')"
                    class="p-1.5 rounded-lg bg-green-100 hover:bg-green-200 transition"
                    title="Mutasi">

                    <x-heroicon-o-arrow-right-on-rectangle
                        class="w-5 h-5 text-green-600"/>

                </button>

            </form>

        @endif

    </div>

</td>

</tr>

@empty

<tr>

<td colspan="11" class="py-12">

<div class="text-center">

<x-heroicon-o-user-group class="mx-auto h-16 w-16 text-gray-300"/>

<h3 class="mt-4 text-lg font-semibold text-gray-700">

Belum Ada Data {{ $isStaff ? 'Staff' : 'Guru' }}

</h3>

<p class="mt-2 text-gray-500">

Silakan tambahkan data {{ strtolower($isStaff ? 'staff' : 'guru') }} terlebih dahulu.

</p>

</div>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

{{-- ================= FOOTER TABEL ================= --}}

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-4 border-t bg-gray-50 rounded-b-xl">

    <div class="text-sm text-gray-600">

        Menampilkan

        <span class="font-semibold">

            {{ $gurus->firstItem() ?? 0 }}

        </span>

        -

        <span class="font-semibold">

            {{ $gurus->lastItem() ?? 0 }}

        </span>

        dari

        <span class="font-semibold">

            {{ $gurus->total() }}

        </span>

        data guru

    </div>

    <div>

        {{ $gurus->links('vendor.pagination.tailwind') }}

    </div>

</div>

</div>
@push('scripts')
<script>
function bukaModalGuru() {
    const modal = document.getElementById('modalImport');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function tutupModalGuru() {
    const modal = document.getElementById('modalImport');

    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        tutupModalGuru();
    }
});
</script>
@endpush
@endsection
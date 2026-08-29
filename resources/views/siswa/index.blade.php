@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="mb-4 rounded-lg bg-green-100 border border-green-300
                text-green-700 px-4 py-3">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 rounded-lg bg-red-100 border border-red-300
                text-red-700 px-4 py-3">
        {{ session('error') }}
    </div>
@endif

{{-- ================= MODAL IMPORT ================= --}}
<div
    id="modalImport"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

        <h2 class="text-xl font-bold mb-5">
            Import Data Siswa
        </h2>

       <form
    action="{{ route('siswa.import') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ $tahunAjaran->id }}"
    >

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
                    onclick="tutupModalSiswa()"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">

                    Import

                </button>

            </div>

        </form>

    </div>

</div>


        {{-- ================= HEADER ================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

    <div>

            <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                    <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600"/>

                    Data Siswa

                </h2>


        <p class="text-gray-500 mt-2 text-lg">

            Kelola seluruh data peserta didik SD Negeri Cimanahayu.

        </p>

    </div>

     

   @if($tahunAjaran)

<div class="mt-5 lg:mt-0">

    <div class="bg-blue-50 border border-blue-200 rounded-xl px-5 py-3 shadow-sm min-w-[270px]">

        <p class="text-xs uppercase text-blue-600 font-semibold">
            Periode Akademik
        </p>

        <h3 class="text-xl font-bold text-blue-700">
            {{ $tahunAjaran->tahun_ajaran }}
        </h3>

        <div class="flex justify-between items-center mt-1">

            <span class="text-gray-600">
                Semester {{ $tahunAjaran->semester }}
            </span>

            @if($modeArsip)

                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">
                    Arsip
                </span>

            @else

                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                    Aktif
                </span>

            @endif

        </div>

    </div>

</div>

@endif

</div>

        

        {{-- ================= CARD STATISTIK ================= --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

            <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500 text-sm">

                            Total Peserta Didik

                        </p>

                        <h2 class="text-3xl font-bold text-blue-600 mt-2">

                            {{ $totalSiswa }}

                        </h2>

                    </div>

                    <div
                        class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                        <x-heroicon-o-users class="w-8 h-8 text-blue-600"/>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500 text-sm">

                            Laki-laki

                        </p>

                        <h2 class="text-3xl font-bold text-sky-600 mt-2">

                            {{ $jumlahLaki }}

                        </h2>

                    </div>

                    <div
                        class="w-14 h-14 rounded-full bg-sky-100 flex items-center justify-center">

                        <x-heroicon-o-user class="w-8 h-8 text-sky-600"/>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-gray-500 text-sm">

                            Perempuan

                        </p>

                        <h2 class="text-3xl font-bold text-pink-600 mt-2">

                            {{ $jumlahPerempuan }}

                        </h2>

                    </div>

                    <div
                        class="w-14 h-14 rounded-full bg-pink-100 flex items-center justify-center">

                        <x-heroicon-o-user class="w-8 h-8 text-pink-600"/>

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

                Filter Data Peserta Didik

            </h2>

        </div>

    </div>

    <form action="{{ route('siswa.index') }}" method="GET">

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ $tahunAjaran->id }}"
    >

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-5 gap-5">

                {{-- SEARCH --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Pencarian

                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Nama / NIPD / NISN"
                        class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- TINGKAT --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Tingkat

                    </label>

                    <select
                        name="tingkat"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua Tingkat</option>

                        @for($i=1;$i<=6;$i++)

                        <option
                            value="{{ $i }}"
                            {{ request('tingkat')==$i?'selected':'' }}>

                            Kelas {{ $i }}

                        </option>

                        @endfor

                    </select>

                </div>

                {{-- ROMBEL --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Rombel

                    </label>

                    <select
                        name="kelas"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua Rombel</option>

                        @foreach($kelas as $k)

                        <option
                            value="{{ $k->id }}"
                            {{ request('kelas')==$k->id?'selected':'' }}>

                            {{ $k->nama_kelas }}

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- STATUS --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua Status</option>

                        <option value="Aktif"
                            {{ request('status')=='Aktif'?'selected':'' }}>
                            Aktif
                        </option>

                        <option value="Naik Kelas"
                            {{ request('status')=='Naik Kelas'?'selected':'' }}>
                            Naik Kelas
                        </option>

                        <option value="Lulus"
                            {{ request('status')=='Lulus'?'selected':'' }}>
                            Lulus
                        </option>

                        <option value="Pindah"
                            {{ request('status')=='Pindah'?'selected':'' }}>
                            Pindah
                        </option>

                        <option value="Keluar"
                            {{ request('status')=='Keluar'?'selected':'' }}>
                            Keluar
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
    href="{{ route('siswa.index', [
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

{{-- ================= MANAJEMEN DATA PESERTA DIDIK ================= --}}
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">

    {{-- JUDUL --}}
    <div class="flex-1 min-w-0">

        <h2 class="text-lg font-semibold text-slate-800 whitespace-nowrap">
            Manajemen Data Peserta Didik
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Import, export data peserta didik.
        </p>

    </div>


    {{-- BUTTON --}}
    @if(!$modeArsip)

        <div class="flex flex-wrap items-center gap-3 shrink-0">

            {{-- IMPORT --}}
            <button
                type="button"
                onclick="bukaModalSiswa()"
                class="inline-flex items-center gap-2 px-5 py-3
                       rounded-lg bg-green-600 text-white
                       hover:bg-green-700 transition"
            >

                <x-heroicon-o-arrow-up-tray class="w-5 h-5"/>

                Import Excel

            </button>


            {{-- EXPORT --}}
            <a
                href="{{ route('siswa.export') }}"
                class="inline-flex items-center gap-2 px-5 py-3
                       rounded-lg bg-yellow-500 text-white
                       hover:bg-yellow-600 transition"
            >

                <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

                Export Excel

            </a>

        </div>

    @endif

</div>

{{-- ================= DATA PESERTA DIDIK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- HEADER TABEL --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-gray-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-gray-800">

                Data Peserta Didik

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Menampilkan

                <strong>{{ $siswa->firstItem() ?? 0 }}</strong>

                -

                <strong>{{ $siswa->lastItem() ?? 0 }}</strong>

                dari

                <strong>{{ $siswa->total() }}</strong>

                peserta didik

            </p>

        </div>

        <span
            class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

            {{ $totalSiswa }} Siswa

        </span>

    </div>

    {{-- TABEL --}}
    <div class="overflow-x-auto">

        <table class="w-full min-w-[1450px] border-collapse">

            <thead>

                <tr class="bg-slate-100 text-gray-700 text-sm">

                    <th class="border px-3 py-3 text-center w-16">
                        No
                    </th>

                    <th class="border px-3 py-3 text-center w-32">
                        NIPD
                    </th>

                    <th class="border px-3 py-3 text-center w-36">
                        NISN
                    </th>

                    <th class="border px-4 py-3 text-left min-w-[320px]">
                        Nama Peserta Didik
                    </th>

                    <th class="border px-3 py-3 text-center w-20">
                        JK
                    </th>

                    <th class="border px-4 py-3 text-left min-w-[220px]">
                        Tempat / Tanggal Lahir
                    </th>

                    <th class="border px-3 py-3 text-center w-24">
                        Tingkat
                    </th>

                    <th class="border px-3 py-3 text-center w-28">
                        Rombel
                    </th>

                    <th class="border px-3 py-3 text-center w-32">
                        Status
                    </th>

                    <th class="border px-3 py-3 text-center w-44">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($siswa as $item)

                <tr class="hover:bg-sky-50 transition duration-150">

                    <td class="border text-center py-3">

                        {{ $siswa->firstItem()+$loop->index }}

                    </td>

                    <td class="border text-center py-3">

                        {{ $item->nipd ?? '-' }}

                    </td>

                    <td class="border text-center py-3">

                        {{ $item->nisn ?? '-' }}

                    </td>

                    <td class="border px-4 py-3">

                        <div class="font-semibold text-gray-800">

                            {{ $item->nama_siswa }}

                        </div>

                        <div class="text-xs text-gray-500 mt-1">

                            NIK :
                            {{ $item->nik ?? '-' }}

                        </div>

                    </td>

                    <td class="border text-center">

                        @if($item->jenis_kelamin=='L')

                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-100 text-blue-700 font-bold text-xs">

                                L

                            </span>

                        @else

                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-pink-100 text-pink-700 font-bold text-xs">

                                P

                            </span>

                        @endif

                    </td>

                    <td class="border px-4 py-3">

                        <div>

                            {{ $item->tempat_lahir ?? '-' }}

                        </div>

                        <div class="text-xs text-gray-500">

                            {{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '-' }}

                        </div>

                    </td>

                   <td class="border text-center">
{{ optional(optional($item->kelasPeriode)->kelas)->tingkat ?? '-' }}
</td>

           <td class="border text-center">
{{ optional(optional($item->kelasPeriode)->kelas)->nama_kelas ?? '-' }}
</td>
                    </td>

                    <td class="border text-center">

                        @php

                            $warna = match($item->status_siswa){

                                'Aktif' => 'bg-green-100 text-green-700',

                                'Naik Kelas' => 'bg-blue-100 text-blue-700',

                                'Lulus' => 'bg-indigo-100 text-indigo-700',

                                'Pindah' => 'bg-yellow-100 text-yellow-700',

                                default => 'bg-red-100 text-red-700'

                            };

                        @endphp

                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">

                            {{ $item->status_siswa }}

                        </span>

                    </td>

                   <td class="border px-3 py-3">

    <div class="flex justify-center gap-2">

        {{-- DETAIL --}}
        {{-- DETAIL --}}
<a
    href="{{ route('siswa.show', [
        'siswa' => $item->id,
        'tahun_ajaran_id' => $tahunAjaran->id
    ]) }}"
    class="inline-flex items-center justify-center
           w-9 h-9 rounded-lg
           bg-blue-100 text-blue-600
           hover:bg-blue-200"
    title="Detail"
>
    <x-heroicon-o-eye class="w-5 h-5"/>
</a>


        {{-- EDIT HANYA PERIODE AKTIF --}}
@if(!$modeArsip)

    <a
        href="{{ route('siswa.edit', [
            'siswa' => $item->id,
            'tahun_ajaran_id' => $tahunAjaran->id
        ]) }}"
        class="p-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 transition"
        title="Edit"
    >
        <x-heroicon-o-pencil-square class="w-5 h-5 text-yellow-600"/>
    </a>

@endif

    </div>

</td>

                </tr>

                @empty

<tr>

<td colspan="11" class="py-12">

<div class="text-center">

 <x-heroicon-o-academic-cap class="mx-auto h-16 w-16 text-gray-300"/>

<h3 class="mt-4 text-lg font-semibold text-gray-700">

Belum Ada Data Siswa.

</h3>

<p class="mt-2 text-gray-500">

Silakan tambahkan data peserta didik terlebih dahulu.

</p>

</div>

</td>

</tr>

@endforelse

                 

            </tbody>

        </table>

    </div>

        </div>

    {{-- ================= FOOTER TABEL ================= --}}
<br>
            <div class="text-sm text-gray-600">

                Menampilkan

                <span class="font-semibold">

                    {{ $siswa->firstItem() ?? 0 }}

                </span>

                -

                <span class="font-semibold">

                    {{ $siswa->lastItem() ?? 0 }}

                </span>

                dari

                <span class="font-semibold">

                    {{ $siswa->total() }}

                </span>

                peserta didik

            </div>

            <div>

               {{ $siswa->links('vendor.pagination.tailwind') }}

            </div>

        </div>

    </div>

</div>
@push('scripts')
<script>
function bukaModalSiswa() {
    const modal = document.getElementById('modalImport');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function tutupModalSiswa() {
    const modal = document.getElementById('modalImport');

    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

document.addEventListener('keydown', function(e){
    if (e.key === 'Escape') {
        tutupModalSiswa();
    }
});
</script>
@endpush
@endsection
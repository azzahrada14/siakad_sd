{{-- ================= HEADER ================= --}}
@extends('layouts.app')

@section('content')

<div
    id="modalImport"
    onclick="if(event.target===this)tutupModalMapel()"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md">

        <div class="px-6 py-4 border-b">
            <h2 class="text-xl font-bold text-slate-800">
                Import Data Mata Pelajaran
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Upload file Excel sesuai template.
            </p>
        </div>

        <form
            action="{{ route('mapel.import') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="p-6">

                <input
                    type="file"
                    name="file"
                    accept=".xlsx,.xls"
                    required
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div class="px-6 py-4 border-t bg-slate-50 flex justify-end gap-3">

                <button
                    type="button"
                    onclick="tutupModalMapel()"
                    class="px-5 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white">

                    Import

                </button>

            </div>

        </form>

    </div>

</div>


@if(session('success'))

<div class="mb-5 rounded-lg border border-green-300 bg-green-100 px-5 py-4 text-green-700">

{{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="mb-5 rounded-lg border border-red-300 bg-red-100 px-5 py-4 text-red-700">

{{ session('error') }}

</div>

@endif

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

   
   <div>

     <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

            <x-heroicon-o-book-open class="w-8 h-8 text-blue-600"/>

                    Data Mata Pelajaran

                </h2>

        <p class="text-gray-500 mt-2 text-lg">

            Kelola seluruh data mata pelajaran SD Negeri Cimanahayu.

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

                    Semester {{ $tahunAktif->semester }}

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
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mb-6">

    {{-- Total Mapel --}}
    <div class="rounded-xl border border-gray-200 bg-white p-4 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Mapel</p>
                <h2 class="mt-2 text-2xl font-bold text-blue-600">
                    {{ $totalMapel }}
                </h2>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100">
                <x-heroicon-o-book-open class="h-6 w-6 text-blue-600" />
            </div>
        </div>
    </div>

    {{-- Intrakurikuler --}}
    <div class="rounded-xl border border-gray-200 bg-white p-4 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Intrakurikuler</p>
                <h2 class="mt-2 text-2xl font-bold text-green-600">
                    {{ $mapelIntrakurikuler }}
                </h2>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                <x-heroicon-o-check-badge class="h-6 w-6 text-green-600" />
            </div>
        </div>
    </div>

    {{-- Muatan Lokal --}}
    <div class="rounded-xl border border-gray-200 bg-white p-4 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Muatan Lokal</p>
                <h2 class="mt-2 text-2xl font-bold text-yellow-500">
                    {{ $mapelMulok }}
                </h2>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-100">
                <x-heroicon-o-globe-alt class="h-6 w-6 text-yellow-600" />
            </div>
        </div>
    </div>

    

    {{-- Mapel Aktif --}}
    <div class="rounded-xl border border-gray-200 bg-white p-4 shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Mapel Aktif</p>
                <h2 class="mt-2 text-2xl font-bold text-red-500">
                    {{ $mapelAktif }}
                </h2>
            </div>

            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                <x-heroicon-o-academic-cap class="h-6 w-6 text-red-600" />
            </div>
        </div>
    </div>

</div>

    
              
{{-- ================= FILTER ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">
        <div class="flex items-center gap-2">
            <x-heroicon-o-funnel class="w-5 h-5 text-blue-600" />
            <h2 class="font-semibold text-gray-800">
                Filter Data Mata Pelajaran
            </h2>
        </div>
    </div>

    <form action="{{ route('mapel.index') }}" method="GET">

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-5 gap-5 items-end">

                {{-- Pencarian --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Pencarian
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Kode / Nama Mapel"
                        class="w-full h-11 rounded-lg border-gray-300">
                </div>

                {{-- Jenis --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Jenis
                    </label>

                    <select
                        name="jenis"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua</option>

                        <option value="Wajib"
                            {{ request('jenis') == 'Wajib' ? 'selected' : '' }}>
                            Wajib
                        </option>

                        <option value="Muatan Lokal"
                            {{ request('jenis') == 'Muatan Lokal' ? 'selected' : '' }}>
                            Muatan Lokal
                        </option>

                        <option value="Pilihan"
                            {{ request('jenis') == 'Pilihan' ? 'selected' : '' }}>
                            Pilihan
                        </option>

                    </select>
                </div>

                {{-- Kelompok --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Kelompok
                    </label>

                    <select
                        name="kelompok"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua</option>

                        <option value="Intrakurikuler"
                            {{ request('kelompok') == 'Intrakurikuler' ? 'selected' : '' }}>
                            Intrakurikuler
                        </option>

                        <option value="Mapel Pilihan"
                            {{ request('kelompok') == 'Mapel Pilihan' ? 'selected' : '' }}>
                            Mapel Pilihan
                        </option>

                    </select>
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua</option>

                        <option value="Aktif"
                            {{ request('status') == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="Nonaktif"
                            {{ request('status') == 'Nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3">

                    <button
                        type="submit"
                        class="flex-1 h-11 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">
                        Cari
                    </button>

                    <a
                        href="{{ route('mapel.index') }}"
                        class="flex-1 h-11 rounded-lg bg-gray-300 hover:bg-gray-400 flex items-center justify-center">
                        Reset
                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

{{-- ================= KETERANGAN KATEGORI ================= --}}

<div class="mb-5 rounded-xl border border-blue-200 bg-blue-50">

    <div class="px-5 py-4">

        <div class="flex items-center gap-2 mb-3">

            <x-heroicon-o-information-circle
                class="w-5 h-5 text-blue-600"/>

            <h3 class="font-semibold text-blue-800">

                Keterangan Kategori Mata Pelajaran

            </h3>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="flex items-start gap-3">

                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold whitespace-nowrap">

                    KD01

                </span>

                <p class="text-sm text-gray-600">

    Mata pelajaran yang diajarkan kepada seluruh siswa mulai dari
    <b>kelas 1 sampai kelas 6</b>.

</p>

            </div>

            <div class="flex items-start gap-3">

                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold whitespace-nowrap">

                    KD02

                </span>

                <p class="text-sm text-gray-600">

    Mata pelajaran yang mulai diajarkan kepada siswa pada
    <b>kelas 3 sampai kelas 6</b>.

</p>

            </div>

            <div class="flex items-start gap-3">

    <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold whitespace-nowrap">

        KD03

    </span>

    <p class="text-sm text-gray-600">

  
    Mata pelajaran yang diajarkan khusus kepada siswa  <b> kelas 5 dan kelas 6</b> sebagai <b>mata pelajaran pilihan</b> yang memiliki jadwal dan penilaian, tetapi tidak dihitung sebagai <b>Jam Pelajaran (JP) wajib/pokok/intrakurikuler</b>, seperti <b>Koding & Kecerdasan Artifisial (KKA)</b> dan <b>Anyaman</b>.

</p>

</div>

        </div>

    </div>

</div>

<div class="mt-8 mb-4 flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6">

    <div>

        <h2 class="text-2xl font-bold text-slate-800">
    Manajemen Data Mata Pelajaran
</h2>

<p class="mt-1 text-gray-500">
    Tambah, ubah, import, export, dan kelola data mata pelajaran.
</p>
    </div>

    @if(!$modeArsip)

    <div class="flex flex-wrap gap-3">

        {{-- IMPORT --}}
        <button
            type="button"
            onclick="bukaModalMapel()"
            class="inline-flex items-center gap-2 px-5 py-3
                   rounded-lg bg-green-600 hover:bg-green-700
                   text-white transition"
        >
            <x-heroicon-o-arrow-up-tray class="w-5 h-5"/>
            Import
        </button>


        {{-- EXPORT --}}
        <a
            href="{{ route('mapel.export') }}"
            class="inline-flex items-center gap-2 px-5 py-3
                   rounded-lg bg-indigo-600 hover:bg-indigo-700
                   text-white transition"
        >
            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>
            Export
        </a>


        {{-- TAMBAH --}}
        <a
            href="{{ route('mapel.create') }}"
            class="inline-flex items-center gap-2 px-5 py-3
                   rounded-lg bg-blue-600 hover:bg-blue-700
                   text-white transition"
        >
            <x-heroicon-o-plus class="w-5 h-5"/>
            Tambah
        </a>

    </div>

@else

    <span class="inline-flex items-center gap-2 px-4 py-2
                 rounded-lg bg-gray-100 text-gray-600
                 text-sm font-semibold">

        <x-heroicon-o-lock-closed class="w-5 h-5"/>

        Mode Arsip — Hanya Melihat

    </span>

@endif
</div>
{{-- ================= DATA MAPEL ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-slate-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">

                Data Mata Pelajaran

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Menampilkan

                <span class="font-semibold">

                    {{ $mapels->firstItem() ?? 0 }}

                </span>

                -

                <span class="font-semibold">

                    {{ $mapels->lastItem() ?? 0 }}

                </span>

                dari

                <span class="font-semibold">

                    {{ $mapels->total() }}

                </span>

                data mata pelajaran.

            </p>

        </div>

        <div>

            <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                {{ $totalMapel }} Mapel

            </span>

        </div>

    </div>


<div class="overflow-x-auto">
    <table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="border px-3 py-3 text-center w-16">

No

</th>

<th class="border px-4 py-3">

Kode

</th>

<th class="border px-4 py-3">

Mata Pelajaran

</th>

<th class="border px-4 py-3 text-center">
    Kategori
</th>

<th class="border px-4 py-3 text-center">
    Jenis
</th>

<th class="border px-4 py-3 text-center">
    Kelompok
</th>

<th class="border px-3 py-3 text-center">

KKM

</th>

<th class="border px-3 py-3 text-center">

Status

</th>

<th class="border px-3 py-3 text-center w-44">

Aksi

</th>

</tr>

</thead>

<tbody>
    @forelse($mapels as $mapel)

<tr class="hover:bg-sky-50 transition">

<td class="border px-3 py-3 text-center">

{{ $mapels->firstItem() + $loop->index }}

</td>

<td class="border px-4 py-3 font-medium">

{{ $mapel->kode_mapel }}

</td>

<td class="border px-4 py-3">

{{ $mapel->nama_mapel }}

</td>

<td class="border px-4 py-3 text-center">

@if($mapel->kategori)

    @switch($mapel->kategori->kode_kategori)

        @case('KD01')

        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
            KD01 • Kelas 1–6
        </span>

        @break

        @case('KD02')

        <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
            KD02 • Kelas 3–6
        </span>

        @break

        @case('KD03')

        <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
            KD03 • Kelas 5-6 (Non JP Wajib)
        </span>

        @break

    @endswitch

@endif

</td>

<td class="border px-4 py-3 text-center">

@if($mapel->jenis == 'Wajib')

    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
        Wajib
    </span>

@elseif($mapel->jenis == 'Muatan Lokal')

    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
        Muatan Lokal
    </span>

@elseif($mapel->jenis == 'Pilihan')

    <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
        Pilihan
    </span>

@endif

</td>

<td class="border px-4 py-3 text-center">

@if($mapel->kelompok == 'Intrakurikuler')

        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
            Intrakurikuler
        </span>

    @elseif($mapel->kelompok == 'Mapel Pilihan')

        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
            Mapel Pilihan
        </span>

    @endif

</td>

<td class="border px-3 py-3 text-center">

{{ $mapel->kkm }}

</td>

<td class="border px-3 py-3 text-center">

@if($mapel->status=='Aktif')

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

Aktif

</span>

@else

<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

Nonaktif

</span>

@endif

</td>


    <td class="border px-3 py-3">

    <div class="flex justify-center gap-2">

        {{-- DETAIL --}}
        <a
            href="{{ route('mapel.show', $mapel->id) }}"
            class="w-9 h-9 rounded-lg bg-blue-100
                   hover:bg-blue-200 flex items-center justify-center"
            title="Detail"
        >
            <x-heroicon-o-eye class="w-5 h-5 text-blue-600"/>
        </a>


        @if(!$modeArsip)

            {{-- EDIT --}}
            <a
                href="{{ route('mapel.edit', $mapel->id) }}"
                class="w-9 h-9 rounded-lg bg-yellow-100
                       hover:bg-yellow-200 flex items-center justify-center"
                title="Edit"
            >
                <x-heroicon-o-pencil-square class="w-5 h-5 text-yellow-600"/>
            </a>


            {{-- LINGKUP MATERI --}}
            <a
                href="{{ route('lingkup-materi.index', [
                    'mapel' => $mapel->id
                ]) }}"
                class="w-9 h-9 rounded-lg bg-indigo-100
                       hover:bg-indigo-200 flex items-center justify-center"
                title="Kelola Lingkup Materi"
            >
                <x-heroicon-o-rectangle-stack class="w-5 h-5 text-indigo-600"/>
            </a>


            {{-- NONAKTIF --}}
            <form
                action="{{ route('mapel.nonaktif', $mapel->id) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    onclick="return confirm('Nonaktifkan mata pelajaran ini?')"
                    class="w-9 h-9 rounded-lg bg-orange-100
                           hover:bg-orange-200 flex items-center justify-center"
                    title="Nonaktifkan"
                >
                    <x-heroicon-o-no-symbol class="w-5 h-5 text-orange-600"/>
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

<x-heroicon-o-book-open  class="mx-auto h-16 w-16 text-gray-300"/>

<h3 class="mt-4 text-lg font-semibold text-gray-700">

Belum Ada Data Mata Pelajaran.

</h3>

<p class="mt-2 text-gray-500">

Silakan tambahkan data mata pelajaran terlebih dahulu.

</p>

</div>

</td>

</tr>

@endforelse
</tbody>

</table>

</div>

<div class="px-6 py-4 border-t bg-slate-50 rounded-b-xl">

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

<p class="text-sm text-gray-500">

Menampilkan

{{ $mapels->firstItem() ?? 0 }}

-

{{ $mapels->lastItem() ?? 0 }}

dari

{{ $mapels->total() }}

data

</p>

<div>

{{ $mapels->links('vendor.pagination.tailwind') }}

</div>

</div>

</div>

</div>

@push('scripts')
<script>

function bukaModalMapel() {

    const modal = document.getElementById('modalImport');

    modal.classList.remove('hidden');
    modal.classList.add('flex');

}

function tutupModalMapel() {

    const modal = document.getElementById('modalImport');

    modal.classList.remove('flex');
    modal.classList.add('hidden');

}

document.addEventListener('keydown', function(e){

    if(e.key === 'Escape'){

        tutupModalMapel();

    }

});

</script>
@endpush
@endsection
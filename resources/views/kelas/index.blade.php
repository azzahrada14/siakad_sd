@extends('layouts.app')

@section('content')

@if(!$modeArsip)

{{-- =========================================================
    MODAL TAMBAH DATA KELAS
========================================================= --}}
<div
    id="modalTambahKelas"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white rounded-xl w-full max-w-md p-6 shadow-xl">

        {{-- HEADER MODAL --}}
        <div class="flex items-center justify-between mb-5">

            <div>
                <h2 class="text-xl font-bold text-gray-800">
                    Tambah Data Kelas
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Tambahkan data kelas baru.
                </p>
            </div>

            <button
                type="button"
                onclick="tutupModalKelas()"
                class="text-gray-400 hover:text-gray-600"
            >
                <x-heroicon-o-x-mark class="w-6 h-6"/>
            </button>

        </div>


        {{-- FORM --}}
        <form
            action="{{ route('kelas.store') }}"
            method="POST"
        >

            @csrf

            {{-- PERIODE TAHUN AJARAN --}}
            <input
                type="hidden"
                name="tahun_ajaran_id"
                value="{{ $tahunAjaran->id }}"
            >


            {{-- NAMA KELAS --}}
            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kelas
                </label>

                <input
                    type="text"
                    name="nama_kelas"
                    value="{{ old('nama_kelas') }}"
                    placeholder="Contoh : 1A"
                    class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    required
                >

                @error('nama_kelas')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- TINGKAT --}}
            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tingkat
                </label>

                <select
                    name="tingkat"
                    class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    required
                >

                    @for($i = 1; $i <= 6; $i++)

                        <option
                            value="{{ $i }}"
                            {{ old('tingkat', 1) == $i ? 'selected' : '' }}
                        >
                            {{ $i }}
                        </option>

                    @endfor

                </select>

                @error('tingkat')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- WALI KELAS --}}
            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Wali Kelas
                </label>

                <select
                    name="wali_kelas_id"
                    class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                >

                    <option value="">
                        Belum Ditentukan
                    </option>

                    @foreach($guru as $g)

                        <option
                            value="{{ $g->id }}"
                            {{ old('wali_kelas_id') == $g->id ? 'selected' : '' }}
                        >
                            {{ $g->nama_guru }}
                        </option>

                    @endforeach

                </select>

                @error('wali_kelas_id')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- RUANG KELAS --}}
            <div class="mb-5">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Ruang Kelas
                </label>

                <input
                    type="text"
                    name="ruang_kelas"
                    value="{{ old('ruang_kelas') }}"
                    placeholder="Contoh : Ruang 2B"
                    class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                >

                @error('ruang_kelas')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="tutupModalKelas()"
                    class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endif


        


{{-- =========================================================
    ALERT SUCCESS
========================================================= --}}
@if(session('success'))

    <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

        {{ session('success') }}

    </div>

@endif


{{-- =========================================================
    ALERT ERROR
========================================================= --}}
@if(session('error'))

    <div class="mb-5 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">

        {{ session('error') }}

    </div>

@endif


{{-- =========================================================
    HEADER
========================================================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

    <div>

        <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

            <x-heroicon-o-building-office-2
                class="w-8 h-8 text-blue-600"
            />

            Data Kelas

        </h2>


        <p class="text-gray-500 mt-2 text-lg">

            Kelola seluruh data kelas SD Negeri Cimanahayu.

        </p>

    </div>


    {{-- TAHUN AJARAN AKTIF --}}
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

                @if($tahunAjaran->status === 'Aktif')

                    <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        Aktif
                    </span>

                @else

                    <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                        Arsip
                    </span>

                @endif

            </div>

        </div>

    </div>

@endif

</div>


{{-- =========================================================
    CARD STATISTIK
========================================================= --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">


    {{-- TOTAL KELAS --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Kelas
                </p>

                <h2 class="text-3xl font-bold text-blue-600 mt-2">
                    {{ $totalKelas }}
                </h2>

            </div>


            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <x-heroicon-o-building-office-2
                    class="w-8 h-8 text-blue-600"
                />

            </div>

        </div>

    </div>


    {{-- TOTAL SISWA --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Siswa
                </p>

                <h2 class="text-3xl font-bold text-green-600 mt-2">
                    {{ $totalSiswa }}
                </h2>

            </div>


            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                <x-heroicon-o-academic-cap
                    class="w-8 h-8 text-green-600"
                />

            </div>

        </div>

    </div>


    {{-- WALI KELAS --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Wali Kelas
                </p>

                <h2 class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $totalWali }}
                </h2>

            </div>


            <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">

                <x-heroicon-o-user-group
                    class="w-8 h-8 text-yellow-600"
                />

            </div>

        </div>

    </div>


    {{-- TOTAL TINGKAT --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Tingkat
                </p>

                <h2 class="text-3xl font-bold text-red-500 mt-2">
                    {{ $totalTingkat }}
                </h2>

            </div>


            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

                <x-heroicon-o-chart-bar
                    class="w-8 h-8 text-red-600"
                />

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
    FILTER
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">

        <div class="flex items-center gap-2">

            <x-heroicon-o-funnel
                class="w-5 h-5 text-blue-600"
            />

            <h2 class="font-semibold text-gray-800">

                Filter Data Kelas

            </h2>

        </div>

    </div>


    <form
        action="{{ route('kelas.index') }}"
        method="GET"
    >
    <input
    type="hidden"
    name="tahun_ajaran_id"
    value="{{ $tahunAjaran->id }}"
>

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                {{-- SEARCH --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Pencarian

                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama kelas..."
                        class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >

                </div>


                {{-- TINGKAT --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Tingkat

                    </label>

                    <select
                        name="tingkat"
                        class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >

                        <option value="">
                            Semua Tingkat
                        </option>

                        @for($i = 1; $i <= 6; $i++)

                            <option
                                value="{{ $i }}"
                                {{ request('tingkat') == $i ? 'selected' : '' }}
                            >
                                {{ $i }}
                            </option>

                        @endfor

                    </select>

                </div>


                {{-- BUTTON --}}
                <div class="flex items-end gap-3">

                    <button
                        type="submit"
                        class="flex-1 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium"
                    >

                        Cari

                    </button>
<a
    href="{{ route('kelas.index', ['tahun_ajaran_id' => $tahunAjaran->id]) }}"
    class="h-11 px-5 flex items-center justify-center rounded-lg bg-gray-300 hover:bg-gray-400"
>
    Reset
</a>
                </div>

            </div>

        </div>

    </form>

</div>


{{-- =========================================================
    AKSI
========================================================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6">

    <div>

        <h2 class="text-lg font-semibold text-slate-800">

            Manajemen Data Kelas

        </h2>


        <p class="text-sm text-gray-500 mt-1">

            Tambah, ubah, dan kelola seluruh data kelas.

        </p>

    </div>


    <div class="flex flex-wrap gap-3 mt-5 lg:mt-0">

        {{-- TAMBAH KELAS --}}
        @if(!$modeArsip)

    <button
        type="button"
        onclick="bukaModalKelas()"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition"
    >

        <x-heroicon-o-plus class="w-5 h-5"/>

        Tambah Kelas

    </button>

@endif

    </div>

</div>


{{-- =========================================================
    DATA KELAS
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200">


    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-slate-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">

                Data Kelas

            </h2>


            <p class="text-sm text-gray-500 mt-1">

                Menampilkan

                <span class="font-semibold">

                    {{ $kelas->firstItem() ?? 0 }}

                </span>

                -

                <span class="font-semibold">

                    {{ $kelas->lastItem() ?? 0 }}

                </span>

                dari

                <span class="font-semibold">

                    {{ $kelas->total() }}

                </span>

                data kelas

            </p>

        </div>


        <div>

            <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                {{ $totalKelas }} Kelas

            </span>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="overflow-x-auto">

        <table class="min-w-[1000px] w-full border-collapse">

            <thead class="bg-slate-100">

                <tr class="text-sm text-gray-700">

                    <th class="border px-3 py-3 text-center w-14">
                        No
                    </th>

                    <th class="border px-4 py-3 text-left w-56">
                        Nama Kelas
                    </th>

                    <th class="border px-3 py-3 text-center w-28">
                        Tingkat
                    </th>

                    <th class="border px-4 py-3 text-left w-64">
                        Wali Kelas
                    </th>

                    <th class="border px-4 py-3 text-left w-40">
                        Ruang
                    </th>

                    <th class="border px-3 py-3 text-center w-32">
                        Status
                    </th>

                    <th class="border px-3 py-3 text-center w-44">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-200">

                @forelse($kelas as $kelasItem)

                    <tr class="hover:bg-sky-50 transition duration-150">


                        {{-- NO --}}
                        <td class="border px-3 py-3 text-center">

                            {{ $kelas->firstItem() + $loop->index }}

                        </td>


                        {{-- NAMA KELAS --}}
                        <td class="border px-4 py-3">

                            <div class="font-semibold text-slate-800">

                                {{ $kelasItem->nama_kelas }}

                            </div>

                        </td>


                        {{-- TINGKAT --}}
                        <td class="border px-3 py-3 text-center">

                            <span class="inline-flex rounded-full bg-blue-100 text-blue-700 px-3 py-1 text-xs font-semibold">

                                {{ $kelasItem->tingkat }}

                            </span>

                        </td>


                        {{-- WALI KELAS --}}
                        <td class="border px-4 py-3">

                            @if($kelasItem->waliKelas)

    <span class="font-medium text-slate-700">

        {{ strtoupper($kelasItem->waliKelas->nama_guru) }}

    </span>

@else

                                <span class="text-gray-400">
                                    Belum Ditentukan
                                </span>

                            @endif

                        </td>


                        {{-- RUANG --}}
                        <td class="border px-4 py-3">

                            {{ $kelasItem->ruang_kelas ?: '-' }}

                        </td>


                        {{-- STATUS --}}
                        <td class="border px-3 py-3 text-center">

                            @if($kelasItem->waliKelas)

                                <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold">

                                    Aktif

                                </span>

                            @else

                                <span class="inline-flex rounded-full bg-yellow-100 text-yellow-700 px-3 py-1 text-xs font-semibold">

                                    Belum Lengkap

                                </span>

                            @endif

                        </td>


                        {{-- AKSI --}}
                        <td class="border px-3 py-3">

                            <div class="flex justify-center items-center gap-2 whitespace-nowrap">


                                {{-- DETAIL --}}
                                <a
                                    href="{{ route('kelas.show', $kelasItem->id) }}"
                                    class="p-1.5 rounded-lg bg-blue-100 hover:bg-blue-200 transition"
                                    title="Detail"
                                >

                                    <x-heroicon-o-eye
                                        class="w-5 h-5 text-blue-600"
                                    />

                                </a>


                                
                         @if(!$modeArsip)

    {{-- EDIT --}}
    <a
        href="{{ route('kelas.edit', $kelasItem->id) }}"
        class="p-1.5 rounded-lg bg-yellow-100 hover:bg-yellow-200 transition"
        title="Edit"
    >
        <x-heroicon-o-pencil-square
            class="w-5 h-5 text-yellow-600"
        />
    </a>


    {{-- HAPUS --}}
    <form
        action="{{ route('kelas.destroy', $kelasItem->id) }}"
        method="POST"
        class="inline"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')"
            class="p-1.5 rounded-lg bg-red-100 hover:bg-red-200 transition"
            title="Hapus"
        >

            <x-heroicon-o-trash
                class="w-5 h-5 text-red-600"
            />

        </button>

    </form>

@endif


                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="py-12"
                        >

                            <div class="text-center">

                                <x-heroicon-o-building-office-2
                                    class="mx-auto h-16 w-16 text-gray-300"
                                />


                                <h3 class="mt-4 text-lg font-semibold text-gray-700">

                                    Belum Ada Data Kelas

                                </h3>


                                <p class="mt-2 text-gray-500">

                                    Silakan tambahkan data kelas terlebih dahulu.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =====================================================
        FOOTER TABEL
    ====================================================== --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-4 border-t bg-gray-50 rounded-b-xl">

        <div class="text-sm text-gray-600">

            Menampilkan

            <span class="font-semibold">

                {{ $kelas->firstItem() ?? 0 }}

            </span>

            -

            <span class="font-semibold">

                {{ $kelas->lastItem() ?? 0 }}

            </span>

            dari

            <span class="font-semibold">

                {{ $kelas->total() }}

            </span>

            data kelas

        </div>


        <div>

       {{ $kelas->appends([
    'tahun_ajaran_id' => $tahunAjaran->id,
    'search' => request('search'),
    'tingkat' => request('tingkat'),
])->links('vendor.pagination.tailwind') }}

        </div>

    </div>

</div>


{{-- =========================================================
    SCRIPT
========================================================= --}}
@push('scripts')

<script>

function bukaModalKelas()
{
    const modal = document.getElementById('modalTambahKelas');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}


function tutupModalKelas()
{
    const modal = document.getElementById('modalTambahKelas');

    modal.classList.remove('flex');
    modal.classList.add('hidden');
}


document.addEventListener('keydown', function(e)
{
    if(e.key === 'Escape')
    {
        tutupModalKelas();
    }
});


// Buka kembali modal jika validasi gagal
@if($errors->any())

    document.addEventListener('DOMContentLoaded', function()
    {
        bukaModalKelas();
    });

@endif

</script>

@endpush


@endsection
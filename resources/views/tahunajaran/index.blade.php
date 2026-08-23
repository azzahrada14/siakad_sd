@extends('layouts.app')

@section('content')

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

<div>

 <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                    <x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600"/>

                    Data Tahun Ajaran

                </h2>

<p class="text-gray-500 mt-1">

Kelola data tahun ajaran SD Negeri Cimanahayu.

</p>

</div>

@if($tahunAktif)

<div class="mt-5 lg:mt-0">

<div class="bg-blue-50 border border-blue-200 rounded-xl px-5 py-4 min-w-[280px]">

<p class="text-xs uppercase text-blue-600 font-semibold">

Tahun Ajaran Aktif

</p>

<h2 class="text-2xl font-bold text-blue-700 mt-1">

{{ $tahunAktif->tahun_ajaran }}

</h2>

<div class="flex justify-between mt-2">

<span>

Semester {{ $tahunAktif->semester }}

</span>

<span
class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

Aktif

</span>

</div>

</div>

</div>

@endif

</div>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

<div class="bg-white rounded-xl shadow border p-5">

<div class="flex justify-between">

<div>

<p class="text-gray-500">

Total Tahun

</p>

<h2 class="text-3xl font-bold text-blue-600 mt-2">

{{ $totalTahun }}

</h2>

</div>

<div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

<x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600"/>

</div>

</div>

</div>

<div class="bg-white rounded-xl shadow border p-5">

<div class="flex justify-between">

<div>

<p class="text-gray-500">

Semester Ganjil

</p>

<h2 class="text-3xl font-bold text-green-600 mt-2">

{{ $ganjil }}

</h2>

</div>

<div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

<x-heroicon-o-academic-cap class="w-8 h-8 text-green-600"/>

</div>

</div>

</div>

<div class="bg-white rounded-xl shadow border p-5">

<div class="flex justify-between">

<div>

<p class="text-gray-500">

Semester Genap

</p>

<h2 class="text-3xl font-bold text-orange-500 mt-2">

{{ $genap }}

</h2>

</div>

<div class="w-14 h-14 rounded-full bg-orange-100 flex items-center justify-center">

<x-heroicon-o-book-open class="w-8 h-8 text-orange-500"/>

</div>

</div>

</div>

<div class="bg-white rounded-xl shadow border p-5">

<div class="flex justify-between">

<div>

<p class="text-gray-500">

Aktif

</p>

<h2 class="text-3xl font-bold text-red-600 mt-2">

{{ $aktif }}

</h2>

</div>

<div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

<x-heroicon-o-check-badge class="w-8 h-8 text-red-600"/>

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

                Filter Tahun Ajaran

            </h2>

        </div>

    </div>

    <form action="{{ route('tahun-ajaran.index') }}" method="GET">

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
                        placeholder="2026/2027"
                        class="w-full h-11 rounded-lg border-gray-300 focus:ring-blue-500">

                </div>

                {{-- SEMESTER --}}
                <div>

                    <label class="block text-sm text-gray-600 mb-2">

                        Semester

                    </label>

                    <select
                        name="semester"
                        class="w-full h-11 rounded-lg border-gray-300">

                        <option value="">Semua</option>

                        <option
                            value="Ganjil"
                            {{ request('semester')=='Ganjil'?'selected':'' }}>

                            Ganjil

                        </option>

                        <option
                            value="Genap"
                            {{ request('semester')=='Genap'?'selected':'' }}>

                            Genap

                        </option>

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

                        <option value="">Semua</option>

                        <option
                            value="Aktif"
                            {{ request('status')=='Aktif'?'selected':'' }}>

                            Aktif

                        </option>

                        <option
    value="Tidak Aktif"
    {{ request('status')=='Tidak Aktif'?'selected':'' }}>

    Tidak Aktif

</option>

                    </select>

                </div>

                {{-- BUTTON --}}
                <div class="flex items-end gap-3">

                    <button
                        class="flex-1 h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                        Cari

                    </button>

                    <a
                        href="{{ route('tahun-ajaran.index') }}"
                        class="h-11 px-5 flex items-center justify-center rounded-lg bg-gray-300 hover:bg-gray-400">

                        Reset

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>
{{-- ================= TOOLBAR ================= --}}

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6">

    <div>

        <h2 class="text-lg font-semibold text-slate-800">

            Manajemen Tahun Ajaran

        </h2>

        <p class="text-sm text-gray-500 mt-1">

            Tambah, import, export dan kelola tahun ajaran.

        </p>

    </div>

    <div class="flex flex-wrap gap-3 mt-5 lg:mt-0">

        {{-- EXPORT --}}
        <a
            href="{{ route('tahun-ajaran.export') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export

        </a>

        {{-- TAMBAH --}}
        <a
            href="{{ route('tahun-ajaran.create') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

            <x-heroicon-o-plus class="w-5 h-5"/>

            Tambah

        </a>

    </div>

</div>
{{-- ================= DATA TAHUN AJARAN ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-slate-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">

                Data Tahun Ajaran

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Menampilkan

                <span class="font-semibold">
                    {{ $tahunAjaran->firstItem() ?? 0 }}
                </span>

                -

                <span class="font-semibold">
                    {{ $tahunAjaran->lastItem() ?? 0 }}
                </span>

                dari

                <span class="font-semibold">
                    {{ $tahunAjaran->total() }}
                </span>

                data.

            </p>

        </div>

        <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

            {{ $totalTahun }} Tahun Ajaran

        </span>

    </div>

<div class="overflow-x-auto">

<table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="border px-3 py-3 text-center w-16">
No
</th>

<th class="border px-4 py-3">
Tahun Ajaran
</th>

<th class="border px-4 py-3 text-center">
Semester
</th>

<th class="border px-4 py-3 text-center">
Periode
</th>

<th class="border px-3 py-3 text-center">
Status
</th>

<th class="border px-3 py-3 text-center w-52">
Aksi
</th>

</tr>

</thead>

<tbody>
    @forelse($tahunAjaran as $item)

<tr class="hover:bg-sky-50">

<td class="border px-3 py-3 text-center">

{{ $tahunAjaran->firstItem()+$loop->index }}

</td>

<td class="border px-4 py-3 font-semibold">

{{ $item->tahun_ajaran }}

</td>

<td class="border px-4 py-3 text-center">

{{ $item->semester }}

</td>

<td class="border px-4 py-3 text-center">

{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}

-

{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}

</td>

<td class="border px-3 py-3 text-center">

@if($item->status=='Aktif')

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

Aktif

</span>

@else

<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

Tidak Aktif

</span>

@endif

</td>

<td class="border px-3 py-3">

<div class="flex justify-center gap-2">
    <a
    href="{{ route('tahun-ajaran.dashboard', $item->id) }}"
    title="Lihat Dashboard Periode"
    class="w-9 h-9 rounded-lg bg-blue-100 hover:bg-blue-200 flex items-center justify-center">

    <x-heroicon-o-eye class="w-5 h-5 text-blue-600"/>

</a>
<a
href="{{ route('tahun-ajaran.edit',$item->id) }}"
class="w-9 h-9 rounded-lg bg-yellow-100 hover:bg-yellow-200 flex items-center justify-center">

<x-heroicon-o-pencil-square class="w-5 h-5 text-yellow-600"/>

</a>
@if($item->status!='Aktif')

<form
action="{{ route('tahun-ajaran.aktifkan',$item->id) }}"
method="POST">

@csrf
@method('PUT')

<button
onclick="return confirm('Jadikan tahun ajaran ini aktif?')"
class="w-9 h-9 rounded-lg bg-green-100 hover:bg-green-200 flex items-center justify-center">

<x-heroicon-o-check class="w-5 h-5 text-green-600"/>

</button>

</form>

@endif
<form
action="{{ route('tahun-ajaran.destroy',$item->id) }}"
method="POST">

@csrf
@method('DELETE')

<button
onclick="return confirm('Nonaktifkan tahun ajaran ini?')"
class="w-9 h-9 rounded-lg bg-red-100 hover:bg-red-200 flex items-center justify-center">

<x-heroicon-o-trash class="w-5 h-5 text-red-600"/>

</button>

</form>

</div>

</td>

</tr>

@empty

<td colspan="11" class="py-12">

<div class="text-center">

<x-heroicon-o-calendar-days class="mx-auto h-16 w-16 text-gray-300"/>

<h3 class="mt-4 text-lg font-semibold text-gray-700">


Belum ada data tahun ajaran.
</h3>

<p class="mt-2 text-gray-500">

Silakan tambahkan data tahun ajaran terlebih dahulu.

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

{{ $tahunAjaran->firstItem() ?? 0 }}

-

{{ $tahunAjaran->lastItem() ?? 0 }}

dari

{{ $tahunAjaran->total() }}

data

</p>

<div>

{{ $tahunAjaran->links('vendor.pagination.tailwind') }}

</div>

</div>

</div>

</div>
@endsection
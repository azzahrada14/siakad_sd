@extends('layouts.app')

@section('content')

{{-- =========================================================
HEADER
========================================================= --}}

<div class="flex flex-col md:flex-row md:items-start md:justify-between gap-5 mb-6">

    {{-- JUDUL --}}
    <div>
        <h2 class="text-3xl font-bold text-gray-800">
            Lingkup Materi
        </h2>

        @if($mapel)
            <p class="text-gray-500 mt-2">
                Mata Pelajaran :
                <span class="font-semibold text-gray-700">
                    {{ $mapel->nama_mapel }}
                </span>
            </p>
        @endif
    </div>


    {{-- TAHUN AJARAN AKTIF --}}
    @if($tahunAktif)

        <div class="bg-blue-50 border border-blue-200 rounded-xl
                    shadow-sm px-5 py-4 w-full md:w-[235px]">

            <p class="text-[11px] uppercase tracking-wider
                      text-blue-600 font-semibold">
                Tahun Ajaran Aktif
            </p>

            <h2 class="text-2xl font-bold text-blue-700 mt-1">
                {{ $tahunAktif->tahun_ajaran }}
            </h2>

            <div class="flex justify-between items-center mt-2">

                <span class="text-gray-600 text-sm">
                    Semester {{ $tahunAktif->semester }}
                </span>

                <span class="inline-flex items-center
                             rounded-full bg-green-100
                             px-2.5 py-1 text-xs font-semibold
                             text-green-700">
                    Aktif
                </span>

            </div>

        </div>

    @endif

</div>


{{-- =========================================================
    FILTER
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h3 class="font-semibold text-slate-800">
            Filter Lingkup Materi
        </h3>

        <p class="text-sm text-gray-500 mt-1">
            Pilih mata pelajaran dan tingkat untuk melihat Lingkup Materi.
        </p>

    </div>


    <form
        method="GET"
        action="{{ route('lingkup-materi.index') }}"
        class="p-6"
    >

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            {{-- =================================================
                MATA PELAJARAN
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Mata Pelajaran
                </label>

                <select
                    name="mapel"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        Semua Mata Pelajaran
                    </option>

                    @php
                        $semuaMapel = \App\Models\Mapel::where(
                            'status',
                            'Aktif'
                        )
                        ->orderBy('nama_mapel')
                        ->get();
                    @endphp

                    @foreach($semuaMapel as $m)

                        <option
                            value="{{ $m->id }}"
                            {{ request('mapel') == $m->id ? 'selected' : '' }}
                        >
                            {{ $m->nama_mapel }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                TINGKAT
            ================================================== --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tingkat
                </label>

                <select
                    name="tingkat"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        Semua Tingkat
                    </option>

                    @for($i = 1; $i <= 6; $i++)

                        <option
                            value="{{ $i }}"
                            {{ request('tingkat') == $i ? 'selected' : '' }}
                        >
                            Kelas {{ $i }}
                        </option>

                    @endfor

                </select>

            </div>


            {{-- =================================================
                TOMBOL RESET
            ================================================== --}}
            <div class="flex items-end">

                <a
                    href="{{ route('lingkup-materi.index') }}"
                    class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white"
                >

                    <x-heroicon-o-arrow-path class="w-5 h-5"/>

                    Reset Filter

                </a>

            </div>

        </div>

    </form>

</div>


{{-- =========================================================
    INFO FILTER AKTIF
========================================================= --}}
@if($mapel || $tingkat)

    <div class="mb-5 flex flex-wrap items-center gap-2">

        <span class="text-sm text-gray-500">
            Filter aktif:
        </span>


        @if($mapel)

            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">

                Mapel:
                {{ $mapel->nama_mapel }}

            </span>

        @endif


        @if($tingkat)

            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-sm font-medium">

                Tingkat:
                {{ $tingkat }}

            </span>

        @endif

    </div>

@endif


{{-- =========================================================
    BUTTON TAMBAH
========================================================= --}}
<div class="flex justify-end mb-5">

    <a
        href="{{ route('lingkup-materi.create', [
            'mapel' => request('mapel'),
            'tingkat' => request('tingkat')
        ]) }}"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white"
    >

        <x-heroicon-o-plus class="w-5 h-5"/>

        Tambah Lingkup Materi

    </a>

</div>


{{-- =========================================================
    TABEL
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-700 text-white">

                <tr>

                    <th class="border px-4 py-3 text-center w-16">
                        No
                    </th>

                    <th class="border px-4 py-3 text-center w-24">
                        Tingkat
                    </th>

                    <th class="border px-4 py-3 text-center w-32">
                        Kode LM
                    </th>

                    <th class="border px-4 py-3 text-center">
                        Nama Lingkup Materi
                    </th>

                    <th class="boder px-4 py-3 text-center w-28">
                        Semester
                    </th>

                    <th class="border px-4 py-3 text-center w-28">
                        Status
                    </th>

                    <th class="border px-4 py-3 text-center w-40">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-200">

                @forelse($data as $item)

                    <tr class="hover:bg-gray-50">

                        {{-- No --}}
                        <td class="border px-4 py-3 text-center text-gray-600">

                            {{ $loop->iteration }}

                        </td>


                        {{-- Tingkat --}}
                        <td class="border px-4 py-3 text-center">

                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-semibold text-xs">

                                Kelas {{ $item->tingkat }}

                            </span>

                        </td>


                        {{-- Kode --}}
                        <td class="border px-4 py-3 font-semibold text-gray-700 text-center">

                            {{ $item->kode_lm }}

                        </td>


                        {{-- Nama --}}
                        <td class="border px-4 py-3 text-center text-gray-700">

                            {{ $item->nama_lm }}

                        </td>


                        {{-- Semester --}}
                        <td class="border px-4 py-3 text-center text-gray-600">

                            {{ $item->semester }}

                        </td>


                        {{-- Status --}}
                        <td class="border px-4 py-3 text-center">

                            @if($item->status == 'Aktif')

                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                                    Aktif

                                </span>

                            @else

                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

                                    Nonaktif

                                </span>

                            @endif

                        </td>


                        {{-- Aksi --}}
                        <td class="border px-4 py-3">

                            <div class="flex justify-center items-center gap-2">


                                {{-- Kelola TP --}}
                                <a
                                    href="{{ route('tujuan-pembelajaran.index', [
                                        'lingkup_materi' => $item->id
                                    ]) }}"
                                    class="w-9 h-9 rounded-lg bg-blue-100 hover:bg-blue-200 flex items-center justify-center"
                                    title="Kelola Tujuan Pembelajaran"
                                >

                                    <x-heroicon-o-book-open class="w-5 h-5 text-blue-600"/>

                                </a>


                                {{-- Edit --}}
                                <a
                                    href="{{ route('lingkup-materi.edit', $item->id) }}"
                                    class="w-9 h-9 rounded-lg bg-yellow-100 hover:bg-yellow-200 flex items-center justify-center"
                                    title="Edit"
                                >

                                    <x-heroicon-o-pencil class="w-5 h-5 text-yellow-600"/>

                                </a>


                                {{-- Hapus --}}
                                <form
                                    action="{{ route('lingkup-materi.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus Lingkup Materi ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-9 h-9 rounded-lg bg-red-100 hover:bg-red-200 flex items-center justify-center"
                                        title="Hapus"
                                    >

                                        <x-heroicon-o-trash class="w-5 h-5 text-red-600"/>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="px-6 py-12 text-center text-gray-500"
                        >

                            <div class="flex flex-col items-center">

                                <x-heroicon-o-document-text class="w-12 h-12 text-gray-300 mb-3"/>

                                <p class="font-medium">
                                    Belum ada data Lingkup Materi.
                                </p>

                                @if($tingkat)

                                    <p class="text-sm mt-1">
                                        Belum ada Lingkup Materi untuk kelas {{ $tingkat }}.
                                    </p>

                                @endif

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


@endsection
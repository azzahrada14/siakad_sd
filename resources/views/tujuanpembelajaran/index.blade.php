@extends('layouts.app')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<div class="mb-8 flex items-start justify-between gap-6">

    {{-- BAGIAN KIRI --}}
    <div>

        <h2 class="text-3xl font-bold text-gray-800">
            Tujuan Pembelajaran
        </h2>

        @if($lingkupMateri)

            <div class="mt-3 flex flex-wrap items-center gap-2">

                {{-- Mata Pelajaran --}}
                @if($lingkupMateri->mapel)
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">
                        {{ $lingkupMateri->mapel->nama_mapel }}
                    </span>
                @endif

                {{-- Tingkat --}}
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-sm font-medium">
                    Kelas {{ $lingkupMateri->tingkat }}
                </span>

                {{-- Semester --}}
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-medium">
                    Semester {{ $lingkupMateri->semester }}
                </span>

            </div>

            <p class="text-gray-500 mt-3">
                Lingkup Materi :
                <span class="font-semibold text-gray-700">
                    {{ $lingkupMateri->nama_lm }}
                </span>
            </p>

        @else

            <p class="text-gray-500 mt-2">
                Pilih Lingkup Materi terlebih dahulu untuk melihat Tujuan Pembelajaran.
            </p>

        @endif

    </div>


    {{-- =====================================================
        TAHUN AJARAN AKTIF - KANAN
    ====================================================== --}}
    @if($tahunAktif)

        <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[230px]">

            <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                Tahun Ajaran Aktif
            </p>

            <h2 class="text-2xl font-bold text-blue-700 mt-1">
                {{ $tahunAktif->tahun_ajaran }}
            </h2>

            <div class="flex justify-between items-center mt-2">

                <span class="text-gray-600 text-sm">
                    Semester {{ $tahunAktif->semester }}
                </span>

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                    <span class="w-2 h-2 rounded-full bg-green-500"></span>

                    Aktif

                </span>

            </div>

        </div>

    @endif

</div>


{{-- =========================================================
    BUTTON TAMBAH DAN KEMBALI
========================================================= --}}
@if($lingkupMateri)

    <div class="flex justify-end items-center gap-3 mb-4">

    {{-- Kembali ke Lingkup Materi --}}
    <a href="{{ route('lingkup-materi.index', ['mapel' => $lingkupMateri->mapel_id]) }}"
       class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow-sm">
        ← Kembali
    </a>

    {{-- Tambah Tujuan Pembelajaran --}}
    <a href="{{ route('tujuan-pembelajaran.create', $lingkupMateri->id) }}"
       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm">
        + Tambah Tujuan Pembelajaran
    </a>

</div>

@endif


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
                        Kode TP
                    </th>

                    <th class="border px-4 py-3 text-left">
                        Deskripsi Tujuan Pembelajaran
                    </th>

                    <th class="border px-4 py-3 text-center w-28">
                        Jumlah JP
                    </th>

                    <th class="border px-4 py-3 text-center w-24">
                        Urutan
                    </th>

                    <th class="border px-4 py-3 text-center w-28">
                        Status
                    </th>

                    <th class="border px-4 py-3 text-center w-36">
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


                        {{-- Kode TP --}}
                        <td class="border px-4 py-3 text-center">

                            <span class="font-semibold text-blue-700">
                                {{ $item->kode_tp }}
                            </span>

                        </td>


                        {{-- Deskripsi --}}
                        <td class="border px-4 py-3 text-gray-700">

                            {{ $item->deskripsi }}

                        </td>


                        {{-- Jumlah JP --}}
                        <td class="border px-4 py-3 text-center text-gray-600">

                            {{ $item->jumlah_jp }}

                        </td>


                        {{-- Urutan --}}
                        <td class="border px-4 py-3 text-center text-gray-600">

                            {{ $item->urutan }}

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
                        <td class=" border px-4 py-3">

                            <div class="flex justify-center items-center gap-2">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('tujuan-pembelajaran.edit', $item->id) }}"
                                    class="w-9 h-9 rounded-lg bg-yellow-100 hover:bg-yellow-200 flex items-center justify-center"
                                    title="Edit"
                                >

                                    <x-heroicon-o-pencil class="w-5 h-5 text-yellow-600"/>

                                </a>


                                {{-- Hapus --}}
                                <form
                                    action="{{ route('tujuan-pembelajaran.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus Tujuan Pembelajaran ini?')"
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

                                <x-heroicon-o-document-text
                                    class="w-12 h-12 text-gray-300 mb-3"
                                />

                                <p class="font-medium">
                                    Belum ada data Tujuan Pembelajaran.
                                </p>

                                @if($lingkupMateri)

                                    <p class="text-sm mt-1">
                                        Belum ada TP untuk Lingkup Materi ini.
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
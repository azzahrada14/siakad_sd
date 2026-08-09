@extends('layouts.app')

@section('content')

<div class="py-6">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
     <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Master Ekstrakurikuler

        </h1>

        <p class="text-gray-500 mt-1">

Kelola data master ekstrakurikuler sebagai referensi pada proses penilaian ekstrakurikuler siswa.

        </p>

    </div>

    @if($tahunAktif)

    <div class="mt-5 lg:mt-0">

        <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

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

    </div>

    @endif

</div>

        <div class="bg-white rounded-xl shadow border border-gray-200">

            {{-- Header Card --}}
            <div class="px-6 py-5 border-b bg-slate-50">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <form
                        action="{{ route('master-ekstrakurikuler.index') }}"
                        method="GET"
                        class="flex gap-2">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nama ekstrakurikuler..."
                            class="rounded-lg border-gray-300 w-72">

                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">

                            Cari

                        </button>

                    </form>

                    <div class="flex items-center gap-3">

    <a
        href="{{ route('ekstrakurikuler.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

        <x-heroicon-o-arrow-left class="w-5 h-5"/>

        Kembali

    </a>

    <a
        href="{{ route('master-ekstrakurikuler.create') }}"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

        <x-heroicon-o-plus class="w-5 h-5"/>

        Tambah Data

    </a>

</div>
</div>

            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase">
                                No
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                                Nama Ekstrakurikuler
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase">
                                Pembina
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase">
                                Wajib
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase">
                                Status
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">

                        @forelse($data as $item)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4 text-center">
                                {{ $loop->iteration + ($data->firstItem() - 1) }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->nama_ekstrakurikuler }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item->pembina ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                @if($item->wajib)

                                    <span class="px-3 py-1 rounded-full text-xs bg-blue-100 text-blue-700">
                                        Ya
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full text-xs bg-gray-100 text-gray-700">
                                        Tidak
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                @if($item->status == 'Aktif')

                                    <span class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-700">
                                        Aktif
                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-700">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a
                                        href="{{ route('master-ekstrakurikuler.edit',$item->id) }}"
                                        class="inline-flex items-center px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">

                                        <x-heroicon-o-pencil-square class="w-5 h-5"/>

                                    </a>

                                    <form
                                        action="{{ route('master-ekstrakurikuler.toggle-status',$item->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="inline-flex items-center px-3 py-2 rounded-lg
                                            {{ $item->status=='Aktif'
                                                ? 'bg-red-500 hover:bg-red-600'
                                                : 'bg-green-600 hover:bg-green-700'
                                            }} text-white">

                                            @if($item->status=='Aktif')

                                                <x-heroicon-o-x-circle class="w-5 h-5"/>

                                            @else

                                                <x-heroicon-o-check-circle class="w-5 h-5"/>

                                            @endif

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-10 text-gray-500">

                                Data Master Ekstrakurikuler belum tersedia.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="px-6 py-4 border-t bg-slate-50">

                {{ $data->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
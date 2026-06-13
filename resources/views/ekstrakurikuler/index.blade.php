@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">

            Data Ekstrakurikuler

        </h1>

        <p class="text-gray-500 mt-1">

            Kelola data ekstrakurikuler siswa

        </p>

    </div>

    {{-- TOOLBAR --}}
    <div class="flex justify-between items-center mb-5">

    @if(auth()->user()->role == 'operator')

    <a
        href="{{ route('ekstrakurikuler.create') }}"
        class="inline-flex items-center gap-2
        bg-blue-600 hover:bg-blue-700
        text-white px-4 py-2 rounded-lg">

        <x-heroicon-o-plus class="w-5 h-5"/>

        Tambah Data

    </a>

    @endif

</div>

    {{-- TABLE --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow">

        <table class="w-full text-sm">

            <thead class="bg-slate-700 text-white">

                <tr>

                    <th class="p-3 border">No</th>

                    <th class="p-3 border">Nama Siswa</th>

                    <th class="p-3 border">Kelas</th>

                    <th class="p-3 border">Tahun Ajaran</th>

                    <th class="p-3 border">Semester</th>

                    <th class="p-3 border">Ekstrakurikuler</th>

                    <th class="p-3 border">Keterangan</th>

                    <th class="p-3 border text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($ekstrakurikuler as $item)

                <tr class="hover:bg-gray-50">

                    <td class="border p-3 text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td class="border p-3">

                        {{ $item->siswa->nama_siswa }}

                    </td>

                    <td class="border p-3">

                        {{ $item->siswa->kelas->nama_kelas ?? '-' }}

                    </td>

                    <td class="border p-3">

                        {{ $item->tahunAjaran->tahun_ajaran }}

                    </td>

                    <td class="border p-3">

                        {{ $item->semester }}

                    </td>

                    <td class="border p-3">

                        {{ $item->nama_kegiatan }}

                    </td>

                    <td class="border p-3">

                        {{ $item->keterangan }}

                    </td>

                    <td class="border p-3">

    @if(auth()->user()->role == 'operator')

   <div class="flex justify-center gap-2">

    {{-- Edit --}}
    <a
        href="{{ route('ekstrakurikuler.edit',$item->id) }}"
        class="inline-flex items-center gap-2
        bg-yellow-500 hover:bg-yellow-600
        text-white px-3 py-2 rounded-lg
        transition">

        <x-heroicon-o-pencil-square class="w-4 h-4"/>

        Edit

    </a>

    {{-- Hapus --}}
    <form
        action="{{ route('ekstrakurikuler.destroy',$item->id) }}"
        method="POST"
        onsubmit="return confirm('Hapus data ini?')">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="inline-flex items-center gap-2
            bg-red-600 hover:bg-red-700
            text-white px-3 py-2 rounded-lg
            transition">

            <x-heroicon-o-trash class="w-4 h-4"/>

            Hapus

        </button>

    </form>

</div>
        

    @else

<span
class="inline-flex
items-center
px-3
py-1
rounded-full
bg-gray-100
text-gray-600
text-xs
font-medium">

View Only

</span>

@endif

</td>

                           

                     

                </tr>

                @empty

                <tr>

                    <td
                        colspan="8"
                        class="p-6 text-center text-gray-500">

                        Data ekstrakurikuler belum tersedia.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
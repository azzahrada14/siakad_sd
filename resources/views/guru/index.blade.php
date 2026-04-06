@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Guru
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto">

            {{-- SUCCESS --}}
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- BUTTON --}}
            <a href="{{ route('guru.create') }}"
               class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                + Tambah Guru
            </a>

            {{-- TABLE --}}
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="w-full text-sm">

                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-3 text-center">No</th>
                            <th class="p-3 text-center">NIP</th>
                            <th class="p-3">Nama Guru</th>
                            <th class="p-3 text-center">Jenis Kelamin</th>
                            <th class="p-3 text-center">TTL</th>
                            <th class="p-3">Alamat</th>
                            <th class="p-3 text-center">No HP</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($gurus as $g)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-3 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $g->nip ?? '-' }}
                            </td>

                            <td class="p-3 font-medium">
                                {{ $g->nama_guru }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>

                            {{-- TTL --}}
                            <td class="p-3 text-center">
                                {{ $g->tempat_lahir ?? '-' }},
                                {{ $g->tanggal_lahir ? \Carbon\Carbon::parse($g->tanggal_lahir)->format('d M Y') : '-' }}
                            </td>

                            {{-- ALAMAT --}}
                            <td class="p-3">
                                {{ $g->alamat ?? '-' }}
                            </td>

                            <td class="p-3 text-center">
                                {{ $g->no_hp ?? '-' }}
                            </td>

                            <td class="p-3 text-center">
                                <a href="{{ route('guru.edit', $g->id) }}"
                                   class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('guru.destroy', $g->id) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 ml-2 hover:underline"
                                        onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center p-4 text-gray-500">
                                Data belum ada
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
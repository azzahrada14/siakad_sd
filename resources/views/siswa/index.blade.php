@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-black">Data Siswa</h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">
        
        {{-- BUTTON --}}
        <a href="{{ route('siswa.create') }}"
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            + Tambah Siswa
        </a><br><br>


        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="mt-4 bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('siswa.index') }}" class="mb-4 flex gap-2">
    
    <input type="text" name="search" placeholder="Cari siswa..."
        class="border p-2 rounded w-1/3"
        value="{{ request('search') }}">

    <button class="bg-blue-500 text-white px-3 py-2 rounded">
        Cari
    </button>
        </form>

        {{-- TABLE --}}
        <div class="mt-6 bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm text-left">
                
                {{-- HEADER --}}
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border p-3 w-12">No</th>
                        <th class="border p-3 text-center" >Nama</th>
                        <th class="border p-3 text-center">NIPD</th>
                        <th class="border p-3 text-center">Kelas</th>
                        <th class="border p-3 text-center">Jenis Kelamin</th>
                        <th class="border p-3 text-center">NISN</th>
                        <th class="border p-3 text-center">TTL</th>
                        <th class="border p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse($siswa as $s)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="border p-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-3 font-medium">
                            {{ $s->nama_siswa }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->nipd ?? '-' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->kelas->nama_kelas ?? '-' }}
                        </td>

                        <td class="p-3 text-center">
                            {{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->nisn ?? '-' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->tempat_lahir ?? '-' }},
                            {{ $s->tanggal_lahir ? \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') : '-' }}
                        </td>

                        <td class="p-3 text-center">
                            
                            {{-- EDIT --}}
                            <a href="{{ route('siswa.edit', $s->id) }}"
                               class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('siswa.destroy', $s->id) }}"
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
@endsection
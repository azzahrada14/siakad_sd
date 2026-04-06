@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-black">
            Data Kelas
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-100 min-h-screen">

        {{-- BUTTON --}}
        <a href="{{ route('kelas.create') }}"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            + Tambah Kelas
        </a>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="mt-6 bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-3 text-center">No</th>
                        <th class="border p-3 text-center">Nama Kelas</th>
                        <th class="border p-3 text-center">Tingkat</th>
                        <th class="border p-3 text-center">Wali Kelas</th>
                        <th class="border p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($kelas as $k)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="border p-3 text-center">{{ $loop->iteration }}</td>
                        <td class="border p-3 text-center">{{ $k->nama_kelas }}</td>
                        <td class="border p-3 text-center">{{ $k->tingkat }}</td>
                        <td class="border p-3 text-center">{{ $k->waliKelas->nama_guru ?? '-' }}</td>
                        <td class="border p-3 text-center">

                            {{-- EDIT --}}
                            <a href="{{ route('kelas.edit', $k->id) }}" 
                                class="text-blue-600 hover:underline">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('kelas.destroy', $k->id) }}" 
                                method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('Yakin hapus data?')" 
                                    class="text-red-600 ml-2 hover:underline">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                    {{-- KOSONG --}}
                    @if($kelas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-500">
                            Data belum ada
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
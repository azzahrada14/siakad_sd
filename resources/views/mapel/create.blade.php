@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen flex justify-center">
        <div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold mb-6">Tambah Mata Pelajaran</h2>

            {{-- Error --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mapel.store') }}" method="POST">
                @csrf

                {{-- Nama Mapel --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nama Mapel</label>
                    <input type="text"
                           name="nama_mapel"
                           value="{{ old('nama_mapel') }}"
                           class="w-full border p-2 rounded"
                           required>
                </div>

                {{-- Kode Mapel --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Kode</label>
                    <input type="text"
                           name="kode_mapel"
                           value="{{ old('kode_mapel') }}"
                           class="w-full border p-2 rounded"
                           required>
                </div>

                {{-- Guru --}}
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Guru Mapel</label>
                    <select name="guru_id"  class="w-full border p-2 rounded" required>
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}"
                                {{ old('guru_id') == $g->id ? 'selected' : '' }}>
                                {{ $g->nama_guru }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Simpan
                    </button>

                    <a href="{{ route('mapel.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
@endsection
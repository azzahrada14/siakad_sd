@extends('layouts.app')

@section('content')

    <div class="p-6 py-8 bg-gray-100  flex justify-center">
<div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Kelas
        </h2>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kelas.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Nama Kelas
                </label>
                <input 
                    type="text" 
                    name="nama_kelas" 
                    placeholder="Contoh: 5A"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                >
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Tingkat
                </label>
                <input 
                    type="text" 
                    name="tingkat" 
                    placeholder="Contoh: 5"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                >
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Wali Kelas
                </label>
                <select 
                    name="pilih_guru" 
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                >
                    <option value="">-- Pilih Guru --</option>

                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">
                            {{ $g->nama_guru }}
                        </option>
                    @endforeach
                </select>
            </div><br>

            {{-- Tombol --}}
                <div class="flex gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Simpan
                    </button>

                    <a href="{{ route('kelas.index') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Kembali
                    </a>
                </div>
            </form>

    </div>
</div>
@endsection
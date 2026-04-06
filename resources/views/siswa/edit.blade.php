@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen flex justify-center">

    <div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">

        <h2 class="text-xl font-bold mb-6">Edit Siswa</h2>

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')


            {{-- Nama --}}
            <div class="mb-4">
                <label>Nama</label>
                <input type="text" name="nama_siswa"
                    value="{{ $siswa->nama_siswa }}"
                    class="w-full border p-2 rounded" required>
            </div>

            {{-- NIPD --}}
            <div class="mb-4">
                <label>NIPD</label>
                <input type="text" name="nipd"
                    value="{{ $siswa->nipd }}"
                    class="w-full border p-2 rounded" required>
            </div>

            {{-- Kelas --}}
            <div class="mb-4">
                <label>Kelas</label>
                <select name="kelas_id" class="w-full border p-2 rounded">
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}"
                            {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- JK --}}
            <div class="mb-4">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border p-2 rounded">
                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- NISN --}}
            <div class="mb-4">
                <label>NISN</label>
                <input type="text" name="nisn"
                    value="{{ $siswa->nisn }}"
                    class="w-full border p-2 rounded" required>
            </div>


            {{-- Tempat Lahir --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="w-full border p-2 rounded">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        class="w-full border p-2 rounded">
                </div>

            <div class="flex gap-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Update
                </button>

                <a href="{{ route('siswa.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
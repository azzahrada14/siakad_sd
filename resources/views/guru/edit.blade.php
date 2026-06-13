@extends('layouts.app')

@section('content')
 <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                 <h2 class="text-xl font-bold mb-6">Edit Guru</h2>
                <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label>NIP</label>
                        <input type="text" name="nip" value="{{ $guru->nip }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Nama Guru</label>
                        <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border rounded p-2">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $guru->tempat_lahir }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Alamat</label>
                        <textarea name="alamat" class="w-full border rounded p-2">{{ $guru->alamat }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>email</label>
                        <input type="text" name="email" value="{{ $guru->email }}" class="w-full border rounded p-2">
                    </div>

                    {{-- JENIS GURU --}}
<div class="mb-4">

    <label class="block font-medium mb-2">

        Jenis Guru

    </label>

    <select name="role_guru"
            class="w-full border rounded-lg px-4 py-3">

        <option value="mapel"
            {{ $guru->role_guru == 'mapel' ? 'selected' : '' }}>

            Guru Mapel

        </option>

        <option value="wali"
            {{ $guru->role_guru == 'wali' ? 'selected' : '' }}>

            Wali Kelas

        </option>

    </select>

</div>
                    
                    <br><br>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Update
                    </button>
                    <a href="{{ route('guru.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

   @endsection
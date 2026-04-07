@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen flex justify-center">

        <div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">
 

            <h2 class="text-xl font-bold mb-6">Tambah Guru</h2>

                {{-- ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label>NIP</label>
                        <input type="text" name="nip"
                            class="w-full border rounded p-2"
                            value="{{ old('nip') }}"
                            maxlength="16"
                            pattern="[0-9]{16}"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            placeholder="Masukkan 16 digit NIP"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Nama Guru</label>
                        <input type="text" name="nama_guru"
                            class="w-full border rounded p-2"
                            value="{{ old('nama_guru') }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border rounded p-2" required>
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="w-full border rounded p-2"
                            value="{{ old('tempat_lahir') }}">
                    </div>

                    <div class="mb-4">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            class="w-full border rounded p-2"
                            value="{{ old('tanggal_lahir') }}">
                    </div>

                    <div class="mb-4">
                        <label>Alamat</label>
                        <textarea name="alamat"
                            class="w-full border rounded p-2">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label>No HP</label>
                        <input type="text" name="no_hp"
                            class="w-full border rounded p-2"
                            value="{{ old('no_hp') }}">
                    </div><br>

                    <div class="flex gap-2">
                      <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Simpan
                        </button>

                        <a href="{{ route('guru.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
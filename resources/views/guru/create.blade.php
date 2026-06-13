@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen flex justify-center">

    <div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-6">

            Tambah Guru

        </h2>

        {{-- INFO PASSWORD --}}
        <div class="mb-5 p-4 bg-blue-100 text-blue-700 rounded-lg">

            Password default guru:
            <b>12345678</b>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())

            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>- {{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('guru.store') }}"
              method="POST">

            @csrf

            {{-- NIP --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    NIP

                </label>

                <input type="text"
                       name="nip"
                       value="{{ old('nip') }}"
                       maxlength="16"
                       pattern="[0-9]{16}"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                       placeholder="Masukkan 16 digit NIP"
                       class="w-full border rounded-lg p-3"
                       required>

            </div>

            {{-- NAMA --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Nama Guru

                </label>

                <input type="text"
                       name="nama_guru"
                       value="{{ old('nama_guru') }}"
                       class="w-full border rounded-lg p-3"
                       required>

            </div>

            {{-- JK --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Jenis Kelamin

                </label>

                <select name="jenis_kelamin"
                        class="w-full border rounded-lg p-3"
                        required>

                    <option value="">
                        -- Pilih --
                    </option>

                    <option value="L">
                        Laki-laki
                    </option>

                    <option value="P">
                        Perempuan
                    </option>

                </select>

            </div>

            {{-- TEMPAT LAHIR --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Tempat Lahir

                </label>

                <input type="text"
                       name="tempat_lahir"
                       value="{{ old('tempat_lahir') }}"
                       class="w-full border rounded-lg p-3">

            </div>

            {{-- TANGGAL LAHIR --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Tanggal Lahir

                </label>

                <input type="date"
                       name="tanggal_lahir"
                       value="{{ old('tanggal_lahir') }}"
                       class="w-full border rounded-lg p-3">

            </div>

            {{-- ALAMAT --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Alamat

                </label>

                <textarea name="alamat"
                          class="w-full border rounded-lg p-3">{{ old('alamat') }}</textarea>

            </div>

            {{-- EMAIL --}}
            <div class="mb-4">

                <label class="block mb-2 font-medium">

                    Email Login

                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full border rounded-lg p-3"
                       required>

            </div>

            {{-- ROLE GURU --}}
            <div class="mb-6">

                <label class="block mb-2 font-medium">

                    Jenis Guru

                </label>

                <select name="role_guru"
                        class="w-full border rounded-lg p-3">

                    <option value="mapel">

                        Guru Mapel

                    </option>

                    <option value="wali">

                        Wali Kelas

                    </option>

                </select>

            </div>

            <div class="mb-4">

    <label class="block font-medium mb-2">

        Mata Pelajaran

    </label>

    <select name="mapel_id"
            class="w-full border rounded-lg px-4 py-3">

        <option value="">

            -- Pilih Mapel --

        </option>

        @foreach($mapels as $m)

            <option value="{{ $m->id }}">

                {{ $m->nama_mapel }}

            </option>

        @endforeach

    </select>

</div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">

                    Simpan

                </button>

                <a href="{{ route('guru.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-lg">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
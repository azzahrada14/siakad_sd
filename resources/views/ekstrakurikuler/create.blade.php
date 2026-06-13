@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">

            Tambah Data Ekstrakurikuler

        </h1>

        <p class="text-gray-500 mt-1">

            Tambahkan data ekstrakurikuler siswa.

        </p>

    </div>

    @if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
    <ul>
        @foreach($errors->all() as $error)
            <li>• {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow p-6">

        <form
            action="{{ route('ekstrakurikuler.store') }}"
            method="POST">

            @csrf

            {{-- Nama Siswa --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Nama Siswa

                </label>

                <select
                    name="siswa_id"
                    class="w-full border rounded-lg px-4 py-2">

                    <option value="">
                        -- Pilih Siswa --
                    </option>

                    @foreach($siswa as $item)

                    <option value="{{ $item->id }}">

                        {{ $item->nama_siswa }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Tahun Ajaran --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Tahun Ajaran

                </label>

                <select
                    name="tahun_ajaran_id"
                    class="w-full border rounded-lg px-4 py-2">

                    <option value="">
                        -- Pilih Tahun Ajaran --
                    </option>

                    @foreach($tahunAjaran as $item)

                    <option value="{{ $item->id }}">

                        {{ $item->tahun_ajaran }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Semester --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Semester

                </label>

                <select
                    name="semester"
                    class="w-full border rounded-lg px-4 py-2">

                    <option value="Ganjil">

                        Ganjil

                    </option>

                    <option value="Genap">

                        Genap

                    </option>

                </select>

            </div>

            {{-- Ekstrakurikuler --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Nama Ekstrakurikuler

                </label>

                <input
                    type="text"
                    name="nama_kegiatan"
                    class="w-full border rounded-lg px-4 py-2"
                    placeholder="Masukkan nama ekstrakurikuler">

            </div>

            {{-- Keterangan --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Keterangan

                </label>

                <textarea
                    name="keterangan"
                    rows="3"
                    class="w-full border rounded-lg px-4 py-2"
                    placeholder="Masukkan keterangan"></textarea>

            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                <button
                    class="bg-blue-600 hover:bg-blue-700
                    text-white px-5 py-2 rounded-lg">

                    Simpan

                </button>

                <a
                    href="{{ route('ekstrakurikuler.index') }}"
                    class="bg-gray-500 hover:bg-gray-600
                    text-white px-5 py-2 rounded-lg">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">

            Edit Data Ekstrakurikuler

        </h1>

        <p class="text-gray-500 mt-1">

            Ubah data ekstrakurikuler siswa.

        </p>

    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-xl shadow p-6">

        <form
            action="{{ route('ekstrakurikuler.update',$ekstrakurikuler->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            {{-- Nama Siswa --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Nama Siswa

                </label>

                <select
                    name="siswa_id"
                    class="w-full border rounded-lg px-4 py-2">

                    @foreach($siswa as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ $ekstrakurikuler->siswa_id == $item->id ? 'selected' : '' }}>

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

                    @foreach($tahunAjaran as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ $ekstrakurikuler->tahun_ajaran_id == $item->id ? 'selected' : '' }}>

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

                    <option
                        value="Ganjil"
                        {{ $ekstrakurikuler->semester == 'Ganjil' ? 'selected' : '' }}>

                        Ganjil

                    </option>

                    <option
                        value="Genap"
                        {{ $ekstrakurikuler->semester == 'Genap' ? 'selected' : '' }}>

                        Genap

                    </option>

                </select>

            </div>

            {{-- Nama Ekstrakurikuler --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Nama Ekstrakurikuler

                </label>

                <input
                    type="text"
                    name="nama_kegiatan"
                    value="{{ $ekstrakurikuler->nama_kegiatan }}"
                    class="w-full border rounded-lg px-4 py-2">

            </div>

            {{-- Keterangan --}}
            <div class="mb-5">

                <label class="block mb-2 font-semibold">

                    Keterangan

                </label>

                <textarea
                    name="keterangan"
                    rows="3"
                    class="w-full border rounded-lg px-4 py-2">{{ $ekstrakurikuler->keterangan }}</textarea>

            </div>

            {{-- BUTTON --}}
            <div class="flex gap-3">

                <button
                    class="bg-yellow-500 hover:bg-yellow-600
                    text-white px-5 py-2 rounded-lg">

                    Update

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
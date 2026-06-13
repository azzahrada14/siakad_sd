@extends('layouts.app')

@section('content')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tambah Tahun Ajaran
    </h2>
</x-slot>

<div class="p-6 bg-gray-100 min-h-screen">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">

        <form action="{{ route('tahunajaran.store') }}"
              method="POST">

            @csrf

            @if ($errors->any())

<div class="mb-4 p-4 bg-red-100 text-red-700 rounded">

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>

@endif

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Tahun Ajaran
                </label>

                <input type="text"
                       name="tahun_ajaran"
                       class="w-full border rounded px-3 py-2"
                       placeholder="2025/2026">

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Semester
                </label>

                <select name="semester"
                        class="w-full border rounded px-3 py-2">

                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Status
                </label>

                <select name="status"
                        class="w-full border rounded px-3 py-2">

                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>

                </select>

            </div>

            <div class="flex gap-2">

                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">

                    Simpan

                </button>

                <a href="{{ route('tahunajaran.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
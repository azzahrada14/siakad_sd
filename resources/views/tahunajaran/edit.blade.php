@extends('layouts.app')

@section('content')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Tahun Ajaran
    </h2>
</x-slot>

<div class="p-6 bg-gray-100 min-h-screen">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">

        <form action="{{ route('tahunajaran.update', $tahunajaran->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Tahun Ajaran
                </label>

                <input type="text"
                       name="tahun_ajaran"
                       value="{{ $tahunajaran->tahun_ajaran }}"
                       class="w-full border rounded px-3 py-2">

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Semester
                </label>

                <select name="semester"
                        class="w-full border rounded px-3 py-2">

                    <option value="Ganjil"
                        {{ $tahunajaran->semester == 'Ganjil' ? 'selected' : '' }}>
                        Ganjil
                    </option>

                    <option value="Genap"
                        {{ $tahunajaran->semester == 'Genap' ? 'selected' : '' }}>
                        Genap
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="block mb-1 font-medium">
                    Status
                </label>

                <select name="status"
                        class="w-full border rounded px-3 py-2">

                    <option value="Aktif"
                        {{ $tahunajaran->status == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="Tidak Aktif"
                        {{ $tahunajaran->status == 'Tidak Aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>

            </div>

            <div class="flex gap-2">

                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">

                    Update

                </button>

                <a href="{{ route('tahunajaran.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">

                    Kembali

                </a>

            </div>

        </form>
        <form action="{{ route('tahunajaran.destroy', $item->id) }}"
      method="POST"
      class="inline">

    @csrf
    @method('DELETE')

    <button class="text-red-600 ml-2 hover:underline"
        onclick="return confirm('Yakin hapus?')">

        Hapus

    </button>

</form>

    </div>

</div>

@endsection
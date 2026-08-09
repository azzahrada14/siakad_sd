@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

{{-- ================= HEADER ================= --}}

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Edit Mata Pelajaran

        </h1>

        <p class="text-gray-500 mt-1">

            Perbarui data mata pelajaran SD Negeri Cimanahayu.

        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow border border-gray-200">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold text-slate-800">

Informasi Mata Pelajaran

</h2>

<p class="text-sm text-gray-500 mt-1">

Ubah data mata pelajaran sesuai kebutuhan.

</p>

</div>

<form
action="{{ route('mapel.update',$mapel->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="p-6">


<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Kode Mata Pelajaran --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Kode Mata Pelajaran
        </label>

        <input
            type="text"
            name="kode_mapel"
            value="{{ old('kode_mapel', $mapel->kode_mapel) }}"
            class="w-full rounded-lg border-gray-300">
    </div>

    {{-- Nama Mata Pelajaran --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Nama Mata Pelajaran
        </label>

        <input
            type="text"
            name="nama_mapel"
            value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
            class="w-full rounded-lg border-gray-300">
    </div>

    <div>
    <label class="block text-sm font-medium text-gray-700 mb-2">
        Kategori Mata Pelajaran
    </label>

    <select
        name="kategori_mapel_id"
        class="w-full rounded-lg border-gray-300">

        <option value="">-- Pilih Kategori --</option>

        @foreach ($kategoriMapels as $kategori)
            <option
                value="{{ $kategori->id }}"
                {{ old('kategori_mapel_id', $mapel->kategori_mapel_id) == $kategori->id ? 'selected' : '' }}>

                {{ $kategori->kode_kategori }}
                -
                {{ $kategori->nama_kategori }}

            </option>
        @endforeach

    </select>

    @error('kategori_mapel_id')
        <p class="text-red-500 text-sm mt-2">
            {{ $message }}
        </p>
    @enderror
</div>

    {{-- Jenis --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Jenis
        </label>

        <select
            name="jenis"
            class="w-full rounded-lg border-gray-300">
            <option value="Wajib" {{ $mapel->jenis == 'Wajib' ? 'selected' : '' }}>Wajib</option>
            <option value="Muatan Lokal" {{ $mapel->jenis == 'Muatan Lokal' ? 'selected' : '' }}>Muatan Lokal</option>
            <option value="Pilihan" {{ $mapel->jenis == 'Pilihan' ? 'selected' : '' }}>Pilihan</option>
        </select>
    </div>

    {{-- Kelompok --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Kelompok
        </label>

        <select
            name="kelompok"
            class="w-full rounded-lg border-gray-300">
            <option value="Intrakurikuler" {{ $mapel->kelompok == 'Intrakurikuler' ? 'selected' : '' }}>Intrakurikuler</option>
            <option value="Mapel Pilihan" {{ $mapel->kelompok == 'Mapel Pilihan' ? 'selected' : '' }}>Mapel Pilihan</option>
        </select>
    </div>

    {{-- KKM --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            KKM
        </label>

        <input
            type="number"
            name="kkm"
            value="{{ old('kkm', $mapel->kkm) }}"
            class="w-full rounded-lg border-gray-300">
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Status
        </label>

        <select
            name="status"
            class="w-full rounded-lg border-gray-300">
            <option value="Aktif" {{ old('status', $mapel->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="Nonaktif" {{ old('status', $mapel->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
    </div>

</div>
</div>

<div class="px-6 py-5 border-t bg-slate-50">

<div class="flex justify-end gap-3">

<a
href="{{ route('mapel.index') }}"
class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-red-500 hover:bg-red-600 text-white">

<x-heroicon-o-x-mark class="w-5 h-5"/>

Batal

</a>

<button
type="submit"
class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

<x-heroicon-o-check-circle class="w-5 h-5"/>

Simpan Perubahan

</button>

</div>

</div>

</form>

</div>

</div>

</div>

@endsection
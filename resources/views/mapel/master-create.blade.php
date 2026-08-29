@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">


{{-- HEADER --}}

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Tambah Master Mata Pelajaran
        </h1>

        <p class="text-gray-500 mt-1">
            Tambahkan mata pelajaran baru ke dalam master sistem.
        </p>

    </div>

</div>


{{-- NOTIFIKASI --}}

@if(session('success'))

<div class="mb-6 rounded-lg bg-green-50 border border-green-200
            px-4 py-3 text-green-700">

    {{ session('success') }}

</div>

@endif


@if($errors->any())

<div class="mb-6 rounded-lg bg-red-50 border border-red-200
            px-4 py-3 text-red-700">

    <ul class="list-disc ml-5">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


{{-- CARD --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold text-slate-800">

Informasi Master Mata Pelajaran

</h2>

<p class="text-sm text-gray-500 mt-1">

Data ini menjadi acuan saat mata pelajaran digunakan pada tahun ajaran.

</p>

</div>


<form
    action="{{ route('mapel.master.store') }}"
    method="POST">

@csrf


<div class="p-6">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">


{{-- KODE --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kode Mata Pelajaran

</label>

<input
    type="text"
    name="kode_mapel"
    value="{{ old('kode_mapel') }}"
    maxlength="20"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500"
    placeholder="Contoh: INF">

<p class="text-xs text-gray-400 mt-2">
    Kode ditentukan saat membuat master mata pelajaran.
</p>

</div>


{{-- NAMA --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Nama Mata Pelajaran

<span class="text-red-500">*</span>

</label>

<input
    type="text"
    name="nama_mapel"
    value="{{ old('nama_mapel') }}"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500"
    placeholder="Contoh: Informatika">

</div>


{{-- KATEGORI --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kategori Mata Pelajaran

</label>

<select
    name="kategori_mapel_id"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500">

<option value="">
    -- Pilih Kategori --
</option>

@foreach($kategoriMapels as $kategori)

<option
    value="{{ $kategori->id }}"
    {{ old('kategori_mapel_id') == $kategori->id ? 'selected' : '' }}>

    {{ $kategori->kode_kategori }}
    -
    {{ $kategori->nama_kategori }}

</option>

@endforeach

</select>

</div>


{{-- JENIS --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Jenis

</label>

<select
    name="jenis"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500">

<option value="">
    -- Pilih Jenis --
</option>

<option value="Wajib"
    {{ old('jenis') == 'Wajib' ? 'selected' : '' }}>
    Wajib
</option>

<option value="Muatan Lokal"
    {{ old('jenis') == 'Muatan Lokal' ? 'selected' : '' }}>
    Muatan Lokal
</option>

<option value="Pilihan"
    {{ old('jenis') == 'Pilihan' ? 'selected' : '' }}>
    Pilihan
</option>

</select>

</div>


{{-- KELOMPOK --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kelompok

</label>

<select
    name="kelompok"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500">

<option value="">
    -- Pilih Kelompok --
</option>

<option value="Intrakurikuler"
    {{ old('kelompok') == 'Intrakurikuler' ? 'selected' : '' }}>
    Intrakurikuler
</option>

<option value="Mapel Pilihan"
    {{ old('kelompok') == 'Mapel Pilihan' ? 'selected' : '' }}>
    Mapel Pilihan
</option>

</select>

</div>


</div>

</div>


{{-- FOOTER --}}

<div class="px-6 py-5 border-t bg-slate-50">

<div class="flex justify-end gap-3">

<a
    href="{{ route('mapel.index') }}"
    class="inline-flex items-center gap-2 px-6 py-3
           rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

    <x-heroicon-o-x-mark class="w-5 h-5"/>

    Batal

</a>


<button
    type="submit"
    class="inline-flex items-center gap-2 px-6 py-3
           rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

    <x-heroicon-o-check-circle class="w-5 h-5"/>

    Simpan

</button>

</div>

</div>


</form>

</div>

</div>

</div>

@endsection
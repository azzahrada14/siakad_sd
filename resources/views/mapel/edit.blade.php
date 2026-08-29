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


{{-- ================= NOTIFIKASI ================= --}}

@if(session('success'))

<div class="mb-6 rounded-lg bg-green-50 border border-green-200
            px-4 py-3 text-green-700">

    {{ session('success') }}

</div>

@endif


@if(session('error'))

<div class="mb-6 rounded-lg bg-red-50 border border-red-200
            px-4 py-3 text-red-700">

    {{ session('error') }}

</div>

@endif


@if($errors->any())

<div class="mb-6 rounded-lg bg-red-50 border border-red-200
            px-4 py-3 text-red-700">

    <ul class="list-disc ml-5 text-sm">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="bg-white rounded-xl shadow border border-gray-200">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold text-slate-800">

Informasi Mata Pelajaran

</h2>

<p class="text-sm text-gray-500 mt-1">

Data identitas mata pelajaran mengikuti Master Mata Pelajaran.

</p>

</div>


<form
    action="{{ route('mapel.update', $mapel->id) }}"
    method="POST">

@csrf
@method('PUT')


<div class="p-6">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">


{{-- =====================================================
     KODE MAPEL
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kode Mata Pelajaran

</label>

<input
    type="text"
    value="{{ $mapel->masterMapel->kode_mapel ?? $mapel->kode_mapel }}"
    readonly
    class="w-full rounded-lg border-gray-300
           bg-gray-100 text-gray-600">

<p class="text-xs text-gray-400 mt-2">
    Kode mengikuti Master Mata Pelajaran dan tidak dapat diubah.
</p>

</div>


{{-- =====================================================
     NAMA MAPEL
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Nama Mata Pelajaran

</label>

<input
    type="text"
    value="{{ $mapel->masterMapel->nama_mapel ?? $mapel->nama_mapel }}"
    readonly
    class="w-full rounded-lg border-gray-300
           bg-gray-100 text-gray-600">

<p class="text-xs text-gray-400 mt-2">
    Nama mengikuti Master Mata Pelajaran dan tidak dapat diubah.
</p>

</div>


{{-- =====================================================
     KATEGORI
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kategori Mata Pelajaran

</label>

<input
    type="text"
    value="{{ $mapel->kategori
        ? $mapel->kategori->kode_kategori . ' - ' . $mapel->kategori->nama_kategori
        : '-' }}"
    readonly
    class="w-full rounded-lg border-gray-300
           bg-gray-100 text-gray-600">

<p class="text-xs text-gray-400 mt-2">
    Kategori mengikuti Master Mata Pelajaran.
</p>

</div>


{{-- =====================================================
     JENIS
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Jenis

</label>

<input
    type="text"
    value="{{ $mapel->jenis }}"
    readonly
    class="w-full rounded-lg border-gray-300
           bg-gray-100 text-gray-600">

</div>


{{-- =====================================================
     KELOMPOK
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Kelompok

</label>

<input
    type="text"
    value="{{ $mapel->kelompok }}"
    readonly
    class="w-full rounded-lg border-gray-300
           bg-gray-100 text-gray-600">

</div>


{{-- =====================================================
     KKM
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

KKM

<span class="text-red-500">*</span>

</label>

<input
    type="number"
    name="kkm"
    value="{{ old('kkm', $mapel->kkm) }}"
    min="0"
    max="100"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500"
    placeholder="Masukkan KKM">

<p class="text-xs text-gray-400 mt-2">
    KKM dapat disesuaikan sesuai tahun ajaran.
</p>

@error('kkm')

<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>

@enderror

</div>


{{-- =====================================================
     STATUS
===================================================== --}}

<div>

<label class="block text-sm font-medium text-gray-700 mb-2">

Status

</label>

<select
    name="status"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500">

    <option
        value="Aktif"
        {{ old('status', $mapel->status) == 'Aktif' ? 'selected' : '' }}>

        Aktif

    </option>

    <option
        value="Nonaktif"
        {{ old('status', $mapel->status) == 'Nonaktif' ? 'selected' : '' }}>

        Nonaktif

    </option>

</select>

@error('status')

<p class="text-red-500 text-sm mt-2">
    {{ $message }}
</p>

@enderror

</div>


</div>

</div>


{{-- ================= FOOTER ================= --}}

<div class="px-6 py-5 border-t bg-slate-50">

<div class="flex justify-end gap-3">

<a
    href="{{ route('mapel.index') }}"
    class="inline-flex items-center gap-2
           px-6 py-3 rounded-lg
           bg-red-500 hover:bg-red-600 text-white">

    <x-heroicon-o-x-mark class="w-5 h-5"/>

    Batal

</a>


<button
    type="submit"
    class="inline-flex items-center gap-2
           px-6 py-3 rounded-lg
           bg-blue-600 hover:bg-blue-700 text-white">

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
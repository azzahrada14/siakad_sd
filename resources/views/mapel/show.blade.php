@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

{{-- ================= HEADER ================= --}}

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Detail Mata Pelajaran

        </h1>

        <p class="text-gray-500 mt-1">

            Informasi lengkap mata pelajaran SD Negeri Cimanahayu.

        </p>

    </div>

</div>

{{-- ================= CARD ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="px-6 py-5 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-slate-800">

            Informasi Mata Pelajaran

        </h2>

    </div>

    <div class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>

<label class="block text-sm font-medium text-gray-500">

Kode Mata Pelajaran

</label>

<p class="mt-2 text-lg font-semibold">

{{ $mapel->kode_mapel }}

</p>

</div>
<div>

<label class="block text-sm font-medium text-gray-500">

Nama Mata Pelajaran

</label>

<p class="mt-2 text-lg font-semibold">

{{ $mapel->nama_mapel }}

</p>

</div>
<div>

<label class="block text-sm font-medium text-gray-500">

Kelompok

</label>

<p class="mt-2">

@if($mapel->kelompok=='Wajib')

<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

Wajib

</span>

@else

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

Muatan Lokal

</span>

@endif

</p>

</div>
<div>

<label class="block text-sm font-medium text-gray-500">

KKM

</label>

<p class="mt-2 text-lg font-semibold">

{{ $mapel->kkm }}

</p>

</div>
<div>

<label class="block text-sm font-medium text-gray-500">

Status

</label>

<p class="mt-2">

@if($mapel->status=='Aktif')

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

Aktif

</span>

@else

<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

Nonaktif

</span>

@endif

</p>

</div>
<div>

<label class="block text-sm font-medium text-gray-500">

Dibuat Pada

</label>

<p class="mt-2">

{{ $mapel->created_at->format('d F Y') }}

</p>

</div>
        </div>

    </div>

    <div class="px-6 py-5 border-t bg-slate-50">

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('mapel.edit',$mapel->id) }}"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white">

                <x-heroicon-o-pencil-square class="w-5 h-5"/>

                Edit

            </a>

            <a
                href="{{ route('mapel.index') }}"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                <x-heroicon-o-arrow-left class="w-5 h-5"/>

                Kembali

            </a>

        </div>

    </div>

</div>

</div>

</div>

@endsection
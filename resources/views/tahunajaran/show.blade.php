@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Detail Tahun Ajaran

        </h1>

        <p class="text-gray-500 mt-1">

            Informasi lengkap tahun ajaran SD Negeri Cimanahayu.

        </p>

    </div>

</div>
<div class="bg-white rounded-xl shadow border border-gray-200">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold">

Informasi Tahun Ajaran

</h2>

</div>

<div class="p-6">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>

<label class="block text-sm text-gray-500">

Tahun Ajaran

</label>

<p class="mt-2 text-lg font-semibold">

{{ $tahun->tahun_ajaran }}

</p>

</div>
<div>

<label class="block text-sm text-gray-500">

Semester

</label>

<p class="mt-2 text-lg font-semibold">

{{ $tahun->semester }}

</p>

</div>
<div>

<label class="block text-sm text-gray-500">

Tanggal Mulai

</label>

<p class="mt-2">

{{ \Carbon\Carbon::parse($tahun->tanggal_mulai)->translatedFormat('d F Y') }}

</p>

</div>
<div>

<label class="block text-sm text-gray-500">

Tanggal Selesai

</label>

<p class="mt-2">

{{ \Carbon\Carbon::parse($tahun->tanggal_selesai)->translatedFormat('d F Y') }}

</p>

</div>
<div>

<label class="block text-sm text-gray-500">

Status

</label>

<p class="mt-2">

@if($tahun->status=='Aktif')

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

</div>
</div>

</div>

<div class="px-6 py-5 border-t bg-slate-50">

<div class="flex justify-end gap-3">

<a
href="{{ route('tahun-ajaran.edit',$tahun->id) }}"
class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white">

<x-heroicon-o-pencil-square class="w-5 h-5"/>

Edit

</a>

<a
href="{{ route('tahun-ajaran.index') }}"
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
@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Edit Tahun Ajaran

        </h1>

        <p class="text-gray-500 mt-1">

            Perbarui data tahun ajaran SD Negeri Cimanahayu.

        </p>

    </div>

</div>
<div class="bg-white rounded-xl shadow border border-gray-200">

<div class="px-6 py-5 border-b bg-slate-50">

<h2 class="text-lg font-semibold">

Informasi Tahun Ajaran

</h2>

<p class="text-sm text-gray-500 mt-1">

Perbarui informasi tahun ajaran.

</p>

</div>

<form
action="{{ route('tahun-ajaran.update',$tahun->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="p-6">

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div>

<label class="block text-sm font-medium mb-2">

Tahun Ajaran

</label>

<input
type="text"
name="tahun_ajaran"
value="{{ old('tahun_ajaran',$tahun->tahun_ajaran) }}"
class="w-full rounded-lg border-gray-300">

@error('tahun_ajaran')

<p class="text-red-500 text-sm mt-2">

{{ $message }}

</p>

@enderror

</div>
<div>

<label class="block text-sm font-medium mb-2">

Semester

</label>

<select
name="semester"
class="w-full rounded-lg border-gray-300">

<option
value="Ganjil"
{{ old('semester',$tahun->semester)=='Ganjil'?'selected':'' }}>

Ganjil

</option>

<option
value="Genap"
{{ old('semester',$tahun->semester)=='Genap'?'selected':'' }}>

Genap

</option>

</select>

</div>
<div>

<label class="block text-sm font-medium mb-2">

Tanggal Mulai

</label>

<input
type="date"
name="tanggal_mulai"
value="{{ old('tanggal_mulai',$tahun->tanggal_mulai) }}"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

Tanggal Selesai

</label>

<input
type="date"
name="tanggal_selesai"
value="{{ old('tanggal_selesai',$tahun->tanggal_selesai) }}"
class="w-full rounded-lg border-gray-300">

</div>
<div class="md:col-span-2">

<label class="block text-sm font-medium mb-2">

Status

</label>

<select
name="status"
class="w-full rounded-lg border-gray-300">

<option
value="Aktif"
{{ old('status',$tahun->status)=='Aktif'?'selected':'' }}>

Aktif

</option>

<option
value="Nonaktif"
{{ old('status',$tahun->status)=='Nonaktif'?'selected':'' }}>

Nonaktif

</option>

</select>

</div>
</div>

</div>

<div class="px-6 py-5 border-t bg-slate-50">

<div class="flex justify-end gap-3">

<a
href="{{ route('tahun-ajaran.index') }}"
class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

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
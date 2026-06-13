@extends('layouts.app')

@section('content')

<div class="p-6">

<div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8">

<div class="mb-8">

<h2 class="text-3xl font-bold text-gray-800">
Proses Kelulusan
</h2>

<p class="text-gray-500 mt-2">
Proses kelulusan dilakukan untuk seluruh siswa dalam satu kelas.
</p>

</div>

@if($errors->any())

<div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-5">

<ul class="list-disc ml-5">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('kelulusan.store') }}" method="POST">

@csrf

<div class="mb-5">

<label class="font-semibold">

Tahun Ajaran

</label>

<select
name="tahun_ajaran_id"
class="w-full border rounded-lg p-3 mt-2">

@foreach($tahun as $item)

<option value="{{ $item->id }}">

{{ $item->tahun_ajaran }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label class="font-semibold">

Kelas VI

</label>

<select
name="kelas_id"
class="w-full border rounded-lg p-3 mt-2">

@foreach($kelas as $item)

<option value="{{ $item->id }}">

{{ $item->nama_kelas }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label class="font-semibold">

Status Kelulusan

</label>

<select
name="status"
class="w-full border rounded-lg p-3 mt-2">

<option value="Lulus">

Lulus

</option>

<option value="Tidak Lulus">

Tidak Lulus

</option>

</select>

</div>

<div class="flex justify-end gap-3">

<a href="{{ route('kelulusan.index') }}"
class="bg-gray-500 text-white px-6 py-3 rounded-lg">

Kembali

</a>

<button
class="bg-blue-600 text-white px-6 py-3 rounded-lg">

Proses Kelulusan

</button>

</div>

</form>

</div>

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="container mx-auto">

<div class="bg-white rounded-xl shadow p-6">

<div class="flex items-center gap-3 mb-6">

<div class="bg-blue-100 p-3 rounded-lg">

<i data-feather="calendar" class="w-6 h-6 text-blue-600"></i>

</div>

<div>

<h2 class="text-3xl font-bold text-gray-800">

Tambah Jadwal Pelajaran

</h2>

<p class="text-gray-500">

Menambahkan jadwal pelajaran baru.

</p>

</div>

</div>

@if($errors->any())

<div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-5">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('jadwal.store') }}" method="POST">

@csrf

<div class="grid grid-cols-2 gap-6">

<div>

<label class="font-semibold">
Tahun Ajaran
</label>

<select
name="tahun_ajaran_id"
class="w-full mt-2 border rounded-lg p-3">

@foreach($tahun as $item)

<option value="{{ $item->id }}">
{{ $item->tahun_ajaran }}
</option>

@endforeach

</select>

</div>

<div>

<label class="font-semibold">

Kelas

</label>

<select
name="kelas_id"
class="w-full mt-2 border rounded-lg p-3">

<option value="">Pilih Kelas</option>

@foreach($kelas as $item)

<option value="{{ $item->id }}">

{{ $item->nama_kelas }}

</option>

@endforeach

</select>

</div>

<div>

<label class="font-semibold">

Guru

</label>

<select
name="guru_id"
class="w-full mt-2 border rounded-lg p-3">

<option value="">Pilih Guru</option>

@foreach($guru as $item)

<option value="{{ $item->id }}">

{{ $item->nama_guru }}

</option>

@endforeach

</select>

</div>

<div>

<label class="font-semibold">

Mata Pelajaran

</label>

<select
name="mapel_id"
class="w-full mt-2 border rounded-lg p-3">

<option value="">Pilih Mata Pelajaran</option>

@foreach($mapel as $item)

<option value="{{ $item->id }}">

{{ $item->nama_mapel }}

</option>

@endforeach

</select>

</div>

<div>

<label class="font-semibold">

Hari

</label>

<select
name="hari"
class="w-full mt-2 border rounded-lg p-3">

<option value="">Pilih Hari</option>

<option>Senin</option>

<option>Selasa</option>

<option>Rabu</option>

<option>Kamis</option>

<option>Jumat</option>


</select>

</div>

<div>

<label class="font-semibold">

Jam Mulai

</label>

<input
type="time"
name="jam_mulai"
class="w-full mt-2 border rounded-lg p-3">

</div>

<div>

<label class="font-semibold">

Jam Selesai

</label>

<input
type="time"
name="jam_selesai"
class="w-full mt-2 border rounded-lg p-3">

</div>

</div>

<div class="flex justify-end mt-8 gap-3">

<a href="{{ route('jadwal.index') }}"
class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

Kembali

</a>

<button
type="submit"
class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

Simpan

</button>

</div>

</form>

</div>

</div>

@endsection
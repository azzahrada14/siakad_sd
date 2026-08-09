@extends('layouts.app')

@section('content')


<div class="py-6">

<div class="max-w-6xl mx-auto">

<div class="bg-white rounded-xl shadow p-6">

<h1 class="text-3xl font-bold">

Tambah Guru

</h1>

<p class="text-gray-500 mt-2">

Tambahkan data guru baru.

</p>

</div>
<form
action="{{ route('guru.store') }}"
method="POST">

@csrf

<div class="bg-white rounded-xl shadow mt-6 p-6">

<h2 class="font-bold text-lg mb-6">

Data Pribadi

</h2>

<div class="grid md:grid-cols-3 gap-5">
    <div>

<label>NIP</label>

<input
type="text"
name="nip"
value="{{ old('nip') }}"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label>NUPTK</label>

<input
type="text"
name="nuptk"
value="{{ old('nuptk') }}"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label>NIK</label>

<input
type="text"
name="nik"
value="{{ old('nik') }}"
class="w-full rounded-lg border-gray-300">

</div>


<div>

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="w-full rounded-lg border-gray-300">

<option value="L">

Laki-laki

</option>

<option value="P">

Perempuan

</option>

</select>

</div>
<div>

<label>Tempat Lahir</label>

<input
type="text"
name="tempat_lahir"
value="{{ old('tempat_lahir') }}"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label>Tanggal Lahir</label>

<input
type="date"
name="tanggal_lahir"
class="w-full rounded-lg border-gray-300">

</div>

</div>

</div>
<div class="bg-white rounded-xl shadow mt-6 p-6">

<div>

<label>Email</label>

<input
type="email"
name="email"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label>No HP</label>

<input
type="text"
name="no_hp"
class="w-full rounded-lg border-gray-300">

</div>
<div class="md:col-span-2">

<label>Alamat</label>

<textarea
name="alamat"
rows="3"
class="w-full rounded-lg border-gray-300"></textarea>

</div>

</div>

</div>
@endsection
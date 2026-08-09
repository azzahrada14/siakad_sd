@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto">

@if(session('success'))

<div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">

{{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow-sm border p-6">

<h1 class="text-3xl font-bold text-gray-800">

Edit Data Guru

</h1>

<p class="text-gray-500 mt-2">

Perbarui data sistem guru.

</p>

</div>

<form
action="{{ route('guru.update',$guru->id) }}"
method="POST">

@csrf

@method('PUT')

<div class="bg-white rounded-xl shadow-sm border mt-6 p-6">

<h2 class="text-lg font-bold mb-5">

Data PTK (Dapodik)

</h2>

<div class="grid md:grid-cols-2 gap-5">
    <div>

<label class="block text-sm font-medium mb-2">

Nama Guru

</label>

<input

type="text"

value="{{ $guru->nama_guru }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div>

<label class="block text-sm font-medium mb-2">

NIP

</label>

<input

type="text"

value="{{ $guru->nip }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

NUPTK

</label>

<input

type="text"

value="{{ $guru->nuptk }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

NIK

</label>

<input

type="text"

value="{{ $guru->nik }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

Jenis Kelamin

</label>

<input

type="text"

value="{{ $guru->jenis_kelamin=='L' ? 'Laki-laki' : 'Perempuan' }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div>

<label class="block text-sm font-medium mb-2">

Tempat Lahir

</label>

<input

type="text"

value="{{ $guru->tempat_lahir }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

Tempat Lahir

</label>

<input

type="text"

value="{{ $guru->tempat_lahir }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>
<div>

<label class="block text-sm font-medium mb-2">

Status Kepegawaian

</label>

<input

type="text"

value="{{ $guru->status_kepegawaian }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div>

<label class="block text-sm font-medium mb-2">

Jenis PTK

</label>

<input

type="text"

value="{{ $guru->jenis_ptk }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div class="md:col-span-2">

<label class="block text-sm font-medium mb-2">

Jabatan PTK

</label>

<input

type="text"

value="{{ $guru->jabatan_ptk }}"

readonly

class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

</div>

</div>

<div class="bg-white rounded-xl shadow-sm border mt-6 p-6">

    <h2 class="text-lg font-bold mb-5">

        Data Sistem

    </h2>

    <div class="grid md:grid-cols-2 gap-5">

        {{-- Email --}}
        <div>

            <label class="block text-sm font-medium mb-2">

                Email Login

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email',$guru->email) }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

            @error('email')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Nomor HP --}}
        <div>

            <label class="block text-sm font-medium mb-2">

                Nomor HP

            </label>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp',$guru->no_hp) }}"
                class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

        </div>

        {{-- Status Guru --}}
        <div>

            <label class="block text-sm font-medium mb-2">

                Status Guru

            </label>

            <select
                name="status_guru"
                class="w-full rounded-lg border-gray-300">

                <option
                    value="Aktif"
                    @selected(old('status_guru',$guru->status_guru)=='Aktif')>

                    Aktif

                </option>

                <option
                    value="Mutasi Keluar"
                    @selected(old('status_guru',$guru->status_guru)=='Mutasi Keluar')>

                    Mutasi Keluar

                </option>

                <option
                    value="Pensiun"
                    @selected(old('status_guru',$guru->status_guru)=='Pensiun')>

                    Pensiun

                </option>

            </select>

        </div>

        {{-- Password --}}
        <div>

            <label class="block text-sm font-medium mb-2">

                Password Login

            </label>

            <div class="flex gap-2">

                <input
                    type="text"
                    value="********"
                    readonly
                    class="flex-1 rounded-lg bg-gray-100 border-gray-300">

                <button
                    type="button"
                    onclick="if(confirm('Reset password menjadi 12345678?')){ document.getElementById('reset-password').submit(); }"
                    class="px-4 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">

                    Reset

                </button>

            </div>

        </div>

    </div>

</div>

<br>
    <div class="flex justify-end gap-3">

        <a
            href="{{ route('guru.index') }}"
                  class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
            <x-heroicon-o-arrow-left class="w-5 h-5"/>
            Kembali

        </a>

 <button
    type="submit"
    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

    <x-heroicon-o-check-circle class="w-5 h-5"/>

    Simpan Perubahan

</button>

     
</div>

</form>
<form
    id="reset-password"
    action="{{ route('guru.reset-password',$guru->id) }}"
    method="POST"
    class="hidden">

    @csrf

</form>

</div>

</div>


   @endsection
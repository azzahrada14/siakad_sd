@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Detail Guru
        </h1>

        <p class="text-gray-500 mt-1">
            Informasi lengkap data guru SD Negeri Cimanahayu.
        </p>

    </div>

   
</div>

<div class="bg-white rounded-xl shadow border border-gray-200 p-6 mb-6">

    <div class="flex items-center gap-6">

        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center">

            <x-heroicon-o-user class="w-12 h-12 text-blue-600"/>

        </div>

        <div>

            <h2 class="text-2xl font-bold">

                {{ $guru->nama_guru }}

            </h2>

            <p class="text-gray-500">

                {{ $guru->jenis_ptk }}

            </p>

            <div class="mt-3 flex gap-2">

                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">

                    {{ $guru->jenis_pengajar }}

                </span>

                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                    {{ $guru->status_guru }}

                </span>

            </div>

        </div>

    </div>

</div>
<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="font-semibold text-lg">

            Identitas Guru

        </h2>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">

        <div>

<label class="text-gray-500 text-sm">

NIP

</label>

<p class="font-semibold">

{{ $guru->nip ?? '-' }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

NUPTK

</label>

<p class="font-semibold">

{{ $guru->nuptk ?? '-' }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

NIK

</label>

<p class="font-semibold">

{{ $guru->nik ?? '-' }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Jenis Kelamin

</label>

<p class="font-semibold">

{{ $guru->jenis_kelamin }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Tempat Lahir

</label>

<p class="font-semibold">

{{ $guru->tempat_lahir }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Tanggal Lahir

</label>

<p class="font-semibold">

{{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d-m-Y') }}

</p>

</div>
<div>

<label class="text-gray-500 text-sm">

Status PTK

</label>

<p class="font-semibold">

{{ $guru->status_kepegawaian }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Jenis PTK

</label>

<p class="font-semibold">

{{ $guru->jenis_ptk }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Jabatan PTK

</label>

<p class="font-semibold">

{{ $guru->jabatan_ptk }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Email

</label>

<p class="font-semibold">

{{ $guru->email }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

No HP

</label>

<p class="font-semibold">

{{ $guru->no_hp ?? '-' }}

</p>

</div>

<div>

<label class="text-gray-500 text-sm">

Alamat

</label>

<p class="font-semibold">

{{ $guru->alamat ?? '-' }}

</p>

</div>
</div>

</div>
<br>

 <a
        href="{{ route('guru.index') }}"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white">

        <x-heroicon-o-arrow-left class="w-5 h-5"/>

        Kembali

    </a>

@endsection

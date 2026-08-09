@extends('layouts.app')

@section('content')


<div class="max-w-5xl mx-auto px-6 py-6">

<div class="flex justify-between items-center mb-6">

<div>

<h1 class="text-3xl font-bold">

Edit Data Kelas

</h1>

<p class="text-gray-500 mt-1">

Perbarui informasi kelas.

</p>

</div>
</div>

<div class="bg-white rounded-xl shadow-sm border mt-6 p-6">

    <form
    action="{{ route('kelas.update', $kelas->id) }}"
    method="POST">

    @csrf
    @method('PUT')
<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="block mb-2 font-medium">

Nama Kelas

</label>

<input
type="text"
name="nama_kelas"
value="{{ old('nama_kelas',$kelas->nama_kelas) }}"
class="w-full rounded-lg border-gray-300">

</div>
<div>

<label class="block mb-2 font-medium">

Tingkat

</label>

<select
name="tingkat"
class="w-full rounded-lg border-gray-300">

@for($i=1;$i<=6;$i++)

<option
value="{{ $i }}"
@selected($kelas->tingkat==$i)>

{{ $i }}

</option>

@endfor

</select>

</div>
<div class="md:col-span-2">

<label class="block mb-2 font-medium">

Wali Kelas

</label>

<select
name="wali_kelas_id"
class="w-full rounded-lg border-gray-300">

<option value="">

Belum Ditentukan

</option>

@foreach($guru as $g)

<option
value="{{ $g->id }}"
@selected($kelas->wali_kelas_id==$g->id)>

{{ $g->nama_guru }}

</option>

@endforeach

</select>

</div>
<div>
    <label class="block text-sm font-medium mb-2">
        Ruang Kelas
    </label>

    <input
        type="text"
        name="ruang_kelas"
        value="{{ old('ruang_kelas', $kelas->ruang_kelas ?? '') }}"
        placeholder="Contoh: R04"
        class="w-full rounded-lg border-gray-300">
</div>

</div>
{{-- Footer Form --}}
<br>
    <div class="flex justify-end gap-3">

        {{-- Batal --}}
        <a
            href="{{ route('kelas.index') }}"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-red-500 hover:bg-red-600 text-white transition">

            <x-heroicon-o-x-mark class="w-5 h-5"/>

            Batal

        </a>

        {{-- Simpan --}}
         <div class="flex gap-2">
                    <button
            type="submit"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition">

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
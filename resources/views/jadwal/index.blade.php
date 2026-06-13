@extends('layouts.app')

@section('content')

<div class="p-6">

   <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">

            <div>
               <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">

<x-heroicon-o-calendar-days class="w-8 h-8 text-blue-600"/>

Jadwal Pelajaran

</h2>

                <p class="text-gray-500 mt-1">
                    Jadwal Pelajaran SDN Cimanahayu
                </p>
            </div>

            @if(Auth::user()->role=='operator')
            <div class="flex gap-3">

                <a href="{{ route('jadwal.export') }}"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg">
                    Export Excel
                </a>

                <a href="{{ route('jadwal.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                    + Tambah Jadwal
                </a>

            </div>
            @endif

        </div>

        {{-- Filter --}}
      <form method="GET"
class="flex flex-wrap items-end gap-4 mb-6 bg-gray-50 border rounded-lg p-4">

    <div class="w-64">
        <label class="block text-sm font-semibold mb-2">
            Tahun Ajaran
        </label>

        <select
            name="tahun_ajaran_id"
            class="w-full border rounded-lg px-3 py-2">

            @foreach($tahun as $t)

            <option
                value="{{ $t->id }}"
                {{ request('tahun_ajaran_id')==$t->id ? 'selected' : '' }}>

                {{ $t->tahun_ajaran }}

            </option>

            @endforeach

        </select>
    </div>

    <div class="w-52">
        <label class="block text-sm font-semibold mb-2">
            Kelas
        </label>

        <select
            name="kelas_id"
            class="w-full border rounded-lg px-3 py-2">

            @foreach($kelas as $k)

            <option
                value="{{ $k->id }}"
                {{ request('kelas_id')==$k->id ? 'selected' : '' }}>

                {{ $k->nama_kelas }}

            </option>

            @endforeach

        </select>
    </div>

    <button
type="submit"
class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

<x-heroicon-o-funnel class="w-5 h-5"/>

Tampilkan

</button>
</form>

        <div class="overflow-x-auto">


<div class="overflow-x-auto">

<table class="w-full table-fixed border-collapse text-sm">

<thead class="bg-gray-100">

<tr>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Jam</th>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Senin</th>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Selasa</th>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Rabu</th>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Kamis</th>

<th class="border border-gray-300 py-3 font-semibold text-gray-700 text-center">Jumat</th>

</tr>

</thead>

<tbody>

@foreach($jam as $waktu)

<tr>

<td class="border border-gray-200 bg-gray-50 font-semibold text-center">
<div class="font-semibold">

{{ $waktu }}

</div>
</td>

@foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $hari)

<td class="border border-gray-200 h-32 align-top p-2">

@php
$item = $jadwalGrid[$hari][$waktu] ?? null;
@endphp

@if($item)

<div class="bg-blue-50 border border-blue-200 rounded-lg p-2 shadow-sm">

<div class="font-semibold text-sm text-blue-800">
{{ $item->mapel->nama_mapel }}
</div>

<div class="text-xs text-gray-500">
{{ $item->guru->nama_guru }}
</div>
</div>

@if(Auth::user()->role=='operator')


   <div class="flex justify-center gap-1 mt-2">

    <a href="{{ route('jadwal.edit',$item->id) }}"
      class="bg-yellow-500 hover:bg-yellow-600 text-white p-1.5 rounded-md">

        <x-heroicon-o-pencil-square class="w-4 h-4"/>

    </a>

    <form action="{{ route('jadwal.destroy',$item->id) }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            onclick="return confirm('Hapus jadwal ini?')"
class="bg-red-500 hover:bg-red-600 text-white p-1.5 rounded-md">

            <x-heroicon-o-trash class="w-4 h-4"/>

        </button>

    </form>

</div>

@endif
@endif
</td>
@endforeach
</tr>
@endforeach
</tbody>


</table>

</div>   {{-- overflow --}}

</div>   {{-- card --}}

</div>   {{-- p-6 --}}

@endsection
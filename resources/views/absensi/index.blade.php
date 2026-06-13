@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Daftar Hadir Siswa
            </h1>

            <div class="mt-2 text-gray-600 text-sm flex flex-wrap gap-2">

                <span>
                    <span class="font-semibold">
                        Mata Pelajaran:
                    </span>

                    {{ $mapel->nama_mapel ?? '-' }}
                </span>

                <span>|</span>

                <span>
                    <span class="font-semibold">
                        Tahun Ajaran:
                    </span>

                    @if(request('tahun_ajaran'))
                        {{ $tahunajaran->where('id', request('tahun_ajaran'))->first()->tahun_ajaran ?? '-' }}
                    @else
                        -
                    @endif
                </span>

                <span>|</span>

                <span>
                    <span class="font-semibold">
                        Semester:
                    </span>

                    {{ request('semester') ?? '-' }}
                </span>

            </div>

        </div>

        {{-- FILTER --}}
        <form method="GET"
              action="{{ route('absensi.index') }}"
              class="flex flex-wrap gap-3">

            {{-- KELAS --}}
            <select name="kelas"
                class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[150px]">

                <option value="">
                    Kelas
                </option>

                @foreach($kelas as $k)

                    <option value="{{ $k->id }}"
                        {{ request('kelas') == $k->id ? 'selected' : '' }}>

                        {{ $k->nama_kelas }}

                    </option>

                @endforeach

            </select>

            {{-- TAHUN AJARAN --}}
            <select name="tahun_ajaran"
                class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[180px]">

                <option value="">
                    Tahun Ajaran
                </option>

                @foreach($tahunajaran as $t)

                    <option value="{{ $t->id }}"
                        {{ request('tahun_ajaran') == $t->id ? 'selected' : '' }}>

                        {{ $t->tahun_ajaran }}

                    </option>

                @endforeach

            </select>
<select
    name="mapel"
    class="border rounded-xl px-4 py-3">

    <option value="">
        Mata Pelajaran
    </option>

    @foreach($mapels as $m)

        <option
            value="{{ $m->id }}"
            {{ request('mapel') == $m->id ? 'selected' : '' }}>

            {{ $m->nama_mapel }}

        </option>

    @endforeach

</select>

            {{-- SEMESTER --}}
            <select name="semester"
                class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[150px]">

                <option value="">
                    Semester
                </option>

                <option value="Ganjil"
                    {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>

                    Ganjil

                </option>

                <option value="Genap"
                    {{ request('semester') == 'Genap' ? 'selected' : '' }}>

                    Genap

                </option>

            </select>

            {{-- TANGGAL --}}
            <input type="date"
                   name="tanggal"
                   value="{{ request('tanggal') }}"
                   class="border border-gray-300 rounded-xl px-4 py-3">

            {{-- BUTTON --}}
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-medium">

                Filter

            </button>

        </form>

    </div>

    {{-- FORM ABSENSI --}}
    <form method="POST"
          action="{{ route('absensi.mass.store') }}">

        @csrf

        <input type="hidden"
               name="kelas_id"
               value="{{ request('kelas') }}">

        <input type="hidden"
               name="tahun_ajaran_id"
               value="{{ request('tahun_ajaran') }}">

        <input type="hidden"
               name="semester"
               value="{{ request('semester') }}">

        <input type="hidden"
               name="tanggal"
               value="{{ request('tanggal') }}">

        <input type="hidden"
name="mapel"
value="{{ request('mapel') }}">


        {{-- TABLE --}}
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-slate-700 text-white">

                    <tr>

                        <th class="border p-4 text-center">
                            No
                        </th>

                        <th class="border p-4 text-center">
                            NISN
                        </th>

                        <th class="border p-4 text-center">
                            NIPD
                        </th>

                        <th class="border p-4 text-center">
                            Nama Siswa
                        </th>

                        <th class="border p-4 text-center">
                            Status
                        </th>

                        <th class="border p-4 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

@forelse($siswas as $siswa)

@php
$absen = $absensiSiswa[$siswa->id] ?? null;
@endphp

<tr class="border-b hover:bg-gray-50">

<td class="border p-4 text-center">
{{ $loop->iteration }}
</td>

<td class="border p-4 text-center">
{{ $siswa->nisn }}
</td>

<td class="border p-4 text-center">
{{ $siswa->nipd }}
</td>

<td class="border p-4">
{{ $siswa->nama_siswa }}
</td>




{{-- STATUS --}}
<td class="border p-4 text-center">

@if($absen)

@php
$status = strtolower($absen->status);
@endphp

@if($status == 'hadir')

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-lg">
    Hadir
</span>

@elseif($status == 'izin')

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg">
    Izin
</span>

@elseif($status == 'sakit')

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-lg">
    Sakit
</span>

@elseif($status == 'alfa')

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-lg">
    Alfa
</span>

@endif

@else

<input
type="hidden"
name="siswa_id[]"
value="{{ $siswa->id }}">

<select
name="status[{{ $siswa->id }}]"
class="border rounded-lg px-3 py-2">

<option value="hadir">Hadir</option>
<option value="izin">Izin</option>
<option value="sakit">Sakit</option>
<option value="alfa">Alfa</option>

</select>

@endif

</td>

{{-- AKSI --}}
<td class="border p-4 text-center">

@if($absen)

<a
href="{{ route('absensi.edit',$absen->id) }}"
class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg inline-flex items-center gap-1">

    <x-heroicon-o-pencil-square class="w-4 h-4"/>

    Edit

</a>

  

@else

-

@endif

</td>

</tr>

@empty

<tr>

<td
colspan="6"
class="text-center py-10 text-gray-500">

Pilih kelas terlebih dahulu

</td>

</tr>

@endforelse

</tbody>

            </table>

        </div>

        {{-- BUTTON --}}
        @if($siswas->count())

            <button type="submit"
                class="mt-6 bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold shadow">

                Simpan Absensi

            </button>

        @endif

    </form>

</div>

@endsection
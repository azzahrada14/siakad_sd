@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="flex justify-between items-center flex-wrap gap-5 mb-6">

        {{-- KIRI --}}
        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Daftar Nilai Siswa
            </h1>

            <div class="mt-2 text-gray-600 text-sm">

                <span class="font-semibold">
                    Mata Pelajaran:
                </span>

                {{ $mapel->nama_mapel ?? '-' }}

                <span class="mx-2">|</span>

                <span class="font-semibold">
                    Tahun Ajaran:
                </span>

                @if(request('tahun_ajaran'))

                    {{ $tahunajaran->where('id', request('tahun_ajaran'))->first()->tahun_ajaran ?? '-' }}

                @else
                    -
                @endif

                <span class="mx-2">|</span>

                <span class="font-semibold">
                    Semester:
                </span>

                {{ request('semester') ?? '-' }}

            </div>

        </div>

        {{-- FILTER --}}
        <form method="GET"
              class="flex items-center gap-3 flex-wrap">

            {{-- KELAS --}}
            <select name="kelas"
                    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[120px] focus:ring-2 focus:ring-blue-400 focus:outline-none">

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

          <select name="mapel"
    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[160px]">

    <option value="">Mata Pelajaran</option>

    @foreach($mapels as $m)

        <option value="{{ $m->id }}"
            {{ request('mapel') == $m->id ? 'selected' : '' }}>

            {{ $m->nama_mapel }}

        </option>

    @endforeach

</select>

            {{-- TAHUN --}}
            <select name="tahun_ajaran"
                    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[160px] focus:ring-2 focus:ring-blue-400 focus:outline-none">

                <option value="">
                    Tahun
                </option>

                @foreach($tahunajaran as $t)

                    <option value="{{ $t->id }}"
                        {{ request('tahun_ajaran') == $t->id ? 'selected' : '' }}>

                        {{ $t->tahun_ajaran }}

                    </option>

                @endforeach

            </select>

            {{-- SEMESTER --}}
            <select name="semester"
                    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[140px] focus:ring-2 focus:ring-blue-400 focus:outline-none">

                <option value="">
                    Semester
                </option>

                @foreach($semester as $s)

                    <option value="{{ $s }}"
                        {{ request('semester') == $s ? 'selected' : '' }}>

                        {{ $s }}

                    </option>

                @endforeach

            </select>

            {{-- BUTTON --}}
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-medium shadow">

                Filter

            </button>

        </form>

    </div>

    {{-- FORM --}}
    <form action="{{ route('nilai.mass.store') }}"
          method="POST">

        @csrf

        {{-- HIDDEN --}}
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
       name="mapel_id"
       value="{{ request('mapel') }}">
           
       {{-- TABLE --}}
     <div class="bg-white rounded-2xl shadow overflow-hidden">

                <table class="w-full text-sm">

                    <thead class="bg-slate-700 text-white">

                        <tr>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            No
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            NISN
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            NIPD
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            Nama Siswa
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            Kelas
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            Mapel
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            Tugas
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            UTS
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            UAS
                        </th>

                       <th class="border border-slate-600 px-4 py-4 text-center">
                            Jumlah
                        </th>

                        <th class="border border-slate-600 px-4 py-4 text-center">
                            Rata-rata
                        </th>

                       

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody>

                    @forelse($siswas as $siswa)
                     @php

                        $nilai = $nilaiSiswa->get($siswa->id);

                    @endphp

                    <tr class="hover:bg-gray-50">

                        {{-- HIDDEN --}}
                        <input type="hidden"
                               name="siswa_id[]"
                               value="{{ $siswa->id }}">

                        {{-- NO --}}
                        <td class="border px-4 py-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        {{-- NISN --}}
                        <td class="border px-4 py-3 text-center">
                            {{ $siswa->nisn }}
                        </td>

                        {{-- NIPD --}}
                        <td class="border px-4 py-3 text-center">
                            {{ $siswa->nipd }}
                        </td>

                        {{-- NAMA --}}
                        <td class="border px-4 py-3">
                            {{ $siswa->nama_siswa }}
                        </td>

                        {{-- KELAS --}}
                        <td class="border px-4 py-3 text-center">
                            {{ $siswa->kelas->nama_kelas }}
                        </td>

                        {{-- MAPEL --}}
                        <td class="border px-4 py-3 text-center">
                           {{ $mapel->nama_mapel ?? '-' }}
                        </td>

                        {{-- TUGAS --}}
                        <td class="border px-4 py-3 text-center">

                            <input type="number"
                                   name="tugas[]"
                                   value="{{ $nilai->tugas ?? '' }}"
                                   class="w-20 border rounded-lg px-2 py-2 text-center focus:ring-2 focus:ring-blue-400">

                        </td>

                        {{-- UTS --}}
                        <td class="border px-4 py-3 text-center">

                            <input type="number"
                                   name="uts[]"
                                   value="{{ $nilai->uts ?? '' }}"
                                   class="w-20 border rounded-lg px-2 py-2 text-center focus:ring-2 focus:ring-blue-400">

                        </td>

                        {{-- UAS --}}
                        <td class="border px-4 py-3 text-center">

                            <input type="number"
                                   name="uas[]"
                                   value="{{ $nilai->uas ?? '' }}"
                                   class="w-20 border rounded-lg px-2 py-2 text-center focus:ring-2 focus:ring-blue-400">

                        </td>
                        {{-- JUMLAH --}}
                        <td class="border px-4 py-3 text-center font-semibold">
                            {{ $nilai->jumlah ?? '-' }}

                        </td>

                        {{-- RATA RATA --}}
                        <td class="border px-4 py-3 text-center font-bold text-blue-600">

                            @if($nilai)

                                {{ number_format($nilai->rata_rata ?? 0, 1) }}

                            @else

                                -

                            @endif

                        </td>

      
                    </tr>

                    @empty

                    <tr>

                        <td colspan="10"
                            class="border px-4 py-10 text-center text-gray-500">

                            Pilih kelas terlebih dahulu

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- BUTTON --}}
        @if(count($siswas) > 0)

        <button type="submit"
                class="mt-6 bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold shadow">

            Simpan Nilai

        </button>

        @endif

    </form>

</div>

@endsection
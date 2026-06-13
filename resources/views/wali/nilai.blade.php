@extends('layouts.app')

@section('content')

<div class="p-6">


     {{-- HEADER --}}
{{-- HEADER --}}
<div class="mb-6">

    <h1 class="text-4xl font-bold text-gray-800">
           Rekap Nilai Wali Kelas
    </h1>

    <p class="text-gray-500 mt-1">
        Monitoring Nilai siswa kelas

        <span class="font-semibold text-blue-600">
            {{ $kelas->nama_kelas ?? '-' }}
        </span>

    </p>

</div>

{{-- TOOLBAR + FILTER --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-5">

    {{-- KIRI --}}
    <div class="flex flex-wrap items-center gap-2">

        {{-- IMPORT --}}
        <form
            action="{{ route('guru.import') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <label
                class="inline-flex items-center gap-2
                bg-green-600 hover:bg-green-700
                text-white px-4 py-2 rounded-lg cursor-pointer">

                <x-heroicon-o-arrow-up-tray class="w-5 h-5"/>

                Import

                <input
                    type="file"
                    name="file"
                    onchange="this.form.submit()"
                    class="hidden">

            </label>

        </form>

        {{-- EXPORT --}}
        <a
            href="{{ route('guru.export') }}"
            class="inline-flex items-center gap-2
            bg-amber-500 hover:bg-amber-600
            text-white px-4 py-2 rounded-lg">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export

        </a>

    </div>
{{-- KANAN --}}
    <form method="GET"
          class="flex flex-wrap items-center gap-2">


            {{-- TAHUN AJARAN --}}
            <select name="tahun_ajaran"
                    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[120px] focus:ring-2 focus:ring-blue-400 focus:outline-none">

                <option value="">
                    Tahun Ajaran
                </option>

                @foreach($tahunajarans as $t)

                    <option value="{{ $t->id }}"
                        {{ request('tahun_ajaran') == $t->id ? 'selected' : '' }}>

                        {{ $t->tahun_ajaran }}

                    </option>

                @endforeach

            </select>

            {{-- SEMESTER --}}
            <select name="semester"
                    class="border border-gray-300 rounded-xl px-4 py-3 bg-white min-w-[120px] focus:ring-2 focus:ring-blue-400 focus:outline-none">

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

           <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700
            text-white px-4 py-2 rounded-lg">

            Filter

        </button>

    </form>

</div>

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-700 text-white">

                    <tr>

                        <th class="border p-4 text-center">
                            No
                        </th>

                         <th class="border p-3 text-center">
                            NIPD</th>

                         <th class="border p-3 text-center">
                            NISN</th>

                        <th class="border p-4 text-center">
                            Nama Siswa
                        </th>

                        @foreach($mapels as $mapel)

                            <th class="border p-4 text-center">

                                {{ $mapel->nama_mapel }}

                            </th>

                        @endforeach

                        <th class="border p-4 text-center">
                            Jumlah
                        </th>

                        <th class="border p-4 text-center">
                            Rata-rata
                        </th>

                        <th class="border p-4 text-center">
                            Predikat
                        </th>

                        <th class="p-4 text-center">
                            Ranking
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $d)

                    <tr class="border-b hover:bg-slate-50">

                        <td class="border p-4 text-center">

                            {{ $loop->iteration }}

                        </td>

         <td class="border p-3 text-center">
                        {{ $d['siswa']->nipd ?? '-' }}</td>

<td td class="border p-3 text-center">{{ $d['siswa']->nisn ?? '-' }}</td>

                        <td class="border p-4 font-medium text-gray-700">

                            {{ $d['siswa']->nama_siswa }}

                        </td>

                        @foreach($mapels as $mapel)

                            <td class="border p-4 text-center">

                                {{ $d['nilai'][$mapel->nama_mapel] }}

                            </td>

                        @endforeach

                        <td class="border p-4 text-center font-semibold">

                            {{ $d['jumlah'] }}

                        </td>

                        <td class="border p-4 text-center text-blue-600 font-bold">

                            {{ $d['rata'] }}

                        </td>

                        <td class="border p-4 text-center">

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                {{ $d['predikat'] }}

                            </span>

                        </td>

                        <td class="border p-4 text-center font-bold text-orange-500">

                            {{ $d['ranking'] }}

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="{{ count($mapels) + 6 }}"
                            class="border p-6 text-center text-gray-500">

                            Data nilai belum tersedia

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
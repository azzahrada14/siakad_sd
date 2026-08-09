@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="mb-4 rounded-lg bg-green-100 px-4 py-3 text-sm text-green-700">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 rounded-lg bg-red-100 px-4 py-3 text-sm text-red-700">
        {{ session('error') }}
    </div>
@endif

{{-- ================= CONTAINER UTAMA ================= --}}
<div class="w-full px-3 py-5">

    {{-- ================= HEADER ================= --}}
    <div class="bg-white rounded-2xl shadow border border-gray-200 px-6 py-6 mb-5">

        <div class="flex items-center justify-between gap-6">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Rekap Nilai Siswa
                </h1>

                <p class="text-gray-500 mt-2">
                    Rekap nilai formatif siswa berdasarkan mata pelajaran yang diampu wali kelas.
                </p>
            </div>

            @if($tahunAktif)

                <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

                    <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                        Tahun Ajaran Aktif
                    </p>

                    <h2 class="text-2xl font-bold text-blue-700 mt-1">
                        {{ $tahunAktif->tahun_ajaran }}
                    </h2>

                    <div class="flex justify-between items-center mt-2">

                        <span class="text-gray-600 text-sm">
                            Semester {{ $tahunAktif->semester }}
                        </span>

                        <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            Aktif
                        </span>

                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- ================= FILTER ================= --}}
    <div class="bg-white rounded-2xl shadow border border-gray-200 px-6 py-5 mb-5">

        <form method="GET" action="{{ url()->current() }}">

            <div class="grid grid-cols-4 gap-4 items-end">

                {{-- Kelas --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kelas
                    </label>

                    <input
                        type="text"
                        value="{{ $kelas->nama_kelas ?? '-' }}"
                        readonly
                        class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm text-gray-700"
                    >
                </div>


                {{-- Tahun Ajaran --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Tahun Ajaran
                    </label>

                    <input
                        type="text"
                        value="{{ $tahunAktif->tahun_ajaran ?? '-' }}"
                        readonly
                        class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm text-gray-700"
                    >
                </div>


                {{-- Semester --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Semester
                    </label>

                    <input
                        type="text"
                        value="{{ $tahunAktif->semester ?? '-' }}"
                        readonly
                        class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2.5 text-sm text-gray-700"
                    >
                </div>


                {{-- Mata Pelajaran --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <select
                        name="mapel"
                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-700"
                    >

                        <option value="">
                            Pilih Mata Pelajaran
                        </option>

                        @foreach($mapels as $item)

                            <option
                                value="{{ $item->id }}"
                                {{ $mapel && $mapel->id == $item->id ? 'selected' : '' }}
                            >
                                {{ $item->nama_mapel }}
                            </option>

                        @endforeach

                    </select>
                </div>

            </div>


            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-5">

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
                    </svg>

                    Tampilkan
                </button>


                @if($mapel)

                    <a
                        href="{{ url('/wali/nilai/export') }}?mapel={{ $mapel->id }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-green-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-700"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"/>
                        </svg>

                        Export Excel

                    </a>

                @endif

            </div>

        </form>

    </div>


    {{-- ================= JIKA BELUM PILIH MAPEL ================= --}}
    @if(!$mapel)

        <div class="bg-white rounded-2xl shadow border border-gray-200 px-6 py-8 text-center">

            <h3 class="text-lg font-semibold text-gray-700">
                Pilih Mata Pelajaran
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Silakan pilih mata pelajaran terlebih dahulu untuk menampilkan rekap nilai siswa.
            </p>

        </div>

    @else


        {{-- ================= INFORMASI REKAP ================= --}}
<div class="bg-blue-50 border border-blue-200 rounded-xl px-5 py-4 mb-5">

    <div class="grid grid-cols-5 gap-6 items-center">

        <div>
            <p class="text-xs text-gray-500">
                Kelas
            </p>
            <p class="font-semibold text-gray-800">
                {{ $kelas->nama_kelas }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-500">
                Mapel
            </p>
            <p class="font-semibold text-gray-800">
                {{ $mapel->nama_mapel }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-500">
                Semester
            </p>
            <p class="font-semibold text-gray-800">
                {{ $tahunAktif->semester }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-500">
                Jumlah TP
            </p>
            <p class="font-semibold text-gray-800">
                {{ $tujuanPembelajarans->count() }}
            </p>
        </div>

        <div>
            <p class="text-xs text-gray-500">
                Jumlah Siswa
            </p>
            <p class="font-semibold text-gray-800">
                {{ $siswas->count() }}
            </p>
        </div>

    </div>

</div>


        {{-- ================= TABEL REKAP ================= --}}
        <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-[1500px] w-full border-collapse text-xs">

                    <thead>

                        {{-- BARIS PERTAMA --}}
                        <tr class="bg-slate-700 text-white">

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-2 py-3 text-center whitespace-nowrap"
                            >
                                No
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                NIPD
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-5 py-3 text-center whitespace-nowrap min-w-[220px]"
                            >
                                Nama Siswa
                            </th>

                            <th
                                colspan="{{ $tujuanPembelajarans->count() }}"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                FORMATIF
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                Jumlah
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                Rata<br>Formatif
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                ASTS
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                {{ $tahunAktif->semester == 'Ganjil' ? 'ASAS' : 'ASAT' }}
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                Nilai<br>Akhir
                            </th>

                            <th
                                rowspan="3"
                                class="border border-gray-300 px-3 py-3 text-center whitespace-nowrap"
                            >
                                Predikat
                            </th>

                        </tr>


                        {{-- BARIS LM --}}
                        <tr class="bg-slate-600 text-white">

                            @foreach($lingkupMateris as $lm)

                                <th
                                    colspan="{{ $lm->tujuanPembelajarans->count() }}"
                                    class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap"
                                >
                                    LM {{ $loop->iteration }}
                                </th>

                            @endforeach

                        </tr>


                        {{-- BARIS TP --}}
                        <tr class="bg-slate-500 text-white">

                            @foreach($lingkupMateris as $lm)

                                @foreach($lm->tujuanPembelajarans as $tp)

                                    <th
                                        class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap min-w-[55px]"
                                    >
                                        {{ $tp->kode_tp }}
                                    </th>

                                @endforeach

                            @endforeach

                        </tr>

                    </thead>


                    <tbody class="text-gray-700">

                        @forelse($siswas as $siswa)

    @php
        $jumlah = 0;

        // Ambil data nilai siswa dengan aman
        $nilai = $nilaiSiswa[$siswa->id] ?? null;
    @endphp

    <tr class="hover:bg-gray-50">

        {{-- NO --}}
        <td class="border border-gray-300 px-2 py-2 text-center whitespace-nowrap">
            {{ $loop->iteration }}
        </td>


        {{-- NIPD --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">
            {{ $siswa->nipd }}
        </td>


        {{-- NAMA --}}
        <td class="border border-gray-300 px-5 py-2 whitespace-nowrap min-w-[220px]">
            {{ $siswa->nama_siswa }}
        </td>


        {{-- NILAI TP --}}
        @foreach($lingkupMateris as $lm)

            @foreach($lm->tujuanPembelajarans as $tp)

                @php
                    $nilaiTPsiswa =
                        $nilaiTP[$siswa->id][$tp->id] ?? 0;

                    $jumlah += $nilaiTPsiswa;
                @endphp

                <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">
                    {{ $nilaiTPsiswa ?: '-' }}
                </td>

            @endforeach

        @endforeach


        {{-- JUMLAH --}}
        <td class="border border-gray-300 px-3 py-2 text-center font-semibold whitespace-nowrap">
            {{ $jumlah }}
        </td>


        {{-- RATA FORMATIF --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">
            {{ $nilai->rata_formatif ?? '-' }}
        </td>


        {{-- ASTS --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">
            {{ $nilai->asts ?? '-' }}
        </td>


        {{-- ASAS / ASAT --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">

            @if($tahunAktif->semester == 'Ganjil')

                {{ $nilai->asas ?? '-' }}

            @else

                {{ $nilai->asat ?? '-' }}

            @endif

        </td>


        {{-- NILAI AKHIR --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">

            @if($nilai)

                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 font-semibold text-green-700">
                    {{ number_format($nilai->nilai_akhir ?? 0, 2) }}
                </span>

            @else

                -

            @endif

        </td>


        {{-- PREDIKAT --}}
        <td class="border border-gray-300 px-3 py-2 text-center whitespace-nowrap">

            @php
                $na = $nilai->nilai_akhir ?? 0;
            @endphp

            @if(!$nilai)

                -

            @elseif($na >= 86)

                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 font-semibold text-green-700">
                    A
                </span>

            @elseif($na >= 76)

                <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 font-semibold text-blue-700">
                    B
                </span>

            @elseif($na >= 66)

                <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 font-semibold text-yellow-700">
                    C
                </span>

            @elseif($na >= 56)

                <span class="inline-flex items-center rounded-full bg-orange-100 px-3 py-1 font-semibold text-orange-700">
                    D
                </span>

            @else

                <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 font-semibold text-red-700">
                    E
                </span>

            @endif

        </td>

    </tr>

@empty

    <tr>

        <td
            colspan="{{ 10 + $tujuanPembelajarans->count() }}"
            class="border border-gray-300 px-4 py-8 text-center text-gray-500"
        >
            Belum ada data nilai.
        </td>

    </tr>

@endforelse

                    </tbody>

                </table>

            </div>

        </div>

    @endif

</div>

@endsection
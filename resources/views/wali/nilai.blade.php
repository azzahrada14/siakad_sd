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

        <div class="flex flex-col lg:flex-row gap-4">

           @if($tahunAjaran)

    <div class="bg-blue-50 border border-blue-200 rounded-xl px-6 py-4 shadow-sm min-w-[260px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
            Tahun Ajaran
        </p>

        <h3 class="text-2xl font-bold text-blue-700 mt-1">
            {{ $tahunAjaran->tahun_ajaran }}
        </h3>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600">
                Semester {{ $tahunAjaran->semester }}
            </span>

            @if($modeArsip)

                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                    Arsip
                </span>

            @else

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Aktif
                </span>

            @endif

        </div>

    </div>

@endif
        </div>

    </div>
    <br>

{{-- ================= PERINGATAN ARSIP ================= --}}


                   @if($modeArsip)

<div class="bg-yellow-50 border border-yellow-200
            rounded-xl px-5 py-4 mb-5">

    <div class="flex items-start gap-3">

        <x-heroicon-o-exclamation-triangle
            class="w-6 h-6 text-yellow-600 flex-shrink-0"/>

        <div>

            <h3 class="font-semibold text-yellow-800">
                Periode Tahun Ajaran Diarsipkan
            </h3>

            <p class="text-sm text-yellow-700 mt-1">
                Rekap nilai pada tahun ajaran
                <strong>{{ $tahunAjaran->tahun_ajaran }}</strong>
                semester
                <strong>{{ $tahunAjaran->semester }}</strong>
                merupakan data arsip.

                Data hanya dapat dilihat dan tidak dapat diubah.
            </p>

        </div>

    </div>

</div>

@endif


    {{-- ================= FILTER ================= --}}
    <div class="bg-white rounded-2xl shadow border border-gray-200 px-6 py-5 mb-5">

       <form method="GET" action="{{ url()->current() }}">

    <input
    type="hidden"
    name="tahun_ajaran_id"
    value="{{ $tahunAjaran->id }}"
>

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
                        value="{{ $tahunAjaran->tahun_ajaran ?? '-' }}"
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
                       value="{{ $tahunAjaran->semester ?? '-' }}"
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
    href="{{ url('/wali/nilai/export') }}?mapel={{ $mapel->id }}&tahun_ajaran_id={{ $tahunAjaran->id }}&semester={{ $tahunAjaran->semester }}"
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


{{-- ================= KETERANGAN NILAI ================= --}}
<div class="bg-blue-50 border border-blue-200 rounded-xl px-5 py-4 mb-5">

    <div class="flex items-center gap-2 mb-3">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 text-blue-600"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 16h-1v-4h-1m1-8h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
        </svg>

        <h3 class="text-sm font-semibold text-blue-700">
            Keterangan Nilai Akhir
        </h3>
    </div>

    <div class="grid grid-cols-5 gap-4">

        {{-- A --}}
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center
                         min-w-[38px] rounded-full
                         bg-green-100 px-2 py-1
                         text-xs font-bold text-green-700">
                A
            </span>

            <span class="text-sm text-gray-600">
                86–100 <b>(Sangat Baik)</b>
            </span>
        </div>

        {{-- B --}}
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center
                         min-w-[38px] rounded-full
                         bg-blue-100 px-2 py-1
                         text-xs font-bold text-blue-700">
                B
            </span>

            <span class="text-sm text-gray-600">
                76–85 <b>(Baik)</b>
            </span>
        </div>

        {{-- C --}}
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center
                         min-w-[38px] rounded-full
                         bg-yellow-100 px-2 py-1
                         text-xs font-bold text-yellow-700">
                C
            </span>

            <span class="text-sm text-gray-600">
                66–75 <b>(Cukup)</b>
            </span>
        </div>

        {{-- D --}}
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center
                         min-w-[38px] rounded-full
                         bg-orange-100 px-2 py-1
                         text-xs font-bold text-orange-700">
                D
            </span>

            <span class="text-sm text-gray-600">
                56–65 <b>(Kurang)</b>
            </span>
        </div>

        {{-- E --}}
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center
                         min-w-[38px] rounded-full
                         bg-red-100 px-2 py-1
                         text-xs font-bold text-red-700">
                E
            </span>

            <span class="text-sm text-gray-600">
                ≤55 <b>(Sangat Kurang)</b>
            </span>
        </div>

    </div>

    {{-- KKM --}}
    <div class="mt-4 pt-3 border-t border-blue-200 flex items-center gap-5">

        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-green-500"></span>
            <span class="text-sm text-gray-600">
                <b>Tuntas</b> ≥ KKM
            </span>
        </div>

        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-red-500"></span>
            <span class="text-sm text-gray-600">
                <b>Belum Tuntas / Remedial</b> &lt; KKM
            </span>
        </div>
        <br>

        <div class="ml-auto bg-white border border-blue-200
                    rounded-lg px-4 py-2">
            <span class="text-sm text-gray-500">KKM</span>
            <span class="ml-2 font-bold text-blue-700">75</span>
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
                                {{ $tahunAjaran->semester == 'Ganjil' ? 'ASAS' : 'ASAT' }}
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
    {{ $nilaiTPsiswa !== 0 ? number_format($nilaiTPsiswa, 2, '.', '') : '-' }}
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

            @if($tahunAjaran->semester == 'Ganjil')

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
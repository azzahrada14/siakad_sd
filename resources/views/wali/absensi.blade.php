@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
{{-- HEADER --}}
<div class="mb-6">

    <h1 class="text-4xl font-bold text-gray-800">
        Rekap Absensi Wali Kelas
    </h1>

    <p class="text-gray-500 mt-1">
        Monitoring kehadiran siswa kelas

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

    @php
$namaBulan = [
1=>'Januari',
2=>'Februari',
3=>'Maret',
4=>'April',
5=>'Mei',
6=>'Juni',
7=>'Juli',
8=>'Agustus',
9=>'September',
10=>'Oktober',
11=>'November',
12=>'Desember'
];
@endphp

    {{-- KANAN --}}
    <form action="{{ route('wali.absensi') }}"
      method="GET"
      class="flex flex-wrap items-center gap-2">

      <input type="hidden" name="test" value="123">

        <select
            name="bulan"
            class="w-40 border border-gray-300 rounded-lg px-3 py-2">

            @foreach($namaBulan as $key=>$nama)

                <option
                    value="{{ $key }}"
                    {{ $bulan==$key ? 'selected':'' }}>

                    {{ $nama }}

                </option>

            @endforeach

        </select>

        <input
            type="number"
            name="tahun"
            value="{{ $tahun }}"
            class="w-28 border border-gray-300 rounded-lg px-3 py-2">

        <select
    name="mapel_id"
    class="w-52 border border-gray-300 rounded-lg px-3 py-2">

    <option value="">
        Semua Mapel
    </option>

    @foreach($mapels as $mapel)

        <option
            value="{{ $mapel->id }}"
            {{ request('mapel_id') == $mapel->id ? 'selected' : '' }}>

            {{ $mapel->nama_mapel }}

        </option>

    @endforeach

</select>

        <input
    type="submit"
    value="Filter"
    class="bg-blue-600 text-white px-4 py-2 rounded-lg">

    </form>

</div>


{{-- TABLE --}}

<div class="flex flex-wrap items-center gap-4 text-sm mb-3">

    <span class="font-semibold">
        Keterangan :
    </span>

    <span>
        — Belum Tercatat
    </span>

    <span>
        ✅ Hadir
    </span>

    <span>
        📄 Sakit
    </span>

    <span>
        🚶 Izin
    </span>

    <span>
        ✖ Alfa
    </span>

</div>

        <div class="bg-white rounded-xl shadow">

<div class="overflow-x-auto">

<table class="w-full text-sm border-collapse">

    <thead class="bg-slate-700 text-white sticky top-0">

        <tr>

            <th class="border p-3">No</th>

            <th class="border p-3">NIPD</th>

            <th class="border p-3">NISN</th>

            <th class="border p-3">Nama Siswa</th>

            @for($i=1;$i<=$jumlahHari;$i++)
                <th class="border p-2 text-center">
                    {{ $i }}
                </th>
            @endfor

            <th class="border p-2 text-green-500">✅</th>
            <th class="border p-2 text-yellow-500">📄</th>
            <th class="border p-2 text-blue-500">🚶</th>
            <th class="border p-2 text-red-500">✖</th>
            <th class="border p-2">Total</th>
            <th class="border p-2">%</th>

        </tr>

    </thead>

    <tbody>

    @forelse($data as $d)

        <tr class="hover:bg-gray-50">

            <td class="border p-3 text-center">
                {{ $loop->iteration }}
            </td>

            <td class="border p-3 text-center">
                {{ $d['siswa']->nipd }}
            </td>

            <td class="border p-3 text-center">
                {{ $d['siswa']->nisn }}
            </td>

            <td class="border p-3 whitespace-nowrap font-medium">
                {{ $d['siswa']->nama_siswa }}
            </td>

            @for($i=1;$i<=$jumlahHari;$i++)

                @php
                    $status = strtolower($d['tanggal'][$i] ?? '-');
                @endphp

                <td class="border text-center">

                    @switch($status)

                        @case('h')
                            <span class="text-green-600 font-bold">✓</span>
                        @break

                        @case('s')
                            📄
                        @break

                        @case('i')
                            🚶
                        @break

                        @case('a')
                            <span class="text-red-600">✖</span>
                        @break

                        @default
                            <span class="text-gray-300">—</span>

                    @endswitch

                </td>

            @endfor

            <td class="border text-center text-green-600 font-bold">
                {{ $d['hadir'] }}
            </td>

            <td class="border text-center text-yellow-600 font-bold">
                {{ $d['sakit'] }}
            </td>

            <td class="border text-center text-blue-600 font-bold">
                {{ $d['izin'] }}
            </td>

            <td class="border text-center text-red-600 font-bold">
                {{ $d['alfa'] }}
            </td>

            <td class="border text-center font-bold">
                {{ $d['total'] }}
            </td>

            <td class="border text-center font-bold">
                {{ number_format($d['persen'],2) }}%
            </td>

        </tr>

    @empty

        <tr>

            <td colspan="{{ $jumlahHari+10 }}"
                class="border p-6 text-center text-gray-500">

                Data absensi belum tersedia

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

</div>

</div>

@endsection
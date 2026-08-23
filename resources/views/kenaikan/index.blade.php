@extends('layouts.app')

@section('content')

<div class="container mx-auto">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>
    <h1 class="flex items-center gap-3 text-3xl font-bold text-slate-800">

        <x-heroicon-o-arrow-up-circle class="w-8 h-8 text-blue-600" />

        Kenaikan Kelas

    </h1>

    <p class="text-gray-500 mt-2">
        Proses kenaikan kelas siswa berdasarkan pembagian kelas aktif.
    </p>
</div>

        {{-- Tahun Ajaran Aktif --}}
 @if($tahunAktif)

<div class="mt-5 lg:mt-0">

    <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
    Tahun Ajaran
</p>

        <h2 class="text-2xl font-bold text-blue-700 mt-1">
         {{ $tahunAktif->tahun_ajaran }}
        </h2>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600 text-sm">
                Semester {{ $tahunAktif->semester }}
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

</div>

@endif

</div>

    {{-- Alert --}}
    @if(session('success'))

    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg mb-5">

    <p class="font-semibold">
        ✓ Berhasil
    </p>

    <p class="mt-1">
        {{ session('success') }}
    </p>

</div>

    @endif

    @if(session('error'))

    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg mb-5">

    <p class="font-semibold">
        Generate Gagal
    </p>

    <div class="mt-2">
        {!! session('error') !!}
    </div>

</div>

    @endif

    @if($modeArsip)

    <div class="bg-yellow-50 border border-yellow-300 rounded-xl px-5 py-4 mb-6">

        <div class="flex items-start gap-3">

            <x-heroicon-o-exclamation-triangle
                class="w-6 h-6 text-yellow-600 flex-shrink-0"
            />

            <div>

                <h3 class="font-semibold text-yellow-800">
                    Tahun Ajaran Diarsipkan
                </h3>

                <p class="text-sm text-yellow-700 mt-1">

                    Data kenaikan kelas pada tahun ajaran
                    <strong>{{ $tahunAktif->tahun_ajaran }}</strong>
                    semester
                    <strong>{{ $tahunAktif->semester }}</strong>
                    merupakan data arsip.

                    Data hanya dapat dilihat dan tidak dapat diproses atau diubah.

                </p>

            </div>

        </div>

    </div>

@endif

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

        <div class="bg-white rounded-xl shadow border p-5">

            <div class="text-gray-500">
                Total Siswa
            </div>

            <div class="text-3xl font-bold text-blue-600 mt-2">

                {{ $totalSiswa }}

            </div>

        </div>

        <div class="bg-white rounded-xl shadow border p-5">

            <div class="text-gray-500">
                Total Kelas
            </div>

            <div class="text-3xl font-bold text-green-600 mt-2">

                {{ $totalKelas }}

            </div>

        </div>

        <div class="bg-white rounded-xl shadow border p-5">

            <div class="text-gray-500">
                Siap Diproses
            </div>

            <div class="text-3xl font-bold text-orange-500 mt-2">

                {{ $siapNaik }}

            </div>

        </div>

    </div>

   {{-- Filter / Informasi Arsip --}}
<div class="bg-white rounded-xl shadow border mb-6">

    @if($modeArsip)

        {{-- PERIODE ARSIP --}}
        <div class="p-6">

            <div class="flex items-start gap-4">

                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center">
                        <x-heroicon-o-lock-closed class="w-6 h-6 text-gray-500"/>
                    </div>
                </div>

                <div>

                    <h2 class="text-lg font-semibold text-gray-700">
                        Kenaikan Kelas Terkunci
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Anda tidak dapat melakukan proses kenaikan kelas pada
                        periode tahun ajaran yang sudah diarsipkan.
                    </p>

                    <p class="text-sm text-gray-500 mt-1">
                        Data kenaikan kelas hanya dapat dilihat sebagai arsip.
                    </p>

                </div>

            </div>

        </div>

    @else

        {{-- FILTER NORMAL --}}
        <div class="px-6 py-4 border-b">

            <h2 class="font-semibold">
                Filter Kenaikan Kelas
            </h2>

        </div>

        <div class="p-6">

            <form
                action="{{ route('kenaikan.index') }}"
                method="GET"
            >

                @if($tahunAktif)

                    <input
                        type="hidden"
                        name="tahun_ajaran_id"
                        value="{{ $tahunAktif->id }}"
                    >

                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    {{-- KELAS ASAL --}}
                    <div>

                        <label class="block mb-2 font-medium">
                            Kelas Asal
                        </label>

                        <select
                            name="kelas"
                            class="w-full rounded-lg border"
                        >

                            <option value="">
                                -- Pilih Kelas --
                            </option>

                            @foreach($kelas as $item)

                                @if($item->tingkat < 6)

                                    <option
                                        value="{{ $item->id }}"
                                        {{ request('kelas') == $item->id ? 'selected' : '' }}
                                    >

                                        {{ $item->nama_kelas }}

                                    </option>

                                @endif

                            @endforeach

                        </select>

                    </div>

                    {{-- KELAS TUJUAN --}}
                    <div>

                        <label class="block mb-2 font-medium">
                            Kelas Tujuan
                        </label>

                        <input
                            readonly
                            class="w-full rounded-lg border bg-gray-100"
                            value="{{ $kelasTujuan->nama_kelas ?? '-' }}"
                        >

                    </div>

                    {{-- TOMBOL --}}
                    <div class="flex items-end">

                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg h-11"
                        >

                            Tampilkan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    @endif

</div>

    {{-- Daftar Siswa --}}
    <form method="POST" action="{{ route('kenaikan.proses') }}">
    @csrf

    @if($kelasAsal)
        <input type="hidden" name="kelas_id" value="{{ $kelasAsal->id }}">
    @endif

        <div class="bg-white rounded-xl shadow border">

            <div class="px-6 py-4 border-b">

                <h2 class="font-semibold">

                    Daftar Siswa

                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="border p-3">No</th>

                            <th class="border p-3">NISN</th>

                            <th class="border p-3">Nama Siswa</th>

                            <th class="border p-3">Status</th>

      <th class="border p-3">Alasan</th>

            <th class="border p-3">Kelas Tujuan</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($anggota as $row)

                        <tr>

                  

    {{-- No --}}
    <td class="border p-3 text-center">
        {{ $loop->iteration }}
    </td>

    {{-- NISN --}}
    <td class="border p-3">
        {{ $row->siswa->nisn }}
    </td>

    {{-- Nama --}}
    <td
        class="border p-3 namaSiswa"
        data-alasan="{{ $row->alasan }}">

        {{ $row->siswa->nama_siswa }}

    </td>

    {{-- Status --}}
    <td
        class="border p-3 text-center statusNaik"
        data-status="{{ $row->status_kenaikan }}">

        @if($row->status_kenaikan == 'Naik')

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                Naik
            </span>

        @elseif($row->status_kenaikan == 'Lulus')

            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                Lulus
            </span>

        @else

            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                Belum Tuntas
            </span>

        @endif

    </td>

    {{-- Alasan --}}
    <td class="border p-3">

        @if($row->status_kenaikan == 'Lulus')

            Lulus dari kelas VI

        @elseif($row->status_kenaikan == 'Naik')

            Memenuhi seluruh KKM

        @else

            {{ $row->alasan ?: '-' }}

        @endif

    </td>

    {{-- Kelas Tujuan --}}
<td class="border p-3">

@if($row->status_kenaikan=='Naik')

<select
name="kelas[{{ $row->id }}]"
class="w-full rounded-lg border">

@foreach($kelas as $k)

@if($k->tingkat == ($kelasAsal->tingkat + 1))

<option
value="{{ $k->id }}"
{{ ($row->kelas_tujuan_id ?? $kelasTujuan?->id) == $k->id ? 'selected' : '' }}>

{{ $k->nama_kelas }}

</option>

@endif

@endforeach

</select>

@elseif($row->status_kenaikan=='Lulus')

<span class="text-blue-600 font-semibold">

Lulus

</span>

@else

<span class="text-red-600 font-semibold">

Belum Memenuhi KKM

</span>

@endif

</td>
   

</tr>
       
@empty

<tr>

<td colspan="6" class="text-center py-6">

Belum ada data.

</td>

</tr>

@endforelse               



                    </tbody>

                </table>

            </div>

           
              @if($anggota->count())

    <div class="border-t p-5 flex justify-end">
@if($bolehProses)

    <button
        type="button"
        onclick="openGenerate()"
        class="inline-flex items-center gap-2
               bg-green-600 hover:bg-green-700
               text-white px-6 py-3 rounded-lg font-semibold">

        <x-heroicon-o-arrow-up-circle class="w-5 h-5"/>

        Generate Kenaikan

    </button>

@else

    <button
        type="button"
        disabled
        class="inline-flex items-center gap-2
               bg-gray-200 text-gray-400
               px-6 py-3 rounded-lg
               font-semibold cursor-not-allowed">

        <x-heroicon-o-lock-closed class="w-5 h-5"/>

        @if($modeArsip)

            Periode Arsip — Terkunci

        @elseif($tahunAktif->semester === 'Genap')

            Semester Genap — Terkunci

        @else

            Kenaikan Kelas — Terkunci

        @endif

    </button>

@endif

    </div>

@endif

@if($bolehProses)

    {{-- MODAL GAGAL --}}
    <div
        id="modalGagal"
        class="fixed inset-0 hidden bg-black/40 items-center justify-center z-50">

        <div class="bg-white rounded-xl w-[500px]">

            <div class="p-6">

                <h2 class="text-xl font-bold text-red-600">
                    Generate Gagal
                </h2>

                <p class="mt-4">
                    Masih terdapat siswa yang belum memenuhi KKM.

                    Silakan guru mata pelajaran melakukan
                    <strong>Remedial</strong>
                    terlebih dahulu.
                </p>

                <div
                    id="listSiswa"
                    class="mt-4 bg-red-50 p-3 rounded text-sm">
                </div>

                <div class="flex justify-end mt-6">

                    <button
                        type="button"
                        onclick="closeModalGagal()"
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Tutup

                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- MODAL KONFIRMASI GENERATE --}}
    <div
        id="modalGenerate"
        class="fixed inset-0 hidden bg-black/40 items-center justify-center z-50">

        <div class="bg-white rounded-xl w-[500px]">

            <div class="p-6">

                <h2 class="text-xl font-bold">
                    Konfirmasi Generate Kenaikan Kelas
                </h2>

                <p class="mt-4 text-gray-700">
                    Apakah Anda yakin ingin memproses generate kenaikan kelas?
                </p>

                <ul class="list-disc ml-6 mt-3 text-sm text-gray-600 space-y-1">

                    <li>
                        Menetapkan kelas tujuan bagi siswa yang memenuhi KKM.
                    </li>

                    <li>
                        Menetapkan status <strong>Lulus</strong>
                        bagi siswa kelas VI.
                    </li>

                    <li>
                        Menyimpan data kenaikan kelas untuk proses
                        <strong>Pembagian Kelas</strong>.
                    </li>

                    <li>
                        Pastikan seluruh nilai siswa telah final sebelum melanjutkan.
                    </li>

                </ul>

                <div class="flex justify-end gap-2 mt-6">

                    <button
                        type="button"
                        onclick="closeGenerate()"
                        class="bg-gray-500 text-white px-4 py-2 rounded">

                        Batal

                    </button>

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded">

                        Generate

                    </button>

                </div>

            </div>

        </div>

    </div>

@endif

</div> {{-- card daftar siswa --}}

</form>

</div> {{-- container --}}



@push('scripts')
<script>

function openGenerate(){

    document.getElementById("modalGenerate")
        .classList.remove("hidden");

    document.getElementById("modalGenerate")
        .classList.add("flex");

}

function closeGenerate(){

    document.getElementById("modalGenerate")
        .classList.remove("flex");

    document.getElementById("modalGenerate")
        .classList.add("hidden");

}

   
</script>
@endpush
@endsection
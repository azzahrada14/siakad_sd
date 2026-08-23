@extends('layouts.app')

@section('content')

{{-- ================= ALERT ================= --}}
@if(session('success'))
<div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
    {{ session('success') }}
</div>
@endif

@if(session('warning'))
<div class="mb-5 rounded-lg bg-yellow-100 border border-yellow-300 text-yellow-700 px-4 py-3">
    {{ session('warning') }}
</div>
@endif

@if(session('error'))
<div class="mb-5 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
    {{ session('error') }}
</div>
@endif

{{-- ================= HEADER ================= --}}
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

    <div>

        <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">
            <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600"/>
            Kelulusan Siswa
        </h2>

        <p class="text-gray-500 mt-2 text-lg">
            Proses penetapan kelulusan peserta didik kelas VI.
        </p>

    </div>

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
{{-- ===================================================== --}}
{{-- DASHBOARD --}}
{{-- ===================================================== --}}

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

    {{-- Total Siswa --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-gray-500">
                    Total Siswa Kelas VI
                </p>

                <h2 class="text-4xl font-bold text-blue-600 mt-3">
                    {{ $totalSiswa }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                <x-heroicon-o-users
                    class="w-7 h-7 text-blue-600"/>

            </div>

        </div>

    </div>

    {{-- Lulus --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-gray-500">
                    Lulus
                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-3">
                    {{ $lulus }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                <x-heroicon-o-check-badge
                    class="w-7 h-7 text-green-600"/>

            </div>

        </div>

    </div>

    {{-- Belum Lulus --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-gray-500">
                    Belum Lulus
                </p>

                <h2 class="text-4xl font-bold text-red-600 mt-3">
                    {{ $belum }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-red-100 flex items-center justify-center">

                <x-heroicon-o-x-circle
                    class="w-7 h-7 text-red-600"/>

            </div>

        </div>

    </div>

    {{-- Siap Diproses --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm text-gray-500">
                    Siap Diproses
                </p>

                <h2 class="text-4xl font-bold text-yellow-500 mt-3">
                    {{ $lulus }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-full bg-yellow-100 flex items-center justify-center">

                <x-heroicon-o-arrow-path
                    class="w-7 h-7 text-yellow-600"/>

            </div>

        </div>

    </div>

</div>
{{-- ================= MANAJEMEN ================= --}}

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center mb-6">

    <div>

        <h2 class="text-lg font-semibold text-slate-800">

            Manajemen Kelulusan

        </h2>

        <p class="text-sm text-gray-500 mt-1">

            Generate dan export data kelulusan siswa.

        </p>

    </div>

    <div class="flex flex-wrap gap-3 mt-5 lg:mt-0">

       @if($bolehProses)

    <button
        type="button"
        onclick="openModal()"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">

        <x-heroicon-o-arrow-path class="w-5 h-5"/>

        Generate Kelulusan

    </button>

@else

    <span
        class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-gray-400 text-white cursor-not-allowed">

        <x-heroicon-o-lock-closed class="w-5 h-5"/>

        Tidak Dapat Diproses

    </span>

@endif

        <a
            href="{{ route('kelulusan.export') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-green-600 text-white hover:bg-green-700 transition">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export Excel

        </a>

    </div>

</div>
<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 px-6 py-5 border-b bg-slate-50 rounded-t-xl">

        <div>

            <h2 class="text-lg font-semibold text-slate-800">

                Data Kelulusan

            </h2>

            <p class="text-sm text-gray-500 mt-1">

                Daftar siswa kelas VI.

            </p>

        </div>

        <div>

            <span class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                {{ $totalSiswa }} Siswa

            </span>

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border-collapse">

            <thead class="bg-slate-100">

                <tr>

                    <th class="border border-gray-300 px-3 py-3 text-center w-16">

                        No

                    </th>

                    <th class="border border-gray-300 px-4 py-3 text-center">

                        NISN

                    </th>

                    <th class="border border-gray-300 px-4 py-3 text-center">

                        Nama Siswa

                    </th>

                    <th class="border border-gray-300 px-4 py-3 text-center">

                        Status

                    </th>

                    <th class="border border-gray-300 px-4 py-3 text-center">

                        Keterangan

                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($anggota as $item)

<tr class="hover:bg-sky-50 transition duration-150">

    <td class="border border-gray-300 px-3 py-3 text-center">

        {{ $loop->iteration }}

    </td>

    <td class="border border-gray-300 px-4 py-3">

        {{ $item->siswa->nisn }}

    </td>

    <td class="border border-gray-300 px-4 py-3">

        <div class="font-semibold text-slate-800">

            {{ $item->siswa->nama_siswa }}

        </div>

    </td>

    <td class="border border-gray-300 px-3 py-3 text-center">

        @if($item->status=='Lulus')

            <span class="inline-flex rounded-full bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold">

                Lulus

            </span>

        @else

            <span class="inline-flex rounded-full bg-red-100 text-red-700 px-3 py-1 text-xs font-semibold">

                Belum Lulus

            </span>

        @endif

    </td>

    <td class="border border-gray-300 px-4 py-3">

        {!! nl2br(e($item->keterangan)) !!}

    </td>

</tr>

@empty

<tr>

    <td colspan="5" class="border border-gray-300 py-12">

        <div class="text-center">

            <x-heroicon-o-academic-cap class="mx-auto h-16 w-16 text-gray-300"/>

            <h3 class="mt-4 text-lg font-semibold text-gray-700">

                Belum Ada Data Kelulusan

            </h3>

            <p class="mt-2 text-gray-500">

                Silakan lakukan Generate Kelulusan terlebih dahulu.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>
<div class="px-6 py-4 border-t bg-gray-50 rounded-b-xl">

    <div class="text-sm text-gray-600">

        Total Data :

        <span class="font-semibold">

            {{ $totalSiswa }}

        </span>

        siswa

    </div>

</div>

</div>
{{-- ================= MODAL GENERATE ================= --}}

<div
    id="modalGenerate"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg overflow-hidden">

        {{-- Header --}}
        <div class="bg-blue-600 px-6 py-5">

            <h2 class="text-xl font-bold text-white">

                Konfirmasi Generate Kelulusan

            </h2>

            <p class="text-blue-100 text-sm mt-1">

                Proses penetapan kelulusan siswa kelas VI

            </p>

        </div>

        {{-- Body --}}
        <div class="p-6">

            <p class="text-gray-700 mb-5">

                Apakah Anda yakin ingin memproses
                <strong>Generate Kelulusan</strong>?

            </p>

            <div class="rounded-lg border border-blue-200 bg-blue-50 p-5">

                <p class="font-semibold text-blue-700 mb-3">

                    Proses ini akan:

                </p>

                <ul class="space-y-2 text-gray-700">

                    <li>
                        ✔ Menentukan status kelulusan siswa.
                    </li>

                    <li>
                        ✔ Menyimpan data ke tabel kelulusan.
                    </li>

                    <li>
                        ✔ Mengubah status siswa menjadi Lulus.
                    </li>

                    <li>
                        ✔ Digunakan pada proses Data Alumni.
                    </li>

                </ul>

            </div>

            <div class="mt-5 rounded-lg border border-yellow-200 bg-yellow-50 p-4">

                <p class="text-yellow-700 text-sm">

                    Pastikan seluruh nilai siswa telah final sebelum melakukan generate.

                </p>

            </div>

        </div>

        {{-- Footer --}}
        <div class="border-t bg-gray-50 px-6 py-4 flex justify-end gap-3">

            <button
                type="button"
                onclick="closeModal()"
                class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">

                Batal

            </button>

            <form
                action="{{ route('kelulusan.generate') }}"
                method="POST">

                @csrf

                <button
                    class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    Generate

                </button>

            </form>

        </div>

    </div>

</div>
@push('scripts')

<script>

function openModal(){

    const modal = document.getElementById('modalGenerate');

    modal.classList.remove('hidden');

    modal.classList.add('flex');

}

function closeModal(){

    const modal = document.getElementById('modalGenerate');

    modal.classList.remove('flex');

    modal.classList.add('hidden');

}

document.addEventListener('keydown',function(e){

    if(e.key==='Escape'){

        closeModal();

    }

});

</script>

@endpush

@endsection
@extends('layouts.app')

@section('content')

<div class="py-6">

    <div class="w-full px-4 sm:px-6 lg:px-8">

        {{-- ================= HEADER ================= --}}
        <div class="bg-white rounded-2xl shadow border border-gray-200 px-6 py-6 mb-5">

 
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                {{-- Kiri --}}
                <div>
                    <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                        <x-heroicon-o-trophy class="w-8 h-8 text-yellow-500"/>

                        Ranking Siswa

                    </h2>

                    <p class="mt-2 text-gray-500">

                        Menampilkan hasil peringkat siswa berdasarkan rata-rata
                        nilai akhir pada kelas yang diampu.

                    </p>
                </div>

                {{-- Kanan --}}
                @if($tahunAktif)

                    <div>

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

                    </div>

                @endif

            </div>

        </div>


        {{-- ================= INFORMASI RANKING ================= --}}
        <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden mb-5">

            <div class="px-6 py-4 border-b bg-slate-50 flex justify-between items-center">

                <div>

                    <h3 class="text-lg font-semibold text-gray-800">

                        Informasi Ranking

                    </h3>

                    <p class="text-sm text-gray-500 mt-1">

                        Ranking dihitung berdasarkan rata-rata nilai akhir siswa.

                    </p>

                </div>

                <button
                    id="btnGenerate"
                    type="button"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-green-600 hover:bg-green-700 text-white transition">

                    <x-heroicon-o-calculator class="w-5 h-5"/>

                    Generate Ranking

                </button>

            </div>


            {{-- ================= FILTER ================= --}}
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Tahun Ajaran --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">

                            Tahun Ajaran

                        </label>

                        <input
                            type="text"
                            readonly
                            value="{{ $tahunAktif?->tahun_ajaran ?? '-' }}"
                            class="w-full rounded-lg border-gray-300 bg-gray-100">

                    </div>


                    {{-- Semester --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">

                            Semester

                        </label>

                        <input
                            type="text"
                            readonly
                            value="{{ $tahunAktif?->semester ?? '-' }}"
                            class="w-full rounded-lg border-gray-300 bg-gray-100">

                    </div>


                    {{-- Kelas --}}
                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">

                            Kelas

                        </label>

                        <input
                            type="text"
                            readonly
                            value="{{ $kelasGuru->nama_kelas ?? '-' }}"
                            class="w-full rounded-lg border-gray-300 bg-gray-100">

                    </div>

                </div>

            </div>

        </div>


        {{-- ================= DATA RANKING ================= --}}
        <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">

            {{-- Header tabel --}}
            <div class="px-6 py-4 border-b bg-slate-50">

                <div class="flex items-center justify-between">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">

                            Data Ranking Siswa

                        </h3>

                        <p class="text-sm text-gray-500 mt-1">

                            Menampilkan

                            {{ $ranking->firstItem() ?? 0 }}

                            -

                            {{ $ranking->lastItem() ?? 0 }}

                            dari

                            {{ $ranking->total() }}

                            data ranking.

                        </p>

                    </div>

                    <span class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">

                        {{ $ranking->total() }} Data

                    </span>

                </div>

            </div>


            {{-- ================= TABEL ================= --}}
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr class="text-sm font-semibold text-gray-700">

                            <th class="border px-4 py-3 text-center">
                                No
                            </th>

                            <th class="border px-4 py-3 text-center">
                                NIPD
                            </th>

                            <th class="border px-4 py-3 text-center">
                                NISN
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Nama Siswa
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Kelas
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Nilai Akhir
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Kehadiran
                            </th>

                            <th class="border px-4 py-3 text-center">
                                Ranking
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100 bg-white">

                        @forelse($ranking as $item)

                            <tr class="hover:bg-slate-50 transition">

                                {{-- No --}}
                                <td class="border px-4 py-3 text-center">

                                    {{ $loop->iteration + ($ranking->firstItem() - 1) }}

                                </td>


                                {{-- NIPD --}}
                                <td class="border px-4 py-3 text-center">

                                    {{ $item->siswa->nipd ?? '-' }}

                                </td>


                                {{-- NISN --}}
                                <td class="border px-4 py-3 text-center">

                                    {{ $item->siswa->nisn ?? '-' }}

                                </td>


                                {{-- Nama --}}
                                <td class="border px-4 py-3 font-medium text-gray-800">

                                    {{ $item->siswa->nama_siswa ?? '-' }}

                                </td>


                                {{-- Kelas --}}
                                <td class="border px-4 py-3 text-center">

                                    {{ $item->kelas->nama_kelas ?? '-' }}

                                </td>


                                {{-- Nilai Akhir --}}
                                <td class="border px-4 py-3 text-center font-semibold text-blue-600">

                                    {{ number_format((float) $item->rata_rata, 2) }}

                                </td>


                                {{-- Kehadiran --}}
                                <td class="border px-4 py-3 text-center">

                                    @if($item->kehadiran >= 95)

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">

                                            {{ number_format($item->kehadiran, 1) }}%

                                        </span>

                                    @elseif($item->kehadiran >= 90)

                                        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                            {{ number_format($item->kehadiran, 1) }}%

                                        </span>

                                    @elseif($item->kehadiran >= 80)

                                        <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                            {{ number_format($item->kehadiran, 1) }}%

                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">

                                            {{ number_format($item->kehadiran, 1) }}%

                                        </span>

                                    @endif

                                </td>


                                {{-- Ranking --}}
                                <td class="border px-4 py-3 text-center">

                                    @if($item->ranking == 1)

                                        <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">

                                            🥇 Juara 1

                                        </span>

                                    @elseif($item->ranking == 2)

                                        <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">

                                            🥈 Juara 2

                                        </span>

                                    @elseif($item->ranking == 3)

                                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-100 px-3 py-1 text-xs font-semibold text-orange-700">

                                            🥉 Juara 3

                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">

                                            Ranking {{ $item->ranking }}

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="py-10 text-center text-gray-500">

                                    Belum ada data ranking siswa.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- ================= FOOTER TABEL ================= --}}
            <div class="px-6 py-4 border-t bg-white">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div class="text-sm text-gray-600">

                        Menampilkan

                        <span class="font-semibold">
                            {{ $ranking->firstItem() ?? 0 }}
                        </span>

                        -

                        <span class="font-semibold">
                            {{ $ranking->lastItem() ?? 0 }}
                        </span>

                        dari

                        <span class="font-semibold">
                            {{ $ranking->total() }}
                        </span>

                        data ranking

                    </div>


                    <div>

                        {{ $ranking->links('vendor.pagination.tailwind') }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ================= MODAL GENERATE ================= --}}

<div
    id="modalGenerate"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">

        {{-- Header Modal --}}
        <div class="px-6 py-5 border-b">

            <div class="flex items-center gap-3">

                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">

                    <x-heroicon-o-exclamation-triangle class="w-7 h-7 text-yellow-600"/>

                </div>

                <div>

                    <h2 class="text-xl font-bold text-gray-800">

                        Generate Ranking

                    </h2>

                    <p class="text-sm text-gray-500">

                        Konfirmasi proses generate ranking.

                    </p>

                </div>

            </div>

        </div>


        {{-- Isi Modal --}}
        <div class="px-6 py-5">

            <p class="text-gray-700 leading-relaxed">

                Sistem akan menghitung ulang ranking siswa berdasarkan

                <strong>rata-rata nilai akhir</strong>.

            </p>

            <div class="mt-4 rounded-lg bg-blue-50 border border-blue-200 p-4">

                <p class="text-sm text-blue-700">

                    <strong>Jika terdapat nilai rata-rata yang sama</strong>,

                    sistem akan menggunakan

                    <strong>skor absensi</strong>

                    sebagai penentu ranking.

                </p>

            </div>

        </div>


        {{-- Footer Modal --}}
        <div class="px-6 py-5 border-t flex justify-end gap-3">

            <button
                id="btnBatalGenerate"
                type="button"
                class="px-5 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                Batal

            </button>


            <form
                action="{{ route('ranking.generate') }}"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white">

                    Ya, Generate

                </button>

            </form>

        </div>

    </div>

</div>


{{-- ================= JAVASCRIPT ================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const btnGenerate = document.getElementById('btnGenerate');

    const btnBatalGenerate = document.getElementById('btnBatalGenerate');

    const modalGenerate = document.getElementById('modalGenerate');


    // Buka modal
    if (btnGenerate && modalGenerate) {

        btnGenerate.addEventListener('click', function () {

            modalGenerate.classList.remove('hidden');

            modalGenerate.classList.add('flex');

        });

    }


    // Tutup modal
    if (btnBatalGenerate && modalGenerate) {

        btnBatalGenerate.addEventListener('click', function () {

            modalGenerate.classList.add('hidden');

            modalGenerate.classList.remove('flex');

        });

    }


    // Tutup ketika klik area luar modal
    if (modalGenerate) {

        modalGenerate.addEventListener('click', function (event) {

            if (event.target === modalGenerate) {

                modalGenerate.classList.add('hidden');

                modalGenerate.classList.remove('flex');

            }

        });

    }

});

</script>

@endpush

@endsection

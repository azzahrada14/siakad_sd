@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-8">

    {{-- HEADER --}}
    <div class="bg-white rounded-2xl shadow border p-8 mb-6">

        <h1 class="text-3xl font-bold text-slate-800">
            Edit Absensi Siswa
        </h1>

        <p class="text-gray-500 mt-2">
            Perbarui status kehadiran siswa.
        </p>

    </div>

    <form
        action="{{ route('absensi.update',$absensi->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow border p-8">

            <h2 class="text-xl font-bold text-slate-700 mb-6">

                Informasi Absensi

            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Nama Siswa

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->siswa->nama_siswa }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- NIPD --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        NIPD

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->siswa->nipd }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Kelas --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Kelas

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->kelas->nama_kelas }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Mata Pelajaran --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Mata Pelajaran

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->mapel->nama_mapel }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Tahun --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Tahun Ajaran

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->tahunAjaran->tahun_ajaran }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Semester --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Semester

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $absensi->semester }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Tanggal --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Tanggal

                    </label>

                    <input
                        type="date"
                        readonly
                        value="{{ $absensi->tanggal }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Status --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Status Kehadiran

                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border-gray-300 focus:ring-blue-500">

                        <option value="hadir"
                            @selected($absensi->status=='hadir')>

                            🟢 Hadir

                        </option>

                        <option value="izin"
                            @selected($absensi->status=='izin')>

                            🟡 Izin

                        </option>

                        <option value="sakit"
                            @selected($absensi->status=='sakit')>

                            🔵 Sakit

                        </option>

                        <option value="alfa"
                            @selected($absensi->status=='alfa')>

                            🔴 Alfa

                        </option>

                    </select>

                </div>

            </div>

        </div>

        <div class="flex justify-end gap-3 mt-8">

            <a
                href="{{ route('absensi.index') }}"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gray-500 hover:bg-gray-600 text-white">

                <x-heroicon-o-arrow-left class="w-5 h-5"/>

                Kembali

            </a>

            <button
                type="submit"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white">

                <x-heroicon-o-check-circle class="w-5 h-5"/>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection
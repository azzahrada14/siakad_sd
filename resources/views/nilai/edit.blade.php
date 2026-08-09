@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-8">

    {{-- HEADER --}}
    <div class="bg-white rounded-2xl shadow border p-8 mb-6">

        <h1 class="text-3xl font-bold text-slate-800">

            Edit Nilai Siswa

        </h1>

        <p class="text-gray-500 mt-2">

            Perbarui nilai akademik siswa.

        </p>

    </div>

    <form
        action="{{ route('nilai.update',$nilai->id) }}"
        method="POST">

        @csrf
        @method('PUT')
        <input type="hidden" name="mapel_id" value="{{ $nilai->mapel_id }}">
<input type="hidden" name="tahun_ajaran_id" value="{{ $nilai->tahun_ajaran_id }}">
<input type="hidden" name="semester" value="{{ $nilai->semester }}">

@if(Auth::user()->guru->jenis_pengajar == 'Wali Kelas')
    <input type="hidden" name="kelas_id" value="{{ Auth::user()->guru->waliKelas->id }}">
@endif

        <div class="bg-white rounded-2xl shadow border p-8">

            <h2 class="text-xl font-bold text-slate-700 mb-6">

                Informasi Nilai

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
                        value="{{ $nilai->siswa->nama_siswa }}"
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
                        value="{{ $nilai->siswa->nipd }}"
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
                        value="{{ $nilai->mapel->nama_mapel }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

                {{-- Tahun Ajaran --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Tahun Ajaran

                    </label>

                    <input
                        type="text"
                        readonly
                        value="{{ $nilai->tahunAjaran->tahun_ajaran }}"
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
                        value="{{ $nilai->semester }}"
                        class="w-full rounded-xl bg-gray-100 border-gray-300">

                </div>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow border p-8 mt-6">

            <h2 class="text-xl font-bold text-slate-700 mb-6">

                Nilai Akademik

            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Tugas --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Nilai Tugas

                    </label>

                    <input
                        type="number"
                        name="tugas"
                        min="0"
                        max="100"
                        value="{{ old('tugas',$nilai->tugas) }}"
                        class="w-full rounded-xl border-gray-300">

                </div>

                {{-- UTS --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Nilai UTS

                    </label>

                    <input
                        type="number"
                        name="uts"
                        min="0"
                        max="100"
                        value="{{ old('uts',$nilai->uts) }}"
                        class="w-full rounded-xl border-gray-300">

                </div>

                {{-- UAS --}}
                <div>

                    <label class="block text-sm font-semibold mb-2">

                        Nilai UAS

                    </label>

                    <input
                        type="number"
                        name="uas"
                        min="0"
                        max="100"
                        value="{{ old('uas',$nilai->uas) }}"
                        class="w-full rounded-xl border-gray-300">

                </div>

            </div>

            {{-- Deskripsi --}}
            <div class="mt-6">

                <label class="block text-sm font-semibold mb-2">

                    Deskripsi

                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="w-full rounded-xl border-gray-300">{{ old('deskripsi',$nilai->deskripsi) }}</textarea>

            </div>

            {{-- Nilai Akhir --}}
            <div class="mt-6">

                <label class="block text-sm font-semibold mb-2">

                    Nilai Akhir Saat Ini

                </label>

                <input
                    type="text"
                    readonly
                    value="{{ $nilai->nilai_akhir }}"
                    class="w-full rounded-xl bg-green-100 border-green-300 font-bold text-green-700">

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-3 mt-8">

            <a
             href="{{ route('nilai.index', [
    'kelas' => Auth::user()->guru->waliKelas?->id,
    'mapel' => $nilai->mapel_id
]) }}"
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
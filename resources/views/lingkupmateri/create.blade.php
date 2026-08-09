@extends('layouts.app')

@section('content')

<div class="mb-6">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Tambah Lingkup Materi
        </h1>

        <p class="text-gray-500 mt-1">
            Tambahkan data Lingkup Materi baru.
        </p>
    </div>

    {{-- Tahun Ajaran Aktif --}}
    @if($tahunAktif)
        <div class="mt-5 bg-blue-50 border border-blue-200 rounded-2xl px-6 py-4 max-w-md">

            <p class="text-xs uppercase tracking-widest text-blue-600 font-semibold">
                Tahun Ajaran Aktif
            </p>

            <h2 class="text-3xl font-bold text-blue-700 mt-1">
                {{ $tahunAktif->tahun_ajaran }}
            </h2>

            <div class="flex justify-between items-center mt-3">

                <span class="text-gray-600">
                    Semester {{ $tahunAktif->semester }}
                </span>

                <span class="bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full">
                    Aktif
                </span>

            </div>

        </div>
    @endif

</div>


{{-- Card Form --}}
<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- Header Card --}}
    <div class="px-6 py-5 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-slate-800">
            Informasi Lingkup Materi
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Lengkapi data Lingkup Materi di bawah ini.
        </p>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('lingkup-materi.store') }}"
        method="POST">

        @csrf

        {{-- Tahun Ajaran --}}
        <input
            type="hidden"
            name="tahun_ajaran_id"
            value="{{ $tahunAktif->id }}">


        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Mata Pelajaran --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <select
                        name="mapel_id"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option value="">
                            -- Pilih Mata Pelajaran --
                        </option>

                        @foreach($mapels as $mapel)

                            <option
                                value="{{ $mapel->id }}"
                                {{ old('mapel_id', $mapelId) == $mapel->id ? 'selected' : '' }}>

                                {{ $mapel->nama_mapel }}

                            </option>

                        @endforeach

                    </select>

                    @error('mapel_id')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Tingkat --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tingkat
                    </label>

                    <select
                        name="tingkat"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option value="">
                            -- Pilih Tingkat --
                        </option>

                        @for($i = 1; $i <= 6; $i++)

                            <option
                                value="{{ $i }}"
                                {{ old('tingkat', $tingkat ?? '') == $i ? 'selected' : '' }}>

                                Kelas {{ $i }}

                            </option>

                        @endfor

                    </select>

                    @error('tingkat')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="text-xs text-gray-500 mt-1">
                        Tingkat yang sama digunakan untuk seluruh rombel,
                        misalnya 3A dan 3B.
                    </p>

                </div>


                {{-- Kode LM --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Lingkup Materi
                    </label>

                    <input
                        type="text"
                        name="kode_lm"
                        value="{{ old('kode_lm') }}"
                        required
                        placeholder="Contoh: 1"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('kode_lm')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Semester --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Semester
                    </label>

                    <input
                        type="text"
                        value="{{ $tahunAktif->semester }}"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly>

                    <input
                        type="hidden"
                        name="semester"
                        value="{{ $tahunAktif->semester }}">

                    @error('semester')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Nama LM --}}
                <div class="md:col-span-2">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lingkup Materi
                    </label>

                    <input
                        type="text"
                        name="nama_lm"
                        value="{{ old('nama_lm') }}"
                        required
                        placeholder="Contoh: BAB 1 AYO, MAIN!"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('nama_lm')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Status --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option
                            value="Aktif"
                            {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="px-6 py-5 border-t bg-slate-50">

            <div class="flex justify-end gap-3">

                {{-- Batal --}}
                <a
                    href="{{ route('lingkup-materi.index', [
                        'mapel' => $mapelId,
                        'tingkat' => $tingkat
                    ]) }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                    <x-heroicon-o-x-mark class="w-5 h-5"/>

                    Batal

                </a>


                {{-- Simpan --}}
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection
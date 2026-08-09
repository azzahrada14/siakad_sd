@extends('layouts.app')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<div class="mb-6">

    <h1 class="text-3xl font-bold text-slate-800">
        Tambah Tujuan Pembelajaran
    </h1>

    <p class="text-gray-500 mt-1">
        Tambahkan data Tujuan Pembelajaran berdasarkan Lingkup Materi.
    </p>

</div>


{{-- =========================================================
    CARD
========================================================= --}}
<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- Header Card --}}
    <div class="px-6 py-5 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-slate-800">
            Informasi Tujuan Pembelajaran
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Lengkapi data Tujuan Pembelajaran di bawah ini.
        </p>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('tujuan-pembelajaran.store') }}"
        method="POST">

        @csrf


        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- =================================================
                    TINGKAT
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tingkat
                    </label>

                    <input
                        type="text"
                        value="{{ $lingkupMateri ? 'Kelas ' . $lingkupMateri->tingkat : '-' }}"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly
                    >

                    <p class="text-xs text-gray-500 mt-1">
                        TP mengikuti tingkat dari Lingkup Materi.
                    </p>

                </div>


                {{-- =================================================
                    MATA PELAJARAN
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        value="{{ $lingkupMateri?->mapel?->nama_mapel ?? '-' }}"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly
                    >

                </div>


                {{-- =================================================
                    LINGKUP MATERI
                ================================================== --}}
                <div class="md:col-span-2">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Lingkup Materi
                    </label>

                    <select
                        name="lingkup_materi_id"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option value="">
                            -- Pilih Lingkup Materi --
                        </option>

                        @foreach($lingkupMateris as $lm)

                            <option
                                value="{{ $lm->id }}"
                                {{ old(
                                    'lingkup_materi_id',
                                    $lingkupMateriId
                                ) == $lm->id ? 'selected' : '' }}
                            >

                                {{ $lm->kode_lm }}
                                -
                                {{ $lm->nama_lm }}

                            </option>

                        @endforeach

                    </select>

                    @error('lingkup_materi_id')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                    @if($lingkupMateri)

                        <p class="text-xs text-gray-500 mt-1">
                            LM yang ditampilkan berada pada
                            <strong>Kelas {{ $lingkupMateri->tingkat }}</strong>,
                            mata pelajaran
                            <strong>{{ $lingkupMateri->mapel?->nama_mapel ?? '-' }}</strong>.
                        </p>

                    @endif

                </div>


                {{-- =================================================
                    TP KE
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        TP Ke-
                    </label>

                    <input
                        type="number"
                        name="urutan"
                        value="{{ old('urutan') }}"
                        min="1"
                        required
                        placeholder="Misal: 1"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('urutan')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                    <p class="text-xs text-gray-500 mt-1">
                        Kode TP akan dibuat otomatis, misalnya TP01.
                    </p>

                </div>


                {{-- =================================================
                    JUMLAH JP
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah JP
                    </label>

                    <input
                        type="number"
                        name="jumlah_jp"
                        value="{{ old('jumlah_jp') }}"
                        min="1"
                        required
                        placeholder="Misal: 4"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('jumlah_jp')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- =================================================
                    STATUS
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option
                            value="Aktif"
                            {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old('status') == 'Nonaktif' ? 'selected' : '' }}
                        >
                            Nonaktif
                        </option>

                    </select>

                </div>


                {{-- =================================================
                    SEMESTER
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Semester
                    </label>

                    <input
                        type="text"
                        value="{{ $lingkupMateri?->semester ?? $tahunAktif?->semester ?? '-' }}"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly
                    >

                </div>


                {{-- =================================================
                    DESKRIPSI
                ================================================== --}}
                <div class="md:col-span-2">

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Tujuan Pembelajaran
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="5"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Masukkan deskripsi tujuan pembelajaran..."
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>


        {{-- =========================================================
            FOOTER
        ========================================================= --}}
        <div class="px-6 py-5 border-t bg-slate-50">

            <div class="flex justify-end gap-3">


                {{-- Batal --}}
                <a
                    href="{{ $lingkupMateri
                        ? route('tujuan-pembelajaran.index', [
                            'lingkup_materi' => $lingkupMateri->id
                        ])
                        : url()->previous()
                    }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white"
                >

                    <x-heroicon-o-x-mark class="w-5 h-5"/>

                    Batal

                </a>


                {{-- Simpan --}}
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white"
                >

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection
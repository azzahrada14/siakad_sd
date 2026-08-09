@extends('layouts.app')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<div class="mb-6">

    <h1 class="text-3xl font-bold text-slate-800">
        Edit Tujuan Pembelajaran
    </h1>

    <p class="text-gray-500 mt-1">
        Perbarui data Tujuan Pembelajaran.
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
            Perbarui data Tujuan Pembelajaran di bawah ini.
        </p>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('tujuan-pembelajaran.update', $tujuanPembelajaran->id) }}"
        method="POST">

        @csrf
        @method('PUT')


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
                        value="Kelas {{ $lingkupMateri->tingkat }}"
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
                        value="{{ $lingkupMateri->mapel->nama_mapel ?? '-' }}"
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

                        @foreach($lingkupMateris as $lm)

                            <option
                                value="{{ $lm->id }}"
                                {{ old(
                                    'lingkup_materi_id',
                                    $tujuanPembelajaran->lingkup_materi_id
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

                    <p class="text-xs text-gray-500 mt-1">
                        Hanya Lingkup Materi dengan mata pelajaran,
                        tingkat, tahun ajaran, dan semester yang sama
                        yang ditampilkan.
                    </p>

                </div>


                {{-- =================================================
                    KODE TP
                ================================================== --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode TP
                    </label>

                    <input
                        type="text"
                        value="{{ $tujuanPembelajaran->kode_tp }}"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly
                    >

                    <p class="text-xs text-gray-500 mt-1">
                        Kode TP mengikuti nomor urutan.
                    </p>

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
                        min="1"
                        required
                        value="{{ old(
                            'urutan',
                            $tujuanPembelajaran->urutan
                        ) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                    @error('urutan')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

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
                        min="1"
                        required
                        value="{{ old(
                            'jumlah_jp',
                            $tujuanPembelajaran->jumlah_jp
                        ) }}"
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
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                        <option
                            value="Aktif"
                            {{ old(
                                'status',
                                $tujuanPembelajaran->status
                            ) == 'Aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old(
                                'status',
                                $tujuanPembelajaran->status
                            ) == 'Nonaktif' ? 'selected' : '' }}
                        >
                            Nonaktif
                        </option>

                    </select>

                    @error('status')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

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
                    >{{ old(
                        'deskripsi',
                        $tujuanPembelajaran->deskripsi
                    ) }}</textarea>

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
                    href="{{ route(
                        'tujuan-pembelajaran.index',
                        [
                            'lingkup_materi'
                                => $tujuanPembelajaran->lingkup_materi_id
                        ]
                    ) }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white"
                >

                    <x-heroicon-o-x-mark class="w-5 h-5"/>

                    Batal

                </a>


                {{-- Update --}}
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white"
                >

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Update

                </button>

            </div>

        </div>

    </form>

</div>

@endsection
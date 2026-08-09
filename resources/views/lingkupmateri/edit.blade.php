@extends('layouts.app')

@section('content')

<div class="mb-6">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Edit Lingkup Materi
        </h1>

        <p class="text-gray-500 mt-1">
            Perbarui data lingkup materi.
        </p>
    </div>

</div>


{{-- Card Form --}}
<div class="bg-white rounded-xl shadow border border-gray-200">

    {{-- Header Card --}}
    <div class="px-6 py-5 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-slate-800">
            Informasi Lingkup Materi
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Lengkapi data di bawah ini.
        </p>

    </div>


    {{-- Form --}}
    <form
        action="{{ route('lingkup-materi.update', $lingkupMateri->id) }}"
        method="POST">

        @csrf
        @method('PUT')


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

                        @foreach($mapels as $mapel)

                            <option
                                value="{{ $mapel->id }}"
                                {{ old('mapel_id', $lingkupMateri->mapel_id) == $mapel->id ? 'selected' : '' }}>

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

                        @for($i = 1; $i <= 6; $i++)

                            <option
                                value="{{ $i }}"
                                {{ old('tingkat', $lingkupMateri->tingkat) == $i ? 'selected' : '' }}>

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
                        Tingkat berlaku untuk seluruh rombel pada tingkat tersebut,
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
                        value="{{ old('kode_lm', $lingkupMateri->kode_lm) }}"
                        required
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

                    <select
                        name="semester"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                        <option
                            value="Ganjil"
                            {{ old('semester', $lingkupMateri->semester) == 'Ganjil' ? 'selected' : '' }}>
                            Ganjil
                        </option>

                        <option
                            value="Genap"
                            {{ old('semester', $lingkupMateri->semester) == 'Genap' ? 'selected' : '' }}>
                            Genap
                        </option>

                    </select>

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
                        value="{{ old('nama_lm', $lingkupMateri->nama_lm) }}"
                        required
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('nama_lm')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Urutan --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Urutan
                    </label>

                    <input
                        type="number"
                        name="urutan"
                        value="{{ old('urutan', $lingkupMateri->urutan) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    @error('urutan')
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
                            {{ old('status', $lingkupMateri->status) == 'Aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option
                            value="Nonaktif"
                            {{ old('status', $lingkupMateri->status) == 'Nonaktif' ? 'selected' : '' }}>
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
                        'mapel' => $lingkupMateri->mapel_id,
                        'tingkat' => $lingkupMateri->tingkat
                    ]) }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                    <x-heroicon-o-x-mark class="w-5 h-5"/>

                    Batal

                </a>


                {{-- Update --}}
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Update

                </button>

            </div>

        </div>

    </form>

</div>

@endsection
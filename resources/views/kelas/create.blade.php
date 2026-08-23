@extends('layouts.app')

@section('content')

<div class="p-6 py-8 bg-gray-100 flex justify-center">

    <div class="w-full max-w-3xl bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Data Kelas
        </h2>

        @if($errors->any())
            <div class="mb-6 rounded-lg bg-red-100 border border-red-300 p-4 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        

    @csrf

    <form action="{{ route('kelas.store') }}" method="POST">

    @csrf

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ request('tahun_ajaran_id', $tahunAjaran->id ?? '') }}"
    >

    <div class="grid md:grid-cols-2 gap-6">
                {{-- Nama Kelas --}}
                <div>
                    <label class="block text-sm font-medium mb-2">
                        Nama Kelas
                    </label>

                    <input
                        type="text"
                        name="nama_kelas"
                        value="{{ old('nama_kelas') }}"
                        placeholder="Contoh : 1A"
                        class="w-full rounded-lg border-gray-300"
                        required>
                </div>

                {{-- Tingkat --}}
                <div>
                    <label class="block text-sm font-medium mb-2">
                        Tingkat
                    </label>

                    <select
                        name="tingkat"
                        class="w-full rounded-lg border-gray-300"
                        required>

                        @for($i=1;$i<=6;$i++)
                            <option value="{{ $i }}">
                                {{ $i }}
                            </option>
                        @endfor

                    </select>
                </div>

                {{-- Wali Kelas --}}
                <div class="md:col-span-2">

                    <label class="block text-sm font-medium mb-2">
                        Wali Kelas
                    </label>

                    <select
                        name="wali_kelas_id"
                        class="w-full rounded-lg border-gray-300">

                        <option value="">
                            Belum Ditentukan
                        </option>

                        @foreach($guru as $g)

                            <option
                                value="{{ $g->id }}"
                                {{ old('wali_kelas_id') == $g->id ? 'selected' : '' }}>

                                {{ $g->nama_guru }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Ruang Kelas --}}
                <div>

                    <label class="block text-sm font-medium mb-2">
                        Ruang Kelas
                    </label>

                    <input
                        type="text"
                        name="ruang_kelas"
                        value="{{ old('ruang_kelas') }}"
                        placeholder="Contoh : R01"
                        class="w-full rounded-lg border-gray-300">

                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a
    href="{{ route('kelas.index', [
        'tahun_ajaran_id' => request('tahun_ajaran_id', $tahunAjaran->id ?? '')
    ]) }}"
    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white"
>
                    <x-heroicon-o-arrow-left class="w-5 h-5"/>

                    Kembali

                </a>

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
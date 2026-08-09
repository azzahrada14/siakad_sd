@extends('layouts.app')

@section('content')

<div class="py-6">

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4 mb-6">

            <div>

                <h1 class="text-3xl font-bold text-slate-800">

                    Tambah Master Ekstrakurikuler

                </h1>

                <p class="text-gray-500 mt-1">

                    Tambahkan data master ekstrakurikuler yang akan digunakan pada sistem.

                </p>

            </div>

            @if($tahunAktif)

            <div class="mt-5 lg:mt-0">

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

        <div class="bg-white rounded-xl shadow border border-gray-200">

            <div class="px-6 py-5 border-b bg-slate-50">

                <h2 class="text-lg font-semibold text-slate-800">

                    Informasi Master Ekstrakurikuler

                </h2>

                <p class="text-sm text-gray-500 mt-1">

                    Lengkapi data master ekstrakurikuler di bawah ini.

                </p>

            </div>

            <form
                action="{{ route('master-ekstrakurikuler.store') }}"
                method="POST">

                @csrf

                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Nama Ekstrakurikuler --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">

                                Nama Ekstrakurikuler

                            </label>

                            <input
                                type="text"
                                name="nama_ekstrakurikuler"
                                value="{{ old('nama_ekstrakurikuler') }}"
                                class="w-full rounded-lg border-gray-300"
                                placeholder="Contoh : Pramuka">

                            @error('nama_ekstrakurikuler')

                            <p class="text-red-500 text-sm mt-2">

                                {{ $message }}

                            </p>

                            @enderror

                        </div>

                        {{-- Pembina --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">

                                Pembina

                            </label>

                            <input
                                type="text"
                                name="pembina"
                                value="{{ old('pembina') }}"
                                class="w-full rounded-lg border-gray-300"
                                placeholder="Nama Pembina">

                            @error('pembina')

                            <p class="text-red-500 text-sm mt-2">

                                {{ $message }}

                            </p>

                            @enderror

                        </div>

                        {{-- Wajib --}}
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-2">

                                Ekstrakurikuler Wajib

                            </label>

                            <select
                                name="wajib"
                                class="w-full rounded-lg border-gray-300">

                                <option value="1">

                                    Ya

                                </option>

                                <option value="0">

                                    Tidak

                                </option>

                            </select>

                        </div>

                        {{-- Status --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium text-gray-700 mb-2">

                                Status

                            </label>

                            <select
                                name="status"
                                class="w-full rounded-lg border-gray-300">

                                <option value="Aktif">

                                    Aktif

                                </option>

                                <option value="Nonaktif">

                                    Nonaktif

                                </option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="px-6 py-5 border-t bg-slate-50">

                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('master-ekstrakurikuler.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

                            <x-heroicon-o-x-mark class="w-5 h-5"/>

                            Batal

                        </a>

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

    </div>

</div>

@endsection
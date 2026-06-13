@extends('layouts.app')

@section('content')

<div class="py-10">

    <div class="max-w-4xl mx-auto px-6">

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-lg p-8">

            {{-- TITLE --}}
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800">

                    Edit Kelas

                </h1>

                <p class="text-gray-500 mt-2">

                    Edit data kelas dan wali kelas.

                </p>

            </div>

            {{-- ALERT SUCCESS --}}
            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-300
                text-green-700 px-4 py-3 rounded-xl">

                    {{ session('success') }}

                </div>

            @endif

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="mb-6 bg-red-100 border border-red-300
                text-red-700 px-4 py-3 rounded-xl">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- FORM --}}
            <form action="{{ route('kelas.update', $kelas->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- NAMA KELAS --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                    text-gray-700 mb-2">

                        Nama Kelas

                    </label>

                    <input type="text"
                           name="edit_kelas"
                           value="{{ old('edit_kelas', $kelas->edit_kelas) }}"
                           class="w-full border border-gray-300 rounded-xl
                           px-4 py-3 focus:ring-2 focus:ring-blue-400
                           focus:outline-none"
                           required>

                </div>

                {{-- TINGKAT --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold
                    text-gray-700 mb-2">

                        Tingkat Kelas

                    </label>

                    <input type="text"
                           name="tingkat_kelas"
                           value="{{ old('tingkat_kelas', $kelas->tingkat_kelas) }}"
                           class="w-full border border-gray-300 rounded-xl
                           px-4 py-3 focus:ring-2 focus:ring-blue-400
                           focus:outline-none"
                           required>

                </div>

                {{-- WALI KELAS --}}
                <div class="mb-8">

                    <label class="block text-sm font-semibold
                    text-gray-700 mb-2">

                        Wali Kelas

                    </label>

                    <select name="wali_kelas_id"
                            class="w-full border border-gray-300 rounded-xl
                            px-4 py-3 focus:ring-2 focus:ring-blue-400
                            focus:outline-none">

                        <option value="">

                            -- Pilih Wali Kelas --

                        </option>

                        @foreach($guru as $g)

                            <option value="{{ $g->id }}"
                                {{ $kelas->wali_kelas_id == $g->id ? 'selected' : '' }}>

                                {{ $g->nama_guru }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- BUTTON --}}
                <div class="flex items-center gap-3">

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700
                            text-white px-6 py-3 rounded-xl
                            shadow-md transition">

                        Update

                    </button>

                    <a href="{{ route('kelas.index') }}"
                       class="bg-gray-500 hover:bg-gray-600
                       text-white px-6 py-3 rounded-xl
                       shadow-md transition">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
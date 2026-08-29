@extends('layouts.app')

@section('content')

<div class="py-6">

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

{{-- NOTIFIKASI --}}

@if(session('success'))
    <div class="mb-6 rounded-lg bg-green-50 border border-green-200
                px-4 py-3 text-green-700">
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="mb-6 rounded-lg bg-yellow-50 border border-yellow-200
                px-4 py-3 text-yellow-700">
        {{ session('warning') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-6 rounded-lg bg-red-50 border border-red-200
                px-4 py-3 text-red-700">
        {{ session('error') }}
    </div>
@endif


{{-- HEADER --}}

<div class="flex justify-between items-start mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Tambah Mata Pelajaran
        </h1>

        <p class="text-gray-500 mt-1">
            Tambahkan data mata pelajaran SD Negeri Cimanahayu.
        </p>

    </div>

</div>


{{-- CARD --}}

<div class="bg-white rounded-xl shadow border border-gray-200">

    <div class="px-6 py-5 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-slate-800">
            Informasi Mata Pelajaran
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Pilih mata pelajaran. Data lainnya akan ditentukan otomatis
            oleh sistem.
        </p>

    </div>


    <form
        action="{{ route('mapel.store') }}"
        method="POST">

        @csrf


        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                {{-- KODE MAPEL --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Mata Pelajaran
                    </label>

                    <input
                        type="text"
                        id="kode_mapel"
                        class="w-full rounded-lg border-gray-300
                               bg-gray-100 text-gray-600"
                        placeholder="Kode otomatis"
                        readonly>

                    <p class="text-xs text-gray-400 mt-2">
                        Kode mata pelajaran ditentukan otomatis oleh sistem.
                    </p>

                </div>


                {{-- NAMA MAPEL --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Nama Mata Pelajaran

                        <span class="text-red-500">*</span>

                    </label>

                  <select
    name="nama_mapel"
    id="nama_mapel"
    class="w-full rounded-lg border-gray-300 bg-white text-gray-900
           focus:ring-blue-500 focus:border-blue-500">

                        <option value="">
                            -- Pilih Mata Pelajaran --
                        </option>
@foreach($masterMapels as $mapel)

    <option
        value="{{ $mapel->id }}"
        data-kode="{{ $mapel->kode_mapel }}"
        data-kategori="{{ $mapel->kategori_mapel_id }}"
        data-jenis="{{ $mapel->jenis }}"
        data-kelompok="{{ $mapel->kelompok }}"
        class="text-gray-900 bg-white">

        {{ $mapel->nama_mapel }}

    </option>

@endforeach



                    </select>

                    @error('nama_mapel')

                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- KATEGORI --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Kategori Mata Pelajaran

                    </label>

                    <input
                        type="text"
                        id="kategori_mapel"
                        class="w-full rounded-lg border-gray-300
                               bg-gray-100 text-gray-600"
                        placeholder="Otomatis"
                        readonly>

                </div>


                {{-- JENIS --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Jenis

                    </label>

                    <input
                        type="text"
                        id="jenis"
                        class="w-full rounded-lg border-gray-300
                               bg-gray-100 text-gray-600"
                        placeholder="Otomatis"
                        readonly>

                </div>


                {{-- KELOMPOK --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Kelompok

                    </label>

                    <input
                        type="text"
                        id="kelompok"
                        class="w-full rounded-lg border-gray-300
                               bg-gray-100 text-gray-600"
                        placeholder="Otomatis"
                        readonly>

                </div>


                {{-- KKM --}}

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        KKM

                    </label>

                    <input
    type="number"
    name="kkm"
    id="kkm"
    value="{{ old('kkm') }}"
    min="0"
    max="100"
    class="w-full rounded-lg border-gray-300
           focus:ring-blue-500 focus:border-blue-500"
    placeholder="Masukkan KKM">

    <p class="text-xs text-gray-400 mt-2">
    KKM dapat berbeda sesuai tahun ajaran.
</p>

                </div>


            </div>

        </div>


        {{-- FOOTER --}}

        <div class="px-6 py-5 border-t bg-slate-50">

            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('mapel.index') }}"
                    class="inline-flex items-center gap-2 px-6 py-3
                           rounded-lg bg-gray-500 hover:bg-gray-600
                           text-white">

                    <x-heroicon-o-x-mark class="w-5 h-5"/>

                    Batal

                </a>


                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-3
                           rounded-lg bg-blue-600 hover:bg-blue-700
                           text-white">

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

</div>

</div>


{{-- DATA KATEGORI UNTUK JAVASCRIPT --}}

<script>

    const kategoriMapels = @json(
        $kategoriMapels->keyBy('id')
    );


    const selectMapel = document.getElementById('nama_mapel');

    const kodeMapel = document.getElementById('kode_mapel');

    const kategoriMapel = document.getElementById('kategori_mapel');

    const jenis = document.getElementById('jenis');

    const kelompok = document.getElementById('kelompok');

    const kkm = document.getElementById('kkm');


    function tampilkanDataMapel() {

        const option =
            selectMapel.options[selectMapel.selectedIndex];


        if (!option || !option.value) {

            kodeMapel.value = '';
            kategoriMapel.value = '';
            jenis.value = '';
            kelompok.value = '';
            kkm.value = '';

            return;
        }


        // KODE

        kodeMapel.value =
            option.dataset.kode || '';


        // KATEGORI

        const kategoriId =
            option.dataset.kategori;


        if (kategoriMapels[kategoriId]) {

            const kategori =
                kategoriMapels[kategoriId];

            kategoriMapel.value =
                kategori.kode_kategori +
                ' - ' +
                kategori.nama_kategori;

        } else {

            kategoriMapel.value =
                'Kategori tidak ditemukan';

        }


        // JENIS

        jenis.value =
            option.dataset.jenis || '';


        // KELOMPOK

        kelompok.value =
            option.dataset.kelompok || '';


        
    }


    selectMapel.addEventListener(
        'change',
        tampilkanDataMapel
    );


    // Jalankan saat halaman pertama kali dibuka
    tampilkanDataMapel();

</script>

@endsection
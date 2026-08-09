@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">

    {{-- Header --}}
    <div>

        <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

            <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600"/>

            Input Ekstrakurikuler

        </h2>

        <p class="mt-2 text-gray-500">

            Kelola Data ekstrakurikuler siswa berdasarkan kelas dan semester.

        </p>

    </div>

    {{-- Tahun Aktif --}}
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

{{-- Filter --}}
<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-5 border-b bg-slate-50">

        <h3 class="text-lg font-semibold text-gray-800">

            Filter Data

        </h3>

        <p class="text-sm text-gray-500 mt-1">

            Pilih kelas dan semester untuk menampilkan data siswa.

        </p>

    </div>

    <form
        action="{{ route('ekstrakurikuler.index') }}"
        method="GET">

        <div class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- Kelas --}}
                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">

                        Kelas

                    </label>

                    <select
                        name="kelas_id"
                        class="w-full rounded-lg border-gray-300">

                        <option value="">

                            -- Pilih Kelas --

                        </option>

                        

                        @foreach($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ request('kelas_id')==$item->id ? 'selected':'' }}>

                            {{ $item->nama_kelas }}

                        </option>

                        @endforeach

                    </select>

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

</div>

                {{-- Tombol --}}
                <div class="flex items-end gap-3">

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                        <x-heroicon-o-funnel class="w-5 h-5"/>

                        Tampilkan Data

                    </button>

                    @if(auth()->user()->role=='operator')

                    <a
                        href="{{ route('master-ekstrakurikuler.index') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-slate-700 hover:bg-slate-800 text-white rounded-lg">

                        <x-heroicon-o-cog-6-tooth class="w-5 h-5"/>

                        Master

                    </a>

                    @endif

                </div>

            </div>

        </div>

    </form>

</div>

{{-- Data Siswa --}}
<div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">

    <div class="px-6 py-5 border-b bg-slate-50">

        <h3 class="text-lg font-semibold text-gray-800">

            Daftar Siswa

        </h3>

        <p class="text-sm text-gray-500 mt-1">

            Klik tombol <strong>Kelola</strong> untuk menginput nilai ekstrakurikuler.

        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

                <tr>

                    <th class="border px-4 py-3 text-center">No</th>

                    <th class="border px-4 py-3 text-center">NISN</th>

                    <th class="border px-4 py-3 text-center">Nama Siswa</th>

                    <th class="border px-4 py-3 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($siswas as $item)

                <tr>

                    <td class="border px-4 py-3 text-center">

                        {{ $loop->iteration }}

                    </td>

            <td class="border px-4 py-3 text-center">

    {{ $item->nisn }}

</td>

                    <td class="border px-4 py-3 font-medium text-center">

                        {{ $item->nama_siswa }}

                    </td>

                    <td class="border px-4 py-3 text-center">

                  <button
    type="button"
    class="btn-modal inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white"

    data-id="{{ $item->id }}"

    data-nama="{{ $item->nama_siswa }}"

    data-tahun="{{ $tahunAktif->id }}"

    data-semester="{{ request('semester') }}">

    <x-heroicon-o-pencil-square class="w-5 h-5"/>

    Kelola

</button>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="4"
                        class="py-10 text-center text-gray-500">

                        Pilih kelas dan semester terlebih dahulu.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

{{-- Modal Input Ekstrakurikuler --}}
<div
    id="modalEkstrakurikuler"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl w-full max-w-5xl max-h-[90vh] overflow-y-auto">

        {{-- Header --}}
        <div class="px-6 py-5 border-b bg-slate-50 flex justify-between items-center">

            <div>

                <h3 class="text-xl font-bold text-slate-800">

                    Input Ekstrakurikuler

                </h3>

                <p class="text-gray-500 text-sm mt-1">

                    Lengkapi Data ekstrakurikuler siswa.

                </p>

            </div>

            <button
                type="button"
                id="closeModal"
                class="text-gray-500 hover:text-red-600">

                <x-heroicon-o-x-mark class="w-7 h-7"/>

            </button>

        </div>

        {{-- Form --}}
        <form
            action="{{ route('ekstrakurikuler.store') }}"
            method="POST">

            @csrf

            <input
                type="hidden"
                name="siswa_id"
                id="siswa_id">

            <input
                type="hidden"
                name="tahun_ajaran_id"
                value="{{ $tahunAktif->id }}">

            <input
                type="hidden"
                name="semester"
                value="{{ request('semester') }}">

            <div class="p-6">

                {{-- Nama Siswa --}}
                <div class="mb-6">

                    <label class="block text-sm font-semibold text-gray-700 mb-2">

                        Nama Siswa

                    </label>

                    <input
                        type="text"
                        id="nama_siswa"
                        class="w-full rounded-lg border-gray-300 bg-gray-100"
                        readonly>

                </div>

                {{-- Daftar Ekstrakurikuler --}}
                <div class="space-y-6">

                    @foreach($masterEkstrakurikuler as $i => $item)

                    <div class="ekskul-item border rounded-xl p-5">

                        <div class="flex items-center gap-3 mb-4">

                            <input
                                type="checkbox"
                                name="ekstrakurikuler[{{ $i }}][dipilih]"
                                value="1"

                                @if($item->wajib)

                                checked
                                onclick="return false"

                                @endif

                                class="rounded">

                       <input
    type="hidden"
    class="master-id"
    name="ekstrakurikuler[{{ $i }}][master_id]"
    value="{{ $item->id }}">

                            <span class="font-semibold text-gray-800">

                                {{ $item->nama_ekstrakurikuler }}

                            </span>

                            @if($item->wajib)

                            <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 text-xs">

                                Wajib

                            </span>

                            @endif

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                

                            {{-- Deskripsi --}}
                            <div>

                                <label class="block text-sm font-medium text-gray-700 mb-2">

                                   Catatan Guru

                                </label>

                                <textarea
                                    name="ekstrakurikuler[{{ $i }}][catatan_guru]"
                                    rows="2"
                                    class="w-full rounded-lg border-gray-300"
                                    placeholder="Masukkan catatan guru..."></textarea>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

            <div class="px-6 py-5 border-t bg-slate-50 flex justify-end gap-3">

                <button
                    type="button"
                    id="btnBatal"
                    class="px-6 py-3 bg-gray-500 hover:bg-gray-600 rounded-lg text-white">

                    Batal

                </button>

                <button
                    type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('modalEkstrakurikuler');

    const closeModal = document.getElementById('closeModal');

    const btnBatal = document.getElementById('btnBatal');

    const siswaId = document.getElementById('siswa_id');

    const namaSiswa = document.getElementById('nama_siswa');

    // Buka Modal
    document.querySelectorAll('.btn-modal').forEach(function(button){

        button.addEventListener('click', function(){

            siswaId.value = this.dataset.id;

            namaSiswa.value = this.dataset.nama;

            fetch(
    '/ekstrakurikuler/' +
    this.dataset.id +
    '/data?tahun_ajaran_id=' +
    this.dataset.tahun +
    '&semester=' +
    this.dataset.semester
)
.then(res => res.json())
.then(data => {

    console.log(data);

    document
        .querySelectorAll(
            '#modalEkstrakurikuler input[type=checkbox]'
        )
        .forEach(function(c){

            c.checked = c.hasAttribute('onclick');

        });


    document
        .querySelectorAll(
            '#modalEkstrakurikuler textarea'
        )
        .forEach(function(t){

            t.value='';

        });

        data.forEach(function(item){

    let hidden = document.querySelector(
        '.master-id[value="' + item.master_ekstrakurikuler_id + '"]'
    );

    if (!hidden) return;

    let wrapper = hidden.closest('.ekskul-item');

    if (!wrapper) return;

    const checkbox = wrapper.querySelector('input[type="checkbox"]');
    const catatan = wrapper.querySelector('textarea');

if (catatan) {
    catatan.value = item.catatan_guru ?? '';
}
});

});
          
            modal.classList.remove('hidden');

            modal.classList.add('flex');

        });

    });

    // Tutup Modal (X)
    closeModal.addEventListener('click', function(){

        modal.classList.remove('flex');

        modal.classList.add('hidden');

    });

    // Tutup Modal (Batal)
    btnBatal.addEventListener('click', function(){

        modal.classList.remove('flex');

        modal.classList.add('hidden');

    });

    // Klik area hitam
    modal.addEventListener('click', function(e){

        if(e.target === modal){

            modal.classList.remove('flex');

            modal.classList.add('hidden');

        }

    });

});

</script>

@endpush

@endsection
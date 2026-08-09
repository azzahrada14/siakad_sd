@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- ================= HEADER ================= --}}
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start">

        <div>

            <h2 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                <x-heroicon-o-academic-cap class="w-8 h-8 text-blue-600"/>

                Proses Kelulusan Siswa

            </h2>

            <p class="text-gray-500 mt-2 text-lg">

                Menentukan status kelulusan siswa kelas VI.

            </p>

        </div>

        @php
            $aktif = $tahunAjaran->where('status','Aktif')->first();
        @endphp

        @if($aktif)

        <div class="mt-5 lg:mt-0">

            <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

                <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">

                    Tahun Ajaran Aktif

                </p>

                <h2 class="text-2xl font-bold text-blue-700 mt-1">

                    {{ $aktif->tahun_ajaran }}

                </h2>

                <div class="flex justify-between items-center mt-2">

                    <span class="text-gray-600 text-sm">

                        Semester {{ $aktif->semester }}

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

    {{-- ================= CARD ================= --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-500 text-sm">

                        Total Kelas VI

                    </p>

                    <h2 class="text-3xl font-bold text-blue-600">

                        {{ $kelas->count() }}

                    </h2>

                </div>

                <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center">

                    <x-heroicon-o-building-office-2 class="w-8 h-8 text-blue-600"/>

                </div>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-500 text-sm">

                        Total Siswa

                    </p>

                    <h2 class="text-3xl font-bold text-green-600">

                        {{ $totalSiswa }}

                    </h2>

                </div>

                <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center">

                    <x-heroicon-o-users class="w-8 h-8 text-green-600"/>

                </div>

            </div>

        </div>

        <div class="bg-white rounded-xl shadow border border-gray-200 p-5">

            <div class="flex justify-between">

                <div>

                    <p class="text-gray-500 text-sm">

                        Status

                    </p>

                    <h2 class="text-xl font-bold text-indigo-600">

                        Siap Diproses

                    </h2>

                </div>

                <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center">

                    <x-heroicon-o-check-badge class="w-8 h-8 text-indigo-600"/>

                </div>

            </div>

        </div>

    </div>

    {{-- ================= FORM ================= --}}

    <form
        action="{{ route('kelulusan.store') }}"
        method="POST">

        @csrf

        <div class="bg-white rounded-xl shadow border border-gray-200">

            <div class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">

                <div class="flex items-center gap-2">

                    <x-heroicon-o-funnel class="w-5 h-5 text-blue-600"/>

                    <h2 class="font-semibold text-gray-800">

                        Pilih Data Kelulusan

                    </h2>

                </div>

            </div>

            <div class="p-6">

                <div class="grid md:grid-cols-3 gap-5">

                    <div>

                        <label class="block text-sm text-gray-600 mb-2">

                            Tahun Ajaran

                        </label>

                        <select
                            id="tahun_ajaran"
                            name="tahun_ajaran_id"
                            class="w-full rounded-lg border-gray-300">

                            @foreach($tahunAjaran as $tahun)

                                <option value="{{ $tahun->id }}">

                                    {{ $tahun->tahun_ajaran }}

                                    (Semester {{ $tahun->semester }})

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="block text-sm text-gray-600 mb-2">

                            Kelas

                        </label>

                        <select
                            id="kelas"
                            class="w-full rounded-lg border-gray-300">

                            <option value="">Pilih Kelas</option>

                            @foreach($kelas as $k)

                                <option value="{{ $k->id }}">

                                    {{ $k->nama_kelas }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="flex items-end">

                        <button
                            type="button"
                            id="btnLoad"

                            class="w-full h-11 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

                            Tampilkan Siswa

                        </button>

                    </div>

                </div>

            </div>

        </div>
                {{-- ================= DATA SISWA ================= --}}

        <div class="bg-white rounded-xl shadow border border-gray-200 mt-6">

            <div class="flex justify-between items-center px-6 py-4 border-b bg-slate-50 rounded-t-xl">

                <div>

                    <h2 class="font-semibold text-lg text-gray-800">

                        Data Siswa

                    </h2>

                    <p class="text-sm text-gray-500">

                        Tentukan status kelulusan masing-masing siswa.

                    </p>

                </div>

                <span
                    id="jumlahData"
                    class="inline-flex items-center rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">

                    0 Siswa

                </span>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full border-collapse">

                    <thead class="bg-slate-100">

                    <tr>

                        <th class="border px-3 py-3 text-center w-16">

                            No

                        </th>

                        <th class="border px-4 py-3 text-left">

                            NISN

                        </th>

                        <th class="border px-4 py-3 text-left">

                            Nama Siswa

                        </th>

                        <th class="border px-4 py-3 text-center">

                            Jenis Kelamin

                        </th>

                        <th class="border px-4 py-3 text-center">

                            Status Kelulusan

                        </th>

                    </tr>

                    </thead>

                    <tbody id="tbodySiswa">

                        <tr>

                            <td
                                colspan="5"
                                class="py-16 text-center">

                                <x-heroicon-o-users
                                    class="mx-auto h-16 w-16 text-gray-300"/>

                                <h3 class="mt-4 text-lg font-semibold text-gray-700">

                                    Belum Ada Data

                                </h3>

                                <p class="mt-2 text-gray-500">

                                    Pilih kelas kemudian klik
                                    <b>Tampilkan Siswa</b>

                                </p>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        {{-- ================= RINGKASAN ================= --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-6">

            <div
                class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <p class="text-gray-500 text-sm">

                    Total Siswa

                </p>

                <h2
                    id="totalSiswa"
                    class="text-3xl font-bold text-blue-600 mt-2">

                    0

                </h2>

            </div>

            <div
                class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <p class="text-gray-500 text-sm">

                    Lulus

                </p>

                <h2
                    id="jumlahLulus"
                    class="text-3xl font-bold text-green-600 mt-2">

                    0

                </h2>

            </div>

            <div
                class="bg-white rounded-xl shadow border border-gray-200 p-5">

                <p class="text-gray-500 text-sm">

                    Tidak Lulus

                </p>

                <h2
                    id="jumlahTidak"
                    class="text-3xl font-bold text-red-600 mt-2">

                    0

                </h2>

            </div>

        </div>

        {{-- ================= BUTTON ================= --}}

        <div
            class="flex justify-end gap-3 mt-6">

            <a
                href="{{ route('kelulusan.index') }}"
                class="px-5 py-3 rounded-lg bg-gray-300 hover:bg-gray-400">

                Batal

            </a>

            <button
                type="submit"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                <x-heroicon-o-check-circle class="w-5 h-5"/>

                Simpan Kelulusan

            </button>

        </div>

    </form>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const btnLoad = document.getElementById('btnLoad');
    const tbody = document.getElementById('tbodySiswa');

    const jumlahData = document.getElementById('jumlahData');
    const totalSiswa = document.getElementById('totalSiswa');
    const jumlahLulus = document.getElementById('jumlahLulus');
    const jumlahTidak = document.getElementById('jumlahTidak');

    btnLoad.addEventListener('click', loadSiswa);

    async function loadSiswa() {

        let kelas = document.getElementById('kelas').value;
        let tahun = document.getElementById('tahun_ajaran').value;

        if (kelas == '') {
            alert('Pilih kelas terlebih dahulu');
            return;
        }

        tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-8">
                    Memuat data siswa...
                </td>
            </tr>
        `;

        try {

            const response = await fetch(
                `{{ route('kelulusan.siswa') }}?kelas_id=${kelas}&tahun_ajaran_id=${tahun}`
            );

            const result = await response.json();

            renderTable(result.data);

        } catch (e) {

            console.log(e);

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-8 text-red-600">
                        Gagal mengambil data.
                    </td>
                </tr>
            `;

        }

    }

    function renderTable(data) {

        tbody.innerHTML = '';

        if (data.length == 0) {

            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-10">
                        Tidak ada siswa.
                    </td>
                </tr>
            `;

            jumlahData.innerHTML = "0 Siswa";
            totalSiswa.innerHTML = 0;
            jumlahLulus.innerHTML = 0;
            jumlahTidak.innerHTML = 0;

            return;
        }

        data.forEach(function(item,index){

            let statusHtml='';

            if(item.valid){

                statusHtml=`

                    <select
                        name="status[${item.id}]"
                        class="statusSelect w-full rounded-lg border-gray-300">

                        <option value="Lulus">
                            Lulus
                        </option>

                        <option value="Tidak Lulus">
                            Tidak Lulus
                        </option>

                    </select>

                `;

            }else{

                statusHtml=`

                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold ${item.badge}">
                        ${item.pesan}
                    </span>

                `;

            }

            tbody.innerHTML += `

                <tr class="hover:bg-sky-50">

                    <td class="border px-3 py-3 text-center">

                        ${index+1}

                    </td>

                    <td class="border px-4 py-3">

                        ${item.nisn}

                    </td>

                    <td class="border px-4 py-3">

                        <b>${item.nama}</b>

                    </td>

                    <td class="border px-4 py-3 text-center">

                        ${item.jk}

                    </td>

                    <td class="border px-4 py-3">

                        ${statusHtml}

                    </td>

                </tr>

            `;

        });

        jumlahData.innerHTML = data.length + " Siswa";

        totalSiswa.innerHTML = data.length;

        updateCounter();

    }

    document.addEventListener('change', function(e){

        if(e.target.classList.contains('statusSelect')){

            updateCounter();

        }

    });

    function updateCounter(){

        const select = document.querySelectorAll('.statusSelect');

        let lulus = 0;
        let tidak = 0;

        select.forEach(function(item){

            if(item.value == 'Lulus'){

                lulus++;

            }else{

                tidak++;

            }

        });

        jumlahLulus.innerHTML = lulus;

        jumlahTidak.innerHTML = tidak;

    }

});
</script>
@endsection
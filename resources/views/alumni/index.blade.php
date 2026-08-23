@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-6">

    {{-- ================= ALERT ================= --}}

    @if(session('success'))
        <div class="mb-5 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-5 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    {{-- ================= HEADER ================= --}}

    <div class="flex flex-col lg:flex-row justify-between items-start mb-6">

        <div>

            <h1 class="flex items-center gap-3 text-3xl font-bold text-gray-800">

                <x-heroicon-o-user-group class="w-8 h-8 text-blue-600"/>

                Data Alumni

            </h1>

            <p class="text-gray-500 mt-2">

                Data siswa yang telah dinyatakan lulus.

            </p>

        </div>


@if($tahunAktif)

<div class="mt-5 lg:mt-0">

    <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[280px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
            Tahun Ajaran
        </p>

        <h2 class="text-2xl font-bold text-blue-700 mt-1">
            {{ $tahunAktif->tahun_ajaran }}
        </h2>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600 text-sm">
                Semester {{ $tahunAktif->semester }}
            </span>

            @if($modeArsip)

                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                    Arsip
                </span>

            @else

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Aktif
                </span>

            @endif

        </div>

    </div>

</div>

@endif

    </div>

    {{-- ================= DASHBOARD ================= --}}

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">

            <p class="text-sm text-gray-500">

                Total Alumni

            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-3">

                {{ $totalAlumni }}

            </h2>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">

            <p class="text-sm text-gray-500">

                Laki-laki

            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-3">

                {{ $laki }}

            </h2>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">

            <p class="text-sm text-gray-500">

                Perempuan

            </p>

            <h2 class="text-4xl font-bold text-pink-600 mt-3">

                {{ $perempuan }}

            </h2>

        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5">

            <p class="text-sm text-gray-500">

                Arsip

            </p>

            <h2 class="text-4xl font-bold text-yellow-600 mt-3">

                {{ $totalAlumni }}

            </h2>

        </div>

    </div>

    {{-- ================= MANAJEMEN ================= --}}

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-6">

        <div class="flex justify-between items-center px-6 py-5 border-b">

            <div>

                <h2 class="text-lg font-semibold">

                    Manajemen Alumni

                </h2>

                <p class="text-sm text-gray-500 mt-1">

                    Generate dan export data alumni.

                </p>

            </div>

            <div class="flex gap-3">
@if($bolehProses)

    <button
        onclick="openModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

        Generate Alumni

    </button>

@else

    <span
        class="inline-flex items-center gap-2 bg-gray-400 text-white px-5 py-3 rounded-lg cursor-not-allowed">

        <x-heroicon-o-lock-closed class="w-5 h-5"/>

        Tidak Dapat Diproses

    </span>

@endif

                <a
                    href="{{ route('alumni.export') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">

                    Export Excel

                </a>

    

            </div>

        </div>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

<div class="overflow-x-auto">

<table class="min-w-full border border-gray-200">

<thead class="bg-gray-100">

<tr>

<th class="border border-gray-300 px-4 py-3">
No
</th>

<th class="border border-gray-300 px-4 py-3">
NISN
</th>

<th class="border border-gray-300 px-4 py-3">
Nama
</th>

<th class="border border-gray-300 px-4 py-3">
Tanggal Lulus
</th>

<th class="border border-gray-300 px-4 py-3">
Nomor Ijazah
</th>

<th class="border border-gray-300 px-4 py-3">
Status
</th>

<th class="border border-gray-300 px-4 py-3 text-center">

Aksi

</th>

</tr>

</thead>

<tbody>
    @forelse($alumni as $item)

<tr>

<td class="border border-gray-300 px-4 py-3">

{{ $loop->iteration }}

</td>

<td class="border border-gray-300 px-4 py-3">

{{ $item->siswa->nisn }}

</td>

<td class="border border-gray-300 px-4 py-3">
    {{ $item->siswa?->nama_siswa ?? '-' }}
</td>

<td class="border border-gray-300 px-4 py-3">

{{ $item->tanggal_lulus }}

</td>

<td class="border border-gray-300 px-4 py-3">

{{ $item->nomor_ijazah ?? '-' }}

</td>

<td class="border border-gray-300 px-4 py-3">

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

{{ $item->status }}

</span>

</td>

<td class="border border-gray-300 px-4 py-3 text-center">

    <a
        href="{{ route('alumni.show', $item->id) }}"
        class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">

        <x-heroicon-o-eye class="w-5 h-5"/>

    </a>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="border border-gray-300 text-center py-10">

Belum ada data alumni.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>


{{-- ===================================================== --}}
{{-- MODAL GENERATE ALUMNI --}}
{{-- ===================================================== --}}

<div
    id="modalGenerate"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-blue-600 px-6 py-5">

            <h2 class="text-xl font-bold text-white">

                Generate Data Alumni

            </h2>

            <p class="text-blue-100 text-sm mt-1">

                Konfirmasi Generate Alumni

            </p>

        </div>

        {{-- Body --}}
        <div class="p-6">

            <p class="text-gray-700">

                Apakah Anda yakin ingin membuat data alumni?

            </p>

            <div class="mt-5 rounded-xl border border-blue-200 bg-blue-50 p-5">

                <p class="font-semibold text-blue-700 mb-3">

                    Sistem akan:

                </p>

                <ul class="space-y-2 text-gray-700">

                    <li>✔ Mengambil seluruh siswa yang telah Lulus.</li>

                    <li>✔ Membuat data Alumni.</li>

                    <li>✔ Menghindari data ganda.</li>

                    <li>✔ Data Alumni digunakan sebagai arsip sekolah.</li>

                </ul>

            </div>

        </div>

        {{-- Footer --}}
        <div class="border-t bg-gray-50 px-6 py-4 flex justify-end gap-3">

            <button
                onclick="closeModal()"
                class="px-5 py-2 rounded-lg border border-gray-300">

                Batal

            </button>

           <form
    action="{{ route('alumni.generate') }}"
    method="POST">

    @csrf

    <input
        type="hidden"
        name="tahun_ajaran_id"
        value="{{ $tahunAktif->id }}"
    >

    <button
        class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

        Generate

    </button>

</form>

        </div>

    </div>

</div>
<script>

function openModal(){

    document
        .getElementById('modalGenerate')
        .classList.remove('hidden');

    document
        .getElementById('modalGenerate')
        .classList.add('flex');

}

function closeModal(){

    document
        .getElementById('modalGenerate')
        .classList.remove('flex');

    document
        .getElementById('modalGenerate')
        .classList.add('hidden');

}

window.onclick=function(e){

    let modal=document.getElementById('modalGenerate');

    if(e.target===modal){

        closeModal();

    }

}

</script>

@endsection
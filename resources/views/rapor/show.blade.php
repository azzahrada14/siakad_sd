@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    <div class="bg-white rounded-lg shadow p-6">

<div class="flex justify-between items-center mb-6">

    <div>

        <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">

            <i data-feather="file-text"
               class="w-7 h-7 text-blue-600"></i>

            Preview Rapor

        </h2>

        <p class="text-gray-500 mt-1">

            Detail rapor siswa

        </p>

    </div>
<div class="flex gap-2">

    @if(Auth::user()->role == 'guru')

        <a href="{{ route('rapor.edit',$rapor->id) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg flex items-center gap-2">

            <i data-feather="edit-2"></i>

            Edit

        </a>

        <a href="{{ route('rapor.print',$rapor->id) }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">

            <i data-feather="printer"></i>

            Cetak

        </a>

    @endif

</div>

</div>
<hr class="my-5">

<div class="grid grid-cols-2 gap-6 mb-8 bg-gray-50 rounded-lg p-5">

<div class="space-y-4">

<div>

<label class="text-sm text-gray-500">

Nama Siswa

</label>

<p class="font-semibold">

{{ $rapor->siswa->nama_siswa }}

</p>

</div>

<div>

<label class="text-sm text-gray-500">

NISN

</label>

<p class="font-semibold">

{{ $rapor->siswa->nisn }}

</p>

</div>

<div>

<label class="text-sm text-gray-500">

Semester

</label>

<p class="font-semibold">

{{ $rapor->semester }}

</p>

</div>

</div>

<div class="space-y-4">

<div>

<label class="text-sm text-gray-500">

NIPD

</label>

<p class="font-semibold">

{{ $rapor->siswa->nipd }}

</p>

</div>

<div>

<label class="text-sm text-gray-500">

Kelas

</label>

<p class="font-semibold">

Kelas {{ $rapor->kelas->nama_kelas }}

</p>

</div>

<div>

<label class="text-sm text-gray-500">

Tahun Ajaran

</label>

<p class="font-semibold">

{{ $rapor->tahunAjaran->tahun_ajaran }}

</p>

<div>

<label class="text-sm text-gray-500">
Ranking
</label>

<p class="font-semibold">
{{ $rapor->ranking }}
</p>

</div>

<div>

<label class="text-sm text-gray-500">
Rata-rata
</label>

<p class="font-semibold text-blue-600">
{{ number_format($rapor->rata_rata,2) }}
</p>

</div>

</div>

</div>

</div>


<hr class="my-5">

<h3 class="font-bold text-lg text-gray-700 mb-3">
    Nilai Akademik
</h3>

<table class="w-full rounded-lg overflow-hidden border border-gray-300 shadow-sm">

<thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">

<tr>

<th class="border p-3">No</th>

<th class="border p-3">Mata Pelajaran</th>

<th class="border p-3">Nilai</th>

<th class="border p-3">Capaian Kompetensi</th>

</tr>

</thead>

<tbody>

@foreach($rapor->details as $detail)

<tr>

<td class="border border border-gray-300 p-3 text-center">

{{ $loop->iteration }}

</td>

<td class="border border-gray-300 p-3 text center">
    {{ $detail->mapel->nama_mapel }}
</td>

<td class="border border border-gray-300 p-3 text-center">

{{ $detail->nilai_akhir }}

</td>

<td class="border border-gray-300 p-3 align-top">
    <b>Pengetahuan</b>

<br>

{!! nl2br(e($detail->capaian_pengetahuan)) !!}

<br><br>

<b>Keterampilan</b>

<br>

{!! nl2br(e($detail->capaian_keterampilan)) !!}
</td>
</tr>

@endforeach

</tbody>

</table>

<div class="my-8"></div>

<h3 class="font-bold text-lg text-gray-700 mb-3">
    Ekstrakurikuler
</h3>

<table class="w-full rounded-lg overflow-hidden border border-gray-300 shadow-sm">

    <thead class="bg-blue-600 text-white">

        <tr>

            <th class="border border-gray-300 p-3 text-center">
                No
            </th>

            <th class="border border-gray-300 p-3 text-center">
                Kegiatan
            </th>

            <th class="border border-gray-300 p-3 text-center">
                Keterangan
            </th>

        </tr>

    </thead>

    <tbody>

        @forelse($ekstrakurikuler as $item)

        <tr>

            <td class="border border-gray-300 p-3 text-center">
                {{ $loop->iteration }}
            </td>

            <td class="border border-gray-300 p-3 text center">
                {{ $item->nama_kegiatan }}
            </td>

            <td class="border border-gray-300 p-3 text center">
                {{ $item->keterangan }}
            </td>

        </tr>

        @empty

        <tr>

            <td colspan="3"
                class="border border-gray-300 p-3 text-center text-gray-500">

                Tidak ada data ekstrakurikuler.

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

<div class="my-8"></div>

<div class="grid grid-cols-2 gap-8">

<div>

<h3 class="font-bold text-lg text-gray-700 mb-3">
    Ketidakhadiran
</h3>



<div class="border rounded-lg p-4">
<table class="w-full rounded-lg overflow-hidden border border-gray-300 shadow-sm">

<tr>

<td class="border border border-gray-300 p-3 text-center">

Sakit

</td>

<td class="border border-gray-300 p-3 text-center">

{{ $rapor->sakit }}

</td>

</tr>

<tr>

<td class="border border-gray-300 p-3 text-center">

Izin

</td>

<td class="border border-gray-300 p-3 text-center">

{{ $rapor->izin }}

</td>

</tr>

<tr>

<td class="border border-gray-300 p-3 text-center">

Alfa

</td>

<td class="border border-gray-300 p-3 text-center">

{{ $rapor->alfa }}

</td>

</tr>

</table>

</div>
</div>

<div>


<h3 class="font-bold mb-3">

Keputusan

</h3>

<table class="w-full border border-gray-300">

<tr>

<td class="border p-2" colspan="4">

Berdasarkan capaian kompetensi pada semester

{{ $rapor->semester_ke }}

maka peserta didik dinyatakan:

</td>

</tr>

<tr>

<td class="border p-2">

Naik ke Kelas

</td>

<td class="border p-2 text-center">

:

</td>

<td class="border p-2">

{{ $rapor->naik_kelas }}

</td>

</tr>

<tr>

<td class="border p-2">

Tinggal di Kelas

</td>

<td class="border p-2 text-center">

:

</td>

<td class="border p-2">

{{ $rapor->tinggal_kelas }}

</td>

</tr>

</table>
</div>

</div>

<div class="my-8"></div>

<h3 class="font-bold text-lg text-gray-700 mb-3">
    Catatan Wali Kelas
</h3>

<div class="border rounded-lg p-4 min-h-[120px] bg-gray-50 whitespace-pre-line">

{{ $rapor->catatan ?? '-' }}

</div>

</div>

</div>

@endsection
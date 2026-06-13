@extends('layouts.app')

@section('content')

<div class="container mx-auto">

<div class="bg-white rounded-xl shadow p-6">

<div class="flex items-center gap-3 mb-6">

    <div class="bg-blue-100 p-3 rounded-lg">

        <i data-feather="edit-3"
           class="w-6 h-6 text-blue-600"></i>

    </div>

    <div>

        <h2 class="text-3xl font-bold text-gray-800">

            Edit Rapor

        </h2>

        <p class="text-gray-500">

            Edit capaian kompetensi, catatan wali kelas dan keputusan rapor.

        </p>

    </div>

</div>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-4">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form
action="{{ route('rapor.update',$rapor->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="grid grid-cols-2 gap-6 mb-8">

    <div>

        <label class="text-sm text-gray-500">

            Nama Siswa

        </label>

        <div class="font-semibold text-lg">

            {{ $rapor->siswa->nama_siswa }}

        </div>

    </div>

    <div>

        <label class="text-sm text-gray-500">

            Kelas

        </label>

        <div class="font-semibold">

            Kelas {{ $rapor->kelas->nama_kelas }}

        </div>

    </div>

    <div>

        <label class="text-sm text-gray-500">

            Tahun Ajaran

        </label>

        <div class="font-semibold">

            {{ $rapor->tahunAjaran->tahun_ajaran }}

        </div>

    </div>

    <div>

        <label class="text-sm text-gray-500">

            Semester

        </label>

        <div class="font-semibold">

            {{ $rapor->semester }}

        </div>

    </div>

</div>

<hr class="my-5">

<h3 class="font-bold text-lg mb-3">

Pengetahuan & Keterampilan

</h3>

<table class="w-full border border-gray-300 rounded-lg overflow-hidden">
<thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">

<tr>

<th class="border p-2">

No

</th>

<th class="border p-2">

Mata Pelajaran

</th>

<th class="border p-2">

Nilai

</th>

<th class="border border-gray-300 p-3">

Capaian Kompetensi

</th>

</tr>

</thead>
<tbody>

@foreach($rapor->details as $detail)

<tr class="hover:bg-gray-50">

    <td class="border border-gray-300 p-3 text-center">

        {{ $loop->iteration }}

    </td>

    <td class="border border-gray-300 p-3">

        {{ $detail->mapel->nama_mapel }}

    </td>

    <td class="border border-gray-300 p-3 text-center font-semibold">

        {{ $detail->nilai_akhir }}

    </td>

    <td class="border border-gray-300 p-3">

<label class="font-semibold text-sm">
Pengetahuan
</label>

<textarea
name="detail[{{ $detail->id }}][capaian_pengetahuan]"
rows="3"
class="w-full border rounded-lg p-2 mb-3">

{{ old('detail.'.$detail->id.'.capaian_pengetahuan',$detail->capaian_pengetahuan) }}

</textarea>

<label class="font-semibold text-sm">
Keterampilan
</label>

<textarea
name="detail[{{ $detail->id }}][capaian_keterampilan]"
rows="3"
class="w-full border rounded-lg p-2">

{{ old('detail.'.$detail->id.'.capaian_keterampilan',$detail->capaian_keterampilan) }}

</textarea>

</td>
</tr>

@endforeach

</tbody>
</table>
<br>
<h3 class="font-bold text-lg mb-3">
Ekstrakurikuler
</h3>
<table class="w-full border border-gray-300 rounded-lg overflow-hidden mb-6">

<thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">

<tr>

<th class="border border-gray-300 p-3 w-16">

No

</th>

<th class="border border-gray-300 p-3">

Nama Kegiatan

</th>

<th class="border border-gray-300 p-3">

Keterangan

</th>

</tr>

</thead>

<tbody>

@forelse($ekstrakurikuler as $item)

<tr class="hover:bg-gray-50">

<td class="border border-gray-300 p-3 text-center">

{{ $loop->iteration }}

</td>

<td class="border border-gray-300 p-3">

{{ $item->nama_kegiatan }}

</td>

<td class="border border-gray-300 p-3">

{{ $item->keterangan }}

</td>

</tr>

@empty

<tr>

<td colspan="3"
class="border border-gray-300 p-4 text-center text-gray-500">

Belum ada data ekstrakurikuler.

</td>

</tr>

@endforelse

</tbody>

</table>

</table>

<h3 class="text-lg font-bold mb-4">

Absensi

</h3>

<div class="grid grid-cols-4 gap-5 mb-8">

<div>

<label class="text-sm text-gray-500">

Hadir

</label>

<div class="mt-2 border rounded-lg p-3 bg-gray-50 font-semibold">

{{ $rapor->hadir }}

</div>

</div>

<div>

<label class="text-sm text-gray-500">

Izin

</label>

<div class="mt-2 border rounded-lg p-3 bg-gray-50 font-semibold">

{{ $rapor->izin }}

</div>

</div>

<div>

<label class="text-sm text-gray-500">

Sakit

</label>

<div class="mt-2 border rounded-lg p-3 bg-gray-50 font-semibold">

{{ $rapor->sakit }}

</div>

</div>

<div>

<label class="text-sm text-gray-500">

Alfa

</label>

<div class="mt-2 border rounded-lg p-3 bg-gray-50 font-semibold">

{{ $rapor->alfa }}

</div>

</div>

</div>

<div class="mb-6">

<label class="font-semibold block mb-2">

Catatan Wali Kelas

</label>

<textarea
name="catatan"
rows="5"
class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-200">{{ $rapor->catatan }}</textarea>

</div>

<h3 class="text-lg font-bold mt-8 mb-4">

Keputusan

</h3>

<div class="border rounded-xl p-6 bg-gray-50">

    <div class="mb-4">

        <label class="font-semibold">
            Semester yang menjadi dasar keputusan
        </label>

        <input
            type="text"
            name="semester_ke"
            class="w-full border rounded-lg mt-2 p-2"
            placeholder="contoh: ke-1 dan ke-2"
            value="{{ old('semester_ke',$rapor->semester_ke) }}">

    </div>

    <div class="grid grid-cols-2 gap-5">

        <div>

            <label class="font-semibold">
                Naik ke Kelas
            </label>

            <input
                type="text"
                name="naik_kelas"
                class="w-full border rounded-lg mt-2 p-2"
                value="{{ old('naik_kelas',$rapor->naik_kelas) }}">

        </div>

        <div>

            <label class="font-semibold">
                Tinggal di Kelas
            </label>

            <input
                type="text"
                name="tinggal_kelas"
                class="w-full border rounded-lg mt-2 p-2"
                value="{{ old('tinggal_kelas',$rapor->tinggal_kelas) }}">

        </div>

    </div>

</div>



<div class="flex justify-end mt-8">

<button type="submit"
class="bg-blue-600
hover:bg-blue-700
text-white
px-8
py-3
rounded-lg
flex
items-center
gap-2">

<i data-feather="save" class="w-5 h-5"></i>

Simpan Perubahan

</button>

</div>

</form>

</div>

</div>

@endsection
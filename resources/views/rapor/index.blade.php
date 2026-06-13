@extends('layouts.app')

@section('content')

<div class="p-6">

    <div class="bg-white rounded-xl shadow p-6">

       <div class="flex justify-between items-center mb-6">

<div>

<h2 class="text-3xl font-bold text-gray-800 flex items-center gap-3">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-8 h-8 text-blue-600"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

</svg>

Data Rapor

</h2>

<p class="text-gray-500 mt-1">

Generate dan kelola rapor siswa

</p>

</div>

</div>

        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">

                {{ session('success') }}

            </div>

        @endif

            @if(Auth::user()->role == 'guru')
            <div class="mb-5">

<form action="{{ route('rapor.generate') }}" method="POST" class="flex items-end gap-3 flex-wrap">
@csrf

<div class="w-64">

<label class="block text-sm font-semibold text-gray-700 mb-1">

Tahun Ajaran

</label>

<select
name="tahun_ajaran_id"
class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

<option value="">Pilih Tahun Ajaran</option>

@foreach($tahunAjaran as $item)

<option value="{{ $item->id }}">

{{ $item->tahun_ajaran }}

</option>

@endforeach

</select>

</div>

<div class="w-52">

<label class="block text-sm font-semibold text-gray-700 mb-1">

Semester

</label>

<select
name="semester"
class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

<option value="">Pilih Semester</option>

<option value="Ganjil">

Ganjil

</option>

<option value="Genap">

Genap

</option>

</select>

</div>

<div>

<button
type="submit"
class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg flex items-center gap-2">

<svg xmlns="http://www.w3.org/2000/svg"
class="w-5 h-5"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round"
stroke-linejoin="round"
stroke-width="2"
d="M4 4v6h6M20 20v-6h-6M5.64 17A9 9 0 104.22 9"/>

</svg>

Generate

</button>

</div>

</form>

</div>
@endif
           
            


        <div class="overflow-x-auto rounded-xl border">

            <table class="w-full border">

                <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">

                    <tr>

                        <th class="border p-2">

                            No

                        </th>

                        <th class="border p-2">

                            Nama Siswa

                        </th>

                        <th class="border p-2">

                            Kelas

                        </th>

                        <th class="border p-2">

                            Semester

                        </th>

                        <th class="border p-2">

                            Ranking

                        </th>
                        <th class="border p-2">

Status

</th>

                        <th class="border p-2">

                            Rata-rata

                        </th>

                        <th class="border p-2">

                            Aksi

                        </th>

                    </tr>

                </thead>

               <tbody>

@forelse($rapor as $item)

<tr>

<td class="border p-2 text-center">
    {{ $loop->iteration }}
</td>

<td class="border p-2">
    {{ $item->siswa->nama_siswa }}
</td>

<td class="border p-2">
    Kelas {{ $item->kelas->nama_kelas }}
</td>

<td class="border p-2 text-center">
    {{ $item->semester }}
</td>

<td class="border p-2 text-center">
    {{ $item->ranking }}
</td>

<td class="border p-2 text-center">

@if($item->is_generate)

<span class="bg-green-100 text-green-700 px-2 py-1 rounded">
    Sudah Generate
</span>

@else

<span class="bg-red-100 text-red-700 px-2 py-1 rounded">
    Belum
</span>

@endif

</td>

<td class="border p-2 text-center">
    {{ number_format($item->rata_rata,2) }}
</td>

<td class="border p-2">

<div class="flex justify-center gap-2">


{{-- Semua role boleh lihat --}}
<a href="{{ route('rapor.show',$item->id) }}"
class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-lg">

    <x-heroicon-o-eye class="w-5 h-5"/>

</a>

{{-- Hanya Guru --}}
@if(Auth::user()->role == 'guru')

<a href="{{ route('rapor.edit',$item->id) }}"
class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg">

    <x-heroicon-o-pencil-square class="w-5 h-5"/>

</a>

<a href="{{ route('rapor.print',$item->id) }}"
class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg">

    <x-heroicon-o-printer class="w-5 h-5"/>

</a>

@endif

</div>

</td>

</tr>

@empty

<tr>

<td colspan="8" class="border p-4 text-center">

Belum ada data rapor.

</td>

</tr>

@endforelse

</tbody>

        




                    

                  

            </table>

        </div>

    </div>

</div>

@endsection
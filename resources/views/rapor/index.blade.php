@extends('layouts.app')

@section('content')

<div class="p-6">

    <div class="bg-white rounded-xl shadow p-6">

       <div class="flex flex-col lg:flex-row justify-between items-start mb-8">
<div>

    <h2 class="text-4xl font-bold text-slate-800 flex items-center gap-3">

        <x-heroicon-o-document-text class="w-10 h-10 text-blue-600"/>

        Data Rapor

    </h2>

    <p class="text-gray-500 mt-2 ml-[52px]">

        Generate dan cetak rapor siswa.

    </p>

</div>

    <div class="mt-5 lg:mt-0">

        <div class="bg-blue-50 border border-blue-200 rounded-xl px-6 py-4 shadow-sm min-w-[280px]">

            <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
                Tahun Ajaran Aktif
            </p>

            <h3 class="text-2xl font-bold text-blue-700 mt-1">
                {{ $tahunAktif->tahun_ajaran }}
            </h3>

            <div class="flex justify-between items-center mt-2">

                <span class="text-gray-600">
                    Semester {{ $tahunAktif->semester }}
                </span>

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                    Aktif
                </span>

            </div>

        </div>

    </div>

</div>

<div class="bg-slate-50 rounded-xl border p-5 mb-6">

    <form action="{{ route('rapor.generate') }}" method="POST">

        @csrf

        <input type="hidden"
               name="tahun_ajaran_id"
               value="{{ $tahunAktif->id }}">

        <input type="hidden"
               name="semester"
               value="{{ $tahunAktif->semester }}">

        <input type="hidden"
               name="kelas_id"
               value="{{ $kelasGuru->id }}">

        <div class="grid md:grid-cols-4 gap-5">

          <div>

<label class="block text-sm font-semibold mb-2">

Tahun Ajaran

</label>

<input
type="text"
readonly
value="{{ $tahunAktif->tahun_ajaran }}"
class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div>

<label class="block text-sm font-semibold mb-2">

Semester

</label>

<input
type="text"
readonly
value="{{ $tahunAktif->semester }}"
class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

<div>

<label class="block text-sm font-semibold mb-2">

Kelas

</label>

<input
type="text"
readonly
value="{{ $kelasGuru->nama_kelas }}"
class="w-full rounded-lg bg-gray-100 border-gray-300">

</div>

        
<div class="flex items-end">

<button
type="submit"
class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

<x-heroicon-o-document-arrow-down class="w-5 h-5"/>

Generate Rapor

</button>

</div>
            </div>

        </div>

    </form>


        <div class="overflow-x-auto rounded-xl border">

            <table class="w-full border">

                <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">

                    <tr>

                        <th class="border p-2">

                            No

                        </th>

                        <th class="border p-2">

                            NIPD

                        </th>

                        <th class="border p-2">
    NISN
</th>


                        <th class="border p-2">

                            Nama Siswa

                        </th>

                        <th class="border p-2">

                            Rata -Rata

                        </th>

                

                             <th class="border p-2">

Status

</th>

                        <th class="border p-2">

                            Aksi

                        </th>

                    </tr>

                </thead>

<tbody>

@forelse($rapor as $item)

<tr>

<td class="border text-center">
    {{ $loop->iteration }}</td>

    <td class="border text-center">
{{ $item->siswa->nipd }}</td>

<td class="border p-2 text-center">
    {{ $item->siswa->nisn }}
</td>

<td class="border text-center">
    {{ $item->siswa->nama_siswa }}</td>

<td class=" border text-center">
{{ number_format($item->rata_rata,2) }}
</td>


<td class="border text-center">

@if($item->is_generate)

<span class="inline-flex items-center gap-1 bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

<x-heroicon-s-check-circle class="w-4 h-4"/>

Sudah Generate

</span>

@else

<span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

<x-heroicon-s-clock class="w-4 h-4"/>

Belum Generate

</span>

@endif

</td>

<td class="border p-2">

<div class="flex justify-center gap-2">

<a href="{{ route('rapor.show',$item->id) }}"
class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-lg">

<x-heroicon-o-eye class="w-5 h-5"/>

</a>

<a href="{{ route('rapor.edit',$item->id) }}"
class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg">

<x-heroicon-o-pencil-square class="w-5 h-5"/>

</a>

<a href="{{ route('rapor.print',$item->id) }}"
class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-lg">

<x-heroicon-o-printer class="w-5 h-5"/>

</a>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-6">
Belum ada data rapor.
</td>

</tr>

@endforelse

</tbody>
            </table>

            <div class="flex justify-between items-center px-5 py-4 bg-gray-50 border-t">

<p class="text-sm text-gray-600">

Menampilkan

<span class="font-semibold">

{{ $rapor->firstItem() ?? 0 }}

</span>

-

<span class="font-semibold">

{{ $rapor->lastItem() ?? 0 }}

</span>

dari

<span class="font-semibold">

{{ $rapor->total() }}

</span>

data rapor

</p>

<div>

{{ $rapor->links('vendor.pagination.tailwind') }}

</div>

</div>

        </div>

    </div>

</div>

@push('scripts')

<script>

document.getElementById('searchInput')
.addEventListener('keyup', function(){

    let keyword = this.value.toLowerCase();

    let rows = document.querySelectorAll('tbody tr');

    rows.forEach(function(row){

        let nama = row.children[3]?.innerText.toLowerCase();

        if(nama && nama.includes(keyword)){

            row.style.display='';

        }else{

            row.style.display='none';

        }

    });

});

</script>

@endpush

@endsection
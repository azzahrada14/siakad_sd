{{-- resources/views/guru/index.blade.php --}}

@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">
            Data Guru
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola data guru SDN Cimanahyu
        </p>

    </div>

           
{{-- TOOLBAR --}}
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-5">

    {{-- Kiri --}}
    <div class="flex flex-wrap items-center gap-2">

        <form action="{{ route('guru.import') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <label class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg cursor-pointer">
                <x-heroicon-o-arrow-up-tray class="w-5 h-5"/>
                Import
                <input type="file"
                       name="file"
                       onchange="this.form.submit()"
                       class="hidden">
            </label>
        </form>

        <a href="{{ route('guru.export') }}"
           class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg">
            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>
            Export
        </a>

        <a href="{{ route('guru.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            <x-heroicon-o-plus class="w-5 h-5"/>
            Tambah Guru
        </a>

    </div>

    {{-- Cari --}}
    <form action="{{ route('guru.index') }}"
          method="GET"
          class="flex gap-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari guru..."
            class="w-72 border border-gray-300 rounded-lg px-4 py-2">

        <button
            type="submit"
            class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded-lg">

            Cari

        </button>

    </form>

</div>


{{-- FILTER BAR --}}
<div class="flex flex-wrap justify-between items-center gap-4 mb-4">

    {{-- Kiri --}}
    <div class="flex items-center gap-2">

        <span class="text-sm text-gray-500">
            Tampilkan
        </span>

        <select
            class="border border-gray-300 bg-white rounded-lg px-3 py-2 text-sm shadow-sm">

            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>

        </select>

        <span class="text-sm text-gray-500">
            entri
        </span>

    </div>

    {{-- Kanan --}}
   
    <div class="flex items-center gap-3">
        <span>Mode Edit</span>
        <div id="toggleEdit" class="switch active"></div>
        <span id="statusEdit">Aktif</span>
    </div>

</div>


    {{-- TABLE --}}
<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm text-left">

            {{-- HEADER --}}
           <thead class="bg-gray-100 text-gray-700">

                <tr>

                    <th class="border px-4 py-4 text-center font-semibold w-16">
                        No
                    </th>

                    <th class="border px-4 py-4 font-semibold">
                        NIP
                    </th>

                    <th class="border px-4 py-4 font-semibold">
                        Nama Guru
                    </th>

                    <th class="border px-4 py-4 text-center font-semibold">
                        Jenis Guru
                    </th>

                    <th class="border px-4 py-4 text-center font-semibold">
                        Guru Mata Pelajaran
                    </th>

                    <th class="border px-4 py-4 text-center font-semibold">
                        Wali Kelas
                    </th>

                    <th class="border px-4 py-4 text-center font-semibold">
                        Jenis Kelamain
                    </th>

                    <th class="border px-4 py-4 font-semibold">
                        TTL
                    </th>

                    <th class="border px-4 py-4 font-semibold">
                        Email
                    </th>

                    <th class="border px-4 py-4 text-center font-semibold">
                        Password
                    </th>
<th class="border px-4 py-4 text-center font-semibold w-40 aksi-edit">
    Aksi
</th>
                </tr>

            </thead>



            {{-- BODY --}}
            <tbody class="divide-y divide-gray-200 bg-white">

@forelse($gurus as $item)

<tr class="hover:bg-gray-50 transition">
                    {{-- NO --}}
                    <td class="border px-4 py-5 text-center">
                        {{ $loop->iteration }}
                    </td>



                    {{-- NIP --}}
                    <td class="border px-4 py-5 whitespace-nowrap">
                        {{ $item->nip }}
                    </td>



                    {{-- NAMA --}}
                    <td class="border px-4 py-5 font-medium text-gray-800">
                        {{ $item->nama_guru }}
                    </td>



                    {{-- ROLE --}}
                    <td class="border px-4 py-5 text-center whitespace-nowrap">

                        @if($item->role_guru == 'wali')

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap inline-block">
                                Wali Kelas
                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold whitespace-nowrap inline-block">
                                Guru Mapel
                            </span>

                        @endif

                    </td>



                    {{-- MAPEL --}}
                    <td class="border px-4 py-5 text-center whitespace-nowrap">
                        {{ $item->mapel->nama_mapel ?? '-' }}
                    </td>



                    {{-- WALI --}}
                    <td class="border px-4 py-5 text-center whitespace-nowrap">
                        {{ $item->kelas->nama_kelas ?? '-' }}
                    </td>



                    {{-- JK --}}
                    <td class="px-4 py-5 text-center">
                        {{ $item->jenis_kelamin }}
                    </td>



                    {{-- TTL --}}
                    <td class="border px-4 py-5">
                        <div>{{ $item->tempat_lahir }}</div>
                        <div class="text-gray-500 text-sm">
                            {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}
                        </div>
                        </td>

                    {{-- EMAIL --}}
                    <td class="border px-4 py-5">
    {{ $g->user->email ?? '-' }}
</td>



                    {{-- PASSWORD --}}
                    <td class="border px-4 py-5 text-center">

                        <span class="bg-gray-100 px-3 py-1 rounded-lg text-gray-700">
                            12345678
                        </span>

                    </td>



                    {{-- AKSI --}}
<td class="border px-4 py-5 aksi-edit">

    <div class="flex justify-center gap-2 aksi-edit">

       <a href="{{ route('guru.edit',$item->id) }}"
   class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg inline-flex items-center gap-1">

    <x-heroicon-o-pencil-square class="w-4 h-4"/>

    Edit

</a>

        <form action="{{ route('guru.destroy',$item->id) }}"
              method="POST"
              onsubmit="return confirm('Hapus guru ini?')">

            @csrf
            @method('DELETE')

            <button
    class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg inline-flex items-center gap-1">

    <x-heroicon-o-trash class="w-4 h-4"/>

    Hapus

</button>

        </form>

    </div>

</td>


                </tr>
@empty

             <tr>
    <td colspan="11" class="text-center py-10 text-gray-500">
        Data guru tidak ditemukan
    </td>
</tr>

@endforelse

</tbody>
               
</table>
</div>
    <div class="flex gap-2">

        <button
            class="px-3 py-1 border rounded-lg bg-white">
            ‹
        </button>

        <button
            class="px-3 py-1 rounded-lg bg-blue-600 text-white">
            1
        </button>

        <button
            class="px-3 py-1 border rounded-lg bg-white">
            ›
        </button>

    </div>

</div>

<style>
.switch{
    position:relative;
    width:48px;
    height:24px;
    background:#d1d5db;
    border-radius:9999px;
    cursor:pointer;
    transition:.3s;
}

.switch::before{
    content:'';
    position:absolute;
    width:20px;
    height:20px;
    top:2px;
    left:2px;
    background:#fff;
    border-radius:50%;
    transition:.3s;
}

.switch.active{
    background:#2563eb;
}

.switch.active::before{
    transform:translateX(24px);
}
</style>


<script>
document.addEventListener('DOMContentLoaded', () => {

    const toggle = document.getElementById('toggleEdit');
    const status = document.getElementById('statusEdit');

    toggle.addEventListener('click', () => {

        toggle.classList.toggle('active');

        const aktif = toggle.classList.contains('active');

        document.querySelectorAll('.aksi-edit').forEach(el => {
            el.style.display = aktif ? '' : 'none';
        });

        status.innerText = aktif ? 'Aktif' : 'Nonaktif';

    });

});
</script>
</div>
    
@endsection
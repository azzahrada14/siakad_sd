@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">
            Data Mata Pelajaran
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola data mata pelaajaran SDN Cimanahyu
        </p>

    </div>

    {{-- TOOLBAR --}}
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-5">

    {{-- Kiri --}}
    <div class="flex flex-wrap items-center gap-2">

        <form action="{{ route('mapel.import') }}"
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

        <a href="{{ route('mapel.export') }}"
           class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg">
            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>
            Export
        </a>

        <a href="{{ route('mapel.create') }}"
   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

    <x-heroicon-o-plus class="w-5 h-5"/>

    Tambah Mapel

</a>

    </div>

    {{-- Cari --}}
    <form action="{{ route('mapel.index') }}"
          method="GET"
          class="flex gap-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Mapel..."
            class="w-72 border border-gray-300 rounded-lg px-4 py-2">

        <button
            type="submit"
            class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded-lg">

            Cari 

        </button>

    </form>

</div>

    <div class="flex justify-end items-center mb-4">

    <div class="flex items-center gap-3">

        <span>Mode Edit</span>

        <div id="toggleEdit" class="switch active"></div>

        <span id="statusEdit">
            Aktif
        </span>

    </div>

</div>


    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            {{-- HEADER --}}
           <thead class="bg-gray-100 text-gray-700">
<tr>

    <th class="border p-3 text-center">No</th>
    <th class="border p-3 text-center">Nama Mapel</th>
    <th class="border p-3 text-center">Kode Mapel</th>
    <th class="border p-3 text-center">Guru Pengampu</th>
    <th class="border p-3 text-center aksi-edit">Aksi</th>

</tr>
</thead>

            {{-- BODY --}}
            <tbody>

                @forelse($mapels as $m)

                <tr class="hover:bg-gray-50">

                    <td class="border p-3 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-3">
                        {{ $m->nama_mapel }}
                    </td>

                    <td class="border p-3">
                        {{ $m->kode_mapel }}
                    </td>

                  <td class="border p-3 text-center">
    @if(strtoupper($m->nama_mapel) == 'PAI')
        Guru PAI
    @elseif(strtoupper($m->nama_mapel) == 'PJOK')
        Guru PJOK
    @else
        Wali Kelas
    @endif
</td>


<td class="border p-3 text-center aksi-edit">

    <div class="flex justify-center gap-2">

        <a href="{{ route('mapel.edit',$m->id) }}"
           class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg inline-flex items-center gap-1">

            <x-heroicon-o-pencil-square class="w-4 h-4"/>

            Edit

        </a>

        <form action="{{ route('mapel.destroy',$m->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin hapus mapel ini?')"
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

                    <td colspan="5"
                        class="border p-4 text-center text-gray-500">

                        Data belum ada

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-5 bg-white rounded-xl shadow-sm px-4 py-3 flex justify-between items-center">

    <p class="text-sm text-gray-500">
        Menampilkan {{ $mapels->count() }} data
    </p>

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
    background:white;
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

    document.querySelectorAll('.aksi-edit').forEach(el => {
        el.style.display = '';
    });

    toggle.addEventListener('click', () => {

        toggle.classList.toggle('active');

        let aktif = toggle.classList.contains('active');

        document.querySelectorAll('.aksi-edit').forEach(el => {
            el.style.display = aktif ? '' : 'none';
        });

        status.innerText = aktif
            ? 'Aktif'
            : 'Nonaktif';

    });

});
</script>

@endsection
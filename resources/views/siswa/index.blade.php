@extends('layouts.app')

@section('content')
   <div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">
            Data Siswa
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola data siswa SDN Cimanahyu
        </p>

    </div>

   <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-5">

    {{-- Kiri --}}
    <div class="flex flex-wrap items-center gap-2">

        {{-- IMPORT --}}
        <form action="{{ route('siswa.import') }}"
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

        {{-- EXPORT --}}
        <a href="{{ route('siswa.export') }}"
           class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg">

            <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>

            Export

        </a>

        {{-- TAMBAH --}}
        <a href="{{ route('siswa.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

            <x-heroicon-o-plus class="w-5 h-5"/>

            Tambah Siswa

        </a>

    </div>

    {{-- Cari --}}
    <form method="GET"
          class="flex gap-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari siswa..."
            class="w-72 border border-gray-300 rounded-lg px-4 py-2">

        <select
            name="kelas"
            class="border border-gray-300 rounded-lg px-4 py-2 bg-white">

            <option value="">Semua Kelas</option>

            @foreach($kelas as $k)

                <option value="{{ $k->id }}"
                    {{ request('kelas') == $k->id ? 'selected' : '' }}>

                    {{ $k->nama_kelas }}

                </option>

            @endforeach

        </select>

        <button
            type="submit"
            class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded-lg">

            Cari

        </button>

    </form>

</div>

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

        <div id="toggleEdit"
             class="switch active"></div>

        <span id="statusEdit">
            Aktif
        </span>

    </div>

</div>
   

        {{-- TABLE --}}
        <div class="mt-6 bg-white rounded-xl shadow overflow-x-auto w-full">
            <table class="w-full text-sm text-left">
                
                {{-- HEADER --}}
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border p-3 w-12">No</th>
                        <th class="border p-3 text-center" >Nama</th>
                        <th class="border p-3 text-center">NIPD</th>
                        <th class="border p-3 text-center">Kelas</th>
                        <th class="border p-3 text-center">Jenis Kelamin</th>
                        <th class="border p-3 text-center">NISN</th>
                        <th class="border p-3 text-center">TTL</th>
                         <th class="border p-3 text-center">Status</th>
                        <th class="border p-3 text-center">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody>
                    @forelse($siswa as $s)
                    <tr class="border-t hover:bg-gray-50">

                        <td class="border p-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-3 font-medium">
                            {{ $s->nama_siswa }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->nipd ?? '-' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->kelas->nama_kelas ?? '-' }}
                        </td>

                        <td class="p-3 text-center">
                            {{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->nisn ?? '-' }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $s->tempat_lahir ?? '-' }},
                            {{ $s->tanggal_lahir ? \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') : '-' }}
                        </td>

         


    
                    
                    <td class="border p-3 text-center">

    @if($s->status_siswa == 'Aktif')
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
            Aktif
        </span>

    @elseif($s->status_siswa == 'Naik Kelas')
        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
            Naik Kelas
        </span>

    @elseif($s->status_siswa == 'Pindah')
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
            Pindah
        </span>

    @elseif($s->status_siswa == 'Keluar')
        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
            Keluar
        </span>

    @elseif($s->status_siswa == 'Lulus')
        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs">
            Lulus
        </span>

    @elseif($s->status_siswa == 'Tidak Lulus')
        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs">
            Tidak Lulus
        </span>

    @else
        -
    @endif

</td>

<td class="border p-3">

    <div class="flex justify-center gap-2">

        {{-- DETAIL selalu tampil --}}
        <a href="{{ route('siswa.show',$s->id) }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg">
            Detail
        </a>

        {{-- EDIT ikut Mode Edit --}}
        <a href="{{ route('siswa.edit',$s->id) }}"
           class="aksi-edit bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg">
            Edit
        </a>

        {{-- HAPUS ikut Mode Edit --}}
        <form action="{{ route('siswa.destroy',$s->id) }}"
              method="POST"
              class="aksi-edit">
            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin hapus siswa ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                Hapus

            </button>

        </form>

    </div>

</td>

                    </tr>
                     

                @empty
                    <tr>
                        <td colspan="9" class="text-center p-4 text-gray-500">
                            Data belum ada
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <div class="mt-5 bg-white rounded-xl shadow-sm px-4 py-3 flex justify-between items-center">

    <p class="text-sm text-gray-500">
        Menampilkan {{ $siswa->count() }} data
    </p>

    <div class="flex gap-2">

        <button class="px-3 py-1 border rounded-lg bg-white">
            ‹
        </button>

        <button class="px-3 py-1 rounded-lg bg-blue-600 text-white">
            1
        </button>

        <button class="px-3 py-1 border rounded-lg bg-white">
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
@endsection
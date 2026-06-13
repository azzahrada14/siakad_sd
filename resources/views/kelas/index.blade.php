@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">

        {{-- KIRI --}}
        <div>
            <a href="{{ route('kelas.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-lg text-sm font-medium shadow">

                + Tambah Kelas

            </a>
        </div>

        {{-- KANAN --}}
        <form method="GET"
              class="flex items-center gap-3 flex-wrap">

            {{-- SEARCH --}}
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Cari kelas..."
                   class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-400">

            {{-- BUTTON --}}
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow">

                Filter

            </button>

        </form>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">

            {{ session('success') }}

        </div>

    @endif
    <div class="flex flex-wrap justify-between items-center gap-4 mb-4">

    

  
    {{-- Kanan --}}
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

            <thead class="bg-gray-100 text-gray-700">

                <tr>

                    <th class="border p-3 text-center">No</th>
                    <th class="border p-3 text-center">Nama Kelas</th>
                    <th class="border p-3 text-center">Tingkat</th>
                    <th class="border p-3 text-center">Wali Kelas</th>
                  <th class="border px-4 py-4 text-center font-semibold w-40 aksi-edit">
    Aksi
</th>

                </tr>

            </thead>

            <tbody>

                @forelse($kelas as $k)

                <tr class="hover:bg-gray-50">

                    <td class="border p-3 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-3 text-center">
                        {{ $k->nama_kelas }}
                    </td>

                    <td class="border p-3 text-center">
                        {{ $k->tingkat }}
                    </td>

                    <td class="border p-3 text-center">
                        {{ $k->waliKelas->nama_guru ?? '-' }}
                    </td>

                   

    <td class="border px-4 py-5 aksi-edit">

    <div class="flex justify-center gap-2">

        <a href="{{ route('kelas.edit',$k->id) }}"
           class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg inline-flex items-center gap-1">

            <x-heroicon-o-pencil-square class="w-4 h-4"/>

            Edit

        </a>

        <form action="{{ route('kelas.destroy',$k->id) }}"
              method="POST"
              onsubmit="return confirm('Hapus kelas ini?')">

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
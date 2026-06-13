@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-4xl font-bold text-gray-800">
        Data Tahun Ajaran
    </h1>

    <p class="text-gray-500 mt-1">
        Kelola data tahun ajaran dan semester
    </p>

</div>
    

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- BUTTON --}}
       <div class="flex flex-col lg:flex-row lg:justify-between gap-4 mb-5">

    <div class="flex flex-wrap gap-2">

        <a href="{{ route('tahunajaran.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

            <x-heroicon-o-plus class="w-5 h-5"/>

            Tambah Tahun Ajaran

        </a>

    </div>

    <div class="flex items-center gap-3">

        <span>Mode Edit</span>

        <div id="toggleEdit" class="switch active"></div>

        <span id="statusEdit">Aktif</span>

    </div>

</div>

        {{-- TABLE --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700">

                    <tr>

                        <th class="border p-3 text-center">No</th>
                        <th class="border p-3 text-center">Tahun Ajaran</th>
                        <th class="border p-3 text-center">Semester</th>
                        <th class="border p-3 text-center">Status</th>
                        <th class="border p-3 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tahunajaran as $item)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="border p-3 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $item->tahun_ajaran }}
                        </td>

                        <td class="border p-3 text-center">
                            {{ $item->semester }}
                        </td>

                        <td class="border p-3 text-center">

    @if($item->status == 'Aktif')

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
            Aktif
        </span>

    @else

        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs">
            Tidak Aktif
        </span>

    @endif

</td>

                     <td class="border p-3 text-center aksi-edit">

    <div class="flex justify-center gap-2">

        <a href="{{ route('tahunajaran.edit',$item->id) }}"
           class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-2 rounded-lg">

            Edit

        </a>

        <form action="{{ route('tahunajaran.destroy',$item->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin hapus data?')"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

                Hapus

            </button>

        </form>

    </div>

</td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center p-4 text-gray-500">

                            Data belum tersedia

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

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
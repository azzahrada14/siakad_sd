@extends('layouts.app')

@section('content')

<div class="p-6">

    <h2 class="text-2xl font-bold mb-4">Data Mata Pelajaran</h2>

    <a href="{{ route('mapel.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
       + Tambah Mapel
    </a>

    <div class="mt-6 bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full text-sm text-center border">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-3">No</th>
                    <th class="border p-3">Nama Mapel</th>
                    <th class="border p-3">Kode</th>
                    <th class="border p-3">Guru</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @foreach($mapels as $m)
            <tr class="hover:bg-gray-50">

                <td class="border p-3">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-3">
                    {{ $m->nama_mapel }}
                </td>

                <td class="border p-3">
                    {{ $m->kode_mapel }}
                </td>

                <td class="border p-3">
                    {{ $m->guru->nama_guru ?? '-' }}
                </td>

                <td class="border p-3">

                    <a href="{{ route('mapel.edit', $m->id) }}"
                       class="text-blue-600 hover:underline">
                       Edit
                    </a>

                    @if(auth()->role == 'admin')
                    <form action="{{ route('mapel.destroy', $m->id) }}"
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')"
                                class="text-red-600 ml-2 hover:underline">
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>
            @endforeach

            @if($mapels->isEmpty())
            <tr>
                <td colspan="5" class="p-4 text-gray-500">
                    Data belum ada
                </td>
            </tr>
            @endif

            </tbody>

        </table>

    </div>

</div>

@endsection
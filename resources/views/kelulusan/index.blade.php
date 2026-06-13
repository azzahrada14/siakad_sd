@extends('layouts.app')

@section('content')

<div class="p-6">

<div class="bg-white rounded-xl shadow p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-3xl font-bold text-gray-800">
                Kelulusan Siswa
            </h2>

            <p class="text-gray-500">
                Daftar kelulusan siswa kelas VI.
            </p>

        </div>

        @if(Auth::user()->role=='operator')

        <a href="{{ route('kelulusan.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

            + Proses Kelulusan

        </a>

        @endif

    </div>

    {{-- Alert --}}
    @if(session('success'))

    <div class="bg-green-100 text-green-700 p-3 rounded mb-5">

        {{ session('success') }}

    </div>

    @endif

    {{-- Tabel --}}
    <div class="overflow-x-auto">

        <table class="w-full border">

            <thead class="bg-blue-600 text-white">

                <tr>

                    <th class="border p-2">No</th>

                    <th class="border p-2">Nama Siswa</th>

                    <th class="border p-2">Kelas</th>

                    <th class="border p-2">Tahun Ajaran</th>

                    <th class="border p-2">Status</th>

                    @if(Auth::user()->role=='operator')
                    <th class="border p-2">Aksi</th>
                    @endif

                </tr>

            </thead>

            <tbody>

                @forelse($kelulusan as $item)

                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $item->siswa->nama_siswa }}
                    </td>

                    <td class="border p-2">

Kelas {{ $item->siswa->kelas->nama_kelas }}

</td>

                    <td class="border p-2">
                        {{ $item->tahunAjaran->tahun_ajaran }}
                    </td>

                    <td class="border p-2 text-center">

                        @if($item->status=='Lulus')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            Lulus

                        </span>

                        @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                            Tidak Lulus

                        </span>

                        @endif

                    </td>

                    @if(Auth::user()->role=='operator')

                    <td class="border p-2">

                        <div class="flex justify-center">

                            <form action="{{ route('kelulusan.destroy',$item->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Hapus data kelulusan?')"
                                    class="bg-red-600 hover:bg-red-700 text-white p-2 rounded">

                                    <x-heroicon-o-trash class="w-5 h-5"/>

                                </button>

                            </form>

                        </div>

                    </td>

                    @endif

                </tr>

                @empty

                <tr>

                    <td colspan="{{ Auth::user()->role=='operator' ? 6 : 5 }}"
                        class="text-center p-5">

                        Belum ada data kelulusan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
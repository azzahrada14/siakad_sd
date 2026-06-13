@extends('layouts.app')

@section('content')

<div class="mb-6">

    <h1 class="text-4xl font-bold text-gray-800">
        Status Siswa
    </h1>

    <p class="text-gray-500 mt-1">
        Monitoring status akademik siswa
    </p>

</div>



    

 <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4 mb-5">

    {{-- FILTER KIRI --}}
    <form method="GET"
          class="flex flex-wrap items-center gap-3">

        <select name="kelas_id"
                class="border border-gray-300 rounded-lg px-4 py-2">

            <option value="">Semua Kelas</option>

            @foreach($kelas as $item)
            <option value="{{ $item->id }}"
                {{ request('kelas_id') == $item->id ? 'selected' : '' }}>
                {{ $item->nama_kelas }}
            </option>
            @endforeach

        </select>

        <select name="tahun_ajaran_id"
                class="border border-gray-300 rounded-lg px-4 py-2">

            @foreach($tahunajaran as $ta)
            <option value="{{ $ta->id }}"
                {{ request('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                {{ $ta->tahun_ajaran }}
            </option>
            @endforeach

        </select>

        <select name="semester"
                class="border border-gray-300 rounded-lg px-4 py-2">

            <option value="Ganjil"
                {{ request('semester') == 'Ganjil' ? 'selected' : '' }}>
                Ganjil
            </option>

            <option value="Genap"
                {{ request('semester') == 'Genap' ? 'selected' : '' }}>
                Genap
            </option>

        </select>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

            Filter

        </button>

    </form>

    {{-- TAMPILKAN ENTRI KANAN --}}
    <div class="flex items-center gap-2">

        <span class="text-sm text-gray-500">
            Tampilkan
        </span>

        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">

            <option>10</option>
            <option>25</option>
            <option>50</option>

        </select>

        <span class="text-sm text-gray-500">
            entri
        </span>

    </div>

</div>

 {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">

    <table class="w-full text-sm">

        <thead class="bg-slate-700 text-white">

            <tr>

                <th class="border p-3 text-center">No</th>
                <th class="border p-3 text-center">Nama Siswa</th>
                <th class="border p-3 text-center">NISN</th>
                <th class="border p-3 text-center">Kelas</th>
                <th class="border p-3 text-center">Status</th>

                @if(Auth::user()->role == 'operator')
                <th class="border p-3 text-center">
                    Aksi
                </th>
                @endif

            </tr>

        </thead>

        <tbody>

            @foreach($siswa as $item)

            <tr class="border-b hover:bg-gray-50">

                <td class="border p-3 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-3">
                    {{ $item->nama_siswa }}
                </td>

                <td class="border p-3 text-center">
                    {{ $item->nisn }}
                </td>

                <td class="border p-3 text-center">
                    {{ $item->kelas->nama_kelas ?? '-' }}
                </td>

                <td class="border p-3 text-center">

                    @if($item->status_siswa == 'Aktif')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                            Aktif
                        </span>

                    @elseif($item->status_siswa == 'Naik Kelas')
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
                            Naik Kelas
                        </span>

                    @elseif($item->status_siswa == 'Lulus')
                        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs">
                            Lulus
                        </span>

                    @elseif($item->status_siswa == 'Pindah')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                            Pindah
                        </span>
                    @endif

                </td>

                @if(Auth::user()->role == 'operator')

                <td class="border p-3">

                    <form action="{{ route('status-siswa.update',$item->id) }}"
                          method="POST"
                          class="flex justify-center gap-2">

                        @csrf
                        @method('PUT')

                        <select name="status_siswa"
                                class="border border-gray-300 rounded-lg px-3 py-2">

                            <option value="Aktif" {{ $item->status_siswa == 'Aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="Naik Kelas" {{ $item->status_siswa == 'Naik Kelas' ? 'selected' : '' }}>
                                Naik Kelas
                            </option>

                            <option value="Lulus" {{ $item->status_siswa == 'Lulus' ? 'selected' : '' }}>
                                Lulus
                            </option>

                            <option value="Pindah" {{ $item->status_siswa == 'Pindah' ? 'selected' : '' }}>
                                Pindah
                            </option>

                        </select>

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                            Simpan

                        </button>

                    </form>

                </td>

                @endif

            </tr>

            @endforeach

        </tbody>

    </table>

</div>


<div class="mt-5 bg-white rounded-xl shadow-sm px-4 py-3 flex justify-between items-center">

    <p class="text-sm text-gray-500">
        Menampilkan {{ $siswa->count() }} data siswa
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
@endsection
@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    {{-- HEADER --}}
    <div class="mb-6">

        <h1 class="text-4xl font-bold text-gray-800">
            Ranking Siswa
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola dan lihat peringkat siswa berdasarkan nilai rata-rata
        </p>

    </div>

    {{-- TOOLBAR --}}
    

        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">

            {{-- Generate Ranking --}}
            <div>

                @if(Auth::user()->role == 'guru')

                <a href="{{ route('ranking.generate',[
                    'kelas_id' => request('kelas_id'),
                    'tahun_ajaran_id' => request('tahun_ajaran_id'),
                    'semester' => request('semester')
                ]) }}"
                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">

                    <x-heroicon-o-trophy class="w-5 h-5"/>

                    Generate Ranking

                </a>

                @endif

            </div>

            {{-- Filter --}}
            <form method="GET"
                  class="flex flex-wrap items-center gap-3">

                @if(Auth::user()->role != 'guru')

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

                @endif

                <select name="tahun_ajaran_id"
                        class="border border-gray-300 rounded-lg px-4 py-2">

                    @foreach($tahunAjaran as $ta)

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

        </div>

   <br>
         

   

   {{-- TABLE --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gray-100 text-gray-700">

            <tr>

                <th class="border p-3 text-center">No</th>
                <th class="border p-3 text-center">NIPD</th>
                <th class="border p-3 text-center">NISN</th>
                <th class="border p-3 text-center">Nama Siswa</th>
                <th class="border p-3 text-center">Kelas</th>
                <th class="border p-3 text-center">Rata-rata</th>
                <th class="border p-3 text-center">Ranking</th>

            </tr>

        </thead>

        <tbody>

            @forelse($ranking as $item)

            <tr class="hover:bg-slate-50">

                <td class="border p-3 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-3 text-center">
                    {{ $item->siswa->nipd }}
                </td>

                <td class="border p-3 text-center">
                    {{ $item->siswa->nisn }}
                </td>

                <td class="border p-3">
                    {{ $item->siswa->nama_siswa }}
                </td>

                <td class="border p-3 text-center">
                    {{ $item->kelas->nama_kelas ?? '-' }}
                </td>

                <td class="border p-3 text-center font-semibold text-blue-600">
                    {{ number_format($item->rata_rata,2) }}
                </td>

            <td class="border p-3 text-center">

    @if($item->ranking == 1)

        <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
            <x-heroicon-s-trophy class="w-4 h-4"/>
            Juara 1
        </span>

    @elseif($item->ranking == 2)

        <span class="inline-flex items-center gap-1 bg-slate-100 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">
            <x-heroicon-s-trophy class="w-4 h-4"/>
            Juara 2
        </span>

    @elseif($item->ranking == 3)

        <span class="inline-flex items-center gap-1 bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-semibold">
            <x-heroicon-s-trophy class="w-4 h-4"/>
            Juara 3
        </span>

    @else

        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs">
            Ranking {{ $item->ranking }}
        </span>

    @endif

</td>

            </tr>

@empty

<tr>
    <td colspan="7" class="p-5 text-center text-gray-500">
        Data ranking belum tersedia
    </td>
</tr>

@endforelse

        </tbody>

    </table>

</div>
<div class="mt-5 bg-white rounded-xl shadow-sm px-4 py-3">

    <p class="text-sm text-gray-500">
        Menampilkan {{ $ranking->count() }} data ranking
    </p>

</div>
@endsection
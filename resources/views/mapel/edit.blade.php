@extends('layouts.app')

@section('content')
 <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                 <h2 class="text-xl font-bold mb-6">Edit Mapel</h2>
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('PUT')


{{-- Nama --}}
            <div class="mb-4">
                <label>Nama Mapel</label>
                <input type="text" name="nama_mapel"
                    value="{{ $mapel->nama_mapel }}"
                    class="w-full border p-2 rounded" required>
            </div>

            {{-- Kode --}}
            <div class="mb-4">
                <label>Kode</label>
                <input type="text" name="kode_mapel"
                    value="{{ $mapel->kode_mapel }}"
                    class="w-full border p-2 rounded" required>
            </div>

        {{-- Nama Guru --}}
           <div class="mb-4">
                <label>Nama Guru mapel</label>
                <select name="guru_id" class="w-full border p-2 rounded">
                                            <option value="">-- Pilih Guru --</option>
                    @foreach($guru as $g)
                        <option value="{{ $g->id }}"
                            {{ isset($mapel->guru_id) && $mapel->guru_id == $g->id ? 'selected' : '' }}>
                            {{ $g->nama_guru }}
                        </option>
                    @endforeach
                </select>
            </div>

<div class="flex gap-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Update
                </button>

                <a href="{{ route('mapel.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
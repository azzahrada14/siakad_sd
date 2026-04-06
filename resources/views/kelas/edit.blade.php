@extends('layouts.app')

@section('content')
 <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                 <h2 class="text-xl font-bold mb-6">Edit Kelas</h2>
                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')


      <div class="mb-4">
                        <label>Edit Kelas</label>
                        <input type="text" name="edit_kelas" value="{{ $kelas->edit_kelas }}" class="w-full border rounded p-2">
                    </div>

            <div class="mb-4">
                        <label>Tingkat</label>
                        <input type="text" name="tingkat_kelas" value="{{ $kelas->tingkat_kelas }}" class="w-full border rounded p-2" required>
                    </div>
                <div class="mb-4">
                <label>wali kelas</label>
                <select name="guru_id" class="w-full border p-2 rounded">
                    @foreach($guru as $g)
                        <option value="{{ $g->id }}"
                            {{ $kelas->wali_kelas_id == $g->id ? 'selected' : '' }}>
                            {{ $g->nama_guru }}
                        </option>
                    @endforeach
                </select>
            </div>

              <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Update
                    </button>
                    <a href="{{ route('guru.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
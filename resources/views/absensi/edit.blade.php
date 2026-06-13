@extends('layouts.app')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Edit Absensi
    </h1>

    <form action="{{ route('absensi.update', $absensi->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <select name="status"
                class="border rounded px-4 py-2">

            <option value="hadir"
                {{ $absensi->status == 'hadir' ? 'selected' : '' }}>
                Hadir
            </option>

            <option value="izin"
                {{ $absensi->status == 'izin' ? 'selected' : '' }}>
                Izin
            </option>

            <option value="sakit"
                {{ $absensi->status == 'sakit' ? 'selected' : '' }}>
                Sakit
            </option>

            <option value="alfa"
                {{ $absensi->status == 'alfa' ? 'selected' : '' }}>
                Alfa
            </option>

        </select>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded">

            Update

        </button>

    </form>

</div>

@endsection
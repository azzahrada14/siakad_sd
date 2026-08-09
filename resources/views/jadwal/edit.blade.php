@extends('layouts.app')

@section('title', 'Edit Jadwal')

@section('content')

<div class="max-w-5xl mx-auto py-6 px-6">

    <h1 class="text-3xl font-bold mb-6">
        Edit Jadwal Pelajaran
    </h1>

    <form
        action="{{ route('jadwal.update', $jadwal->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('jadwal.form')

    </form>

</div>

@endsection
@extends('layouts.app')

@section('title','Tambah Jadwal')

@section('content')

<div class="max-w-5xl mx-auto py-6 px-6">

<h1 class="text-3xl font-bold mb-6">

Tambah Jadwal Pelajaran

</h1>

<form
action="{{ route('jadwal.store') }}"
method="POST">

@include('jadwal.form')

</form>

</div>

@endsection
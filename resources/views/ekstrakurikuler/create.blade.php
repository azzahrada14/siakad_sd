@extends('layouts.app')

@section('title','Tambah Ekstrakurikuler')

@section('content')

<form
action="{{ route('ekstrakurikuler.store') }}"
method="POST">

@include('ekstrakurikuler.form')

</form>

@endsection
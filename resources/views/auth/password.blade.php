@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">
        Ganti Password
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Password Lama</label>
            <input type="password" name="password_lama"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password_baru"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_baru_confirmation"
                class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="p-6">

<div class="bg-white rounded-xl shadow p-6">

<h2 class="text-3xl font-bold mb-6">

Edit Kelulusan

</h2>

<form
action="{{ route('kelulusan.update',$kelulusan->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-5">

<label>Siswa</label>

<select
name="siswa_id"
class="w-full border rounded-lg p-2">

@foreach($siswa as $item)

<option
value="{{ $item->id }}"
{{ $item->id==$kelulusan->siswa_id?'selected':'' }}>

{{ $item->nama_siswa }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label>Tahun Ajaran</label>

<select
name="tahun_ajaran_id"
class="w-full border rounded-lg p-2">

@foreach($tahun as $item)

<option
value="{{ $item->id }}"
{{ $item->id==$kelulusan->tahun_ajaran_id?'selected':'' }}>

{{ $item->tahun_ajaran }}

</option>

@endforeach

</select>

</div>

<div class="mb-5">

<label>Status</label>

<select
name="status"
class="w-full border rounded-lg p-2">

<option
value="Lulus"
{{ $kelulusan->status=='Lulus'?'selected':'' }}>

Lulus

</option>

<option
value="Tidak Lulus"
{{ $kelulusan->status=='Tidak Lulus'?'selected':'' }}>

Tidak Lulus

</option>

</select>

</div>

<button
class="bg-blue-600 text-white px-5 py-2 rounded">

Update

</button>

</form>

</div>

</div>

@endsection
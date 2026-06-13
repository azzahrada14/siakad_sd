@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-100 min-h-screen flex justify-center">

        <div class="w-full max-w-3xl bg-white p-6 rounded-xl shadow">

            <h2 class="text-xl font-bold mb-6">Tambah Siswa</h2>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf


                {{-- Nama --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama Siswa</label>
                    <input type="text" name="nama_siswa"
                        class="w-full border p-2 rounded"
                        required>
                </div>

                {{-- Kelas --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Kelas</label>
                        <select name="kelas_id" class="w-full border p-2 rounded">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas->groupBy('tingkat') as $tingkat => $group)
                                <optgroup label="Kelas {{ $tingkat }}">
                                    @foreach ($group as $k)
                                        <option value="{{ $k->id }}">
                                            {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="w-full border p-2 rounded"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                {{-- NIPD --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">NIPD</label>
                    <input type="text" name="nipd"
                       maxlength="9"
                       pattern="\d{9}"
                       title="NIPD harus berupa 9 digit angka"
                        class="w-full border p-2 rounded">
                </div>

                {{-- NISN --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">NISN</label>
                    <input type="text" name="nisn"
                       maxlength="10"
                       pattern="\d{10}"
                       title="NISN harus berupa 10 digit angka" 
                    class="w-full border p-2 rounded">
                </div>

                {{-- Tempat Lahir --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="w-full border p-2 rounded">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        class="w-full border p-2 rounded">
                </div>

                {{-- Agama --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Agama</label>
    <input type="text"
        name="agama"
        class="w-full border p-2 rounded">
</div>

{{-- Alamat --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Alamat</label>
    <textarea
        name="alamat"
        rows="3"
        class="w-full border p-2 rounded"></textarea>
</div>

{{-- Nama Ayah --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Nama Ayah</label>
    <input type="text"
        name="nama_ayah"
        class="w-full border p-2 rounded">
</div>

{{-- Nama Ibu --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Nama Ibu</label>
    <input type="text"
        name="nama_ibu"
        class="w-full border p-2 rounded">
</div>

{{-- Pekerjaan Ayah --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Pekerjaan Ayah</label>
    <input type="text"
        name="pekerjaan_ayah"
        class="w-full border p-2 rounded">
</div>

{{-- Pekerjaan Ibu --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Pekerjaan Ibu</label>
    <input type="text"
        name="pekerjaan_ibu"
        class="w-full border p-2 rounded">
</div>

{{-- Status Siswa --}}
<div class="mb-4">
    <label class="block text-sm font-medium">Status Siswa</label>

    <select
        name="status_siswa"
        class="w-full border p-2 rounded">

        <option value="Aktif">Aktif</option>
        <option value="Naik Kelas">Naik Kelas</option>
        <option value="Pindah">Pindah</option>
        <option value="Keluar">Keluar</option>
        <option value="Lulus">Lulus</option>
        <option value="Tidak Lulus">Tidak Lulus</option>

    </select>
</div>

<div class="mb-4">
    <label>Nama Wali</label>
    <input type="text"
           name="nama_wali"
           class="w-full border p-2 rounded">
</div>

<div class="mb-4">
    <label>Pekerjaan Wali</label>
    <input type="text"
           name="pekerjaan_wali"
           class="w-full border p-2 rounded">
</div>

<div class="mb-4">
    <label>Telepon Orang Tua</label>
    <input type="text"
           name="telepon_orangtua"
           class="w-full border p-2 rounded">
</div>

<div class="mb-4">
    <label>Tahun Masuk</label>
    <input type="number"
           name="tahun_masuk"
           class="w-full border p-2 rounded">
</div>

                {{-- BUTTON --}}
               <div class="flex gap-2">
                      <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Simpan
                        </button>

                        <a href="{{ route('siswa.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
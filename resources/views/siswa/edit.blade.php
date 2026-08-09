@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <div class="max-w-7xl mx-auto px-6 py-6">

        {{-- ================= BREADCRUMB ================= --}}

        <nav class="flex items-center text-sm text-gray-500 mb-5">

            <a href="{{ route('dashboard') }}"
                class="hover:text-blue-600">

                Dashboard

            </a>

            <x-heroicon-o-chevron-right class="w-4 h-4 mx-2"/>

            <a href="{{ route('siswa.index') }}"
                class="hover:text-blue-600">

                Peserta Didik

            </a>

            <x-heroicon-o-chevron-right class="w-4 h-4 mx-2"/>

            <span class="font-semibold text-gray-700">

                Edit Peserta Didik

            </span>

        </nav>

        {{-- ================= HEADER ================= --}}

        <div class="flex flex-col lg:flex-row justify-between lg:items-center mb-6">

            <div>

                <h1 class="text-3xl font-bold text-slate-800">

                    Edit Peserta Didik

                </h1>

                <p class="text-gray-500 mt-1">

                    Perbarui data peserta didik SD Negeri Cimanahayu

                </p>

            </div>

            <div class="flex gap-3 mt-5 lg:mt-0">

                <a
                    href="{{ route('siswa.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white">

                    <x-heroicon-o-arrow-left class="w-5 h-5"/>

                    Kembali

                </a>

                <button
                    form="formSiswa"
                    type="submit"
                    class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

                    <x-heroicon-o-check-circle class="w-5 h-5"/>

                    Simpan Perubahan

                </button>

            </div>

        </div>

        {{-- ERROR VALIDASI --}}

        @if ($errors->any())

        <div class="mb-6 rounded-lg bg-red-100 border border-red-300 p-4">

            <ul class="list-disc ml-5 text-red-700">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        {{-- FORM --}}

        <form
            id="formSiswa"
            action="{{ route('siswa.update',$siswa->id) }}"
            method="POST">

            @csrf

            @method('PUT')

            {{-- ================= IDENTITAS PESERTA DIDIK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-blue-700">

            Identitas Peserta Didik

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Nama Peserta Didik

                </label>

                <input
                    type="text"
                    name="nama_siswa"
                    value="{{ old('nama_siswa',$siswa->nama_siswa) }}"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">

            </div>

            {{-- NIPD --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    NIPD

                </label>

                <input
                    type="text"
                    name="nipd"
                    value="{{ old('nipd',$siswa->nipd) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- NISN --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    NISN

                </label>

                <input
                    type="text"
                    name="nisn"
                    value="{{ old('nisn',$siswa->nisn) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- NIK --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    NIK

                </label>

                <input
                    type="text"
                    name="nik"
                    value="{{ old('nik',$siswa->nik) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Jenis Kelamin --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Jenis Kelamin

                </label>

                <select
                    name="jenis_kelamin"
                    class="w-full rounded-lg border-gray-300">

                    <option value="L"
                        {{ old('jenis_kelamin',$siswa->jenis_kelamin)=='L'?'selected':'' }}>

                        Laki-laki

                    </option>

                    <option value="P"
                        {{ old('jenis_kelamin',$siswa->jenis_kelamin)=='P'?'selected':'' }}>

                        Perempuan

                    </option>

                </select>

            </div>

            {{-- Agama --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Agama

                </label>

                <select
                    name="agama"
                    class="w-full rounded-lg border-gray-300">

                    @foreach([
                        'Islam',
                        'Kristen',
                        'Katolik',
                        'Hindu',
                        'Budha',
                        'Konghucu'
                    ] as $agama)

                    <option
                        value="{{ $agama }}"
                        {{ old('agama',$siswa->agama)==$agama?'selected':'' }}>

                        {{ $agama }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Tempat Lahir --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Tempat Lahir

                </label>

                <input
                    type="text"
                    name="tempat_lahir"
                    value="{{ old('tempat_lahir',$siswa->tempat_lahir) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Tanggal Lahir --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Tanggal Lahir

                </label>

                <input
                    type="date"
                    name="tanggal_lahir"
                    value="{{ old('tanggal_lahir',$siswa->tanggal_lahir) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Kewarganegaraan --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Kewarganegaraan

                </label>

                <input
                    type="text"
                    name="kewarganegaraan"
                    value="{{ old('kewarganegaraan',$siswa->kewarganegaraan) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Tahun Masuk --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Tahun Masuk

                </label>

                <input
                    type="number"
                    name="tahun_masuk"
                    value="{{ old('tahun_masuk',$siswa->tahun_masuk) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Tingkat --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Tingkat

                </label>

                <select
                    name="tingkat"
                    class="w-full rounded-lg border-gray-300">

                    @for($i=1;$i<=6;$i++)

                        <option
                            value="{{ $i }}"
                            {{ old('tingkat',$siswa->tingkat)==$i?'selected':'' }}>

                            Kelas {{ $i }}

                        </option>

                    @endfor

                </select>

            </div>

            {{-- Rombel --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Rombel

                </label>

                <select
                    name="kelas_id"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">Pilih Rombel</option>

                    @foreach($kelas as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ old('kelas_id',$siswa->kelas_id)==$item->id?'selected':'' }}>

                        {{ $item->nama_kelas }}

                    </option>

                    @endforeach

                </select>

            </div>

            {{-- Status --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Status Peserta Didik

                </label>

                <select
                    name="status_siswa"
                    class="w-full rounded-lg border-gray-300">

                    @foreach([
                        'Aktif',
                        'Naik Kelas',
                        'Lulus',
                        'Pindah',
                        'Keluar'
                    ] as $status)

                    <option
                        value="{{ $status }}"
                        {{ old('status_siswa',$siswa->status_siswa)==$status?'selected':'' }}>

                        {{ $status }}

                    </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

</div>
{{-- ================= DATA TEMPAT TINGGAL ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-green-700">

            Data Tempat Tinggal

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Alamat --}}
            <div class="md:col-span-2">

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Alamat Lengkap

                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full rounded-lg border-gray-300">{{ old('alamat',$siswa->alamat) }}</textarea>

            </div>

            {{-- Jalan --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Jalan

                </label>

                <input
                    type="text"
                    name="jalan"
                    value="{{ old('jalan',$siswa->jalan) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- RT --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    RT

                </label>

                <input
                    type="text"
                    name="rt"
                    value="{{ old('rt',$siswa->rt) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- RW --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    RW

                </label>

                <input
                    type="text"
                    name="rw"
                    value="{{ old('rw',$siswa->rw) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Dusun --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Dusun

                </label>

                <input
                    type="text"
                    name="dusun"
                    value="{{ old('dusun',$siswa->dusun) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Desa --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Desa / Kelurahan

                </label>

                <input
                    type="text"
                    name="desa"
                    value="{{ old('desa',$siswa->desa) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Kecamatan --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Kecamatan

                </label>

                <input
                    type="text"
                    name="kecamatan"
                    value="{{ old('kecamatan',$siswa->kecamatan) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Kabupaten --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Kabupaten

                </label>

                <input
                    type="text"
                    name="kabupaten"
                    value="{{ old('kabupaten',$siswa->kabupaten) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Provinsi --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Provinsi

                </label>

                <input
                    type="text"
                    name="provinsi"
                    value="{{ old('provinsi',$siswa->provinsi) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Kode Pos --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Kode Pos

                </label>

                <input
                    type="text"
                    name="kode_pos"
                    value="{{ old('kode_pos',$siswa->kode_pos) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Jenis Tinggal --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Jenis Tinggal

                </label>

                <input
                    type="text"
                    name="jenis_tinggal"
                    value="{{ old('jenis_tinggal',$siswa->jenis_tinggal) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Transportasi --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Alat Transportasi

                </label>

                <input
                    type="text"
                    name="transportasi"
                    value="{{ old('transportasi',$siswa->transportasi) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Jarak Rumah --}}
            <div>

                <label class="block text-sm font-medium text-gray-700 mb-2">

                    Jarak Rumah (KM)

                </label>

                <input
                    type="text"
                    name="jarak_rumah"
                    value="{{ old('jarak_rumah',$siswa->jarak_rumah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>

{{-- ================= DATA AYAH ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-blue-700">

            Data Ayah Kandung

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Nama Ayah --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama Ayah

                </label>

                <input
                    type="text"
                    name="nama_ayah"
                    value="{{ old('nama_ayah',$siswa->nama_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- NIK Ayah --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    NIK Ayah

                </label>

                <input
                    type="text"
                    name="nik_ayah"
                    value="{{ old('nik_ayah',$siswa->nik_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Tahun Lahir --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    Tahun Lahir Ayah

                </label>

                <input
                    type="number"
                    name="tahun_lahir_ayah"
                    value="{{ old('tahun_lahir_ayah',$siswa->tahun_lahir_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Pendidikan --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    Pendidikan Ayah

                </label>

                <input
                    type="text"
                    name="pendidikan_ayah"
                    value="{{ old('pendidikan_ayah',$siswa->pendidikan_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Pekerjaan --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    Pekerjaan Ayah

                </label>

                <input
                    type="text"
                    name="pekerjaan_ayah"
                    value="{{ old('pekerjaan_ayah',$siswa->pekerjaan_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            {{-- Penghasilan --}}
            <div>

                <label class="block text-sm font-medium mb-2">

                    Penghasilan Ayah

                </label>

                <input
                    type="text"
                    name="penghasilan_ayah"
                    value="{{ old('penghasilan_ayah',$siswa->penghasilan_ayah) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>
{{-- ================= DATA IBU ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-pink-700">

            Data Ibu Kandung

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama Ibu

                </label>

                <input
                    type="text"
                    name="nama_ibu"
                    value="{{ old('nama_ibu',$siswa->nama_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    NIK Ibu

                </label>

                <input
                    type="text"
                    name="nik_ibu"
                    value="{{ old('nik_ibu',$siswa->nik_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Tahun Lahir Ibu

                </label>

                <input
                    type="number"
                    name="tahun_lahir_ibu"
                    value="{{ old('tahun_lahir_ibu',$siswa->tahun_lahir_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Pendidikan Ibu

                </label>

                <input
                    type="text"
                    name="pendidikan_ibu"
                    value="{{ old('pendidikan_ibu',$siswa->pendidikan_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Pekerjaan Ibu

                </label>

                <input
                    type="text"
                    name="pekerjaan_ibu"
                    value="{{ old('pekerjaan_ibu',$siswa->pekerjaan_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Penghasilan Ibu

                </label>

                <input
                    type="text"
                    name="penghasilan_ibu"
                    value="{{ old('penghasilan_ibu',$siswa->penghasilan_ibu) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>

{{-- ================= DATA WALI ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-amber-700">

            Data Wali

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama Wali

                </label>

                <input
                    type="text"
                    name="nama_wali"
                    value="{{ old('nama_wali',$siswa->nama_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    NIK Wali

                </label>

                <input
                    type="text"
                    name="nik_wali"
                    value="{{ old('nik_wali',$siswa->nik_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Tahun Lahir Wali

                </label>

                <input
                    type="number"
                    name="tahun_lahir_wali"
                    value="{{ old('tahun_lahir_wali',$siswa->tahun_lahir_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Pendidikan Wali

                </label>

                <input
                    type="text"
                    name="pendidikan_wali"
                    value="{{ old('pendidikan_wali',$siswa->pendidikan_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Pekerjaan Wali

                </label>

                <input
                    type="text"
                    name="pekerjaan_wali"
                    value="{{ old('pekerjaan_wali',$siswa->pekerjaan_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Penghasilan Wali

                </label>

                <input
                    type="text"
                    name="penghasilan_wali"
                    value="{{ old('penghasilan_wali',$siswa->penghasilan_wali) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>
{{-- ================= DATA PERIODIK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-indigo-700">

            Data Periodik

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-3 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">

                    Anak Ke

                </label>

                <input
                    type="number"
                    name="anak_ke"
                    value="{{ old('anak_ke',$siswa->anak_ke) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Jumlah Saudara

                </label>

                <input
                    type="number"
                    name="jumlah_saudara"
                    value="{{ old('jumlah_saudara',$siswa->jumlah_saudara) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nomor KK

                </label>

                <input
                    type="text"
                    name="kk"
                    value="{{ old('kk',$siswa->kk) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Tinggi Badan (cm)

                </label>

                <input
                    type="number"
                    name="tinggi_badan"
                    value="{{ old('tinggi_badan',$siswa->tinggi_badan) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Berat Badan (kg)

                </label>

                <input
                    type="number"
                    name="berat_badan"
                    value="{{ old('berat_badan',$siswa->berat_badan) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Lingkar Kepala

                </label>

                <input
                    type="number"
                    name="lingkar_kepala"
                    value="{{ old('lingkar_kepala',$siswa->lingkar_kepala) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>
{{-- ================= PROGRAM INDONESIA PINTAR ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-emerald-700">

            Program Indonesia Pintar (PIP)

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">
                    Penerima KIP
                </label>

                <select name="kip"
                    class="w-full rounded-lg border-gray-300">

                    <option value="">Pilih</option>

                    <option value="Ya"
                        {{ old('kip',$siswa->kip)=='Ya'?'selected':'' }}>
                        Ya
                    </option>

                    <option value="Tidak"
                        {{ old('kip',$siswa->kip)=='Tidak'?'selected':'' }}>
                        Tidak
                    </option>

                </select>

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nomor KIP

                </label>

                <input
                    type="text"
                    name="no_kip"
                    value="{{ old('no_kip',$siswa->no_kip) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama pada KIP

                </label>

                <input
                    type="text"
                    name="nama_kip"
                    value="{{ old('nama_kip',$siswa->nama_kip) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Layak PIP

                </label>

                <input
                    type="text"
                    name="layak_pip"
                    value="{{ old('layak_pip',$siswa->layak_pip) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div class="md:col-span-2">

                <label class="block text-sm font-medium mb-2">

                    Alasan Layak

                </label>

                <textarea
                    name="alasan_layak"
                    rows="3"
                    class="w-full rounded-lg border-gray-300">{{ old('alasan_layak',$siswa->alasan_layak) }}</textarea>

            </div>

        </div>

    </div>

</div>
{{-- ================= DATA BANK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-cyan-700">

            Data Bank

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-3 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama Bank

                </label>

                <input
                    type="text"
                    name="bank"
                    value="{{ old('bank',$siswa->bank) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nomor Rekening

                </label>

                <input
                    type="text"
                    name="rekening"
                    value="{{ old('rekening',$siswa->rekening) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Nama Pemilik Rekening

                </label>

                <input
                    type="text"
                    name="nama_rekening"
                    value="{{ old('nama_rekening',$siswa->nama_rekening) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>
{{-- ================= KOORDINAT RUMAH ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-red-700">

            Koordinat Rumah

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block text-sm font-medium mb-2">

                    Latitude

                </label>

                <input
                    type="text"
                    name="latitude"
                    value="{{ old('latitude',$siswa->latitude) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

            <div>

                <label class="block text-sm font-medium mb-2">

                    Longitude

                </label>

                <input
                    type="text"
                    name="longitude"
                    value="{{ old('longitude',$siswa->longitude) }}"
                    class="w-full rounded-lg border-gray-300">

            </div>

        </div>

    </div>

</div>
<div class="flex justify-end gap-3 mt-8">

    <a
        href="{{ route('siswa.index') }}"
        class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">

        <x-heroicon-o-arrow-left class="w-5 h-5"/>

        Kembali

    </a>

    <button
        type="submit"
        class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

        <x-heroicon-o-check-circle class="w-5 h-5"/>

        Simpan Perubahan

    </button>

</div>

</form>

</div>

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <div class="max-w-7xl mx-auto px-6 py-6">
        <nav class="flex items-center text-sm text-gray-500 mb-4">

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

    <span class="text-gray-700 font-medium">

        Detail Peserta Didik

    </span>

</nav>

        {{-- ================= HEADER ================= --}}
        


            

        {{-- ================= PROFIL SISWA ================= --}}
        <div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

            <div class="p-6 flex flex-col md:flex-row gap-6 items-center">

                <div
                    class="w-28 h-28 rounded-full bg-blue-100 flex items-center justify-center">

                    <x-heroicon-o-user
                        class="w-16 h-16 text-blue-600"/>

                </div>

                <div class="flex-1">

                    <h2 class="text-2xl font-bold text-gray-800">

                        {{ $siswa->nama_siswa }}

                    </h2>

                    <p class="text-gray-500 mt-1">

                        NISN :
                        {{ $siswa->nisn ?? '-' }}

                    </p>

                    <p class="text-gray-500">

                        NIPD :
                        {{ $siswa->nipd ?? '-' }}

                    </p>

                    <div class="mt-3">

                        @php

                            $warna = match($siswa->status_siswa){

                                'Aktif' => 'bg-green-100 text-green-700',

                                'Naik Kelas' => 'bg-blue-100 text-blue-700',

                                'Pindah' => 'bg-yellow-100 text-yellow-700',

                                'Lulus' => 'bg-indigo-100 text-indigo-700',

                                default => 'bg-red-100 text-red-700'

                            };

                        @endphp

                        <span
                            class="px-4 py-2 rounded-full text-sm font-semibold {{ $warna }}">

                            {{ $siswa->status_siswa }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- ================= IDENTITAS ================= --}}
        <div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

            <div
                class="px-6 py-4 border-b bg-slate-50 rounded-t-xl">

                <h2 class="font-semibold text-lg text-blue-700">

                    Identitas Peserta Didik

                </h2>

            </div>

            <div class="p-6">

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="text-sm text-gray-500">

                            Nama Lengkap

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->nama_siswa }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Jenis Kelamin

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->jenis_kelamin=='L' ? 'Laki-laki' : 'Perempuan' }}

                        </div>

                    </div>
                
                    <div>

                        <label class="text-sm text-gray-500">

                            NISN

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->nisn ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            NIPD

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->nipd ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            NIK

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->nik ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Agama

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->agama ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Tempat Lahir

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->tempat_lahir ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Tanggal Lahir

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') : '-' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>
                {{-- ================= REGISTRASI PESERTA DIDIK ================= --}}

        <div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

            <div class="px-6 py-4 border-b bg-slate-50">

                <h2 class="text-lg font-semibold text-blue-700">

                    Registrasi Peserta Didik

                </h2>

            </div>

            <div class="p-6">

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="text-sm text-gray-500">

                            Tahun Masuk

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->tahun_masuk ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Tingkat

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->tingkat ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Rombel

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ optional($siswa->kelas)->nama_kelas ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Status Peserta Didik

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->status_siswa }}

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ================= ALAMAT ================= --}}

        <div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

            <div class="px-6 py-4 border-b bg-slate-50">

                <h2 class="text-lg font-semibold text-blue-700">

                    Data Alamat

                </h2>

            </div>

            <div class="p-6">

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="md:col-span-2">

                        <label class="text-sm text-gray-500">

                            Alamat

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3 min-h-[60px]">

                            {{ $siswa->alamat ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Jalan

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->jalan ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            RT / RW

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->rt ?? '-' }}

                            /

                            {{ $siswa->rw ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Dusun

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->dusun ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Desa / Kelurahan

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->desa ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Kecamatan

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->kecamatan ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Kabupaten / Kota

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->kabupaten ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Provinsi

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->provinsi ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Kode Pos

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->kode_pos ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <label class="text-sm text-gray-500">

                            Transportasi

                        </label>

                        <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                            {{ $siswa->transportasi ?? '-' }}

                        </div>
                        <div>

    <label class="text-sm text-gray-500">

        Jenis Tinggal

    </label>

    <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

        {{ $siswa->jenis_tinggal ?? '-' }}

    </div>

</div>

                    </div>

                </div>

            </div>

        </div>
        {{-- ================= DATA AYAH ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-green-700">

            Data Ayah Kandung

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="text-sm text-gray-500">
                    Nama Ayah
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nama_ayah ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    NIK Ayah
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nik_ayah ?? '-' }}

                </div>

            </div>

            <div>

    <label class="text-sm text-gray-500">

        Tahun Lahir Ayah

    </label>

    <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

        {{ $siswa->tahun_lahir_ayah ?? '-' }}

    </div>

</div>

            <div>

                <label class="text-sm text-gray-500">
                    Pendidikan Ayah
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pendidikan_ayah ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Pekerjaan Ayah
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pekerjaan_ayah ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Penghasilan Ayah
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->penghasilan_ayah ?? '-' }}

                </div>

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

                <label class="text-sm text-gray-500">
                    Nama Ibu
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nama_ibu ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    NIK Ibu
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nik_ibu ?? '-' }}

                </div>

            </div>

            <div>

    <label class="text-sm text-gray-500">

        Tahun Lahir Ibu

    </label>

    <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

        {{ $siswa->tahun_lahir_ibu ?? '-' }}

    </div>

</div>

            <div>

                <label class="text-sm text-gray-500">
                    Pendidikan Ibu
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pendidikan_ibu ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Pekerjaan Ibu
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pekerjaan_ibu ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Penghasilan Ibu
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->penghasilan_ibu ?? '-' }}

                </div>

            </div>

        </div>

    </div>

</div>
{{-- ================= DATA WALI ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-orange-700">

            Data Wali

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="text-sm text-gray-500">
                    Nama Wali
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nama_wali ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    NIK Wali
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nik_wali ?? '-' }}

                </div>

            </div>

            <div>

    <label class="text-sm text-gray-500">

        Tahun Lahir Wali

    </label>

    <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

        {{ $siswa->tahun_lahir_wali ?? '-' }}

    </div>

</div>

            <div>

                <label class="text-sm text-gray-500">
                    Pendidikan Wali
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pendidikan_wali ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Pekerjaan Wali
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->pekerjaan_wali ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">
                    Penghasilan Wali
                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->penghasilan_wali ?? '-' }}

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ================= DATA PERIODIK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-purple-700">

            Data Periodik Peserta Didik

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-3 gap-6">

            <div>

                <label class="text-sm text-gray-500">

                    Anak Ke

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->anak_ke ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Jumlah Saudara

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->jumlah_saudara ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Transportasi

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->transportasi ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Tinggi Badan (cm)

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->tinggi_badan ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Berat Badan (kg)

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->berat_badan ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Lingkar Kepala

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->lingkar_kepala ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Jarak Rumah

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->jarak_rumah ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    No. Telepon Orang Tua

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->telepon_orangtua ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Kewarganegaraan

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->kewarganegaraan ?? 'Indonesia' }}

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ================= INFORMASI AKADEMIK ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-indigo-700">

            Informasi Akademik

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="text-sm text-gray-500">

                    Tahun Ajaran

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ optional(\App\Models\TahunAjaran::where('status','Aktif')->first())->tahun_ajaran ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Semester

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ optional(\App\Models\TahunAjaran::where('status','Aktif')->first())->semester ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Tingkat

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->tingkat ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Rombel

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ optional($siswa->kelas)->nama_kelas ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Wali Kelas

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
{{ data_get($siswa, 'kelasAktif.kelas.waliKelas.nama_guru', '-') }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Status Peserta Didik

                </label>

                <div class="mt-1">

                    @php

                        $warna = match($siswa->status_siswa){

                            'Aktif' => 'bg-green-100 text-green-700',

                            'Naik Kelas' => 'bg-blue-100 text-blue-700',

                            'Lulus' => 'bg-indigo-100 text-indigo-700',

                            'Pindah' => 'bg-yellow-100 text-yellow-700',

                            default => 'bg-red-100 text-red-700'

                        };

                    @endphp

                    <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $warna }}">

                        {{ $siswa->status_siswa }}

                    </span>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ================= DOKUMEN KEPENDUDUKAN ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-cyan-700">

            Dokumen Kependudukan

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-gray-500">Nomor KK</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->kk ?? '-' }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Tanggal KK</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->tanggal_kk ? \Carbon\Carbon::parse($siswa->tanggal_kk)->format('d F Y') : '-' }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Nomor Akta Kelahiran</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->no_akta ?? '-' }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Nomor Registrasi Akta</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->no_registrasi_akta ?? '-' }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Email</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->email ?? '-' }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">SKHUN</label>
                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">
                    {{ $siswa->skhun ?? '-' }}
                </div>
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

                <label class="text-sm text-gray-500">

                    Penerima KPS

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->penerima_kps ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Nomor KPS

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->no_kps ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Penerima KIP

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->kip ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Nomor KIP

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->no_kip ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Nama pada KIP

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nama_kip ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Layak PIP

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->layak_pip ?? '-' }}

                </div>

            </div>

            <div class="md:col-span-2">

                <label class="text-sm text-gray-500">

                    Alasan Layak PIP

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3 min-h-[70px]">

                    {{ $siswa->alasan_layak ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Bank

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->bank ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Nomor Rekening

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->rekening ?? '-' }}

                </div>

            </div>

            <div class="md:col-span-2">

                <label class="text-sm text-gray-500">

                    Nama Pemilik Rekening

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->nama_rekening ?? '-' }}

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ================= KOORDINAT RUMAH ================= --}}

<div class="bg-white rounded-xl shadow border border-gray-200 mb-6">

    <div class="px-6 py-4 border-b bg-slate-50">

        <h2 class="text-lg font-semibold text-emerald-700">

            Koordinat Rumah

        </h2>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="text-sm text-gray-500">

                    Latitude

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->latitude ?? '-' }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Longitude

                </label>

                <div class="mt-1 border rounded-lg bg-gray-50 px-4 py-3">

                    {{ $siswa->longitude ?? '-' }}

                </div>

            </div>

        </div>

        @if($siswa->latitude && $siswa->longitude)

        <div class="mt-6">

            <a href="https://www.google.com/maps?q={{ $siswa->latitude }},{{ $siswa->longitude }}"
               target="_blank"
               class="inline-flex items-center gap-2 px-5 py-3 bg-teal-600 hover:bg-teal-700 text-white rounded-lg transition">

                <x-heroicon-o-map class="w-5 h-5"/>

                Lihat Lokasi di Google Maps

            </a>

        </div>

        @endif

    </div>

</div>

{{-- ================= TOMBOL ================= --}}

{{-- ================= TOMBOL ================= --}}


<div class="flex flex-col sm:flex-row justify-end gap-3 mb-8">

    <a href="{{ route('siswa.index') }}"
        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-gray-600 hover:bg-gray-700 text-white transition">

        <x-heroicon-o-arrow-left class="w-5 h-5"/>

        Kembali

    </a>

    <a href="{{ route('siswa.edit',$siswa->id) }}"
        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition">

        <x-heroicon-o-pencil-square class="w-5 h-5"/>

        Edit Data

    </a>

</div>

    </div>

</div>

@endsection
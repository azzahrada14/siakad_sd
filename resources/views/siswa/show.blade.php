@extends('layouts.app')

@section('content')



        {{-- HEADER --}}



    <div class="flex items-center gap-4">

        <div class="w-14 h-14 rounded-xl bg-blue-600 flex items-center justify-center">
            <x-heroicon-o-user class="w-8 h-8 text-white"/>
        </div>

        <div>
            <h2 class="text-3xl font-bold text-gray-800">
                Detail Biodata Siswa
            </h2>

            <p class="text-gray-500">
                Informasi lengkap data siswa
            </p>
        </div>

    </div>

</div>

<br>
        <div class="grid lg:grid-cols-2 gap-6">

    {{-- DATA SISWA --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

        <div class="px-5 py-4 bg-blue-50 border-b">
            <div class="flex items-center gap-2">
                <x-heroicon-o-academic-cap class="w-6 h-6 text-blue-600"/>

                <h3 class="font-bold text-blue-600 text-lg">
                    Data Siswa
                </h3>
            </div>
        </div>

        <div class="p-5">

                <table class="w-full text-sm">
                    <tbody class="[&>tr]:border-b [&>tr:last-child]:border-0">

                        <tr>
                            <td class="py-3 font-semibold w-48">Nama Siswa</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">NISN</td>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">NIPD</td>
                            <td>{{ $siswa->nipd }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Jenis Kelamin</td>
                            <td>
                                {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Kelas</td>
                            <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Agama</td>
                            <td>{{ $siswa->agama }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">TTL</td>
                            <td>
                                {{ $siswa->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}
                            </td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Alamat</td>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Tahun Masuk</td>
                            <td>{{ $siswa->tahun_masuk }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Status</td>
                            <td>
                               <span class="px-4 py-1 bg-green-500 text-white rounded-full text-xs font-semibold">
                                    {{ $siswa->status_siswa }}
                                </span>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
            {{-- DATA ORANG TUA --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

        <div class="px-5 py-4 bg-green-50 border-b">
    <div class="flex items-center gap-2">
        <x-heroicon-o-users class="w-6 h-6 text-green-600"/>

        <h3 class="font-bold text-green-600 text-lg">
            Data Orang Tua / Wali
        </h3>
    </div>
</div>

<div class="p-5">

               <table class="w-full text-[15px]">
                    <tbody class="[&>tr]:border-b [&>tr:last-child]:border-0">

                        <tr>
                            <td class="py-3 font-semibold w-48">Nama Ayah</td>
                            <td>{{ $siswa->nama_ayah }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Pekerjaan Ayah</td>
                            <td>{{ $siswa->pekerjaan_ayah }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Nama Ibu</td>
                            <td>{{ $siswa->nama_ibu }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Pekerjaan Ibu</td>
                            <td>{{ $siswa->pekerjaan_ibu }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Nama Wali</td>
                            <td>{{ $siswa->nama_wali ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">Pekerjaan Wali</td>
                            <td>{{ $siswa->pekerjaan_wali ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td class="py-3 font-semibold">No Telepon</td>
                            <td>{{ $siswa->telepon_orangtua }}</td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <br>
        {{-- BUTTON --}}


          <a href="{{ route('siswa.index') }}"
   class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 inline-flex items-center gap-2">

    <x-heroicon-o-arrow-left class="w-5 h-5"/>

    Kembali

</a>

<a href="{{ route('siswa.edit',$siswa->id) }}"
   class="px-5 py-2 bg-white border rounded-lg hover:bg-gray-50 inline-flex items-center gap-2">

    <x-heroicon-o-pencil-square class="w-5 h-5"/>

    Edit Data

</a>
        </div>

    </div>

</div>

@endsection
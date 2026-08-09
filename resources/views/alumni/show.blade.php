@extends('layouts.app')

@section('content')

<div class="print-area bg-white">



<div class="max-w-5xl mx-auto bg-white shadow-lg border border-gray-300 rounded-lg">

    {{-- ================= KOP SURAT ================= --}}

    <div class="px-8 pt-8">

        <div class="flex items-center justify-between">

            {{-- Logo Kabupaten --}}
            <div class="w-24 flex justify-center">

                <img
                    src="{{ asset('logo-cianjur.png') }}"
                    alt="Logo Kabupaten"
                    class="w-20 h-20 object-contain">

            </div>

            {{-- Identitas Sekolah --}}
            <div class="flex-1 text-center">

                <h4 class="text-lg font-semibold uppercase">
                    Pemerintah Kabupaten Cianjur
                </h4>

                <h2 class="text-3xl font-bold uppercase tracking-wide">
                    SD Negeri Cimanahayu
                </h2>

                <h4 class="text-lg uppercase">
                    Kecamatan Cugenang
                </h4>

                <p class="text-sm mt-1">
                    Jl. Perkebunan Gedeh Km.1 Kecamatan Cugenang
                </p>

                <p class="text-sm">
                    NPSN : <b>20204923</b>
                </p>

            </div>

            {{-- Logo Sekolah / Tut Wuri --}}
            <div class="w-24 flex justify-center">

                <img
                    src="{{ asset('logo-cimanahayu.png') }}"
                    alt="Logo Sekolah"
                    class="w-20 h-20 object-contain">

            </div>

        </div>

        {{-- Garis Kop Surat --}}
        <div class="mt-4">

            <hr class="border-2 border-black">

            <hr class="border border-black mt-1">

        </div>

    </div>

    {{-- ================= JUDUL ================= --}}

    <div class="text-center py-8">

        <h1 class="text-2xl font-bold uppercase">

            Transkrip Nilai Alumni

        </h1>

        <p class="mt-3">

            Nomor Ijazah :

            <b>{{ $alumni->nomor_ijazah }}</b>

        </p>

    </div>
    {{-- ================= BIODATA ALUMNI ================= --}}

<div class="px-10 pb-6">

    <table class="w-full text-sm">

        <tr>
            <td class="w-72 py-2 font-medium">
                Nama Peserta Didik
            </td>

            <td class="w-5">
                :
            </td>

            <td>
{{ $siswa?->nama_siswa ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">
                Nomor Induk Siswa Nasional (NISN)
            </td>

            <td>
                :
            </td>

            <td>
  {{ $siswa?->nisn ?? '-' }}
</td>
        </tr>

        <tr>
            <td class="py-2 font-medium">
                Nomor Induk Peserta Didik (NIPD)
            </td>

            <td>
                :
            </td>

            <td>
               {{ $siswa?->nipd ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="py-2 font-medium">
                Tempat, Tanggal Lahir
            </td>

            <td>
                :
            </td>

            <td>

             {{ $siswa?->tempat_lahir ?? '-' }},
{{ $siswa?->tanggal_lahir
    ? \Carbon\Carbon::parse($siswa->tanggal_lahir)
        ->locale('id')
        ->translatedFormat('d F Y')
    : '-' }}

            </td>

        </tr>

        <tr>

            <td class="py-2 font-medium">
                Jenis Kelamin
            </td>

            <td>
                :
            </td>

            <td>

      @php
    $jk = $siswa?->jenis_kelamin;
@endphp

{{ $jk === 'L'
    ? 'Laki-laki'
    : ($jk === 'P' ? 'Perempuan' : '-') }}
            </td>

        </tr>

        <tr>

            <td class="py-2 font-medium">
                Tahun Pelajaran
            </td>

            <td>
                :
            </td>

            <td>

                {{ $tahunAjaran?->tahun_ajaran ?? '-' }}

            </td>

        </tr>

        <tr>

            <td class="py-2 font-medium">
                Tanggal Kelulusan
            </td>

            <td>
                :
            </td>

            <td>

        {{ $alumni->tanggal_lulus
    ? \Carbon\Carbon::parse($alumni->tanggal_lulus)
        ->locale('id')
        ->translatedFormat('d F Y')
    : '-' }}

            </td>

        </tr>

        <tr>

            <td class="py-2 font-medium">
                Nomor Ijazah
            </td>

            <td>
                :
            </td>

            <td>

                {{ $alumni->nomor_ijazah }}

            </td>

        </tr>

    </table>

</div>
{{-- ================= TABEL NILAI ================= --}}

<div class="px-10 pb-6">

    <table class="w-full border border-black border-collapse text-sm">

        <thead>

            <tr class="bg-gray-100">

                <th class="border border-black px-3 py-2 text-center w-16">
                    No
                </th>

                <th class="border border-black px-3 py-2">
                    Mata Pelajaran
                </th>

                <th class="border border-black px-3 py-2 text-center w-32">
                    Nilai Akhir
                </th>

            </tr>

        </thead>

        <tbody>

           @forelse($nilai as $item)

<tr>

    <td class="border border-black px-3 py-2 text-center">
        {{ $loop->iteration }}
    </td>

    <td class="border border-black px-3 py-2">
        {{ $item->mapel->nama_mapel ?? '-' }}
    </td>

    <td class="border border-black px-3 py-2 text-center">
        {{ number_format($item->nilai_akhir ?? 0, 2, ',', '.') }}
    </td>

</tr>

@empty

<tr>
    <td colspan="3"
        class="border border-black py-8 text-center">
        Data nilai belum tersedia.
    </td>
</tr>

@endforelse

        </tbody>

        <tfoot>

            <tr class="bg-gray-100">

                <td colspan="2"
                    class="border border-black px-3 py-2 text-right font-bold">

                    Rata-rata Nilai

                </td>

                <td class="border border-black px-3 py-2 text-center font-bold">

                    {{ number_format($rataRata, 2, ',', '.') }}

                </td>

            </tr>

        </tfoot>

    </table>

</div>
{{-- ================= KETERANGAN ================= --}}

<div class="px-10">

    <p class="leading-8 text-justify text-sm">

        Berdasarkan hasil penilaian seluruh mata pelajaran dan ketentuan
        akademik yang berlaku di SD Negeri Cimanahayu, peserta didik tersebut
        dinyatakan <strong>LULUS</strong> pada Tahun Pelajaran
        <strong>{{ $tahunAjaran?->tahun_ajaran ?? '-' }}</strong>
        serta berhak memperoleh Ijazah Sekolah Dasar.

    </p>

</div>
{{-- ================= TANDA TANGAN ================= --}}

<div class="flex justify-between px-10 mt-8">

    {{-- Orang Tua --}}
    <div class="text-center w-1/3">

        Orang Tua / Wali

        <br><br><br><br><br>

        (........................................)

    </div>

    {{-- Kepala Sekolah --}}
    <div class="text-center w-1/3">

        @php
            \Carbon\Carbon::setLocale('id');
        @endphp
Cianjur,
{{ \Carbon\Carbon::now()
    ->locale('id')
    ->translatedFormat('d F Y') }}
        <br>

        Kepala Sekolah

        <br><br><br><br><br>

        <b>

            {{ $kepalaSekolah->nama_guru }}

        </b>

        <br>

        NIP. {{ $kepalaSekolah->nip }}

    </div>

</div>
{{-- ================= TOMBOL ================= --}}

<div class="flex justify-end gap-3 px-10 py-8 border-t mt-10 print:hidden">

  <a
    href="{{ route('alumni.index') }}"
    class="print:hidden px-5 py-2 rounded-lg bg-gray-500 text-white hover:bg-gray-600">

    Kembali

</a>

    <button
    onclick="window.print()"
    class="print:hidden px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">

    Cetak Transkrip

</button>

</div>

</div>
<style>
@media print {

    /* =========================================
       A4
    ========================================= */

    @page {
        size: A4 portrait;
        margin: 7mm;
    }

    html,
    body {
        margin: 0 !important;
        padding: 0 !important;
        background: white !important;
    }


    /* =========================================
       SEMBUNYIKAN LAYOUT SIAKAD
    ========================================= */

    body * {
        visibility: hidden !important;
    }

    .print-area,
    .print-area * {
        visibility: visible !important;
    }


    /* =========================================
       AREA DOKUMEN
    ========================================= */

    .print-area {
        position: absolute !important;

        left: 0 !important;
        top: 0 !important;

        width: 100% !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;

        background: white !important;

        font-family: Arial, Helvetica, sans-serif !important;

        box-sizing: border-box !important;
    }


    /* =========================================
       KERTAS TRANSKRIP
    ========================================= */

    .print-area > .max-w-5xl {

        width: 100% !important;
        max-width: none !important;

        min-height: 280mm !important;

        margin: 0 !important;

        padding: 7mm 9mm 6mm 9mm !important;

        background: white !important;

        border: 1px solid #000 !important;

        border-radius: 0 !important;

        box-shadow: none !important;

        box-sizing: border-box !important;
    }


    /* =========================================
       HILANGKAN TOMBOL
    ========================================= */

    .print\:hidden {
        display: none !important;
    }


    /* =========================================
       KOP SURAT
    ========================================= */

    .print-area .px-8 {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    .print-area .pt-8 {
        padding-top: 0 !important;
    }


    /* Logo */
    .print-area .w-24 {
        width: 23mm !important;
    }

    .print-area .w-20 {
        width: 19mm !important;
        height: 19mm !important;
    }


    /* Pemerintah Kabupaten */
    .print-area h4.text-lg {
        font-size: 12pt !important;

        line-height: 1.2 !important;

        margin: 0 !important;
    }


    /* Nama sekolah */
    .print-area h2.text-3xl {
        font-size: 19pt !important;

        line-height: 1.15 !important;

        margin-top: 1mm !important;
        margin-bottom: 1mm !important;
    }


    /* Alamat + NPSN */
    .print-area p.text-sm {
        font-size: 9pt !important;

        line-height: 1.25 !important;

        margin-top: 1mm !important;
    }


    /* Garis kop */
    .print-area hr {
        margin-top: 2mm !important;
        margin-bottom: 1mm !important;
    }


    /* =========================================
       JUDUL
    ========================================= */

    .print-area .py-8 {

        padding-top: 6mm !important;

        padding-bottom: 4mm !important;
    }


    .print-area h1.text-2xl {

        font-size: 16pt !important;

        line-height: 1.2 !important;

        margin: 0 !important;
    }


    .print-area .mt-3 {

        margin-top: 2mm !important;
    }


    /* =========================================
       BIODATA
    ========================================= */

    .print-area .px-10 {

        padding-left: 0 !important;
        padding-right: 0 !important;
    }


    .print-area .pb-6 {

        padding-bottom: 4mm !important;
    }


    /* semua tabel */
    .print-area table {

        width: 100% !important;

        border-collapse: collapse !important;
    }


    /* Biodata */
    .print-area table td {

        padding-top: 2.2px !important;

        padding-bottom: 2.2px !important;

        font-size: 10pt !important;

        line-height: 1.3 !important;

        vertical-align: middle !important;
    }


    /* =========================================
       TABEL NILAI
    ========================================= */

    .print-area th {

        font-size: 10pt !important;

        padding: 4px 6px !important;

        line-height: 1.2 !important;
    }


    .print-area td {

        font-size: 10pt !important;

        padding: 4px 6px !important;

        line-height: 1.2 !important;
    }


    .print-area thead {

        display: table-header-group !important;
    }


    .print-area tbody tr,
    .print-area tfoot tr {

        page-break-inside: avoid !important;

        break-inside: avoid !important;
    }


    /* =========================================
       KETERANGAN LULUS
    ========================================= */

    .print-area .leading-8 {

        line-height: 1.5 !important;
    }


    .print-area .text-justify {

        text-align: justify !important;
    }


    /* =========================================
       TANDA TANGAN
    ========================================= */

    .print-area .mt-8 {

        margin-top: 12mm !important;
    }


    .print-area .flex.justify-between {

        align-items: flex-start !important;
    }


    /* Jangan terlalu mepet */
    .print-area .w-1\/3 {

        width: 35% !important;
    }


    /* =========================================
       BORDER
    ========================================= */

    .print-area .border {

        border-color: #000 !important;
    }


    /* =========================================
       JANGAN PAKSA HALAMAN BARU
    ========================================= */

    .print-area,
    .print-area > .max-w-5xl {

        page-break-before: auto !important;

        page-break-after: auto !important;

        page-break-inside: auto !important;

        break-before: auto !important;

        break-after: auto !important;

        break-inside: auto !important;
    }

}
</style>
</div>
@endsection
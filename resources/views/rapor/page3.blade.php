{{-- ========================================================= --}}
{{-- HALAMAN 3 --}}
{{-- ========================================================= --}}

@if($page3->count())

<table
    style="
        width:100%;
        border-collapse:collapse;
        table-layout:fixed;
        font-size:11px;
        margin-bottom:15px;
    "
>

<thead>

<tr>

<th style="border:1px solid #000;width:35px;">
    No
</th>

<th style="border:1px solid #000;width:180px;">
    Muatan Pelajaran
</th>

<th style="border:1px solid #000;width:65px;">
    Nilai Akhir
</th>

<th style="border:1px solid #000;">
    Capaian Kompetensi
</th>

</tr>

</thead>

<tbody>

@foreach($page3 as $detail)

<tr>

<td style="
    border:1px solid #000;
    text-align:center;
    vertical-align:top;
">

    {{ $page2->count() + $loop->iteration }}

</td>

<td style="
    border:1px solid #000;
    padding:6px;
    text-align:center;
    vertical-align:middle;
">

    {{ $detail->mapel->nama_mapel }}

</td>

<td style="
    border:1px solid #000;
    text-align:center;
    vertical-align:middle;
    font-weight:bold;
">

    {{ number_format($detail->nilai_akhir,0) }}

</td>

<td style="
    border:1px solid #000;
    padding:0;
">

<div
style="
    padding:6px;
    min-height:45px;
    line-height:1.5;
    text-align:justify;
"
>

    {{ $detail->capaian_pengetahuan }}

</div>

<div
style="
    border-top:1px solid #000;
    padding:6px;
    min-height:45px;
    line-height:1.5;
    text-align:justify;
"
>

    {{ $detail->capaian_keterampilan }}

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

@endif

<br>



<table style="width:100%;border-collapse:collapse;font-size:11px;margin-bottom:20px;">

    <thead>
        <tr>
            <th style="border:1px solid #000;width:8%;padding:5px;text-align:center;">
                No
            </th>

            <th style="border:1px solid #000;width:35%;padding:5px;text-align:center;">
                Ekstrakurikuler
            </th>

            <th style="border:1px solid #000;padding:5px;text-align:center;">
                Keterangan
            </th>
        </tr>
    </thead>

    <tbody>

    @forelse($ekstrakurikuler as $item)

        <tr>

         <td style="
    border:1px solid #000;
    text-align:center;
    vertical-align:middle;
">
    {{ $page2->count() + $loop->iteration }}
</td>

            <td style="border:1px solid #000;padding:5px;">
                {{ $item->nama_kegiatan }}
            </td>

            <td style="border:1px solid #000;padding:5px;">
                {{ $item->deskripsi ?? '-' }}
            </td>

        </tr>

    @empty

        <tr>

            <td style="border:1px solid #000;text-align:center;">
                1
            </td>

            <td style="border:1px solid #000;">
                -
            </td>

            <td style="border:1px solid #000;">
                -
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<br>

<br>

{{-- ======================= --}}
{{-- C. Ketidakhadiran & D. Keputusan --}}
{{-- ======================= --}}

<div style="display:flex;justify-content:space-between;margin-top:15px;">

    {{-- ================= Ketidakhadiran ================= --}}
    <div style="width:48%;">


    <div style="border:1px solid #000;">

        <div style="
            border-bottom:1px solid #000;
            text-align:center;
            padding:5px;
            font-weight:bold;
        ">
            Ketidakhadiran
        </div>

        <div style="padding:8px;">

            <div style="display:flex;margin-bottom:6px;">
                <div style="width:65%;">Sakit</div>
                <div style="width:10%;text-align:center;">
                    {{ $rapor->sakit }}
                </div>
                <div style="width:25%;">Hari</div>
            </div>

            <div style="display:flex;margin-bottom:6px;">
                <div style="width:65%;">Izin</div>
                <div style="width:10%;text-align:center;">
                    {{ $rapor->izin }}
                </div>
                <div style="width:25%;">Hari</div>
            </div>

            <div style="display:flex;">
                <div style="width:65%;">Tanpa Keterangan</div>
                <div style="width:10%;text-align:center;">
                    {{ $rapor->alfa }}
                </div>
                <div style="width:25%;">Hari</div>
            </div>

        </div>

    </div>

</div>
    {{-- ================= Keputusan ================= --}}
    <div style="width:48%;">


        <table style="width:100%;border-collapse:collapse;font-size:11px;">

            <tr>

                <td
                    style="
                        border:1px solid #000;
                        padding:8px;
                        line-height:1.7;
                        height:96px;
                        vertical-align:top;
                    ">

                    Berdasarkan pencapaian kompetensi pada semester peserta didik dinyatakan :

                    <br><br>

                    Naik ke kelas :
                    <b>{{ $rapor->naik_kelas ?? '-' }}</b>

                    <br><br>

                    Tinggal di kelas :
                    <b>{{ $rapor->tinggal_kelas ?? '-' }}</b>

                </td>

            </tr>

        </table>

    </div>

</div>
<br><br><br>

<div style="display:flex;justify-content:space-between;">

    <div style="width:30%;text-align:center;">

        Orang Tua / Wali

        <br><br><br><br><br>

        (...........................)

    </div>

    <div style="width:30%;text-align:center;">

        Cianjur,
      @php
\Carbon\Carbon::setLocale('id');
@endphp

{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}

        <br>

        Wali Kelas

        <br><br><br><br><br>

        <b>{{ $rapor->kelas->waliKelas->nama_guru }}</b>

        <br>

        NIP. {{ $rapor->kelas->waliKelas->nip }}

    </div>

</div>

<br><br>

<div style="text-align:center;">

    Mengetahui,

    <br>

    Kepala Sekolah

    <br><br><br><br><br>

    <b>{{ $kepalaSekolah->nama_guru }}</b>

    <br>

    NIP. {{ $kepalaSekolah->nip }}

</div>
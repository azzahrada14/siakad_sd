{{-- ===================== --}}
{{-- HALAMAN 2 RAPOR --}}
{{-- ===================== --}}

<div style="text-align:center;margin-bottom:10px;">

    <div style="font-size:18px;font-weight:bold;">
        LAPORAN HASIL BELAJAR
    </div>

    <div style="font-size:15px;font-weight:bold;">
        (RAPOR)
    </div>

</div>
<br>
<table
style="
width:95%;
margin:18px auto 22px auto;
border:none;
font-size:12px;
">

<tr>

<td style="border:none;width:22%;">
Nama Peserta Didik
</td>

<td style="border:none;width:3%;text-align:center;">
:
</td>

<td style="border:none;width:33%;padding-left:8px;">
{{ $rapor->siswa->nama_siswa }}
</td>

<td style="border:none;width:16%;padding-left:25px;">
Kelas
</td>

<td style="border:none;width:3%;text-align:center;">
:
</td>

<td style="border:none;width:23%;padding-left:8px;">
{{ $rapor->kelas->nama_kelas }}
</td>

</tr>

<tr>

<td style="border:none;">NISN</td>
<td style="border:none;text-align:center;">:</td>
<td style="border:none;padding-left:8px;">{{ $rapor->siswa->nisn }}</td>

<td style="border:none;padding-left:25px;">Fase</td>
<td style="border:none;text-align:center;">:</td>
<td style="border:none;padding-left:8px;">{{ $rapor->kelas->tingkat }}</td>

</tr>

<tr>

<td style="border:none;">Sekolah</td>
<td style="border:none;text-align:center;">:</td>
<td style="border:none;padding-left:8px;">SD Negeri Cimanahayu</td>

<td style="border:none;padding-left:25px;">Semester</td>
<td style="border:none;text-align:center;">:</td>
<td style="border:none;padding-left:8px;">{{ $rapor->semester }}</td>

</tr>

<tr>

<td style="border:none;vertical-align:top;">Alamat</td>
<td style="border:none;text-align:center;vertical-align:top;">:</td>

<td style="border:none;padding-left:8px;">
Jln. Perkebunan Gedeh No. KM1,<br>
Mangunkerta, Kec. Cugenang,<br>
Kabupaten Cianjur
</td>

<td style="border:none;padding-left:25px;vertical-align:top;">
Tahun Pelajaran
</td>

<td style="border:none;text-align:center;vertical-align:top;">
:
</td>

<td style="border:none;padding-left:8px;vertical-align:top;">
{{ $rapor->tahunAjaran->tahun_ajaran }}
</td>

</tr>

</table>
<br>
<table
style="
width:100%;
border-collapse:collapse;
table-layout:fixed;
font-size:11px;
">

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

@foreach($page2 as $detail)

<tr>

<td style="
    border:1px solid #000;
    text-align:center;
    vertical-align:middle;
">
    {{ $loop->iteration }}
</td>

<td style="border:1px solid #000;padding:6px;text-align:center;vertical-align:middle;">
{{ $detail->mapel->nama_mapel }}
</td>

<td style="border:1px solid #000;text-align:center;vertical-align:middle;font-weight:bold;">
{{ number_format($detail->nilai_akhir,0) }}
</td>

<td style="border:1px solid #000;padding:6px;line-height:1.5;">

<div style="min-height:45px;">
{{ $detail->capaian_pengetahuan }}
</div>

<hr style="margin:6px 0;border:0;border-top:1px solid #000;">

<div style="min-height:45px;">
{{ $detail->capaian_keterampilan }}
</div>

</td>

</tr>

@endforeach

</tbody>

</table>
@extends('layouts.app')

@section('content')

<div class="px-3 py-5">

@if(session('success'))
<div class="mb-6 rounded-xl bg-green-100 border border-green-300 px-5 py-4 text-green-700">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 rounded-xl bg-red-100 border border-red-300 px-5 py-4 text-red-700">
    {{ session('error') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow border p-5 mb-4">
    <div class="flex items-center justify-between">

        {{-- KIRI --}}
        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Input Nilai Siswa
            </h1>

            <p class="text-gray-500 mt-2">
                Input nilai formatif harian, ASTS, dan ASAS/ASAT berdasarkan Tujuan Pembelajaran.
            </p>
        </div>

        {{-- KANAN --}}
       @if($tahunAjaran)

    <div class="bg-blue-50 border border-blue-200 rounded-xl shadow-sm px-5 py-4 min-w-[220px]">

        <p class="text-xs uppercase tracking-wide text-blue-600 font-semibold">
            Tahun Ajaran
        </p>

        <h2 class="text-2xl font-bold text-blue-700 mt-1">
           {{ $tahunAjaran->tahun_ajaran }}
        </h2>

        <div class="flex justify-between items-center mt-2">

            <span class="text-gray-600 text-sm">
                Semester {{ $tahunAjaran->semester }}
            </span>

            @if($modeArsip)

                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                    Arsip
                </span>

            @else

                <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    Aktif
                </span>

            @endif

        </div>

    </div>

@endif
    </div>
</div>

@if($modeArsip)

    <div class="mb-5 rounded-xl border border-yellow-300 bg-yellow-50 px-5 py-4">

        <div class="flex items-start gap-3">

            <x-heroicon-o-exclamation-triangle
                class="w-6 h-6 text-yellow-600 flex-shrink-0"/>

            <div>

                <h3 class="font-semibold text-yellow-800">
                    Periode Telah Diarsipkan
                </h3>

                <p class="text-sm text-yellow-700 mt-1">
                    Tahun ajaran
                    <strong>{{ $tahunAjaran->tahun_ajaran }}</strong>
semester
<strong>{{ $tahunAjaran->semester }}</strong>
                    sudah tidak aktif.
                </p>

                <p class="text-sm text-yellow-700 mt-1">
                    Input nilai dan remedial tidak dapat dilakukan
                    pada periode arsip. Gunakan menu
                    <strong>Rekap Nilai</strong>
                    untuk melihat data.
                </p>

            </div>

        </div>

    </div>

@endif

<div class="bg-white rounded-2xl shadow border p-5 mb-5">

<form
    method="GET"
    action="{{ route('nilai.index') }}">

<div class="grid grid-cols-1 md:grid-cols-5 gap-5 items-start">
{{-- KELAS --}}
<div class="relative">

    <label class="block text-sm font-semibold mb-2">
        Kelas
    </label>

    @php
        $guru = Auth::user()->guru;
        $wali = $guru?->waliKelas;
    @endphp

    @if($guru->jenis_pengajar == 'Wali Kelas')

        <input
            type="text"
            readonly
            value="{{ $wali->nama_kelas }}"
            class="w-full h-11 rounded-xl bg-gray-100 border-gray-300">

        @if($wali)
            <p class="absolute left-0 top-[72px] text-xs text-gray-500">
                Tingkat: Kelas {{ $wali->tingkat }}
            </p>
        @endif

        <input
            type="hidden"
            name="kelas"
            value="{{ $wali->id }}">

    @else

        <select
            name="kelas"
            class="w-full h-11 rounded-xl border-gray-300">

            <option value="">
                Pilih Kelas
            </option>

            @foreach($kelas as $k)

                <option
                    value="{{ $k->id }}"
                    @selected(request('kelas') == $k->id)>

                    {{ $k->nama_kelas }}

                </option>

            @endforeach

        </select>

    @endif

</div>

{{-- MAPEL --}}
<div>

<label class="block text-sm font-semibold mb-2">

Mata Pelajaran

</label>

<select
name="mapel"
class="w-full h-11 rounded-xl border-gray-300">

<option value="">

Pilih Mata Pelajaran

</option>

@foreach($mapels as $mapel)

<option
value="{{ $mapel->id }}"
@selected(request('mapel')==$mapel->id)>

{{ $mapel->nama_mapel }}

</option>

@endforeach

</select>

</div>

{{-- TAHUN AJARAN --}}
<div>

<label class="block text-sm font-semibold mb-2">

Tahun Ajaran

</label>

<input
type="text"
readonly
value="{{ $tahunAjaran->tahun_ajaran }}"
class="w-full h-11 rounded-xl bg-gray-100 border-gray-300">

</div>

{{-- SEMESTER --}}
<div>

<label class="block text-sm font-semibold mb-2">

Semester

</label>

<input
type="text"
readonly
value="{{ $tahunAjaran->semester }}"
class="w-full h-11 rounded-xl bg-gray-100 border-gray-300">

</div>

{{-- BUTTON --}}
<div class="pt-[29px]">

    <button
        type="submit"
        class="w-full h-11 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium">

        Tampilkan Data

    </button>

</div>
</div>

</form>

</div>

@if(!$modeArsip)

    <form
        method="POST"
        action="{{ route('nilai.mass.store') }}">

        @csrf

        <input
            type="hidden"
            name="kelas_id"
            value="{{ $filter['kelas_id'] }}">

        <input
            type="hidden"
            name="tahun_ajaran_id"
            value="{{ $filter['tahun_ajaran_id'] }}">

        <input
            type="hidden"
            name="semester"
            value="{{ $filter['semester'] }}">

        <input
            type="hidden"
            name="mapel_id"
            value="{{ $filter['mapel_id'] }}">


        {{-- ===================================================== --}}
        {{-- JIKA MAPEL BELUM DIPILIH --}}
        {{-- ===================================================== --}}

        @if(!$filter['mapel_id'])

            <div class="bg-white rounded-xl shadow border p-10 text-center">

                <i data-feather="book-open"
                   class="w-12 h-12 mx-auto text-gray-400 mb-4"></i>

                <h3 class="text-lg font-semibold text-gray-700">
                    Pilih Mata Pelajaran
                </h3>

                <p class="text-gray-500 mt-2">
                    Silakan pilih mata pelajaran terlebih dahulu
                    untuk mulai menginput nilai.
                </p>

            </div>


        @else


            {{-- ===================================================== --}}
            {{-- DATA KELAS --}}
            {{-- ===================================================== --}}

            <div class="bg-white rounded-2xl shadow border overflow-hidden">

                @if($filter['kelas_id'])

                    @php
                        $kelasTerpilih = $kelas->firstWhere(
                            'id',
                            $filter['kelas_id']
                        );
                    @endphp

                    @if($kelasTerpilih)

                        <div class="px-5 py-3 bg-slate-50 border-b">

                            <div class="flex items-center gap-2">

                                <span class="text-sm text-gray-500">
                                    Kelas:
                                </span>

                                <span class="font-semibold text-slate-700">
                                    {{ $kelasTerpilih->nama_kelas }}
                                </span>

                                <span class="text-gray-400">
                                    |
                                </span>

                                <span class="text-sm text-gray-500">
                                    Tingkat:
                                </span>

                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
                                    Kelas {{ $kelasTerpilih->tingkat }}
                                </span>

                            </div>

                        </div>

                    @endif

                @endif

  <div class="w-full overflow-x-auto">

<table class="nilai-table border-collapse text-[10px]">
<thead>

{{-- BARIS 1 --}}
<tr class="bg-slate-700 text-white">

    <th rowspan="3"
class="border border-white/30 px-1 py-2 text-center whitespace-nowrap w-[30px]">
No

</th>

    <th rowspan="3"
class="border border-white/30 px-1 py-2 text-center whitespace-nowrap w-[70px]">
NIPD

</th>

    <th rowspan="3"
class="border border-white/30 px-1 py-2 text-center whitespace-nowrap w-[120px]">
Nama Siswa

</th>

    {{-- FORMATIF --}}
    <th colspan="{{ $tujuanPembelajarans->count() }}"
        class="border border-white/30 px-1 py-2 text-center whitespace-nowrap">
        FORMATIF HARIAN
    </th>

    <th rowspan="3"
        class="border border-white/30 px-1 py-2 text-center whitespace-nowrap">
        Jumlah
    </th>

    <th rowspan="3"
        class="border border-white/30 px-1 py-2 text-center whitespace-nowrap">
        Rata Formatif
    </th>

    {{-- ASTS --}}
    <th colspan="{{ $lingkupMateris->count() + 2 }}"
        class="border border-white/30 px-1 py-2 text-center whitespace-nowrap">
        ASTS
    </th>

    <th rowspan="3"
        class="border border-white/30 px-3 py-3 text-center whitespace-nowrap">
        {{ $tahunAjaran->semester == 'Ganjil' ? 'ASAS' : 'ASAT' }}
    </th>

    <th rowspan="3"
class="col-akhir border border-white/30 px-2 py-3 text-center whitespace-nowrap">
Nilai Akhir

</th>

</tr>


{{-- BARIS 2 --}}
<tr class="bg-slate-700 text-white">

    {{-- LM FORMATIF --}}
    @foreach($lingkupMateris as $lm)

        <th colspan="{{ $lm->tujuanPembelajarans->count() }}"
            class="border border-white/30 px-3 py-2 text-center whitespace-nowrap">
            LM {{ $loop->iteration }}
        </th>

    @endforeach


    {{-- ASTS --}}
    @foreach($lingkupMateris as $lm)

        <th rowspan="2"
            class="border border-white/30 px-3 py-2 text-center whitespace-nowrap">
            LM {{ $loop->iteration }}
        </th>

    @endforeach

    <th rowspan="2"
        class="border border-white/30 px-3 py-2 text-center whitespace-nowrap">
        Jumlah
    </th>

    <th rowspan="2"
        class="border border-white/30 px-3 py-2 text-center whitespace-nowrap">
        Rata-rata
    </th>

</tr>


{{-- BARIS 3 --}}
<tr class="bg-slate-500 text-white">

    {{-- TP FORMATIF --}}
    @foreach($lingkupMateris as $lm)

        @foreach($lm->tujuanPembelajarans as $tp)

           <th class="col-tp border border-white/30 px-1 py-2 text-center whitespace-nowrap">
{{ $tp->kode_tp }}

</th>

        @endforeach

    @endforeach

</tr>

</thead>

<tbody>

@forelse($siswas as $siswa)

<tr class="hover:bg-slate-50">

{{-- No --}}
<td class="border px-1 py-2 text-center">

    {{ $loop->iteration }}

</td>

{{-- NIPD --}}
<td class="border px-1 py-2 text-center">

    {{ $siswa->nipd }}

</td>

{{-- Nama --}}
<td class="border px-4 py-3">

    <div class="font-semibold">

        {{ $siswa->nama_siswa }}

    </div>

    <div class="text-xs text-gray-500">

        NISN : {{ $siswa->nisn }}

    </div>

    <input
        type="hidden"
        name="siswa_id[]"
        value="{{ $siswa->id }}">

</td>

{{-- NILAI TP --}}
@foreach($lingkupMateris as $lm)

    @foreach($lm->tujuanPembelajarans as $tp)

<td class="border border-gray-200 text-center">

       <input
type="number"
min="0"
max="100"
name="nilai_tp[{{ $siswa->id }}][{{ $tp->id }}]"
value="{{ $nilaiTP[$siswa->id][$tp->id] ?? '' }}"
class="tp-input w-10 h-7 rounded-md border border-gray-300 text-center text-[10px]"
data-siswa="{{ $siswa->id }}"
data-lm="{{ $loop->parent->iteration }}">

    </td>

    @endforeach

@endforeach

   <td class="border border-gray-200 text-center">

<span
id="jumlah{{ $siswa->id }}"
class="inline-flex px-3 py-1 rounded-full bg-gray-100 text-gray-700 font-semibold">

0

</span>

</td>

{{-- RATA FORMATIF --}}

   <td class="border border-gray-200 text-center">

    <span
        id="formatif{{ $siswa->id }}"
        class="font-semibold text-blue-600">

        {{ $nilaiSiswa[$siswa->id]->rata_formatif ?? 0 }}

    </span>

</td>

{{-- ASTS --}}

{{-- ASTS --}}
@foreach($lingkupMateris as $lm)

<td class="border border-gray-200 text-center">

<input
    type="number"
    min="0"
    max="100"
    step="0.01"
    name="asts[{{ $siswa->id }}][{{ $lm->id }}]"
    value="{{ $asts[$siswa->id][$lm->id] ?? '' }}"
    class="asts w-10 h-7 rounded-md border border-gray-300 text-center text-[10px]"
    data-siswa="{{ $siswa->id }}">

</td>

@endforeach

{{-- Jumlah ASTS --}}

<td class="border border-gray-200 text-center">

<span id="jumlahAsts{{ $siswa->id }}"
      class="font-semibold text-gray-700">
    0
</span>

</td>

{{-- Rata-rata ASTS --}}

<td class="border border-gray-200 text-center">

<span id="rataAsts{{ $siswa->id }}"
      class="font-semibold text-blue-600">
    0.00
</span>

</td>

{{-- ASAS / ASAT --}}

<td class="border border-gray-200 text-center">

@if($tahunAjaran->semester == 'Ganjil')

<input
 type="number"
 name="asas[{{ $siswa->id }}]"
class="asat w-10 h-7 rounded-md border-gray-300 text-center text-[10px]"
 data-siswa="{{ $siswa->id }}"
 min="0"
 max="100"
 step="0.01"
 value="{{ $nilaiSiswa[$siswa->id]->asas ?? '' }}">

@else

<input
 type="number"
 name="asat[{{ $siswa->id }}]"
class="asat w-10 h-7 rounded-md border-gray-300 text-center text-[10px]"
 data-siswa="{{ $siswa->id }}"
 min="0"
 max="100"
 step="0.01"
 value="{{ $nilaiSiswa[$siswa->id]->asat ?? '' }}">

@endif

</td>

{{-- NILAI AKHIR --}}

<td class="border border-gray-200">
    <div class="flex items-center justify-center gap-2">

    @php
        $nilai = $nilaiSiswa[$siswa->id] ?? null;

        $nilaiAwal = $nilai->nilai_akhir ?? 0;
        $nilaiRemedial = $nilai->nilai_remedial ?? 0;

        // Nilai akhir menggunakan nilai tertinggi
        // antara nilai awal dan nilai remedial
        $akhir = max($nilaiAwal, $nilaiRemedial);

        if ($akhir >= 86) {
            $badge = 'bg-green-100 text-green-700';
        } elseif ($akhir >= 76) {
            $badge = 'bg-blue-100 text-blue-700';
        } elseif ($akhir >= 66) {
            $badge = 'bg-yellow-100 text-yellow-700';
        } elseif ($akhir >= 56) {
            $badge = 'bg-orange-100 text-orange-700';
        } else {
            $badge = 'bg-red-100 text-red-700';
        }
    @endphp

    <span
        id="akhir{{ $siswa->id }}"
        data-db="{{ $nilaiAwal }}"
        class="inline-flex px-2 py-1 rounded-full {{ $badge }}">

        {{ $akhir }}
    </span>

    @if($nilaiRemedial > 0)
        <div class="mt-1">
            <span class="text-xs text-amber-800 font-semibold">
                Remedial
            </span>
        </div>
    @endif

    {{-- Tombol remedial hanya jika sudah ada data nilai --}}
   @if(
!$modeArsip &&
$nilai &&
$nilaiRemedial == 0 &&
$akhir < 75

)
<button
             type="button"
             onclick="openRemedial(
                 {{ $nilai->id }},
                 '{{ $siswa->nama_siswa }}',
                 {{ $akhir }},
                 '{{ $nilaiRemedial }}'
             )"
             class="inline-flex items-center justify-center
                    w-8 h-8 rounded-lg
                    bg-yellow-100 hover:bg-yellow-200
                    text-yellow-600 transition"
             title="Input Nilai Remedial">

            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="1.5"
                 stroke="currentColor"
                 class="w-5 h-5">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M16.862 4.487l2.651 2.651M16.862 4.487L7.5 13.85V17.25h3.4l9.362-9.363m-3.4-3.4a2.25 2.25 0 113.182 3.182"/>
            </svg>

        </button>
    @endif

</div>
</td>
</tr>

@empty

<tr>

<td
colspan="{{ $tujuanPembelajarans->count()+8 }}"
class="text-center py-12 text-gray-500">

Belum ada data siswa.

</td>

</tr>

@endforelse

</tbody>
</table>

</div>

</div>

 {{-- ===================================================== --}}
            {{-- TOMBOL SIMPAN --}}
            {{-- ===================================================== --}}

            @if($siswas->count())

                <div class="mt-6 flex justify-end">

                    <button
                        type="submit"
                        class="px-8 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl text-white font-semibold">

                        Simpan Nilai

                    </button>

                </div>

            @endif


        @endif

    </form>


@else

 {{-- ===================================================== --}}
    {{-- MODE ARSIP --}}
    {{-- ===================================================== --}}


      <div class="bg-white rounded-2xl shadow border p-10 text-center">

        <x-heroicon-o-lock-closed
            class="w-12 h-12 mx-auto text-gray-400 mb-4"/>

        <h3 class="text-lg font-semibold text-gray-700">
            Input Nilai Tidak Tersedia
        </h3>

        <p class="text-gray-500 mt-2">
            Periode tahun ajaran ini sudah diarsipkan.
            Data nilai tidak dapat ditambahkan atau diubah.
        </p>

        <p class="text-sm text-gray-500 mt-2">
            Silakan gunakan menu
            <strong>Rekap Nilai</strong>
            untuk melihat data nilai.
        </p>

    </div>

@endif

<div
id="modalRemedial"
class="fixed inset-0 hidden bg-black/40 items-center justify-center z-50">

<div class="bg-white rounded-xl shadow-xl w-[460px]">

<form
method="POST"
action="{{ route('nilai.remedial') }}">

@csrf

<input
type="hidden"
name="nilai_id"
id="nilaiId">

<div class="p-6">

<h2 class="text-xl font-bold text-gray-800">
Input Nilai Remedial
</h2>

<p class="text-sm text-gray-500 mt-1">
Masukkan nilai hasil remedial siswa.
</p>

<div class="mt-4">

<label class="block mb-1 font-medium">
Nama Siswa
</label>

<input
id="namaSiswa"
class="w-full rounded-lg border bg-gray-100"
readonly>

</div>

<div class="mt-3">

<label class="block mb-1 font-medium">
Nilai Awal
</label>

<input
id="nilaiLama"
class="w-full rounded-lg border bg-gray-100"
readonly>

</div>

<div class="mt-3">

<label class="block mb-1 font-medium">
KKM
</label>

<div class="mt-3">
    
<input
value="75"
class="w-full rounded-lg border bg-gray-100"
readonly>

</div>

<label>Remedial Sebelumnya</label>

<input
id="nilaiRemedialLama"
readonly
class="w-full rounded-lg border bg-gray-100">

<div class="mt-3">

<label class="block mb-1 font-medium">
Nilai Remedial
</label>

<input
type="number"
name="nilai_remedial"
min="0"
max="100"
step="0.01"
class="w-full rounded-lg border"
required>

<p class="text-xs text-gray-500 mt-1">
Nilai akhir akan menggunakan nilai tertinggi antara nilai awal dan nilai remedial.
</p>

</div>

<div class="mt-6 flex justify-end gap-3">

<button
type="button"
onclick="closeRemedial()"
class="px-4 py-2 rounded-lg bg-gray-400 hover:bg-gray-500 text-white">

Batal

</button>

<button
type="submit"
class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">

Simpan Remedial

</button>

</div>

</div>

</form>

</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    function hitung(siswaId){

        /*
        ======================================
        HITUNG TOTAL TP
        ======================================
        */

        let total = 0;
        let jumlah = 0;

        document.querySelectorAll('.tp-input[data-siswa="'+siswaId+'"]').forEach(function(item){

            let nilai = parseFloat(item.value);

            if(!isNaN(nilai)){
                total += nilai;
                jumlah++;
            }

        });

        /*
        ======================================
        JUMLAH
        ======================================
        */

        let jumlahEl = document.getElementById('jumlah'+siswaId);

        if(jumlahEl){
            jumlahEl.innerHTML = total.toFixed(0);
        }

        /*
        ======================================
        RATA FORMATIF
        ======================================
        */

        let rata = 0;

        if(jumlah > 0){
            rata = total / jumlah;
        }

        let formatifEl = document.getElementById('formatif'+siswaId);

        if(formatifEl){
            formatifEl.innerHTML = rata.toFixed(2);
        }

        /*
        ======================================
        ASTS
        ======================================
        */

       let totalAsts = 0;
let jumlahLm = 0;

document.querySelectorAll('.asts[data-siswa="'+siswaId+'"]').forEach(function(item){

    let nilai = parseFloat(item.value);

    if(!isNaN(nilai)){
        totalAsts += nilai;
        jumlahLm++;
    }

});

let rataAsts = jumlahLm > 0 ? totalAsts / jumlahLm : 0;

document.getElementById('jumlahAsts'+siswaId).innerHTML = totalAsts.toFixed(0);

document.getElementById('rataAsts'+siswaId).innerHTML = rataAsts.toFixed(2);

        /*
        ======================================
        ASAS / ASAT
        ======================================
        */

        let asesmenInput =
            document.querySelector('.asas[data-siswa="'+siswaId+'"]') ??
            document.querySelector('.asat[data-siswa="'+siswaId+'"]');

        let asesmen = 0;

        if(asesmenInput){

            asesmen = parseFloat(asesmenInput.value);

            if(isNaN(asesmen)){
                asesmen = 0;
            }

        }

        /*
        ======================================
        NILAI AKHIR
        ======================================
        */

     let akhirHitung = Math.round(
    (rata + rataAsts + asesmen) / 3
);

let akhirDatabase = parseFloat(
    document
        .getElementById('akhir' + siswaId)
        .dataset.db
);

let akhir = Math.max(
    akhirHitung,
    akhirDatabase
);

        /*
        ======================================
        WARNA BADGE
        ======================================
        */

        let badge = 'bg-red-100 text-red-700';

        if(akhir >= 86){

            badge = 'bg-blue-100 text-blue-700';

        }else if(akhir >= 76){

            badge = 'bg-blue-100 text-blue-700';

        }else if(akhir >= 66){

            badge = 'bg-yellow-100 text-yellow-700';

        }else if(akhir >= 56){

            badge = 'bg-orange-100 text-orange-700';

        }

        let akhirEl = document.getElementById('akhir' + siswaId);

if (akhirEl) {

    akhir = Math.round(akhir);

    let badge = 'bg-red-100 text-red-700';

    if (akhir >= 86) {
        badge = 'bg-green-100 text-green-700';
    } else if (akhir >= 76) {
        badge = 'bg-blue-100 text-blue-700';
    } else if (akhir >= 66) {
        badge = 'bg-yellow-100 text-yellow-700';
    } else if (akhir >= 56) {
        badge = 'bg-orange-100 text-orange-700';
    }

    akhirEl.className =
        'inline-flex px-3 py-1 rounded-full font-semibold ' + badge;

    akhirEl.textContent = akhir;
}
    }

    /*
    ======================================
    EVENT TP
    ======================================
    */

    document.querySelectorAll('.tp-input').forEach(function(item){

        item.addEventListener('keyup', function(){

            hitung(this.dataset.siswa);

        });

        item.addEventListener('change', function(){

            hitung(this.dataset.siswa);

        });

    });

    /*
    ======================================
    EVENT ASTS
    ======================================
    */

    document.querySelectorAll('.asts').forEach(function(item){

        item.addEventListener('keyup', function(){

            hitung(this.dataset.siswa);

        });

        item.addEventListener('change', function(){

            hitung(this.dataset.siswa);

        });

    });

    /*
    ======================================
    EVENT ASAS / ASAT
    ======================================
    */

    document.querySelectorAll('.asas, .asat').forEach(function(item){

        item.addEventListener('keyup', function(){

            hitung(this.dataset.siswa);

        });

        item.addEventListener('change', function(){

            hitung(this.dataset.siswa);

        });

    });

    /*
    ======================================
    HITUNG SAAT HALAMAN DIBUKA
    ======================================
    */

    document.querySelectorAll('.tp-input').forEach(function(item){

        hitung(item.dataset.siswa);

    });

});

function openRemedial(
    nilaiId,
    namaSiswa,
    nilaiLama,
    nilaiRemedial = '-'
){

    document.getElementById('nilaiId').value = nilaiId;
    document.getElementById('namaSiswa').value = namaSiswa;
    document.getElementById('nilaiLama').value = nilaiLama;
    document.getElementById('nilaiRemedialLama').value =
        nilaiRemedial ?? '-';

    const modal = document.getElementById('modalRemedial');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeRemedial(){

    const modal=document.getElementById('modalRemedial');

    modal.classList.remove('flex');
    modal.classList.add('hidden');

}
</script>

<style>

    .nilai-table {
        width: max-content;
        min-width: 100%;
        table-layout: fixed;
    }

    /* Kolom identitas */
    .nilai-table .col-no {
        width: 35px;
        min-width: 35px;
    }

    .nilai-table .col-nipd {
        width: 75px;
        min-width: 75px;
    }

    .nilai-table .col-nama {
        width: 130px;
        min-width: 130px;
    }

    /* TP */
    .nilai-table .col-tp {
        width: 48px;
        min-width: 48px;
    }

    /* Rekap */
    .nilai-table .col-jumlah {
        width: 55px;
        min-width: 55px;
    }

    .nilai-table .col-rata {
        width: 65px;
        min-width: 65px;
    }

    /* ASTS */
    .nilai-table .col-asts {
        width: 55px;
        min-width: 55px;
    }

    /* ASAS / ASAT */
    .nilai-table .col-asas {
        width: 60px;
        min-width: 60px;
    }

    /* NILAI AKHIR */
    .nilai-table .col-akhir {
        width: 75px;
        min-width: 75px;
    }

    .nilai-table th {
        font-size: 9px;
        padding: 6px 3px;
        text-align: center;
        white-space: nowrap;
    }

    .nilai-table td {
        padding: 5px 3px;
        text-align: center;
        white-space: nowrap;
    }

    .nilai-table .nama-siswa {
        white-space: normal;
        text-align: left;
        line-height: 1.2;
    }

    .nilai-table .tp-input,
    .nilai-table .asts,
    .nilai-table .asat {
        width: 42px !important;
        min-width: 42px !important;
        height: 28px !important;
        padding: 2px !important;
        text-align: center;
        font-size: 10px;
    }

    .nilai-table .nilai-akhir-cell {
        text-align: center;
        vertical-align: middle;
    }

    .nilai-table .nilai-akhir-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 38px;
        height: 26px;

        padding: 0 7px;

        border-radius: 9999px;
        font-weight: 600;
        font-size: 10px;
    }

</style>


@endsection
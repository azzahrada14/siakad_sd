@extends('layouts.app')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">

            Dashboard Kepala Sekolah

        </h1>

        <p class="text-gray-500 mt-2">

            Monitoring Sistem Informasi Akademik

        </p>

    </div>

   <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        {{-- Guru --}}
        <div class="bg-white rounded-xl shadow p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Guru

                    </p>

                    <h2 class="text-3xl font-bold mt-2">

                        {{ $totalGuru }}

                    </h2>

                </div>

                <div class="bg-blue-100 p-4 rounded-full">

                    <x-heroicon-o-user class="w-8 h-8 text-blue-600"/>

                </div>

            </div>

        </div>

        {{-- Siswa --}}
        <div class="bg-white rounded-xl shadow p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Siswa

                    </p>

                    <h2 class="text-3xl font-bold mt-2">

                        {{ $totalSiswa }}

                    </h2>

                </div>

                <div class="bg-green-100 p-4 rounded-full">

                    <x-heroicon-o-user-group class="w-8 h-8 text-green-600"/>

                </div>

            </div>

        </div>

        {{-- Rapor --}}
<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Rapor

                    </p>

                    <h2 class="text-3xl font-bold mt-2">

                        {{ $totalRapor }}

                    </h2>

                </div>

                <div class="bg-yellow-100 p-4 rounded-full">

                    <x-heroicon-o-document-text class="w-8 h-8 text-yellow-600"/>

                </div>

            </div>

        </div>

        {{-- Ranking --}}
 <div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Ranking

                    </p>

                    <h2 class="text-3xl font-bold mt-2">

                        {{ $totalRanking }}

                    </h2>

                </div>

                <div class="bg-purple-100 p-4 rounded-full">

                    <x-heroicon-o-trophy class="w-8 h-8 text-purple-600"/>

                </div>

            </div>

        </div>

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between items-center">

        <div>
            <p class="text-gray-500">Kelulusan</p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $persenKelulusan }}%
            </h2>

            <p class="text-gray-400">
                Persentase Lulus
            </p>
        </div>

        <div class="bg-emerald-100 p-4 rounded-full">
            <x-heroicon-o-academic-cap class="w-8 h-8 text-emerald-600"/>
        </div>

    </div>

</div>
</div>
          
<div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Grafik --}}
<div class="lg:col-span-2">

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Grafik Rata-rata Nilai per Kelas
            </h2>

            <div style="height:350px">
                <canvas id="nilaiChart"></canvas>
            </div>

        </div>

    </div>



    {{-- Panel Monitoring --}}
   <div class="lg:col-span-1">

        <div class="space-y-6">

<div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-lg font-bold mb-4">
                    Monitoring Kelulusan
                </h2>


  <table class="w-full text-sm">
                  

<tr>

<td>Total Lulus</td>

<td class="font-bold text-green-600">

{{ $totalLulus }}

</td>

</tr>

<tr>

<td>Tidak Lulus</td>

<td class="font-bold text-red-600">

{{ $totalTidakLulus }}

</td>

</tr>

<tr>

<td>Persentase</td>

<td class="font-bold">

{{ $persenKelulusan }}%

</td>

</tr>

</table>

</div>
    
            {{-- Status Rapor --}}
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-lg font-bold mb-4">
                    Status Rapor
                </h2>
<div class="flex justify-between">

<div>

<p class="text-gray-500">

Sudah Generate

</p>

<h3 class="text-2xl font-bold text-green-600">

{{ \App\Models\Rapor::where('is_generate',1)->count() }}

</h3>

</div>

<div>

<p class="text-gray-500">

Belum Generate

</p>

<h3 class="text-2xl font-bold text-red-600">

{{ \App\Models\Rapor::where('is_generate',0)->count() }}

</h3>

</div>

</div>

</div>

 {{-- Ranking --}}
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-lg font-bold mb-4">
                    Ranking Terbaru
                </h2>

<table class="w-full">

<thead>

<tr>

<th>Ranking</th>

<th>Nama</th>

<th>Nilai</th>

</tr>

</thead>

<tbody>

@foreach($rankingTerbaru as $r)

<tr>

<td>{{ $r->ranking }}</td>

<td>{{ $r->siswa->nama_siswa }}</td>

<td>{{ number_format($r->rata_rata,2) }}</td>

</tr>

@endforeach

</tbody>

</table>

</div>

   {{-- Informasi --}}
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="text-lg font-bold mb-4">
                    Informasi Akademik
                </h2>

            <table class="w-full">

                <tr>

                    <td class="py-2 font-semibold">

                        Tahun Ajaran

                    </td>

                    <td>

                        {{ $tahunAktif->tahun_ajaran ?? '-' }}

                    </td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">

                        Jumlah Guru

                    </td>

                    <td>

                        {{ $totalGuru }}

                    </td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">

                        Jumlah Siswa

                    </td>

                    <td>

                        {{ $totalSiswa }}

                    </td>

                </tr>

                <tr>

                    <td class="py-2 font-semibold">

                        Jumlah Kelas

                    </td>

                    <td>

                        {{ $totalKelas }}

                    </td>

                </tr>

            </table>

          </div>

                </div> {{-- space-y-6 --}}
    </div> {{-- xl:col-span-4 --}}
</div> {{-- grid 12 kolom --}}

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const canvas = document.getElementById('nilaiChart');

    if(canvas){

        new Chart(canvas,{

            type:'bar',

            data:{

                labels:@json($labelKelas),

                datasets:[{

                    label:'Rata-rata Nilai',

                    data:@json($rataNilai),

                    backgroundColor:'#3B82F6',

                    borderRadius:6

                }]

            },

            options:{

                responsive:true,

                maintainAspectRatio:false,

                plugins:{
                    legend:{
                        display:false
                    }
                },

                scales:{

                    y:{
                        beginAtZero:true,
                        max:100
                    }

                }

            }

        });

    }

});

</script>

@endsection
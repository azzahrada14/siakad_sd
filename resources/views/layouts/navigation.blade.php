<div>
    @php
    $periodeId = request()->query('tahun_ajaran_id');
@endphp

    {{-- HEADER --}}
    <header
        class="fixed top-0 left-0 right-0 h-[72px]
        bg-gradient-to-r from-blue-700 to-blue-500
        shadow-lg z-50">

        <div class="h-full px-5 flex items-center justify-between">

            {{-- KIRI --}}
            <div class="flex items-center gap-4">

                {{-- TOGGLE --}}
                <button
                    @click="sidebarOpen=!sidebarOpen"
                    class="text-white">

                    ☰

                </button>

                {{-- LOGO --}}
                <div class="flex items-center gap-3">

                    <img
                        src="{{ asset('logo.png') }}"
                        class="w-12 h-12 object-contain">

                    <div>

                        <h1 class="text-white font-bold text-2xl">

                            SIAKAD SDN Cimanahayu

                        </h1>

                        <p class="text-blue-100 text-xs">

                            Sistem Informasi Akademik

                        </p>

                    </div>

                </div>

            </div>

            {{-- USER --}}
            <div
                x-data="{open:false}"
                class="relative">

                <button
                    @click="open=!open"
                    class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-white/20
                        text-white flex items-center justify-center font-bold">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <div class="text-left">

                        <div class="text-white font-semibold">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="text-blue-100 text-xs">

                            {{ ucfirst(Auth::user()->role) }}

                        </div>

                    </div>

                </button>

                {{-- DROPDOWN --}}
                <div
                    x-show="open"
                    @click.away="open=false"
                    x-transition
                    class="absolute right-0 mt-3 w-56
                    bg-white rounded-xl shadow-xl overflow-hidden">

                    <a href="#"
                        class="block px-4 py-3 hover:bg-gray-100">

                        🔒 Ganti Password

                    </a>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50">

                            🚪 Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </header>

    {{-- SIDEBAR --}}
    <aside

        :class="sidebarOpen ? 'w-64' : 'w-20'"

        class="fixed top-[72px] left-0
        h-[calc(100vh-72px)]
        bg-slate-900 text-white shadow-xl
        transition-all duration-300
        overflow-y-auto">

        {{-- PROFILE SEKOLAH --}}
<div class="p-4 border-b">

    <div class="flex flex-col items-center">

        <img
            src="{{ asset('logo.png') }}"
            class="w-16 h-16 object-contain mb-2">

        
        <h3
    x-show="sidebarOpen"
    class="font-bold text-center text-white">
            SDN Cimanahayu

        </h3>

         <p
    x-show="sidebarOpen"
    class="text-xs text-slate-300 text-center">

            Kabupaten Cianjur

        </p>

    </div>

</div>

        <div class="p-4">

            {{-- DASHBOARD --}}
           {{-- DASHBOARD --}}
<a href="{{ Auth::user()->role === 'guru'
    ? route('guru.dashboard', request()->only('tahun_ajaran_id'))
    : route('dashboard', request()->only('tahun_ajaran_id'))
}}"
    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="home"></i>

    <span x-show="sidebarOpen">
        Dashboard
    </span>

</a>

            {{-- OPERATOR / ADMIN --}}
            @if(Auth::user()->role == 'operator')

                <div
                    x-show="sidebarOpen"
                    class="mt-6 mb-2 text-xs font-bold text-gray-400">

                    DATA MASTER

                </div>
                <a href="{{ route('tahun-ajaran.index') }}"
                     class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

                    <i data-feather="calendar"></i>

                    <span x-show="sidebarOpen">Tahun Ajaran</span>

                </a>

              {{-- ========================= --}}
{{-- GURU --}}
{{-- ========================= --}}

<div
    x-data="{openGuru:true}"
    class="mt-1">

    <button
        @click="openGuru=!openGuru"
        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-blue-600 transition">

        <div class="flex items-center gap-3">

            <i data-feather="users"></i>

            <span x-show="sidebarOpen">
                Guru
            </span>

        </div>

        <i
            x-show="sidebarOpen"
            data-feather="chevron-down"
            class="w-4 h-4">
        </i>

    </button>


    {{-- SUB MENU --}}

    <div
        x-show="openGuru"
        x-transition
        class="ml-10 mt-2 space-y-1">

        {{-- DATA GURU --}}

        <a
            href="{{ route('guru.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">
                Data Guru
            </span>

        </a>


        {{-- DATA STAFF --}}

        <a
            href="{{ route('staff.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">
                Data Staff
            </span>

        </a>

    </div>

</div>

                <a href="{{ route('siswa.index', request()->only('tahun_ajaran_id')) }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

                    <i data-feather="user"></i>

                    <span x-show="sidebarOpen">Siswa</span>

                </a>

                {{-- ========================= --}}
{{-- KELAS --}}
{{-- ========================= --}}

<div
    x-data="{openKelas: {{ request()->routeIs('kelas.index') || request()->routeIs('kelola-akademik.index') ? 'true' : 'false' }}}"
    class="mt-1">

    <button
        @click="openKelas=!openKelas"
        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-blue-600 transition">

        <div class="flex items-center gap-3">

            <i data-feather="grid"></i>

            <span x-show="sidebarOpen">
                Kelas
            </span>

        </div>

        <i
            x-show="sidebarOpen"
            data-feather="chevron-down"
            class="w-4 h-4">
        </i>

    </button>


    {{-- SUB MENU --}}

    <div
        x-show="openKelas"
        x-transition
        class="ml-10 mt-2 space-y-1">

        {{-- DATA KELAS --}}

        <a
            href="{{ route('kelas.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">
                Data Kelas
            </span>

        </a>


        {{-- PEMBAGIAN KELAS --}}

        <a
            href="{{ route('kelola-akademik.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">
                Pembagian Kelas
            </span>

        </a>

    </div>

</div>

                <a href="{{ route('mapel.index', request()->only('tahun_ajaran_id')) }}"
                     class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

                    <i data-feather="book-open"></i>

                    <span x-show="sidebarOpen">Mapel</span>

                </a>

                    
                

                <div x-show="sidebarOpen"
    class="mt-6 mb-2 text-xs font-bold text-gray-400">

    PROSES DATA AKADEMIK

</div>


</a>

<a href="{{ route('jadwal.index', request()->only('tahun_ajaran_id')) }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="calendar"></i>

    <span x-show="sidebarOpen">
        Jadwal Pelajaran
    </span>

</a>

<a href="{{ route('ekstrakurikuler.index', request()->only('tahun_ajaran_id')) }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="activity"></i>

    <span x-show="sidebarOpen">
        Ekstrakurikuler
    </span>

</a>



                <div
    x-show="sidebarOpen"
    class="mt-6 mb-2 text-xs font-bold text-gray-400">

    PROSES AKHIR TAHUN AJARAN

</div>

    <a href="{{ route('kenaikan.index', request()->only('tahun_ajaran_id')) }}"
 class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="award"></i>

    <span x-show="sidebarOpen">
        Kenaikan Kelas
    </span>

</a>

{{-- ========================= --}}
{{-- Kelulusan --}}
{{-- ========================= --}}

<div
    x-data="{openKelulusan:true}"
    class="mt-1">

    <button
        @click="openKelulusan=!openKelulusan"
        class="w-full flex items-center justify-between px-4 py-3 rounded-xl hover:bg-blue-600 transition">

        <div class="flex items-center gap-3">

            <i data-feather="check-circle"></i>

            <span x-show="sidebarOpen">

                Kelulusan

            </span>

        </div>

        <i
            x-show="sidebarOpen"
            data-feather="chevron-down"
            class="w-4 h-4">

        </i>

    </button>

    {{-- Sub Menu --}}

    <div
        x-show="openKelulusan"
        x-transition
        class="ml-10 mt-2 space-y-1">

        <a href="{{ route('kelulusan.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">

                Data Kelulusan

            </span>

        </a>

        <a href="{{ route('alumni.index', request()->only('tahun_ajaran_id')) }}"
            class="block px-4 py-2 rounded-lg hover:bg-blue-600">

            <span x-show="sidebarOpen">

                Data Alumni

            </span>

        </a>

    </div>

</div>


            @endif

            {{-- GURU --}}
            @if(Auth::user()->role == 'guru')

                <div
                    x-show="sidebarOpen"
                    class="mt-6 mb-2 text-xs font-bold text-gray-400">

                    INPUT DATA AKADEMIK

                </div>

           <a href="{{ route('nilai.index', request()->only('tahun_ajaran_id')) }}"
                     class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

                    <i data-feather="edit"></i>

                    <span x-show="sidebarOpen">

                        Input Nilai

                    </span>

                </a>

                <a href="{{ route('absensi.index', request()->only('tahun_ajaran_id')) }}"
                     class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">
                    <i data-feather="clipboard"></i>

                    <span x-show="sidebarOpen">

                        Input Absensi

                    </span>

                </a>

                <div
                    x-show="sidebarOpen"
                    class="mt-6 mb-2 text-xs font-bold text-gray-400">

                    PROSES PEMBELAJARAN

                </div>

 <a href="{{ route('jadwal.index', request()->only('tahun_ajaran_id')) }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="calendar"></i>

    <span x-show="sidebarOpen">
        Jadwal Pelajaran
    </span>

</a>


               @if(Auth::user()->guru?->jenis_pengajar == 'Wali Kelas')

<div
x-show="sidebarOpen"
class="mt-6 mb-2 text-xs font-bold text-gray-400">

HASIL AKADEMIK 

</div>

<div class="ml-5 mt-2">

    {{-- Rekap Nilai --}}

    <a href="{{ route('wali.nilai.index', request()->only('tahun_ajaran_id')) }}"
 class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

        <i data-feather="bar-chart-2"></i>

        Rekap Nilai

    </a>

    {{-- Rekap Absensi --}}
    <a href="{{ route('wali.absensi', request()->only('tahun_ajaran_id')) }}"
 class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

        <i data-feather="clipboard"></i>

        Rekap Absensi

    </a>

    

    {{-- Ranking --}}
    <a href="{{ route('ranking.index', request()->only('tahun_ajaran_id')) }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">
        <i data-feather="award"></i>

        Ranking

    </a>


    {{-- Generate Rapor --}}
    <a href="{{ route('rapor.index', request()->only('tahun_ajaran_id')) }}"
    class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

    <i data-feather="file-text"></i>
 <span x-show="sidebarOpen">
    Rapor </span> </a>
   

@endif
@endif

@if(Auth::user()->role == 'kepala_sekolah')

<div
x-show="sidebarOpen"
class="mt-6 mb-2 text-xs font-bold text-gray-400">

INFORMASI AKADEMIK

</div>

<a href="{{ route('informasi-akademik.index', request()->only('tahun_ajaran_id')) }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-blue-600 transition">

<i data-feather="bar-chart-2"></i>

<span x-show="sidebarOpen">

Informasi Akademik

</span>

</a>


@endif

        </div>

        <div
    x-show="sidebarOpen"
    class="mt-8 p-4 text-center text-xs text-slate-400 border-t border-slate-700">

    SDN Cimanahayu<br>
    © {{ date('Y') }}

</div>

    </aside>

</div>
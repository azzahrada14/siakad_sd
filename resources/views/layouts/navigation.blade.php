<nav class="bg-blue-600 shadow-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">

            {{-- KIRI --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('logo.png') }}" class="w-12 h-12 object-contain">

                <div>
                    <h1 class="text-white font-bold text-lg">
                        SIAKAD SDN Cimanahayu
                    </h1>
                </div>
            </div>

            {{-- MENU --}}
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-300">Dashboard</a>
                <a href="{{ route('guru.index') }}" class="text-white hover:text-yellow-300">Guru</a>
                <a href="{{ route('kelas.index') }}" class="text-white hover:text-yellow-300">Kelas</a>
                <a href="{{ route('siswa.index') }}" class="text-white hover:text-yellow-300">Siswa</a>
                <a href="{{ route('mapel.index') }}" class="text-white hover:text-yellow-300">Mapel</a>

                <a href="#" class="text-white border-l border-blue-300 pl-4 hover:underline">
    {{ Auth::user()->name }}
</a>        

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                    class="bg-red-500 px-4 py-2 rounded-lg text-white hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>
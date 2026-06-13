<x-guest-layout>

    {{-- 🔥 BRANDING --}}
    <div class="text-center mb-6">
        <img src="{{ asset('logo.png') }}" 
             alt="logo"
             class="mx-auto mb-3 w-20 object-contain">

        <h1 class="text-2xl font-bold text-gray-800">
            LOGIN<br>
            SIAKAD SDN CIMANAHAYU
        </h1>

        <p class="text-sm text-gray-500">
            Sistem Informasi Akademik Sekolah Dasar
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- EMAIL --}}
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email"
                :value="old('email')" required autofocus />
        </div>

        {{-- PASSWORD --}}
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password" required />
        </div>

        <div class="mb-4">
    <label class="block mb-1 font-medium">Login Sebagai</label>
    <select name="role" class="w-full border p-2 rounded" required>
        <option value="">-- Pilih Role --</option>
        <option value="operator">Operator</option>
        <option value="guru">Guru</option>
        <option value="kepala_sekolah">Kepala Sekolah</option>
    </select>
</div>


        {{-- BUTTON --}}
        <div class="flex justify-end mt-4">
            <x-primary-button>
                Log in
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>
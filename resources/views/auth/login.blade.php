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

    <div class="relative mt-1">
        <x-text-input
            id="password"
            class="block w-full pr-12"
            type="password"
            name="password"
            required
        />

       <button
    type="button"
    onclick="togglePassword()"
    class="absolute inset-y-0 right-0 flex items-center justify-center w-10 text-gray-500 hover:text-gray-700">

    {{-- Mata terbuka --}}
    <svg id="eyeOpen"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178z" />
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>

    {{-- Mata tertutup --}}
    <svg id="eyeClose"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-5 h-5 hidden">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3 3l18 18M10.478 10.487A3 3 0 0013.5 13.5M9.88 5.09A9.956 9.956 0 0112 4.5c4.638 0 8.573 3.007 9.963 7.178a1.01 1.01 0 010 .639 10.026 10.026 0 01-4.043 5.135M6.228 6.228A10.026 10.026 0 002.036 11.683a1.012 1.012 0 000 .639C3.423 16.493 7.36 19.5 12 19.5a9.95 9.95 0 004.132-.893" />
    </svg>

</button>
    </div>
</div>

{{-- REMEMBER ME --}}
<div class="mt-4">
    <label class="inline-flex items-center">
        <input
            type="checkbox"
            name="remember"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

        <span class="ml-2 text-sm text-gray-600">
            Ingat Saya
        </span>
    </label>
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

    {{-- BANTUAN --}}
<div class="mt-6">
    <div class="rounded-xl bg-gray-100 text-center py-4 px-4">
        <p class="text-sm text-gray-600">
            Butuh bantuan?
            <span class="font-semibold">
                Hubungi Operator Sekolah
            </span>
            untuk mendapatkan akun akses.
        </p>
    </div>
</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClose = document.getElementById('eyeClose');

    if (password.type === 'password') {
        password.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClose.classList.remove('hidden');
    } else {
        password.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClose.classList.add('hidden');
    }
}
</script>

</x-guest-layout>
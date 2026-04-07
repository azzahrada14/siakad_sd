<x-guest-layout>
     {{-- 🔥 BRANDING --}}
    <div class="text-center mb-6">
        <img src="{{ asset('logo.png') }}" 
             alt="logo"
             class="mx-auto mb-3 w-20 object-contain">

        <h1 class="text-2xl font-bold text-gray-800">
            SIGN UP<br>
            SIAKAD SDN CIMANAHAYU
        </h1>
                <p class="text-sm text-gray-100 mt-2">
                    Buat akun untuk mengakses SIAKAD SDN Cimanahayu
                </p>
            </div>

            <!-- Form -->
            <div class="px-8 py-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="name"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 font-medium" />
                        <x-text-input 
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md transition duration-300">
                        Sign Up
                    </button>

                    <!-- Login Link -->
                    <p class="text-center text-sm text-gray-500 mt-6">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                            Login di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>

    </div>
</x-guest-layout>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIAKAD SDN Cimanahayu</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Feather Icon --}}
    <script src="https://unpkg.com/feather-icons"></script>

<script>
window.addEventListener('load', () => {
    feather.replace();
});
</script>

</head>

<body
    class="bg-gray-100"
    x-data="{ sidebarOpen:true }">

    @include('layouts.navigation')

    <main
    :class="sidebarOpen ? 'ml-64' : 'ml-20'"
    class="pt-[90px] p-6 transition-all duration-300">

    {{-- =====================================================
         NOTIFIKASI
    ====================================================== --}}

    @if(session('success'))

        <div
            id="notification-success"
            class="fixed top-24 right-6 z-50
                   w-full max-w-md
                   bg-green-50 border border-green-200
                   text-green-800
                   rounded-lg shadow-lg p-4">

            <div class="flex items-start gap-3">

                <div class="text-green-600 text-xl font-bold">
                    ✓
                </div>

                <div class="flex-1">

                    <p class="font-semibold">
                        Berhasil
                    </p>

                    <p class="text-sm mt-1">
                        {{ session('success') }}
                    </p>

                </div>

                <button
                    type="button"
                    onclick="document.getElementById('notification-success').remove()"
                    class="text-green-600 hover:text-green-800 text-lg">

                    ×

                </button>

            </div>

        </div>

    @endif


    @if(session('error'))

        <div
            id="notification-error"
            class="fixed top-24 right-6 z-50
                   w-full max-w-md
                   bg-red-50 border border-red-200
                   text-red-800
                   rounded-lg shadow-lg p-4">

            <div class="flex items-start gap-3">

                <div class="text-red-600 text-xl font-bold">
                    !
                </div>

                <div class="flex-1">

                    <p class="font-semibold">
                        Gagal
                    </p>

                    <p class="text-sm mt-1">
                        {{ session('error') }}
                    </p>

                </div>

                <button
                    type="button"
                    onclick="document.getElementById('notification-error').remove()"
                    class="text-red-600 hover:text-red-800 text-lg">

                    ×

                </button>

            </div>

        </div>

    @endif


    @yield('content')

</main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

    @stack('scripts')

    <script>

document.addEventListener('DOMContentLoaded', function () {

    setTimeout(function () {

        const success =
            document.getElementById('notification-success');

        const error =
            document.getElementById('notification-error');

        if (success) {
            success.remove();
        }

        if (error) {
            error.remove();
        }

    }, 4000);

});

</script>

</body>
</html>
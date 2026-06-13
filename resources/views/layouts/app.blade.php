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

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>

@yield('scripts')

</body>

</html>
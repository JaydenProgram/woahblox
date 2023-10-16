@include('parts.header')
@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/games.js'])

<main class="py-4">
            @yield('content')
        </main>



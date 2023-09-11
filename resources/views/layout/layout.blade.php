@include('parts.header')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@yield('layout_content')

@include('parts.footer')

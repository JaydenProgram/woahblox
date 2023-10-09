<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Woahblox</title>
    @vite('resources/css/app.css')


</head>
<body class="text-gray-700">
<div> <!-- Header -->
    <div>
        <nav class ="font-semibold text-lg flex bg-gray-200">
            <div class="m-2 pr-6 w-36">
                <a href="{{ url('/') }}"><img src="{{ Vite::asset('resources/images/woahlogo.png') }}"></a>
            </div>
            <div class="flex m-2">
                <ul class="flex space-x-20">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Discover</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Marketplace</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Create</a>
                    </li>
                </ul>
                <div>
                    <form class="ml-24 mr-20">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search">
                    </form>
                </div>
                @guest

                    <div class ="font-semibold text-lg ml-96">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        @else
                            <a>{{ Auth::user()->name }}</a>
                            <a class="ml-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                @csrf
                            </form>
                    </div>
                @endguest
            </div>
        </nav>
    </div> <!-- End nav -->
</div>


<main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

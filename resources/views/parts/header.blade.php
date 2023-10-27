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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body class="text-gray-700">
    <div> <!-- Header -->
        <div>
            <nav class ="font-semibold text-lg flex bg-gray-200">
                <div class="m-2 pr-6 w-36">
                        <a href="@auth
                        {{ url('/home') }}@else {{ url('/') }} @endauth "><img src="{{ Vite::asset('resources/images/woahlogo.png') }}"></a>
                </div>
                <div class="flex m-2">
                <ul class="flex space-x-20">

                    <li>
                        <a href="@auth
                        {{ url('/home') }}@else {{ url('/') }} @endauth">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Discover</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">Marketplace</a>
                    </li>
                    @auth
                    <li>
                        <a href="{{route('games.create')}}">Create</a>
                        @else
                            <!-- Shows no create so you cant create -->
                    </li>
                    @endauth

                <li>
                    <form id="searchForm" action="{{ route('games.search') }}" method="GET">
                        <label for="query">Search:</label>
                        <input type="text" name="query" id="query">
                    </form>
                </li>
                    </ul>
                    @guest


                    @if (Route::has('login'))
                            <div class ="font-semibold text-lg ml-96">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                        @if (Route::has('register'))
                    <a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>

                        @endif
                </div>
                        @else

                        <div class ="font-semibold text-lg ml-96">
                            <form action="{{ route('users.updateRole', ['id' => Auth::user()->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <button class="mr-2" type="submit">Change Role</button>
                            </form>
                            <a class="" href="{{ route('account.editUser') }}">{{ Auth::user()->name }}</a>
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
</body>
</html>

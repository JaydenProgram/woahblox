@extends('layouts.app')

@section('content')
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <div class="font-semibold text-lg flex justify-center">{{ __('Dashboard') }}</div>
<main class="m-8">
    <header>
        <h1 class="text-4xl font-bold mb-2">
            Home
        </h1>
       @auth

            @if(auth()->user()->role_id == 2)

                <h2 class="font-semibold text-2xl text-black">Users</h2>
                <div class="flex space-x-4 mb-10">
                @foreach($users as $user)
                        <a class="" href="{{ route('account.editUser', $user) }}">

                    <div class="text-center">

                        <div class="h-20 w-20">
                            <img class="rounded-full w-20" src="{{asset('profile_pictures/' .$user->profile_picture)}}" alt="">
                        </div>

                        <span class="font-semibold text-sm truncate">{{ $user->name }}</span>
                    </div>
                    </a>



                @endforeach
                </div>

    @endif
    @endauth
        <form action="{{ route('games.filter') }}" method="POST">
            @csrf
            <label for="type">Select Game Type:</label>
            <select name="type" id="type">

                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach

            </select>
            <button type="submit">Filter</button>
        </form>
        @if(request()->has('favorited'))
            <form action="{{ route('home') }}" method="GET">
                <button type="submit">Show All Games</button>
            </form>
        @else
            <form action="{{ route('favorited.games') }}" method="GET">
                @csrf
                <input type="hidden" name="favorited" value="1">
                <button type="submit">Show Favorited Games</button>
            </form>
        @endif

    </header>

    <div>
        <div class="flex space-x-[700px]">
            <h2 class="font-semibold text-2xl text-black">Continue</h2>
            <p class="font-semibold text-lg "> See All -></p>
        </div>

        <div id="" class="flex flex-wrap space-x-4 space-y-4 w-[1000px]">
            @if(count($games) > 0)
            <!-- Game list 1 -->
            @foreach($games as $game)
                @if(isset($game))
                    <div>
                        <div class="w-36">
                            <div class="w-36 h-36 flex">
                                <a href="{{ route('games.play', ['id' => $game->id]) }}">
                                    <img class="rounded-lg h-36" src="{{asset('gameImages/' .$game->image_link)}}" alt="Game Image">
                                </a>
                            </div>

                            <div>
                                <h2 class="font-semibold text-xl truncate">{{ $game->name }}</h2>
                        </div>

                            <div class="flex space-x-16 flex-row">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016
                                    15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514
                                    1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498
                                    0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723
                                    3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068
                                    1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-
                                    .078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969
                                    0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-
                                    .898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.9
                                    59H4.25c-.832 0-1.612.453-1.918 1.227z" />
                                    </svg>
                                    <p class="text-gray-1000 font-medium">{{ $game->likes }}</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                                        <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                                    </svg>
                                    <p class="text-gray-1000 font-medium">{{ $game->play_count }}</p>
                                </div>



                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            @else
                <p>No games found for your search.</p>
            @endif

        </div>

    </div>
</main>
@endsection

@extends('layouts.app')

@section('content')
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <div class="font-semibold text-lg flex justify-center">{{ __('Dashboard') }}</div>
<main class="m-8">
    <header>
        <h1 class="text-4xl font-bold">
            Home
        </h1>
{{--        @foreach($types as $type)--}}
{{--            <div id="game-container">--}}
{{--                <a href="#" class="filter-link" data-type="{{ $type }}">{{ ucfirst($type) }} Games</a>--}}

{{--            </div>--}}

{{--        @endforeach--}}
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

    {{--        <div>--}}
    {{--            <h2>Friends ()</h2>--}}
    {{--            <div>--}}
    {{--                <!-- Friend list -->--}}
    {{--                <div>--}}
    {{--                    <img src="" alt="">--}}
    {{--                    <div>--}}
    {{--                        <span>Name</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <div>
        <div class="flex space-x-[700px]">
            <h2 class="font-semibold text-2xl text-black">Continue</h2>
            <p class="font-semibold text-lg "> See All -></p>
        </div>

        <div id="" class="flex space-x-4">
            @if(count($games) > 0)
            <!-- Game list 1 -->
            @for($i = 0; $i < 6; $i++)
                @if(isset($games[$i]))
                    <div>
                        <div class="w-36">
                            <a href="{{ route('games.play', ['id' => $games[$i]->id]) }}">
                                <img class="rounded-lg" src="{{asset('gameImages/' .$games[$i]->image_link)}}" alt="Game Image">
                            </a>
                            <div>
                                <h2 class="font-semibold text-xl truncate">{{ $games[$i]->name }}</h2>
                        </div>

                            <div class="flex space-x-7">
                                <p class="text-gray-1000 font-medium">{{ $games[$i]->likes }}</p>
                                <p class="text-gray-1000 font-medium">{{ $games[$i]->play_count }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
            @else
                <p>No games found for your search.</p>
            @endif

        </div>

    </div>
</main>
@endsection

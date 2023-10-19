@extends('layout.layout')

@section('layout_content')
    <div class="flex mt-10 ml-10">
        <div class="bg-gray-200 flex w-[1000px] h-max flex-col">

            <div class="flex">
                <img class=" w-[640px] h-[360px] ml-3 mt-3" src="{{asset('gameImages/' .$game->image_link)}}" alt="Game Image">

                <div class="flex flex-col">

                                <h1 class="text-3xl font-bold mt-4 ml-7">{{ $game->name }}</h1>

                <div class="flex flex-col">
                    {{--Get the user from the hasmany--}}
                    <p class="text-lg font-semibold mt-2 ml-7">{{ $game->user->name }}</p>
                    <div class="">
                        <p class="text-base font-medium mt-1 ml-7">{{ $game->type }}</p>
                    </div>
                    <div class="mt-36 ml-7 mr-7">
                        @auth
                            <a href="{{ route('games.edit', ['id' => $game->id]) }}">
                            <button type="button" class="bg-green-500 w-80 h-16 border-b-black rounded-lg text-white">
                                Edit
                            </button>
                    </a>
                        @else
                        <button type="button" class="bg-green-500 w-80 h-16 border-b-black rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-white stroke-white flex ml-36">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>

                        </button>
                        @endauth
                        <div class="flex">
                            <div class="">
                                <p class="text-base font-medium mt-2 ml-3">Favorite</p>
                            </div>
                            <div class="">
                                <p class="text-base font-medium mt-2 ml-7">Follow</p>
                            </div>
                            <div class="">
                                <p class="text-base font-medium mt-2 ml-7">{{$game->likes}}</p>
                            </div>
                            <div class="">
                                <p class="text-base font-medium mt-2 ml-7">{{$game->play_count}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
            <div>
                <p class="text-base font-medium mt-2 ml-4 max-w-[640px]">{{ $game->description }}</p>
                @auth
                <form class="ml-4 mt-2 mb-2" action="{{ route('games.destroy', ['id' => $game->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 w-80 h-16 border-b-black rounded-lg text-white" onclick="return confirm('Are you sure you want to delete this game?');" type="submit">Delete Game</button>
                </form>
                @else
                {{--Empty--}}
                    @endauth
            </div>
                </div>
            </div>




@endsection

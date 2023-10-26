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

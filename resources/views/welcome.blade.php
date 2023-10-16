@extends('layout.layout')

@section('layout_content')

    <main class="m-8">
        <header>
            <h1 class="text-4xl font-bold text-black">
                Home
            </h1>
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

            <div class="flex space-x-4">
                <!-- Game list 1 -->
                @for($i = 0; $i < 6; $i++)
                    @if(isset($games[$i]))
                    <div>

                        <img class="rounded-lg" src="{{asset($games[$i]->image_link)}}" alt="Game Image">
                        <div>
                            <h2 class="font-semibold text-xl max-w-max">{{ $games[$i]->name }}</h2>
                            <div class="flex space-x-7">
                                <p class="text-gray-1000 font-medium">{{ $games[$i]->likes }}</p>
                                <p class="text-gray-1000 font-medium">{{ $games[$i]->play_count }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>
    </main>

@endsection

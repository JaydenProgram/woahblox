@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" action="{{ route('games.update', ['id' => $game->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Add this line to indicate it's an update request -->
        <div class="flex justify-center mt-10">
            <div class="bg-gray-200 w-3/12 h-4/6 flex flex-col ">
                <div class="self-center">
                    <h1 class="text-3xl font-bold mt-4">Edit a game!</h1>
                    <input type="text" id="name" name="name" placeholder="Name" class="px-4 py-2 rounded-md w-fit mt-2" value="{{ $game->name }}">

                    <div>
                        <textarea id="description" name="description" placeholder="Description" class="px-4 py-2 rounded-md w-fit mt-2">{{ $game->description }}</textarea>
                    </div>


                    <img src="{{asset('gameImages/' .$game->image_link)}}" alt="Current Image">
                    <input type="file" id="image_link" name="image_link" placeholder="Image" class="px-4 py-2 rounded-md w-fit mt-2">
                    <div class="flex flex-col">
                        <label for="likes" name="likes" class="likes">Likes:</label>
                        <input type="number" id="likes" name="likes" value="{{ $game->likes }}" placeholder="Likes" class="px-4 py-2 rounded-md w-fit mt-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="play_count" name="play_count" class="play_count">Play count:</label>
                        <input type="number" id="play_count" name="play_count" value="{{ $game->play_count }}" placeholder="Play count" class="px-4 py-2 rounded-md w-fit mt-2">
                    </div>



                    <input type="text" id="type" name="type" placeholder="Type" value="{{ $game->type }}" class="px-4 py-2 rounded-md w-fit mt-2">

                    <div>
                        <button type="submit" class="px-4 py-2 rounded-md bg-white w-fit mt-2">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

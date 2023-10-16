@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" action="{{ route('games.store') }}" method="POST">
        @csrf

        <div class="flex justify-center mt-10">
<div class="bg-gray-200 w-3/12 h-4/6 flex flex-col ">
    <div class="self-center">
    <h1 class="text-3xl font-bold mt-4">Create a game!</h1>
    <input type="text" id="name" name="name" placeholder="Name" class="px-4 py-2 rounded-md w-fit mt-2">

<div>
    <textarea id="description" name="description" placeholder="Description" class="px-4 py-2 rounded-md w-fit mt-2"></textarea>
</div>



    <input type="file" id="image_link" name="image_link" placeholder="Image" class="px-4 py-2 rounded-md w-fit mt-2">
<div class="flex flex-col">
    <label for="likes" name="likes" class="likes">Likes:</label>
    <input type="number" id="likes" name="likes" value="0" placeholder="Likes" class="px-4 py-2 rounded-md w-fit mt-2">
</div>

<div class="flex flex-col">
    <label for="play_count" name="play_count" class="play_count">Play count:</label>
    <input type="number" id="play_count" name="play_count" value="0" placeholder="Play count" class="px-4 py-2 rounded-md w-fit mt-2">
</div>



    <input type="text" id="type" name="type" placeholder="Type" class="px-4 py-2 rounded-md w-fit mt-2">
<div>
    <button type="submit" class="px-4 py-2 rounded-md bg-white w-fit mt-2">Submit</button>
</div>

</div>
            </div>
        </div>


    </form>

@endsection

@extends('layouts.app')

@section('content')
    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <label for="image_link">Image Link:</label>
        <input type="text" id="image_link" name="image_link"><br>

        <label for="likes">Likes:</label>
        <input type="number" id="likes" name="likes" value="0"><br>

        <label for="play_count">Play Count:</label>
        <input type="number" id="play_count" name="play_count" value="0"><br>

        <button type="submit">Submit</button>
    </form>

@endsection

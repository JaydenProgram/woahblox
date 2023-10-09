<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function create()
    {
        return view('create_game');
    }





    public function store(Request $request)
    {
        $games = new Game();
        $games->user_id = auth()->user()->id;
        $games->name = $request->input('name');
        $games->description = $request->input('description');
        $games->image_link = $request->input('image_link');
        $games->likes = $request->input('likes');
        $games->play_count = $request->input('play_count');
        $games->save();

        return redirect()->route('games.create')->with('success', 'Game added successfully!');
    }

    public function welcome()
    {
    $games = Game::all(); // Fetch all games

    return view('welcome', ['games' => $games]);

    }

    public function home()
    {
        $games = Game::all(); // Fetch all games

        return view('home', ['games' => $games]);

    }


}

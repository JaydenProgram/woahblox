<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{


    public function index()
    {
        $types = Game::select('type')->distinct()->pluck('type');
        $games = Game::all();

        return view('games.index', compact('types', 'games'));
    }


    public function create()
    {
        return view('create_game');
    }





    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image_link' => 'required|mimes:jpg,png,jpeg',
            'type' => 'required',
            'likes' => 'required|integer',
            'play_count' => 'required|integer',
        ]);


        $game = new Game();
        $game->user_id = auth()->user()->id;
        $game->name = $request->input('name');
        $game->description = $request->input('description');

        // Upload and save the image
        if ($request->hasFile('image_link')) {
            //takes image and puts into variable to use in database

            $newImagePath = time() . '-' . $request->name . '.' . $request->image_link->extension();
            //moves the image to the gameImages directory
            $request->image_link->move('gameImages', $newImagePath);
            $game->image_link = $newImagePath;
        }

        $game->type = $request->input('type');
        $game->likes = $request->input('likes');
        $game->play_count = $request->input('play_count');
        $game->save();

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

    public function filterByType(Request $request)
    {
        $type = $request->input('type');
        $games = Game::where('type', $type)->get();

        return response()->json(['games' => $games]);
    }


}

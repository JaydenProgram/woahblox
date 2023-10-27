<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GameController extends Controller
{


    public function index()
    {
        $types = Game::select('type')->distinct()->pluck('type');
        if (!$request->has('favorited')) {
            $games = Game::all();
        }


        return view('games.index', compact('types', 'games'));
    }


    public function create()
    {
        return view('create_game');
    }

    public function play($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $game = Game::with('user')->findOrFail($id);

        return view('play', compact('game'));
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

    $types = Game::select('type')->distinct()->pluck('type');

    $games = Game::all(); // Fetch all games

    return view('welcome', compact('games', 'types'));

    }

    public function home()
    {
        if (!$request->has('favorited')) {
            $games = Game::all();
        }

        return view('home', compact('games'));

    }

    public function favoritedGames()
    {
        $types = Game::select('type')->distinct()->pluck('type');
        $favoritedGames = auth()->user()->favoriteGames()->get();

        return view('home', ['games' => $favoritedGames, 'types' => $types]);
    }

    public function filterByType(Request $request)
    {
        $types = Game::select('type')->distinct()->pluck('type');
        $type = $request->input('type');
        $games = Game::where('type', $type)->get();

        if(!auth()->check()) {
            return view('welcome', compact('games', 'types'));
        }

        return view('home', compact('games', 'types'));
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        $user = auth()->user();

        if ($user->role_id == 1 && $game->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }

        $game->delete();

        return redirect()->route('home')->with('success', 'Game deleted successfully');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $user = auth()->user();

        if ($user->role_id == 1 && $game->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }
        return view('edit', compact('game'));
    }

    // i had to use the full update again because of the files for images
    public function update(Request $request, $id)

    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'image_link' => '|mimes:jpg,png,jpeg',
            'type' => 'required|string|max:50',
            'likes' => 'nullable|integer',
            'play_count' => 'nullable|integer',
        ]);

        $game = Game::findOrFail($id);

        $user = auth()->user();

        if ($user->role_id == 1 && $game->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }

        $game->user_id = auth()->user()->id;
        $game->name = $request->input('name');
        $game->description = $request->input('description');

        // Upload and save the image (if a new image is provided)
        if ($request->hasFile('image_link')) {
            $newImagePath = time() . '-' . $request->name . '.' . $request->image_link->extension();
            $request->image_link->move('gameImages', $newImagePath);
            $game->image_link = $newImagePath;
        }

        $game->type = $request->input('type');
        $game->likes = $request->input('likes');
        $game->play_count = $request->input('play_count');
        $game->save();

        return redirect()->route('games.play', ['id' => $game->id])->with('success', 'Game updated successfully');
    }

    public function favoriteGame(Game $game)
    {
        $user = auth()->user();

        if (!$user->favoriteGames()->where('game_id', $game->id)->exists()) {
            $user->favoriteGames()->attach($game);
            return redirect()->back()->with('success', 'Game favorited successfully');
        }

        return redirect()->back()->with('error', 'Game is already favorited');
    }

    public function unfavoriteGame(Game $game)
    {
        $user = auth()->user();

        if ($user->favoriteGames()->where('game_id', $game->id)->exists()) {
            $user->favoriteGames()->detach($game);
            return redirect()->back()->with('success', 'Game unfavorited successfully');
        }

        return redirect()->back()->with('error', 'Game is not favorited');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $types = Game::select('type')->distinct()->pluck('type');

        $games = Game::where('name', 'like', '%'.$query.'%')->get();

        if (!auth()->check()) {
            return view('welcome', compact('games', 'types'));
        }
        return view('home', compact('games', 'types'));
    }

}

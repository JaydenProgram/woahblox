<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class CustomHomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::all();

        $types = Game::select('type')->distinct()->pluck('type');

            $games = Game::all();



        return view('home', compact('types', 'games', 'users', 'user'));
    }
}

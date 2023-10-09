<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class CustomHomeController extends Controller
{
    public function index()
    {
        // Add your custom logic here
        $games = Game::all();


        return view('home', compact('games'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class CustomHomeController extends Controller
{
    public function index()
    {
        $types = Game::select('type')->distinct()->pluck('type');

            $games = Game::all();



        return view('home', compact('types', 'games'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class worldController extends Controller
{
    //

    public function index()
    {
        $title = 'Cotrola';
        return view('worlds.hellos', compact('title', ));
    }
}

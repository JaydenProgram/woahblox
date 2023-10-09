<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\worldController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games',  [GameController::class, 'store'])->name('games.store');
Route::get('/', [GameController::class, 'welcome'])->name('games.welcome');




Auth::routes();


Route::get('/home', [CustomHomeController::class, 'index'])->name('home');

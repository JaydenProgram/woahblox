<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;

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


//  Get welcome to go to welcome page
Route::get('/', [GameController::class, 'welcome'])->name('games.welcome');
// Post filter type to show correct games
Route::post('/games/filter', [GameController::class, 'filterByType'])->name('games.filter');
// Get certain game by id for more info on the game
Route::get('/games/{id}', [GameController::class, 'play'])->name('games.play');






Route::middleware('role:1,2')->group(function () {
    // I used both middleware and authentication in blade, now the create only works when im logged in
    Route::get('/create', [GameController::class, 'create'])->name('games.create');
// Post the information into database
    Route::post('/games',  [GameController::class, 'store'])->name('games.store');
});

Route::middleware('role:2')->group(function () {
    // Route to delete game with certain id
    Route::delete('/games/delete/{id}', [GameController::class, 'destroy'])->name('games.destroy');
// Show the edit form
    Route::get('/games/edit/{id}', [GameController::class, 'edit'])->name('games.edit');
// Update the game details
    Route::put('/games/update/{id}', [GameController::class, 'update'])->name('games.update');
});






Auth::routes();


Route::get('/home', [CustomHomeController::class, 'index'])->name('home');
Route::put('/users/update-role/{id}', [UserController::class, 'updateRole'])->name('users.updateRole');

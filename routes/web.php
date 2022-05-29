<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\SortMoviesController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/sort/user/{user}', [SortMoviesController::class, 'sortByCreator'])->name('sortByCreator');
Route::get('/sort/likes', [SortMoviesController::class, 'sortByLikes'])->name('sortByLikes');
Route::get('/sort/hates', [SortMoviesController::class, 'sortByHates'])->name('sortByHates');
Route::get('/sort/date', [SortMoviesController::class, 'sortByDate'])->name('sortByDate');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

    Route::get('/like/{movie}', [ReactionController::class, 'likeMovie'])->name('like.movie');
    Route::get('/hate/{movie}', [ReactionController::class, 'hateMovie'])->name('hate.movie');
});

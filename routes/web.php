<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumAddFormController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WatchListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class , 'index'])->name('dashboard');
Route::get('/forum', [ForumController::class , 'index'])->name('forum.index');
Route::get('/watchlist', [WatchListController::class , 'index'])->name('watchlist.index'); // name żeby dostać się do REMOVE w watchlistController
Route::get('/movies', [MoviesController::class , 'index'])->name('movies');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('/api/add', [WatchListController::class, 'add'])->name('watchlist.add');
Route::post('/api/forum/add', [ForumAddFormController::class, 'add'])->name('forumPost.add');
Route::post('/api/movies/review/add', [ReviewController::class, 'add'])->name('review.add');
Route::post('/api/watchlist/remove', [WatchListController::class, 'remove'])->name('watchlist.remove');
Route::post('/api/forum/remove', [ForumController::class, 'remove'])->name('forum.remove');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');


// Route::get('/', function () {
//     return view('welcome');
// });



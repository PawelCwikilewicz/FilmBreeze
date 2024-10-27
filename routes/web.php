<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class , 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/forum', function () {
         return view('forum');
     });
Route::get('/watchlist', function () {
        return view('watchlist');
    });
Route::get('/movies', function () {
        return view('movies');
    });         

<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\WatchListController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class , 'index']);
Route::get('/', [ForumController::class , 'index']);
Route::get('/', [WatchListController::class , 'index']);
Route::get('/', [MoviesController::class , 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
     

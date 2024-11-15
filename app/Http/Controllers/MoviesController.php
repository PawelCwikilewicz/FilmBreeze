<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;

class MoviesController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies', compact('movies'));

    }

    public function someAction($movieId)
    {
        $user = User::find(2);
        $user->moviesWatchlist()->syncWithoutDetaching($movieId);
    }
}

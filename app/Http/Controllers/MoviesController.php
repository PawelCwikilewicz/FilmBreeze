<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use App\Models\User;

class MoviesController extends Controller
{
    public function index(){
        $movies = Movie::all();
        $series = Serie::all();
        return view('movies', compact('movies', 'series'));

    }

}

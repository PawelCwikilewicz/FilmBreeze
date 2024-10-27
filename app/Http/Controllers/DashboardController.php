<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $movies = [
            [
                'title' => 'Up',
                'year' => 2009,
            ],
            [
                'title' => 'Zodiac',
                'year' => 2007,
            ]
        ];



        return view('welcome',['movies' => $movies]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class WatchListController extends Controller
{
    public function index(){
        return view('watchlist');
    }

    public function add(Request $request)
    {
        
        $validated = $request->validate([
            'movieId' => 'required|integer|exists:movies,id',
        ]);
        
        $user = User::find(2);
        $user->moviesWatchlist()->syncWithoutDetaching($validated['movieId']);

        return response()->json(['message' => 'Film został dodany do listy'], 200);
    }
}

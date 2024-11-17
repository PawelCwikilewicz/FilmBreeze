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
        if(!empty(auth()->id())){
        $user = User::find(auth()->id());
        $user->moviesWatchlist()->syncWithoutDetaching($validated['movieId']);

        return response()->json(['message' => 'Film został dodany do listy'], 200);
        }
        return response()->json(['message' => 'Film nie został dodany do listy'], 400);
    }
}

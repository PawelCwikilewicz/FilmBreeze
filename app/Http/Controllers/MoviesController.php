<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use App\Models\Watchlist;
use GuzzleHttp\Psr7\Request;

class MoviesController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies', compact('movies'));

    }
    public function get_review($movieId){
        if(!empty(auth()->id())){
            $user = User::find(auth()->id());
            $review = Review::where('user_id', auth()->id())
                ->where('movie_id', $movieId)
                ->first();
            $watchlist = Watchlist::where('user_id', auth()->id())
            ->where('movie_id', $movieId)
            ->first();
            $isWatchlist = false;
            if(!empty($watchlist)){
                $isWatchlist = true;
            }
            if ($review) {
                return response()->json(['rating' => $review->rating, 'isWatchlist' => $isWatchlist], 200); // Return the rating
            } else {
                return response()->json(['message' => 'No review found for this movie by the user'], 404);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request) {

        $validated = $request->validate([
            'movieId' => 'required|integer|exists:movies,id',
            'rating' => 'required|integer',
        ]);

        if(!empty(auth()->id())){
            $movieId = $validated['movieId'];
            $user = User::find(auth()->id());
            $activeUserId =  $user->id;
            $rating = $validated['rating'];
            
            $existingReview = Review::where('user_id', $user->id)->where('movie_id', $movieId)->first();
            if(!empty($existingReview) && $existingReview->rating != $rating) {
                $existingReview->rating = $rating;
                $existingReview->save();
                return response()->json(['message' => 'Ocena została zmieniona'], 250);
            } elseif(empty($existingReview)) {
                $review = new Review([
                    'rating' => $rating,
                    'user_id' => $activeUserId,
                    'movie_id' => $movieId,
                ]);
                $review->save();
                return response()->json(['message' => 'Ocena została dodana do listy'], 200);
            }
        }
    }
}

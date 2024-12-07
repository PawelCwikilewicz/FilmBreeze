<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Movie;
use Illuminate\Support\Facades\Redis;

class ReviewController extends Controller
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
            $score = $validated['rating'];

            $existingReview = Review::where('user_id', $user->id)->where('movie_id', $movieId)->first();
            $doAdd = true;
            if(empty(Rating::where('movie_id', $movieId)->first())){
                $newRating = new Rating([
                    'movie_id' => $movieId,
                    'avg_score' => $score,
                    'review_count' => 1,
                ]);
                $newRating->save();
                $doAdd = false;
            } else {
                $rating = Rating::where('movie_id', $movieId)->first();
                $oldAvgScore = $rating->avg_score;
                $oldReviewCount = $rating->review_count;
            }

            if(!empty($existingReview) && $existingReview->rating != $score) {
                $existingReview->rating = $score;
                $existingReview->save();
                return response()->json(['message' => 'Ocena została zmieniona'], 250);
            } elseif(empty($existingReview)) {
                $review = new Review([
                    'rating' => $score,
                    'user_id' => $activeUserId,
                    'movie_id' => $movieId,
                ]);
                $review->save();
                if($doAdd){
                    $oldReviewCount++;
                    $oldReviewSum = $oldReviewCount * $oldAvgScore;
                    $newReviewSum = $oldReviewSum + $score;
                    $newAvgScore = $newReviewSum/$oldReviewCount;

                    $rating->avg_score = $newAvgScore;
                    $rating->review_count = $oldReviewCount;
                    $rating->save();
                }
                return response()->json(['message' => 'Ocena została dodana do listy'], 200);
            }
        }
    }

    public function index()
    {
        $ratings = Rating::query()->orderBy('avg_score','desc')->get();
        $counter = 0;
        $arr = [];
        foreach($ratings as $rating){
            $counter++;
            $movie = Movie::find($rating->movie_id);
            $arr[] = ['imagePath'=>$movie->imagePath,'title'=>$movie->title,'avg_score'=>$rating->avg_score,'review_count'=>$rating->review_count];
            if($counter==10){
                break;
            }
        }
        return view('rating',[
            'ratings'=>$arr
        ]);
    }

}

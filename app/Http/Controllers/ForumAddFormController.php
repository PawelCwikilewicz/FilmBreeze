<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumAddFormController extends Controller
{
    public function add(Request $request) {

        $validated = $request->validate([
            'movieId' => 'required|integer|exists:movies,id',
            'contentText' => 'required|String',
        ]);

        if(!empty(auth()->id())){
            
            $user = User::find(auth()->id());
            $post = new ForumPost([
                'content' => $validated['contentText'],
                'likes' => 0,
                'user_id' => $user->id,
                'movie_id' => $validated['movieId'],
            ]);
            $post->save();
            return response()->json(['message' => 'Post został dodany do listy'], 200);
        }
    }
}

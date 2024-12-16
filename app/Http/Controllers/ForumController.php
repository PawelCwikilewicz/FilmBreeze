<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){

       $forumPosts = ForumPost::with('movie', 'user')->get();
       $movies = Movie::all(); 
        $activeUser = User::find(auth()->id());
       return view('forum', [
           'forum_posts' => $forumPosts,
           'movies' => $movies,
           'active_user' => $activeUser
       ]);


    }

    public function remove(Request $request)
    {
        $validated = $request->validate([
            'postId' => 'required|integer|exists:forum_posts,id',
        ]);

        if (auth()->check()) {
           $post = ForumPost::find($validated['postId']);
           if($post){
            $post->delete();
        }
            return redirect()->route('forum.index')->with('message', 'Post został usunięty z listy');
        }

    }
}

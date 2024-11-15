<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Movie;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){

       //kod z discorda od seby


       $forumPosts = ForumPost::with('movie', 'user')->get();
       $movies = Movie::all(); // Pobierz wszystkie filmy

       return view('forum', [
           'forum_posts' => $forumPosts,
           'movies' => $movies // Przekaż filmy do widoku
       ]);

        // return view('forum',[
        //     'forum_posts' => ForumPost::with('movie', 'user','movies')->get()
        // ]);
    }
}

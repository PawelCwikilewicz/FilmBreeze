<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumAddFormController extends Controller
{
    public function add($movieId, $content) {
        $post = new ForumPost([
            'content' => $content,
            'likes' => 0,
            'user_id' => 1,
            'movie_id' => $movieId,
        ]);
    }
}

<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;


    public function watchlists()
    {
        return $this->hasMany(Watchlist::class, 'movie_id');
    }
}

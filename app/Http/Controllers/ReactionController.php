<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function likeMovie(Movie $movie)
    {
        $user_id = Auth::user()->id;

        if ($movie->hasLiked()) {
            return back();
        }

        $movie->likes()->create([
            'user_id' => $user_id,
            'liked' => true
        ]);

        return back();
    }

    public function hateMovie(Movie $movie)
    {
        $user_id = Auth::user()->id;

        if ($movie->hasHated()) {
            return back();
        }

        $movie->hates()->create([
            'user_id' => $user_id,
            'hated' => true
        ]);

        return back();
    }
}

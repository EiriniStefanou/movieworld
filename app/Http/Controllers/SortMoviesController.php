<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class SortMoviesController extends Controller
{
    public function sortByCreator(User $user)
    {
        $movies = $user->movies;

        return view('welcome', compact('movies'));
    }

    public function sortByLikes()
    {
        $movies = Movie::with('likes')->withCount('likes')->orderBy('likes_count', 'desc')->get();

        return view('welcome', compact('movies'));
    }

    public function sortByHates()
    {
        $movies = Movie::with('hates')->withCount('hates')->orderBy('hates_count', 'desc')->get();

        return view('welcome', compact('movies'));
    }

    public function sortByDate()
    {
        $movies = Movie::latest()->get();

        return view('welcome', compact('movies'));
    }
}

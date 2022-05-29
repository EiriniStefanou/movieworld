<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('welcome', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        Auth::user()->movies()->create($attributes);

        return redirect(route('movies.index'));
    }
}

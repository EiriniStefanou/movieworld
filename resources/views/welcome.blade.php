@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <h3> Movie World </h3>

        <span> Found {{ count($movies) }} movies </span>
        
        <div class="col-md-10">
            @forelse ($movies as $movie)
            <div class="card my-4">
                <div class="card-header d-flex justify-content-between">
                    <div>{{ $movie->title }}</div>

                    <div>Posted: {{ $movie->created_at->format('d/m/y') }}</div>
                </div>
                <div class="card-body">{{ $movie->description }}</div>
                <div class="card-footer d-flex justify-content-around">
                    <div>{{ $movie->likes()->count() }} likes | {{ $movie->hates()->count() }} hates</div>

                    @auth
                        @if ($movie->user_id !== Auth::user()->id)
                            
                        <div>
                            @if ($movie->hasLiked())
                                <span class="bg-primary text-white p-1 rounded">Liked</span>
                            @elseif ($movie->hasHated())
                                <span>Like</span>
                            @else
                                <a href="{{ route('like.movie', $movie->id) }}">Like</a>
                            @endif
                            |
                            @if ($movie->hasHated())
                                <span class="bg-primary text-white p-1 rounded">Hated</span>
                            @elseif ($movie->hasLiked())
                                <span>Hate</span>
                            @else
                                <a href="{{ route('hate.movie', $movie->id) }}">Hate</a>
                            @endif
                        </div>

                        @endif
                    @endauth

                    <div>
                        Posted by: 
                        @if (Auth::check() && $movie->user_id === Auth::user()->id)
                            <a href="{{ route('sortByCreator', $movie->user_id) }}" class="text-primary"> You </a>
                        @else
                            <a href="{{ route('sortByCreator', $movie->user_id) }}" class="text-primary"> {{ $movie->user->name }} </a>  
                        @endif
                    </div>
                </div>
            </div>
            @empty
                No movies Found.
            @endforelse

        </div>   

        <div class="col-md-2">
            <a href="{{ route('movies.create') }}" class="btn btn-success">New Movie</a>

            <div class="my-3">
                <h4>Sort by:</h4>
                <a href="{{ route('sortByLikes') }}" class="d-block my-1">Likes</a>
                <a href="{{ route('sortByHates') }}" class="d-block my-1">Hates</a>
                <a href="{{ route('sortByDate') }}" class="d-block my-1">Dates</a>
            </div>
        </div>  
        
    </div>
</div>
@endsection
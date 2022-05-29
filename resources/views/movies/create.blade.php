@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <form class="col-md-8" method="POST" action="{{ route('movies.store') }}">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" class="form-control" id="description" name="description"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary my-2">Create</button>
          </form>

    </div>
</div>
@endsection
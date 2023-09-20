@extends('main')
@section('body')
<form method="post" action="{{ route('movie.update', [$movie]) }}">
    @csrf
    @method("put")
    <div>
        <label for="image">Image</label>
        <input type="image" name="image"/>
    </div>

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $movie->title }}"/>
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $movie->description }}" />
    </div>

    <div>
        <label for="release_date">Release date</label>
        <input type="date" name="release_date" value="{{ $movie->release_date }}">
    </div>

    <div>
        <input type="submit" content="Enter">
    </div>
</form>
@endsection

@extends('main')
@section('body')
    <a href="{{ route('movie.create') }}">Create</a>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Release date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr>
            @foreach($movies as $movie)
                <td>{{ $movie->title  }}</td>
                <td>{{ $movie->description  }}</td>
                <td>{{ $movie->release_date  }}</td>
                <td>
                    <a href="{{ route('movie.edit', $movie) }}"> Edit </a>
                </td>
                <td>
                    <form method="post" action="{{ route("movie.destroy", $movie) }}" >
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            @endforeach
        </tr>
    </table>
@endsection

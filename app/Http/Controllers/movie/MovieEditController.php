<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieEditController extends Controller
{
    public function __invoke(Movie $movie){
        return view('movie.edit', ['movie' => $movie]);
    }
}

<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieIndexController extends Controller
{
    public function __invoke(){
        $movies = Movie::all();
        return view('movie/index', compact('movies'));
    }
}

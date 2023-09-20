<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieDeleteController extends Controller
{
    public function __invoke(Movie $movie, Request $request){

        $movie->deleteOrFail();
        return redirect(route('movie.index'))->with("seccess", "successed");
    }
}

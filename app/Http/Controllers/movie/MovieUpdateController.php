<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieUpdateController extends Controller
{
    public function __invoke(Movie $movie, Request $request){
        $data = $request->validate([
            'title' => '',
            'description' => '',
            'image' => '',
            'release_date' => '',
        ]);
        $movie->updateOrFail($data);
        return redirect(route('movie.index'))->with("seccess", "successed");
    }
}

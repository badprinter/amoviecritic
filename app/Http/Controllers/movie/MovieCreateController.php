<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;

class MovieCreateController extends Controller
{
    public function __invoke(){
        return view('movie.create');
    }
}

<?php

namespace App\Http\Controllers\movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieStoreController extends Controller
{
    public function __invoke(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => '',
            'image' => '',
            'release_date' => 'required',
        ]);
        Movie::create($data);
        return redirect(route('movie.create'));
    }
}

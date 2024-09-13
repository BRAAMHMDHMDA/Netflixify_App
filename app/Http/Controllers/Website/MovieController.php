<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        if (request()->ajax()){
            return Movie::published()->where('name', 'LIKE', '%'. request()->search .'%')->get();
        }
        abort(404);
    }

    public function show(Movie $movie)
    {
        if ($movie->status != 'published'){
            abort(404);
        }

        $related_movies = Movie::where('id', '!=', $movie->id)
            ->where('category_id', $movie->category->id)
            ->take(8)
            ->get();

        return view('website.pages.show')->with([
                'movie' => $movie,
                'related_movies' => $related_movies,
            ]);
    }

    public function wishlist()
    {
        $fav_movies = Auth::user()->fav_movies;
        return view('website.pages.wishlist')->with([
            'fav_movies' => $fav_movies,
        ]);
    }
    public function increment_views(Movie $movie)
    {
        $movie->increment('views');
    }

}

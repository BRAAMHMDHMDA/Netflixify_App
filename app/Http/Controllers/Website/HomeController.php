<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $latest_movies = Movie::published()->latest()->take(2)->get();
        $categories = Category::active()->has('movies')
            ->with(['movies' => function($query) {
                $query->published();
            }])
            ->get();

        return view('website.pages.home')->with([
            'latest_movies' => $latest_movies,
            'categories' => $categories,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $latest_movies = Movie::published()->latest()->take(3)->get();

        $topPlaysMovies = Movie::where('views', '>', 0)
                            ->published()
                            ->orderBy('views', 'desc') // Orders by the highest of views
                            ->limit(4)
                            ->get();

        $topFavoritedMovies = Movie::whereHas('users')
                            ->withCount('users')// Counts the number of users who have favorited each movie
                            ->published()
                            ->orderBy('users_count', 'desc') // Orders by the highest number of users
                            ->limit(4) // Limits the result to the top N movies
                            ->get();;

        return view('dashboard.pages.home')->with([
            'latest_movies' => $latest_movies,
            'topFav_Movies' => $topFavoritedMovies,
            'topPlays_Movies' => $topPlaysMovies,
        ]);
    }
}

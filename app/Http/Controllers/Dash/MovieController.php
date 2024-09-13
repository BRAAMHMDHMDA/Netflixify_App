<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:movie-list|movie-create|movie-edit|movie-delete', ['only' => ['index','show']]);
        $this->middleware('permission:movie-create', ['only' => ['create','store']]);
        $this->middleware('permission:movie-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:movie-delete', ['only' => ['destroy']]);
        $this->middleware('permission:movie-publish', ['only' => ['publish_movie']]);
    }

    public function index(Request $request)
    {
        return $request->ajax() ? Movie::Datatable() : view('dashboard.movies.index');
    }

    public function create()
    {
        return view('dashboard.movies.create');
    }

    public function publish_movie(Movie $movie)
    {
        if ($movie->percent=='100'){
            $movie->update([
                'status' => 'published'
            ]);
            return to_route('dashboard.movies.index');
        }

    }

    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit', compact('movie'));
    }
//
//
//    public function update(CategoryRequest $request, Movie $movie)
//    {
//        Movie::updateImage($request, $movie->image_path);
//        $movie->update($request->all());
//
//        return Redirect::route('dashboard.movies.index')
//            ->with('success', 'Movie updated!');
//    }


    /**
     *
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        Movie::deleteImage($movie->image_url);
        Movie::deleteImage($movie->poster_url);
        Storage::disk('media')->delete($movie->path);
        Storage::disk('media')->deleteDirectory("movies/{$movie->name}");
        return Redirect::route('dashboard.movies.index')
            ->with('success', 'Movie Deleted Successfully!');
    }
}

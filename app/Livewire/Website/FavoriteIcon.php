<?php

namespace App\Livewire\Website;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavoriteIcon extends Component
{
    public $movie;
    public $isFavorite;
    public $favoriteCount;


    public function mount(Movie $movie)
    {
        $this->movie = $movie;
        $this->isFavorite = $movie->isFav;
        $this->favoriteCount = Auth::user()->fav_movies_count ?? null;
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            Auth::user()->fav_movies()->detach($this->movie->id);
            $this->isFavorite = false;
            $this->favoriteCount--;
        } else {
            Auth::user()->fav_movies()->attach($this->movie->id);
            $this->isFavorite = true;
            $this->favoriteCount++;
        }

        $this->dispatch('favoriteCountUpdated', ['fav_count' => $this->favoriteCount, 'movie_id'=> $this->movie->id]);
        $this->dispatch('syncFavStatus', $this->movie->id, $this->favoriteCount, $this->isFavorite);
    }
    protected $listeners = ["syncFavStatus" => 'syncFavStatus'];
    public function syncFavStatus($movieId, $favCount, $isFav)
    {
        // Update the like status only if the movie ID matches
        if ($this->movie->id == $movieId) {
            $this->isFavorite = $isFav;
        }
        $this->favoriteCount = $favCount;
    }

    public function render()
    {
        return view('website.components.favorite-icon');
    }
}



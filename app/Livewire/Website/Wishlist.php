<?php

namespace App\Livewire\Website;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Wishlist extends Component
{
    public $fav_movies;

    public function mount()
    {
        $this->fav_movies = Auth::user()->fav_movies;
    }

    protected $listeners = ["syncFavStatus" => 'syncFavStatus'];

    public function syncFavStatus()
    {
        $this->fav_movies = Auth::user()->fav_movies;
    }

    public function render()
    {
        return view('website.components.wishlist-component');
    }
}

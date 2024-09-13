<?php

namespace App\Livewire\Dashboard\Movies;

use App\Models\Movie;
use Livewire\Component;

class ProccessingPercent extends Component
{
    public $percent;
    public $movie_id;

    public function mount(Movie $movie)
    {
        $this->movie_id = $movie->id;
        $this->percent = Movie::find($this->movie_id)->percent;
    }
    public function refreshPercent()
    {
        $this->percent = Movie::find($this->movie_id)->percent;
    }

    public function render()
    {
        return view('dashboard.movies.components.proccessing-percent');
    }
}

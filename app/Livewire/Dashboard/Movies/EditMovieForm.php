<?php

namespace App\Livewire\Dashboard\Movies;

use App\Jobs\StreamMovie;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditMovieForm extends Component
{
    use WithFileUploads;

    public $name, $year, $rating, $poster, $image, $description, $category_id, $status;
    public $movie, $old_image, $old_poster;
    public $categories;

    public function rules()
    {
        return [
            'name' => 'required|min:2   ',  // Validate the name is unique in the movies table
            'year' => 'required|integer',  // Ensure the year is an integer
            'rating' => 'required|numeric|between:0,5',  // Validate rating is a number between 0 and 5
            'poster' => 'nullable|image',  // Ensure the poster is a valid image
            'image' => 'nullable|image',  // Ensure the image is a valid image
            'description' => 'nullable|min:3',  // Description is optional but must be at least 3 characters if provided
            'category_id' => 'nullable|exists:categories,id',  // Validate that the category_id exists in the categories table
        ];

    }
    public function attributes()
    {
        return [
            'category_id' => 'Category'
        ];
    }

    public function mount(Movie $movie)
    {
//        $this->categories = Category::active()->latest()->pluck('name', 'id')->toArray();
        $this->categories = Category::active()->latest()->select('name', 'id')->get();

        $this->movie = $movie;
        $this->old_image = $movie->image_url;
        $this->old_poster = $movie->poster_url;
        $this->name = $movie->name;
        $this->year = $movie->year;
        $this->rating = $movie->rating;
        $this->poster = $movie->poster;
        $this->image = $movie->image;
        $this->description = $movie->description;
        $this->category_id = $movie->category_id;
        $this->resetValidation();
    }

    public function submit()
    {
        $data = $this->validate(
            $this->rules(),
            [],
            $this->attributes()
        );

        $data = $this->update_image($data, $this->old_image);
        $data = $this->update_image($data, $this->old_poster, 'poster', 'poster_path');

        $this->movie->update($data);

        session()->flash('message', 'Video uploaded successfully!');

        return to_route('dashboard.movies.index');
    }

    private function update_image($data, $old_image, $name_image_in_data='image', $name_image_in_DB='image_path')
    {
        if ($data[$name_image_in_data]){
            $image_path = $data[$name_image_in_data]->store('/movies', 'media');
            $data[$name_image_in_DB] = $image_path;
            $this->delete_image($old_image);
        }
        return $data;
    }
    private function delete_image($old_image)
    {
        $path = parse_url($old_image, PHP_URL_PATH);
        $diskPath = str_replace('/storage/media/', '', $path);
        if (Storage::disk('media')->exists($diskPath)) {
            return Storage::disk('media')->delete($diskPath);
        } else {
            return false;
        }
    }
    public function render()
    {
        return view('dashboard.movies.components.edit-movie-form');
    }
}

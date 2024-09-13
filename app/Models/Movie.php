<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class Movie extends Model
{
    use HasImage;

    protected $fillable = ['name', 'slug','description', 'category_id', 'poster_path', 'image_path', 'year', 'rating', 'percent', 'path', 'status'];

    public static string $imageDisk = 'media';
    public static string $imageFolder = '/movies';
    protected $appends = ['is_fav', 'poster_url'];

    protected $with = 'category';
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = Str::ucfirst($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getPosterUrlAttribute(): string
    {
        return asset('storage/media/' . $this->poster_path);
    }

    public function getIsFavAttribute()
    {
        if (Auth::user()){
            return (bool) $this->users()->where('user_id', Auth::user()->id)->count();
        }
        return false;
    }

    public function scopePublished(Builder $builder): void
    {
        $builder->where('status', '=', 'published');
    }
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public static function Datatable(): JsonResponse
    {
        return  Datatables::of(Movie::query())
            ->addIndexColumn()
            ->addColumn('actions',  function (Movie $movie) {
                return view('dashboard.movies.components.DT._actions-col', compact('movie'))->render();
            })
            ->addColumn('category',  function (Movie $movie) {
                return $movie->category?->name;
            })
            ->editColumn('name', function (Movie $movie) {
                return view('dashboard.movies.components.DT._movie-col', compact('movie'));
            })
            ->editColumn('percent', function (Movie $movie) {
                return view('dashboard.movies.components.DT._proccessing-percent-col', compact('movie'));
            })
            ->editColumn('status', function (Movie $movie) {
                if ($movie->status == 'published'){
                    return '<div class="badge badge-success fw-bold">Published</div>';
                }else return '<div class="badge badge-secondary fw-bold">UnPublished</div>';
            })
            ->editColumn('created_at', function (Movie $movie) {
                return $movie->created_at->format('d M Y, h:i a');
            })
            ->rawColumns(['actions','name', 'status'])
            ->make(true);
    }



}

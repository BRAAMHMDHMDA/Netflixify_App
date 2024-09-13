<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
USE Illuminate\Http\JsonResponse;

class Category extends Model
{
    use HasImage;

    protected $fillable = ['name', 'slug', 'description', 'status', 'image_path'];

    public static string $imageDisk = 'media';
    public static string $imageFolder = '/categories';

    protected $withCount = 'movies';
    public function setNameAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = Str::title($value);
    }
    public function scopeActive(Builder $builder): void
    {
        $builder->where('status', '=', 'active');
    }

    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class);
    }

    public static function Datatable(): JsonResponse
    {
        return  Datatables::of(Category::query()->withCount('movies'))
            ->addIndexColumn()
            ->addColumn('actions',  function (Category $category) {
                return view('dashboard.categories.DT._actions-col', ['category' => $category])->render();
            })
            ->editColumn('name', function (Category $category) {
                return view('dashboard.categories.DT._category-col', compact('category'));
            })
            ->editColumn('status', function (Category $category) {
                if ($category->status == 'active'){
                    return sprintf('<div class="badge badge-success fw-bold">%s</div>',  ucwords($category->status) );
                }else return sprintf('<div class="badge badge-secondary fw-bold">%s</div>', ucwords($category->status) );
            })
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('d M Y, h:i a');
            })
            ->rawColumns(['actions','name', 'status'])
            ->make(true);
    }
}

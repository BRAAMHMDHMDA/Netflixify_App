<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return $request->ajax() ? Category::Datatable() : view('dashboard.categories.index');
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        Category::storeImage($request);
        Category::create($request->all());

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category created Successfully!');
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        Category::updateImage($request, $category->image_path);
        $category->update($request->all());

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category updated!');
    }


    public function destroy(Category $category)
    {

        $category->delete();
        Category::deleteImage($category->image_path);

        return Redirect::route('dashboard.categories.index')
            ->with('success', 'Category Deleted Successfully!');
    }
}

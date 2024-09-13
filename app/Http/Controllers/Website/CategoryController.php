<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Category $category)
    {
        if ($category->movies_count == 0) {return redirect()->intended(route('home'));}

        $category->load(['movies' => function($query) {
            $query->published();
        }]);
        return view('website.pages.category', compact('category'));
    }
}

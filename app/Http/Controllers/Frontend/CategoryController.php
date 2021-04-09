<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function show(Category $category)
    {
        $articles = $category->articles()->where('status','published')->paginate(5);
        return view('frontend.category')->with('articles', $articles)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
}

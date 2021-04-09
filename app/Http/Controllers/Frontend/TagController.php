<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
   
    public function show(Tag $tag)
    {
        $articles = $tag->articles()->where('status','published')->paginate(5);
        return view('frontend.tag')->with('articles', $articles)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status','published')->get();
        return view('frontend.blog')->with('articles', $articles)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    public function show(Article $article)
    {
        return view('frontend.article')->with('article', $article)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
}

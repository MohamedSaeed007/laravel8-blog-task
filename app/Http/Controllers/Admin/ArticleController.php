<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }
    
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.list')->with('articles',$articles);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/articles_images'), $imageName);

        Article::create([
            ''
        ]);
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit')->with('categories',$categories)->with('tags',$tags);
    }

    public function update(Request $request, Article $article)
    {
        
    }

    public function destroy(Article $article)
    {
        
    }
}

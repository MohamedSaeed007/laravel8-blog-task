<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index')->with('articles', $articles);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create')->with('categories', $categories)->with('tags', $tags);
    }

    public function store(CreateArticleRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/articles_images'), $imageName);

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => auth()->user()->getAuthIdentifier(),
            'image' => $imageName,
        ]);

        if ($request->tags) {
            $article->tags()->attach($request->tags);
        }

        if ($request->categories) {
            $article->categories()->attach($request->categories);
        }

        session()->flash('success', 'Article Created Successfully.');

        return redirect(route('admin.articles.index'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.edit')->with('article',$article)->with('categories', $categories)->with('tags', $tags);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->only(['title', 'description', 'status', 'content']);

        if ($request->image) {
            // upload it
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/articles_images'), $imageName);
            // delete old image
            Storage::disk('public_uploads')->delete('/articles_images/' . $article->image);
            // add image to data if there is a new image
            $data['image'] = $imageName;
        }

        if ($request->tags){
            $article->tags()->sync($request->tags);
        }

        if ($request->categories){
            $article->categories()->sync($request->categories);
        }

        $article->update($data);

        session()->flash('success', 'Article Updated Successfully.');
        
        return redirect(route('admin.articles.index'));
    }

    public function destroy(Article $article)
    {
        Storage::disk('public_uploads')->delete('/articles_images/' . $article->image);

        $article->delete();

        session()->flash('success', 'Article Deleted Successfully.');

        return redirect(route('admin.articles.index'));
    }
}

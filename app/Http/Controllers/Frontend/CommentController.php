<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth()->user()->getAuthIdentifier(),
            'article_id' => $request->article_id,
        ]);
        //session()->flash('success','Comment Created Successfully');
        return redirect()->back();
    }
}

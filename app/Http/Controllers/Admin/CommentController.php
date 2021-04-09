<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('admin.comments.index')->with('comments', $comments);
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit')->with('comment',$comment);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update([
            'content' => $request->content
            ]);
        session()->flash('success', 'Comment Updated Successfully.');
        return redirect(route('admin.comments.index'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success', 'Comment Deleted Successfully.');
        return redirect(route('admin.comments.index'));
    }
}

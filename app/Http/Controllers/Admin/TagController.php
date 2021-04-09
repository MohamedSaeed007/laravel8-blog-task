<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index')->with('tags',$tags);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create($request->all());
        session()->flash('success','Tag Created Successfully');
        return redirect(route('admin.tags.index'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->with('tag',$tag);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        session()->flash('success','Tag Updated Successfully');
        return redirect(route('admin.tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if ($tag->articles->count()>0){
            session()->flash('error', 'Tag cannot be deleted , because it is associated to some articles .');
            return redirect()->back();
        }
        $tag->delete();
        session()->flash('success','Tag Deleted Successfully');
        return redirect(route('admin.tags.index'));
    }
}

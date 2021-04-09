<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with('categories',$categories);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        session()->flash('success','Category Created Successfully');
        return redirect(route('admin.categories.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category',$category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        session()->flash('success','Category Updated Successfully');
        return redirect(route('admin.categories.index'));
    }

    public function destroy(Category $category)
    {
        if ($category->articles->count()>0){
            session()->flash('error', 'Category cannot be deleted , because it is associated to some articles .');
            return redirect()->back();
        }
        $category->delete();
        session()->flash('success','Category Deleted Successfully');
        return redirect(route('admin.categories.index'));
    }
}

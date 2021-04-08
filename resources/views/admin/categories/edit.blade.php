@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Update Category</div>
        <div class="card-body">
            @include('layouts.partials._errors')
            <form action="{{ route('admin.categories.update',$category) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection


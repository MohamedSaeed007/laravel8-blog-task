@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ url('select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Edit Article</div>
        <div class="card-body">
            @include('layouts.partials._errors')
            <form action="{{ route('admin.articles.update', $article) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="10" rows="10"
                        class="form-control">{{ $article->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="10" rows="10"
                        class="form-control">{{ $article->content }}</textarea>
                </div>
                <div class="form-group">
                    <img class="img-thumbnail" src="{{ asset('uploads/articles_images/' . $article->image) }}"
                        width="100px">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published
                        </option>
                        <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select name="categories[]" id="categories" class="select2 form-control" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $article->hasCategory($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="select2 form-control" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $article->hasTag($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Article</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })

    </script>
@endsection

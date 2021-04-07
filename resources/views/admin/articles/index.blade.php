@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success">Add Article</a>
    </div>
    <div class="card">
        <div class="card-header">Articles</div>
        <div class="card-body">
            @if ($articles->count() > 0)
                <table class="table text-center">
                    <thead>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td><img src="{{ asset('uploads/articles_images/' . $article->image) }}" width="100px"
                                        height="100px" alt=""></td>
                                <td>{{ $article->title }}</td>
                                <td>
                                    @foreach ($article->categories as $category)
                                        <span class="badge badge-pill badge-primary">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($article->tags as $tag)
                                        <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <span
                                        class="badge badge-pill badge-{{ $article->status == 'published' ? 'success' : 'danger' }}">
                                        {{ $article->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.articles.edit', $article) }}"
                                        class="btn btn-info text-light">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No articles Yet</h3>
            @endif
        </div>
    </div>
@endsection

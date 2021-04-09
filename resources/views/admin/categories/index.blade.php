@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add Category</a>
    </div>
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table text-center">
                    <thead>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                        class="btn btn-info text-light">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
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
                {{$categories->links('pagination::bootstrap-4')}}
            @else
                <h3 class="text-center">No categories Yet</h3>
            @endif
        </div>
    </div>
@endsection

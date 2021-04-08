@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if ($tags->count() > 0)
                <table class="table text-center">
                    <thead>
                        <th>Name</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="{{ route('admin.tags.edit', $tag) }}"
                                        class="btn btn-info text-light">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
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
                <h3 class="text-center">No tags Yet</h3>
            @endif
        </div>
    </div>
@endsection

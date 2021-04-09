@extends('layouts.admin')
@section('content')
    
    <div class="card">
        <div class="card-header">Comments</div>
        <div class="card-body">
            @if ($comments->count() > 0)
                <table class="table text-center">
                    <thead>
                        <th>Comment</th>
                        <th>User Name</th>
                        <th>Article Title</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->article->title }}</td>
                                <td>
                                    <a href="{{ route('admin.comments.edit', $comment) }}"
                                        class="btn btn-info text-light">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="post">
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
                {{$comments->links('pagination::bootstrap-4')}}
            @else
                <h3 class="text-center">No comments Yet</h3>
            @endif
        </div>
    </div>
@endsection

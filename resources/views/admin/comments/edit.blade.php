@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Update Comment</div>
        <div class="card-body">
            @include('layouts.partials._errors')
            <form action="{{ route('admin.comments.update',$comment) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="content">Comment</label>
                    <input type="text" name="content" class="form-control" value="{{ $comment->content }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Comment</button>
                </div>
            </form>
        </div>
    </div>
@endsection


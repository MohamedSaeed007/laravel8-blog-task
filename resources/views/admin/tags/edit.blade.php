@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Update Tag</div>
        <div class="card-body">
            @include('layouts.partials._errors')
            <form action="{{ route('admin.tags.update',$tag) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $tag->name }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection


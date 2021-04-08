@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">Add Category</div>
        <div class="card-body">
            @include('layouts.partials._errors')
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection


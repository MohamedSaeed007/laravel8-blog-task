@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table text-center">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if( $user->role != 'admin')
                                    <form action="{{route('admin.users.make-admin',$user)}}" method="post">
                                        @csrf
                                        <button class="btn btn-success" type="submit">Make Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links('pagination::bootstrap-4')}}
            @else
                <h3 class="text-center">No Users Yet</h3>
            @endif
        </div>
    </div>
@endsection
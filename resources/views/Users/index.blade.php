@extends('layout.app')

@section('content')

    <div class="col-12">
        <a href="{{url('users/createUser')}}" class="btn btn-primary my-3">Add New User</a>
        <h1 class="p-3 border text-center my-3">View All Users</h1>
    </div>
    <div class="col-12">
        @if(Session()->get('success'))
            <h3 class="btn btn-success text-center p-3 my-3">{{Session()->get('success')}}</h3>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Posts</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{!! $user->type() !!}</td>
                        <td>
                            @can('user-only')
                                <a href="{{url('users/edit/'.$user->id)}}" class="btn btn-info">Edit</a>
                            @endcan
                        </td>
                        <td>
                            <a href="{{url('users/posts/'.$user->id)}}" class="btn btn-primary">Show Posts For User</a>
                        </td>
                        <td>
                            <form action="{{url('users/'.$user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>
    </div>

@endsection
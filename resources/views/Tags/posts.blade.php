@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">All Posts For {{$user->name}}</h1>
    </div>
    <div class="col-12">
        @if(Session()->get('success'))
            <h3 class="btn btn-success text-center p-3 my-3">{{Session()->get('success')}}</h3>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->post as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{ \Str::limit($post->description, 50)}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            <a href="{{url('posts/edit/'.$post->id)}}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{url('posts/'.$post->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
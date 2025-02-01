@extends('layout.app')

@section('content')
    <div class="col-12">
        <a href="{{url('posts/create')}}" class="btn btn-primary my-3">Add New Post</a>
                
        <h1 class="p-3 border text-center my-3">View All Posts</h1>
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
                    <th>Tags</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{ \Str::limit($post->description, 50)}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            @foreach($post->tag as $tags)
                                <span class="badge bg-success my-2">{{$tags->name}}</span><br>
                            @endforeach
                        </td>
                        <td>
                            <img src="{{ $post->imageShow() }}" width="150px" height="140px" alt="">
                        </td>
                        <td>
                            @can('user-only')
                                <a href="{{url('posts/edit/'.$post->id)}}" class="btn btn-info">Edit</a>
                            @endcan
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
        <div>
            {{ $posts->links() }}
        </div>
    </div>

@endsection
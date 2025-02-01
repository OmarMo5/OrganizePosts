@extends('layout.app')

@section('content')

    <div class="col-12">
        <a href="{{url('tags/createTag')}}" class="btn btn-primary my-3">Add New Tag</a>
        <h1 class="p-3 border text-center my-3">View All Tags</h1>
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
                    <th>Posts</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>
                            @foreach($tag->post as $posts)
                                <span class="badge bg-success my-2">{{$posts->title}}</span><br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{url('tags/edit/'.$tag->id)}}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{url('tags/'.$tag->id)}}" method="POST">
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
            {{ $tags->links() }}
        </div>
    </div>

@endsection
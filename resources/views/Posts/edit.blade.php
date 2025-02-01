@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 text-center my-3">Edit Post</h1>
    </div>
    <div class="col-12 mx-auto">
        <form action="{{url('posts/update/'.$editPost->id)}}" method="POST" class="form border p-3">
            @method('PUT')
            @csrf
            @include('inMsg.massega')
            <div class="mb-3">
                <label for="">Post Title</label>
                <input type="text" class="form-control" name="title" value="{{$editPost->title}}">
            </div>
            <div class="mb-3">
                <label for="">Post Description</label>
                <textarea class="form-control" name="description" rows="7">{{$editPost->description}}</textarea>
            </div>
            <div class="md-3">
                <label for="">Tags</label>
                <select name="tags[]" id="" multiple class="form-control">
                    @foreach($editTags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    @foreach($editUser as $user)
                        <!-- @selected($user->id == $editPost->user_id) -->
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Post Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Edit Post">
            </div>
        </form>
    </div>

@endsection
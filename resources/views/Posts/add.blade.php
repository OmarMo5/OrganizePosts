@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 text-center my-3">Add New Post</h1>
    </div>
    <div class="col-12 mx-auto">
        <form action="{{url('posts/add')}}" method="POST" class="form border p-3" 
              enctype="multipart/form-data">
            @csrf
            @include('inMsg.massega')
            <div class="mb-3">
                <label for="">Post Title</label>
                <input type="text" class="form-control" value="{{old('title')}}" name="title">
            </div>
            <div class="mb-3">
                <label for="">Post Description</label>
                <textarea class="form-control" name="description" rows="7">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Writer</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-3">
                <label for="">Tags</label>
                <select name="tags[]" id="" multiple class="form-control">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Post Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control bg-success" value="Save">
            </div>
        </form>
    </div>

@endsection
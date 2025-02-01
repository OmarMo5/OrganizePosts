@extends('layout.app')

@section('content')

    <div class="col-12">
        <h1 class="p-3 border text-center my-3">View All Posts</h1>
    </div>
    <div class="col-12">
        @foreach($posts as $post)
            <div class="card col-8 mx-auto">
                <div class="card-header my-3">
                    {{$post->user->name}} : {{$post->created_at->format('Y-m-d')}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{ \Str::limit($post->description,150)}}</p>
                    <div class="card-image">
                        <img src="{{ $post->imageShow() }}" width="100%" height="500px" >
                    </div>
                    <a href="{{url('posts/showPost/'.$post->id)}}" class="btn btn-primary">Show Post</a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{$posts->links()}}
    </div>

@endsection
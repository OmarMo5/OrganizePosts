@extends('Front.layout.app')

@section('content')
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('{{asset('front')}}/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <p>@lang('messages.welcome')::{{App::getLocale()}}</p>
                            <span class="subheading">Organize You Posts Using Laravel</span>
                            <form class="d-flex my-3" action="{{route('front.search')}}" method="GET" role="search">
                                <input class="form-control me-2" name="q" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @foreach($posts as $post)
                        <!-- Post preview-->
                        <div class="post-preview">
                            <a href="post.html">
                                <h2 class="post-title">{{$post->title}}</h2>
                                <h3 class="post-subtitle">{{\Str::limit($post->description,200)}}</h3>
                            </a>
                            <div class="con-img">
                                <img src="{{$post->imageShow()}}" height="350" width="100%"/>
                            </div>
                            <p class="post-meta">
                                Posted by
                                <a href="#!">{{$post->user->name}}</a>
                                on {{$post->created_at->format("Y-m-d")}}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach
                    <!-- Pager-->
                    <div class="mb-4">
                        {{ $posts->links() }}
                    </div>
                
                </div>
            </div>
        </div>
@endsection
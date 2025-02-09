<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Div.Io Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    </style>
    <link href="{{asset('dashboard')}}/css/styles.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{$setting->site_name}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" id="theme-toggle" class="theme-toggle-btn" href="#">
                            <img src="{{asset('front')}}/assets/img/day-and-night.jpg"/>
                        </a>
                    </li>

                    <li class="nav-item mdT @if(request()->is('/')) active @endif">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item mdT @if(request()->is('posts*')) active @endif">
                            <a class="nav-link" href="{{url('posts/showAll')}}">Posts</a>
                        </li>
                        <li class="nav-item mdT @if(request()->is('users*')) active @endif">
                            <a class="nav-link" href="{{url('users/showUser')}}">Users</a>
                        </li>
                        <li class="nav-item mdT @if(request()->is('tags*')) active @endif">
                            <a class="nav-link" href="{{url('tags/showTag')}}">Tags</a>
                        </li>
                        <li class="nav-item mdT @if(request()->is('ajaxtags*')) active @endif">
                            <a class="nav-link" href="{{url('ajaxtags/showTag')}}">Ajax-Tags</a>
                        </li>
                        <li class="nav-item mdT @if(request()->is('setting*')) active @endif">
                            <a class="nav-link" href="{{url('setting/edit')}}">Setting</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item @if(request()->is('login')) active @endif">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item @if(request()->is('register')) active @endif">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
            @yield('content')

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous">
    </script>
    <script src="{{asset('dashboard')}}/js/script.js"></script>

    @yield('script')

  </body>
</html>



<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="tbg">
            <div class="theader">
                <nav class="navbar navbar-expand-md navbar-light bg-white">
                    <div class="container" style="width: auto;">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <div  class="nav-flex">
                                @auth
                                    <div class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                        </a>
    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="text-align: center">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                @endauth
                            
                                <div class="nav-item">
                                    <a class="navbar-brand" href="{{ url('/') }}">
                                        <img src="https://worldvectorlogo.com/logos/tinder-1.svg" alt="Tinder Logo" title="Tinder Logo" style="width: 100px">
                                    </a>
                                </div>

                                @guest
                                    @if (Route::has('login'))
                                        <div class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </div>
                                    @endif
    
                                    @if (Route::has('register'))
                                        <div class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </div>
                                    @endif
                                @else
                                    <div class="nav-item">
                                        <a class="nav-link" href="{{route('users.match')}}">
                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    
            @if (session('flash_message'))
                <div class="flash_message bg-success text-center py-3 my-0">
                    {{ session('flash_message') }}
                </div>
            @endif
    
            <div class="tbgwrap">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles()
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- date picker --}}
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">

    {{-- loader --}}
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    {{-- <link rel="stylesheet" href="/css/center-simple.css"> --}}
    {{-- <link rel="stylesheet" href="/css/big-counter.css"> --}}
    <link rel="stylesheet" href="/css/flash.css">
</head>
<body>
    @include('sweetalert::alert')
    <div id="app" class="mx-3">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        </nav> --}}

        <nav class="navbar is-spaced" x-data="{
            isActive:false,
            updateIsActive(){
                this.isActive = !this.isActive;
                if(this.isActive){
                    document.getElementById('mobile').classList.add('is-active')
                }else {
                    document.getElementById('mobile').classList.remove('is-active')
                }
            }
        }">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                  {{-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> --}}
                  <span class="title">Fajura</span>
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" x-on:click="updateIsActive()" >
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="mobile" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        @guest 
                        <div class="buttons">
                            @if (route('register') != url()->current())
                                <a href="/register" class="button is-info is-rounded has-icon">
                                    <div class="icon">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                    <strong>
                                        Sign up
                                    </strong>
                                </a>
                            @endif
                            @if (route('login') != url()->current())
                                <a href="/login" class="button is-light is-rounded has-icon">
                                    <div class="icon">
                                        <i data-feather="key"></i>
                                    </div>
                                    <span>Log in</span>
                                </a>
                            @endif
                        </div>
                        @else 
                        @if (route('home') != url()->current())
                            <a href="/home" class="navbar-item has-icon">
                                <div class="icon mr-2">
                                    <i data-feather="home"></i>
                                </div>
                                <div>
                                    Home
                                </div>
                            </a>
                            <a href="/home" class="navbar-item has-icon">
                                <div class="icon mr-2">
                                    <i data-feather="heart"></i>
                                </div>
                                <div>
                                    Services
                                </div>
                            </a>
                        @endif
                        <div class="navbar-item has-dropdown is-hoverable ">
                            <a class="navbar-link has-icon">
                                <div class="icon mr-2">
                                    <img style="border-radius: 50%" src="https://ui-avatars.com/api/?size=128&background=random&name={{ auth()->user()->name }}" alt="">
                                </div>
                                <div>
                                    {{ auth()->user()->name }}
                                </div>
                            </a>
                    
                            <div class="navbar-dropdown is-right">
                              {{-- <a class="navbar-item">
                                text here
                              </a> --}}
                              <a class="navbar-item">
                                <i data-feather="user" class="mr-1"></i> 
                                Profile
                              </a>
                              <a class="navbar-item">
                                <i data-feather="settings" class="mr-1"></i> 
                                Setting
                              </a>
                              <hr class="navbar-divider">

                              <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i data-feather="log-out" class="mr-1"></i>  Logout
                              </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                          </div>

                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @livewireScripts()
    
    <script>
        document.addEventListener('DOMContentLoad', function(){
            document.getElementById('app').style.opacity = '0';
        })
        window.onload = ()=>{
            feather.replace();
            document.getElementById('app').style.opacity = '1';
        }
    </script>
    <script src="https://unpkg.com/js-datepicker"></script>
    @stack('scripts')
</body>
</html>

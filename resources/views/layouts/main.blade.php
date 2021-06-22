<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
    @if (auth()->user()->unreadNotifications()->count())
            <title>({{  auth()->user()->unreadNotifications()->count() }}) {{ config('app.name') }}</title>
        @else 
            <title>{{ config('app.name') }} Dental Clinic Online Sytem In Tarlac Philippines</title>
        @endif
    @else 
        <title>{{ config('app.name') }} Dental Clinic Online Sytem In Tarlac Philippines</title>
    @endauth
    @include('includes.favicons')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles()
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- date picker --}}
    <link rel="stylesheet" href="/css/dpicker.css">

    {{-- loader --}}
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    {{-- <link rel="stylesheet" href="/css/center-simple.css"> --}}
    {{-- <link rel="stylesheet" href="/css/big-counter.css"> --}}
    <link rel="stylesheet" href="/css/flash.css">
    {{-- <script data-ad-client="ca-pub-5277127680186259" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
    @stack('styles')
   @auth
        @if (auth()->user()->darkmode)
            <link rel="stylesheet" href="/css/dark.css">
        @endif
   @endauth
   @include('includes.meta')
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
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
                  <span class="title">{{ \App\Models\AppSetting::first()->brand_name }}</span>
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
                                <a href="/register" class="button is-info is-rounded has-icon is-small">
                                    <div class="icon">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                    <strong>
                                        Sign up
                                    </strong>
                                </a>
                            @endif
                            @if (route('login') != url()->current())
                                <a href="/login" class="button is-light is-rounded has-icon is-small">
                                    <div class="icon">
                                        <i data-feather="key"></i>
                                    </div>
                                    <span>Log in</span>
                                </a>
                            @endif
                        </div>
                        @else 
                        @if (url()->current() != route('home'))
                            <div class="navbar-item">
                                <a href="{{ route('home') }}" class="button is-rounded has-icon">
                                    <div class="icon">
                                        <i data-feather="home"></i>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @can('browse pages')
                            @if (url()->current() != route('blogs.index'))
                                <div class="navbar-item">
                                    <a href="{{ route('blogs.index') }}" class="button is-rounded has-icon">
                                        <div class="icon">
                                            <i data-feather="message-circle"></i>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endcan
                        
                        <div class="navbar-item">
                            <a href="{{ route('notif.show') }}"  id="notif_box" class="button is-rounded has-icon">
                                <div class="icon">
                                    <i data-feather="bell"></i>
                                </div>
                                @if (auth()->user()->unreadNotifications()->count())
                                    <div>
                                        {{ auth()->user()->unreadNotifications()->count() }}
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="navbar-item has-dropdown is-hoverable " id="profile_box">
                            <a class="navbar-link has-icon">
                                <div class="icon mr-2">
                                    <img style="border-radius: 50%; width:25px;height:25px;" src="{{ auth()->user()->profile->picture ? auth()->user()->public_picture : "https://ui-avatars.com/api/?size=128&background=random&name=".auth()->user()->name  }}" alt="">
                                </div>
                                <div>
                                    {{ auth()->user()->name }}
                                </div>
                            </a>
                    
                            <div class="navbar-dropdown is-right">
                              {{-- <a class="navbar-item">
                                text here
                              </a> --}}
                              <a class="navbar-item"  href="{{route('profile.show', auth()->user()->id)}}">
                                <i data-feather="user" class="mr-1"></i> 
                                Profile
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
        @yield('top')
        <main class="py-4 mx-2">
            @yield('content')
        </main>
    </div>

    @livewireScripts()
    
    <script src="/js/jsdpicker.js"></script>
    <script src="/js/feather_init.js"></script>
    {{-- <script src="https://unpkg.com/js-datepicker"></script> --}}
    @stack('scripts')
</body>
</html>

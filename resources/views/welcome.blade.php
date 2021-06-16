<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $app->brand_name }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div id="app" x-data="{
        sidebarShow:false
    }">
        <div class="sidebar animate__animated" :class="!sidebarShow ? 'animate__bounceOutLeft':'animate__bounceInLeft'">
            <ul>
                <li>
                    <a href="">About Us</a>
                </li>
                <li>
                    <a href="">Contact Us</a>
                </li>
                <li>
                    <a href="">Login</a>
                </li>
                <li>
                    <a href="">Register</a>
                </li>
                <li>
                    <a href="#" x-on:click.prevent="sidebarShow = !sidebarShow" class="button is-rounded">
                        <i data-feather="x" ></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="container mobile" >
            <div class="is-flex is-justify-content-right p-2">
                <button x-on:click="sidebarShow = !sidebarShow" class="no-border button is-rounded">
                    <i data-feather="menu"
                    x-show="!sidebarShow"></i>
                    <i data-feather="x"
                    x-show="sidebarShow"></i>
                </button>
            </div>
            <div id="mobile-hero">
                <h1 class="title is-2">
                    {{ $app->brand_name }}
                </h1>
                <h2 class="subtitle is-5">
                    {{ $app->brand_saying }}
                </h2>
                <a href="#" id="app_btn" class="button is-rounded is-info" >
                    Book An Appointment
                </a>
            </div>
    
            
        </div>
    </div>
    <script src="/js/app.js" defer></script>
    <script src="/js/feather_init.js" defer></script>
</body>
</html>
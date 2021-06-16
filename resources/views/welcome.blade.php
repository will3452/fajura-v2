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
        sidebarShow:false,
        selected:'hero'
    }">
        <div class="sidebar animate__animated" :class="!sidebarShow ? 'animate__bounceOutLeft':'animate__bounceInLeft'">
            <ul>
                <li>
                    <a href="#" x-on:click.prevent="selected = 'hero'">Home</a>
                </li>
                <li>
                    <a href="#" x-on:click.prevent="selected = 'about'">About Us</a>
                </li>
                <li>
                    <a href="#" onclick="alert('comming soon')">Contact Us</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li>
                    <a href="#" x-on:click.prevent="sidebarShow = !sidebarShow" class="button is-rounded">
                        <i data-feather="x" ></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="fixedme">
            <button x-on:click="sidebarShow = !sidebarShow" class="no-border button is-rounded">
                <i data-feather="menu"
                x-show="!sidebarShow"></i>
                <i data-feather="x"
                x-show="sidebarShow"></i>
            </button>
        </div>
        <div
        x-show="selected=='hero'"
        class="block mobile bg-info animate__animated"
        :class="selected == 'hero' ? 'animate__bounceInUp':'animate__bounceOutDown'">
            <div id="mobile-hero">
                <h1 class="title is-1">
                    {{ $app->brand_name }}
                </h1>
                <h2 class="subtitle is-4">
                    {{ $app->brand_saying }}
                </h2>
                <a href="#" id="app_btn" class="button is-rounded is-info" x-on:click="selected='about'">
                    Get started
                </a>
            </div>
        </div>
        {{-- about page --}}
        <div
        x-show="selected=='about'"
        class="block p-5 container animate__animated"
        id="about"
        :class="selected == 'about' ? 'animate__bounceInUp':'animate__bounceOutDown'"
        >
            <h1 class="title is-2 is-text-center">
                About us
            </h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus maxime sequi tenetur ipsam fugiat aliquam debitis eligendi adipisci tempora! Vero blanditiis, assumenda excepturi, distinctio reprehenderit minus soluta ab voluptatem quaerat sint fugit iste modi cupiditate aut? Fugiat eaque numquam quasi, ratione placeat, modi, velit corrupti facilis nobis consequatur soluta quam! Dolorem hic reprehenderit nesciunt? Quo eveniet labore ex veritatis adipisci ut deserunt voluptas impedit enim. Maxime vel nihil voluptatem, blanditiis placeat aliquid, ipsum vero temporibus quis explicabo officia delectus tempora incidunt possimus harum est expedita odio eveniet totam eos ab nesciunt laboriosam voluptatum animi. Reprehenderit corrupti labore adipisci esse magni?
            </p>
        </div>
        {{-- end of about --}}
        
    </div>
    <script src="/js/app.js" defer></script>
    <script src="/js/feather_init.js" defer></script>
</body>
</html>
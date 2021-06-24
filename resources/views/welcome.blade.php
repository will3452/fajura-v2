<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fajura Dental Clinic Online Sytem In Tarlac Philippines</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/main.css">
    <script src="/js/app.js"></script>
    @include('includes.favicons')
    @include('includes.meta')
</head>
<body>
    @include('sweetalert::alert')
   <div x-data="{
       active:1
   }">
        <div id="login-control">
            @auth
            <a class="button is-rounded is-white is-small" href="{{ route('home') }}">Home</a>
            @else 
            <a class="button is-rounded is-white is-small" href="{{ route('login') }}">Login</a>
            <a class="button is-rounded is-warning is-small" href="{{ route('register') }}">Sign Up</a>
            @endauth
        </div>
        <nav >
            <ul>
                <li><a href="#home" x-on:click="active = 1"  :class="active == 1 ? 'active':''"></a></li>
                <li><a href="#about" x-on:click="active = 2"  :class="active == 2 ? 'active':''"></a></li>
                <li><a href="#services" x-on:click="active = 3"  :class="active == 3 ? 'active':''"></a></li>
                <li><a href="#contact" x-on:click="active = 4"  :class="active == 4 ? 'active':''"></a></li>
            </ul>
        </nav>
        <div class="main-container">
            <section id="home" x-on:touchstart="active = 1"x-on:mouseover="active = 1">
                <div id="swirl"></div>
                <div class="box is-flex is-flex-direction-column is-justify-content-center is-align-items-center z-index-upper">
                    <div >
                        <img src="/crown.png" id="crown" alt="">
                    </div>
                    <h1 class="title is-1 animate__animated animate__bounceIn">
                        {{ $app->brand_name }}
                    </h1>
                    <h2 class="subtitle is-4">
                        {{ $app->brand_saying }}
                    </h2>
                    <div>
                        <a href="{{ route('appointments.index') }}" class="button is-large is-rounded is-info animate__animated animate__pulse animate__infinite">Book Now</a>
                    </div>
                </div>
            </section>
            <section id="about" x-on:touchstart="active = 2"x-on:mouseover="active = 2">
                <div class="container has-text-centered pt-6 px-6">
                    <div class="block mt-6">
                        <h2 class="title is-2 animate__animated" :class="active == 2 ? 'animate__fadeIn':''">
                            About us
                        </h2>
                        <div class="block is-size-2-desktop animate__animated" :class="active == 2 ? 'animate__fadeIn':''">
                            {{ $app->about_excerpt }}
                        </div>
                        <div class="block">
                            <a href="{{ $app->about_url }}" class="button is-rounded animate__animated" :class="active == 2 ? 'animate__bounce':''">Know more</a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="services" x-on:touchstart="active = 3"x-on:mouseover="active = 3">
                <div class="container px-2 pt-6 ">
                    <h2 class="title is-2 has-text-white has-text-centered mb-4">
                        Our Services
                    </h2>
                    <div id="services-container">
                        <div class="columns is-multiline mt-4">
                            <div class="column is-4  is-hidden-touch">
                                <img src="/pexels-cottonbro-6529056.jpg" alt="" id="service-image"  :class="active == 3 ? 'service-image-animate':''">
                                <div class="has-text-centered mt-2">
                                    <a href="{{ route('register') }}" class="button is-warning is-rounded" :class="active == 3 ? 'pulseme':''">
                                        Sign Up Now
                                    </a>
                                </div>
                            </div>
                            <div class="column height-80">
                                @foreach (\App\Models\Service::limit(5)->get() as $service)
                                <div class="box mb-2">
                                    <div class="columns">
                                        <div class="column is-6">
                                            <div class="columns">
                                                <div class="column is-flex is-justify-content-center is-align-items-center">
                                                    <img src="{{ $service->public_picture }}" alt="" class="service-image mr-2">
                                                </div>
                                                <div class="column has-text-centered-mobile">
                                                    <span class="subtitle is-5">
                                                        {{ $service->name }}
                                                    </span>
                                                    <div>
                                                        @for ($i = 0; $i < $service->feedbacks()->avg('stars'); $i++)
                                                        <img src="/star.svg" alt="">
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column has-text-right-desktop has-text-centered-touch">
                                            <a href="{{ route('feedbacks.show', $service) }}" class="button is-rounded is-info">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="has-text-centered mt-5">
                                    <a href="{{ route('services.index') }}" class="button is-info is-rounded is-light" >Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="contact" x-on:touchstart="active = 4"x-on:mouseover="active = 4">
                <div class="container pt-6 mb-6">
                    <h2 class="title has-text-centered is-2 animate__animated mb-6" :class="active == 4 ? 'animate__rotateInDownLeft':''">
                        Contact  Us
                    </h2>
                    <div class="columns">
                        <div class="column is-flex is-flex-wrap-wrap is-justify-content-center is-align-items-center ">
                            <div class="columns">
                                <div class="column">
                                    <a href="{{ $app->fb_page_url??'#' }}" target="_blank">
                                        <img src="/facebook.svg" alt="" class="contact-image">
                                    </a>
                                </div>
                                <div class="column">
                                    <a href="mailto:admin@fajura.site">
                                        <img src="/mail.svg" alt="" class="contact-image">
                                    </a>
                                </div>
                                <div class="column">
                                    <a href="tel:{{ $app->tel }}">
                                        <img src="/phone.svg" alt="" class="contact-image">
                                    </a>
                                </div>
                                <div class="column">
                                    <a href="tel:{{ $app->phone }}">
                                        <img src="/smartphone.svg" alt="" class="contact-image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="column px-6" x-data="{
                            textCount:0,
                            updateCount(){
                                this.textCount = this.$refs.textarea.value.length;
                                if(this.textCount > 199){
                                    this.$refs.textarea.value = this.$refs.textarea.value.slice(0, 199);
                                }
                            }
                        }">
                            <form action="{{ url('send-message') }}" method="POST" class="box">
                                @csrf
                                <h4 class="title is-5">Inquiry form</h4>
                                <div class="field">
                                    <div class="control">
                                        <input type="email" name="email" required class="input @error('email') is-danger @enderror" placeholder="Your Email Here">
                                        @error('email')
                                        <small class="help is-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="select is-fullwidth @error('concern_type') is-danger @enderror">
                                        <select name="concern_type" id="" >
                                            @foreach (['Registration related', 'Appointment related', 'Account related', 'Others'] as $option)
                                                <option value="{{ $option }}">
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('concern_type')
                                    <small class="help is-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <textarea name="message" required class="textarea @error('message')
                                        is-danger
                                        @enderror" placeholder="Your Message Here" id="" x-ref="textarea" x-on:input="updateCount()" ></textarea>
                                        @error('message')
                                        <small class="help is-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="is-flex is-justify-content-space-between is-align-items-center">
                                    <button class="button is-rounded">
                                        Send
                                    </button>
                                    <div class="is-size-4">
                                        <span x-text="textCount"></span>/200
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <iframe src="{{ $app->map_url ?? 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30758.7524625306!2d120.59334900000002!3d15.492818000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5245366b15dc8ec4!2sLoving%20Mother%20General%20hospital%20%26%20Diagnostic%20Center!5e0!3m2!1sen!2sph!4v1623973219829!5m2!1sen!2sph'}}" id="map" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <footer class="container px-2 mt-6 pt-6">
                    <div class="columns">
                        <div class="column has-text-centered-touch">
                            <h2 class="title is-3">
                                {{ $app->brand_name }}
                            </h2>
                            <h3 class="subtitle is-4">
                                {{ $app->brand_saying }}
                            </h3>
                        </div>
                        <div class="column has-text-centered-touch">
                            <h4 class="title is-5">
                                Quick Links
                            </h4>
                            <div class="content">
                                <a href="{{ route('services.index') }}" targe="_blank">Services</a>
                                <a href="{{ route('blogs.index') }}" targe="_blank">Blogs</a>
                                <a href="{{ route('login') }}" targe="_blank">Sign In</a>
                                <a href="{{ route('register') }}" targe="_blank">Sign Up</a>
                            </div>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="has-text-centered">
                        <small class="help">
                            &copy; {{ $app->brand_name }} - <span x-text="new Date().getFullYear()"></span> | Developed by <a style="display: inline;padding:0px;margin:0px" href="https://www.williamgalas.tech" targe="_blank">WSG</a>
                        </small>
                    </div>
                </footer>
            </section>
        </div>
   </div>
</body>
</html>
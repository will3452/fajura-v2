@extends('layouts.main')

@section('content')
<div class="container">
    <div class="columns is-justify-content-center is-vcentered">
        <div class="column is-hidden-mobile">
            <img src="/img/undraw_doctors_hwty.svg" alt="" style="display:block;margin:auto;width:60%">
        </div>
        <div class="column is-4 box p-5">
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="has-text-left mb-2">Login Here</h1>
                    <div class="field">
            
                        <div class="control">
                            <input id="email" placeholder="Email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                            @error('email')
                                <span class="help is-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="field">
            
                        <div class="field">
                            <input id="password" placeholder="Password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
            
                            @error('password')
                                <span class="help is-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="field">
                        <div class="col-md-6 offset-md-4">
                            <label class="checkbox" for="remember">
                            <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
            
                    <div class="field">
                        <button type="submit" class="button is-info is-fullwidth is-rounded">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="field">
                        @if (Route::has('password.request'))
                                <a class="help is-dark" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            <div class="box">
                <h2 class="title">
                    Login Here
                </h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <label for="email" class="label">{{ __('E-Mail Address') }}</label>
            
                        <div class="control">
                            <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                            @error('email')
                                <span class="help is-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="field">
                        <label for="password" class="label">{{ __('Password') }}</label>
            
                        <div class="field">
                            <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
            
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
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="column">
            <img src="/illus/dentist.svg" alt="" style="display:block;margin:auto">
        </div>
    </div>
</div>
@endsection

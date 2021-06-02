@extends('layouts.main')

@section('content')
<div class="container">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <h2 class="title">Reset Password</h2>
                    <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="control">
                                <button type="submit" class="button is-info has-icon">
                                    <div class="icon">
                                        <i data-feather="send"></i>
                                    </div>
                                    <div>
                                        {{ __('Send Password Reset Link') }}
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="column is-hidden-mobile">
                <img src="/illus/password.svg" alt="" style="display:block;margin:auto">
            </div>
        </div>
</div>
@endsection

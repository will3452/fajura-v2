@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        @auth
        <a target="_blank" href="{{ \App\Models\AppSetting::first()->messenger_url ?? 'https://m.me/william.galas.pogi' }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <img src="/fb_mess.svg" alt="">
            </div>
            <div>
                Message us
            </div>
        </a>
        @endauth
    </div>
    <div class="columns is-justify-content-center">
        <div class="column is-8 content makeTimesNewRoman">
            <h1>{{ $help->title }}</h1>
            <hr>
            @if ($help->type == 'text')
            <div>
                {!! $help->body !!}
            </div>
            @else 
            <div>
                <a href="{{ $help->body }}">{{ \Str::limit($help->body, 100) }}</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        .makeTimesNewRoman{
            font-family: 'Times New Roman', Times, serif !important;
        }
        .text-light{
            color: #aaa;
        }
        .author-image{
            width: 50px;
            height: 50px;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info{
            text-transform: capitalize;
        }
        .make-flex{
            display: flex;
        }
    </style>
@endpush
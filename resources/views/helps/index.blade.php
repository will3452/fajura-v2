@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <a target="_blank" href="{{ \App\Models\AppSetting::first()->messenger_url ?? 'https://m.me/william.galas.pogi' }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <img src="/fb_mess.svg" alt="">
            </div>
            <div>
                Message us
            </div>
        </a>
    </div>
    
    <div class="columns is-justify-content-center">
        <div class="column is-8 content makeTimesNewRoman">
            <form action="{{ route('helps.index') }}" class="block">
                <div class="field">
                    <input type="search" name="q" required class="input is-fullwidth is-rounded is-small" placeholder="Search help">
                </div>
            </form>
            @if (request()->has('q'))
                <strong>
                    Seach keyword: 
                </strong>
                <em>
                    "{{ request()->q }}"
                </em>
            @endif
            @if(!count($helps))
                <div class="has-text-centered">
                    No Tutorial Found :(
                </div>
            @endif
            @foreach ($helps as $help)
                <div class="box">
                    <h1>{{ $help->title }}</h1>
                    <p class="text-light mt-4">{{ \Str::limit($help->body, 150)}} <a href="{{ route('helps.show', $help) }}">read more</a></p>
                </div>
            @endforeach
            {{ $helps->render("pagination::simple-bootstrap-4") }}
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
        .pagination, .pagination>ul {
            list-style-type: none !important;
            padding: 0px !important;
        }

    </style>
@endpush
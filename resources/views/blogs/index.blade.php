@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <a href="{{ route('blogs.create') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="edit-2"></i>
            </div>
            <div>
                Write New
            </div>
        </a>
    </div>
    @empty($blogs)
        <div class="has-text-centered">
            No Blog Found :(
        </div>
    @endempty
    <div class="columns is-justify-content-center">
        <div class="column is-8 content makeTimesNewRoman">
            
            @foreach ($blogs as $blog)
                <div class="box">
                    <h1>{{ $blog->title }}</h1>
                    <div class="make-flex">
                        <img src="{{ $blog->author->public_picture }}" class="author-image" alt="">
                        <div class="user-info">
                            <strong>{{ $blog->author->name }}</strong>
                            <div class="date-created">
                                <small>
                                    {{ $blog->created_at->diffForHumans() }}
                                </small>
                                <small>
                                    {{ $blog->updated_at->diffForHumans() != $blog->created_at->diffForHumans() ? ' (Edited : '.$blog->updated_at->diffForHumans().')':'' }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <p class="text-light mt-4">{{ \Str::limit($blog->excerpt, 150)}} <a href="{{ route('blogs.show', $blog) }}">read more</a></p>
                </div>
            @endforeach
            {{ $blogs->render("pagination::simple-bootstrap-4") }}
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
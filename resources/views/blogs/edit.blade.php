@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        Update Article
    </h2>
    @if (request()->has('slug'))
    <div>
        Your Blog has been updated and visible to the public. click <a href="{{ route('blogs.show', request()->slug) }}">here</a> to visit
    </div>
    @endif
    <div class="block">
        <form action="{{ route('blogs.update', $blog) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label for="" class="label">Title</label>
                <div class="control">
                    <input type="text" value="{{ $blog->title }}" class="input is-small" required name="title">
                </div>
            </div>
            <div class="field">
                <label for="" class="label">Excerpt</label>
                <textarea name="excerpt" placeholder="take (a short extract) from a text." class="textarea is-small" id="excerpt" required>{{ $blog->excerpt }}</textarea>
            </div>
            <div class="field">
                <label for="" class="label">Content</label>
                <textarea name="body" id="body" required>{{ $blog->body }}</textarea>
            </div>
            <div class="field">
                <button class="button is-small is-fullwidth is-info">
                    Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    @include('includes.jquery')
    @include('includes.trumbowg')

    <script>
        $(function(){
            $('#body').trumbowyg();
        })
    </script>
@endpush

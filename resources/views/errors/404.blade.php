@extends('layouts.main')

@section('content')
    <div class="is-flex is-justify-content-center">
        <div style="text-align:center">
            <h1 class="title is-1">404</h1>
            <h3 class="subtitle is-3">Page Not Found!</h3>
            <img src="/error/404.gif" alt="" width="400">
            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="button is-small is-rounded">
                    Back to the previous page
                </a>
            </div>
        </div>
    </div>
@endsection
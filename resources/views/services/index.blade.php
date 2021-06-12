@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="is-flex is-justify-content-space-between">
            <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
        </div>
        <h2 class="title is-4" style="text-align:center">
            Services
        </h2>
        @livewire('search', ['component'=>'service-listing', 'placeholder'=>'Find service'])
        @livewire('service-listing')
        
    </div>
@endsection
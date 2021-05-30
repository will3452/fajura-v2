@extends('layouts.main')

@section('content')
    <div class="container">
        <h2 class="title is-4" style="text-align:center">
            Services
        </h2>
        @livewire('search', ['component'=>'service-listing', 'placholder'=>'Find service'])
        @livewire('service-listing')
        
    </div>
@endsection
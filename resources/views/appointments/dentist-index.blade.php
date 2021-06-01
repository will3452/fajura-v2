@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <h2 class="title is-4" style="text-align: center">Your Appointment</h2>
        @livewire('dentists-appointment-listing')
    </div>
@endsection
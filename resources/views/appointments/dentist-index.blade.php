@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 class="title is-4" style="text-align: center">Your Appointment</h2>
        @livewire('dentists-appointment-listing')
    </div>
@endsection
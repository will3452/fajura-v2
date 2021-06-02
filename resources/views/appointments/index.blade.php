@extends('layouts.main')
@section('content')
    <div class="container">
        <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <h2 class="title is-4" style="text-align: center">Appointment</h2>
        <div style="text-align:right;" class="mb-2">
            
            @if (auth()->user()->hasUnfinishedAppointment())
                <a href="#" class="button is-small is-success has-icon is-rounded" disabled>
                    <div class="icon">
                        <i data-feather="plus"></i>
                    </div>
                    <div>
                        Book now
                    </div>
                </a>
            @else
            <a href="{{ route('appointments.create') }}" class="button is-small is-success has-icon is-rounded">
                <div class="icon">
                    <i data-feather="plus"></i>
                </div>
                <div>
                    Book now
                </div>
            </a>
            @endif
            
        </div>
        @livewire('search', ['component'=>'appointment-listing', 'placholder'=>'Find Appointment'])
        @livewire('appointment-listing')
    </div>
@endsection
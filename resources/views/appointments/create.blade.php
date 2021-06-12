@extends('layouts.main')
@section('content')
    <div class="container" >
        <a href="{{ route('appointments.index') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <h2 class="title is-4" style="text-align: center">New Appointment</h2>
        @livewire('appointment-create')
    </div>
@endsection
@push('scripts')
@endpush
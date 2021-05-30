@extends('layouts.main')
@section('content')
    <div class="container" >
        <h2 class="title is-4" style="text-align: center">New Appointment</h2>
        @livewire('appointment-create')
    </div>
@endsection

@push('scripts')
@endpush
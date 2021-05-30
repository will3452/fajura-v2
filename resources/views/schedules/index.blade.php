@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 class="title is-4" style="text-align: center">Schedules</h2>
        @livewire('day-selector')
        @livewire('time-viewer')
        @livewire('schedule-create')
    </div>
@endsection
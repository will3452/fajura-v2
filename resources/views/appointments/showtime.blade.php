@extends('layouts.main')
@section('content')
    <div class="container" >
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        
        <h2 class="title is-4" style="text-align: center">Available Time</h2>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="" class="label">Dentist</label>
                <div class="control">
                    <input type="hidden" name="dentist_id" value="{{ $dentist->id }}">
                    <input type="text" disabled class="input" value="{{ $dentist->name }}">
                </div>
            </div>
            <input type="hidden" name="date_secret" value="{{ $date_secret }}">
            <input type="hidden" name="dentist_secret" value="{{ $dentist_secret }}">
            <div class="field">
                <label for="" class="label">Date</label>
                <div class="control">
                    <input type="hidden" name="date" value="{{ $date }}">
                    <input type="text" disabled class="input" value="{{ $date }}">
                </div>
            </div>
            @forelse ($times as $time)
                <div class="field">
                    <div class="label">
                        <input type="radio" required name="time" value="{{ $time->id }}"> 
                        {{ $time->makeReadable($time->start) }} - {{ $time->makeReadable($time->end) }}
                    </div>
                </div>
                <button class="button is-small is-success is-rounded">Submit</button>
            @empty
                <p>
                    No Available Time Slot!
                </p>
            @endforelse
            
        </form>
        
    </div>
@endsection

@push('scripts')
@endpush
@extends('layouts.main')

@section('content')
    <div class="container">
        @if (!auth()->user()->hasRole('dentist'))
            <a href="{{ route('appointments.index') }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
            @else 
            <a href="{{ route('dentist-appointments.index') }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
        @endif
        <h3 class="title is-4" style="text-align:center;">{{ $user->first_name }}'s teeth</h3>
        <div class="block" >
            <div style="display: flex; justify-content:center;">
                @foreach ($upper as $item)
                    @livewire('tooth-ui', ['user'=>$user,'tooth'=>$item, 'width'=>'50px', 'height'=>'50px'], key($item->id))
                @endforeach
            </div>
        </div>
        <div class="block" >
            <div style="display: flex; justify-content:center;">
                @foreach ($lower as $item)
                    @livewire('tooth-ui', ['user'=>$user,'tooth'=>$item, 'width'=>'50px', 'height'=>'50px'], key($item->id))
                @endforeach
            </div>
        </div>

        @livewire('tooth-ui-control')

        <div class="block">
            @livewire('tooth-info', ['user'=>$user])
        </div>
    </div>
@endsection
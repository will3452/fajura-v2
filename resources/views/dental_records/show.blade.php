@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="is-flex is-justify-content-space-between">
            @if (!auth()->user()->hasRole('dentist'))
            <a href="{{ route('profile.show', auth()->user()->id) }}" class="button is-small is-rounded has-icon">
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
            <a href="{{ route('profile.show', $user) }}" class="button is-small is-rounded has-icon">
                Show Profile
            </a>
        </div>
        <h3 class="title is-4" style="text-align:center;">{{ $user->first_name }}'s teeth</h3>
        <div class="block is-hidden-desktop" style="overflow-x:auto">
            <div class="is-flex ">
                @foreach ($upper as $item)
                    <div class="">
                        @livewire('tooth-ui', ['user'=>$user, 'tooth'=>$item, 'width'=>'40px', 'height'=>'40px'])
                    </div>
                @endforeach
            </div>
            <div class="is-flex">
                @foreach ($lower as $item)
                    <div class="">
                        @livewire('tooth-ui', ['user'=>$user, 'tooth'=>$item, 'width'=>'40px', 'height'=>'40px'])
                    </div>
                @endforeach
            </div>
        </div>
        <div class="block is-hidden-touch" style="overflow-x:auto">
            <div class="is-flex is-justify-content-center">
                @foreach ($upper as $item)
                    <div class="">
                        @livewire('tooth-ui', ['user'=>$user, 'tooth'=>$item, 'width'=>'40px', 'height'=>'40px'])
                    </div>
                @endforeach
            </div>
            <div class="is-flex is-justify-content-center">
                @foreach ($lower as $item)
                    <div class="">
                        @livewire('tooth-ui', ['user'=>$user, 'tooth'=>$item, 'width'=>'40px', 'height'=>'40px'])
                    </div>
                @endforeach
            </div>
        </div>
        @livewire('tooth-ui-control')
        <div class="block">
            @livewire('tooth-info', ['user'=>$user, 'app_id'=>$app_id])
        </div>
    </div>
@endsection
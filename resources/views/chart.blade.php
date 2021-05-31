@extends('layouts.main')

@section('content')


<div class="content">
    <h1>
        Upper
    </h1>
    <div style="display: flex">
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'canines', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'canines', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
    </div>

    <h2>
        Lower
    </h2>
    <div style="display: flex">
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'canines', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'incisors', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'canines', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'premolars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
        @livewire('tooth-ui', ['type'=>'molars', 'width'=>'50px', 'height'=>'50px'])
    </div>
</div>

@endsection
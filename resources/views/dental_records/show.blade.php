@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="title is-4" style="text-align:center;">{{ $user->first_name }}'s teeth</h3>
        <div >
            
            <div class="block" >
                <div style="display: flex; justify-content:center;">
                    @foreach ($upper as $item)
                        @livewire('tooth-ui', ['tooth'=>$item, 'width'=>'50px', 'height'=>'50px'], key($item->id))
                    @endforeach
                </div>
            </div>
            <div class="block" >
                <div style="display: flex; justify-content:center;">
                    @foreach ($lower as $item)
                        @livewire('tooth-ui', ['tooth'=>$item, 'width'=>'50px', 'height'=>'50px'], key($item->id))
                    @endforeach
                </div>
            </div>

            @livewire('tooth-ui-control')
        </div>
    </div>
@endsection
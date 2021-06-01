@extends('layouts.main')

@section('content')
    <div class="container">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <div class="block">
            <div style="justify-content: center; display:flex">
                @livewire('tooth-ui', ['user'=>$user, 'tooth'=>$tooth, 'width'=>'100px', 'height'=>'100px'])
            </div>
            <h3 class="title is-4" style="text-align: center">
                {{ $tooth->name }} <span style="color:#777">({{ $tooth->position }})</span>
            </h3>
        </div>
        
        <div class="box">
           <div class="block">
             @livewire('search', ['component'=>'data-tables', 'placeholder'=>'Record'])
           </div>
            <div class="block">
                @livewire('data-tables',[
                    'title'=>['ID', 'TREATMENT/SERVICES', 'DENTIST', 'COST','DATE'],
                    'key'=>['id', 'treatments', 'dentist_name', 'cost', 'created_date_readable'],
                    'data'=>$records
                ])
            </div>
        </div>
    </div>
    
@endsection


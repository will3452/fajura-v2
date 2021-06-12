@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <a href="{{ route('medical-history.create') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="plus"></i>
            </div>
            <div>
                New Record
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        Your Medical Record
    </h2>

    @foreach ($records as $date => $record)
        <div class="card" x-data="{
            isShow:false,

        }">
            <div class="card-header">
                <div class="card-header-title is-flex is-justify-content-space-between">
                    <div>
                        {{ $date }}
                    </div>
                    <div>
                        <button x-show="!isShow" class="button is-info is-small is-rounded" x-on:click="isShow = true">
                            Show
                        </button>
                        <button x-show="isShow" class="button is-info is-small is-rounded" x-on:click="isShow = false">
                            Hide
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-content" x-show.transition="isShow">
                @foreach ($record as $item)
                    <div class="block">
                        <div>
                            Question: 
                            {{ $item->question }}
                        </div>
                        <div>
                            Answer:
                            {{ $item->answer }}
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    
</div>
@endsection

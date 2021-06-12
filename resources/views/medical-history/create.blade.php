@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ url()->previous() }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        New Medical Record
    </h2>

    @if (count($questions))
        <form action="{{ route('medical-history.store') }}" method="POST">
            @csrf
            @foreach ($questions as $q)
                <div class="block">
                    {{-- {{ $q }} --}}
                    <div class="field">
                        <label for="" class="label">{{ $q->question }}</label>
                        <input type="hidden" name="questions[]" value="{{ $q->question }}">
                        <input type="hidden" name="q_id[]" value="{{ $q->id }}">
                        <div class="control">
                            @switch($q->type)
                                @case('text')
                                    <textarea required name="answers[]" class="textarea is-small" placeholder="Aa"></textarea>
                                    @break
                                @case('multiple')
                                    <div class="select is-small is-fullwidth">
                                        <select name="answers[]" id="">
                                            @foreach ($q->i_answers as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @break
                            @endswitch
                        </div>
                    </div>
                </div>
            @endforeach
            <button class="button is-small is-info is-rounded">Submit</button>
        </form>
    @else 
        <div class="block" style="text-align: center">
            No yet questionnaires created by Admin.
        </div>
    @endif
    
</div>
@endsection

@extends('layouts.main')
@section('content')
<style>
    .me {
        background:navy;
        color: white;
        border-radius: 20px 20px 0px 20px;
    }

    .baloon {
        padding:1em;
        margin-bottom: 1em;
    }

    .other {
        background:gray;
        color: white;
        border-radius: 20px 20px 20px 0px;
    }
    .small {
        font-size: 10px;
    }
</style>
    <div style="height:50vh; width:90vw; overflow-y:scroll;margin:auto;">

        @foreach ($messages as $m)
            @if ($m->user_id == auth()->id())
                <div class="me baloon">
                    {{$m->content}}
                    <div>
                        <small class="small baloon">{{$m->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            @else
                <div class="other baloon">
                    {{$m->content}}
                    <div>
                        <small class="small baloon">{{$m->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            @endif

        @endforeach
    </div>
    <form action="/chat-messages" style="display:flex; margin:2em; align-items-center;" method="POST">
        @csrf
        <textarea style="flex:5; padding:1em;" name="content" id="" cols="30" rows="5" placeholder="Aa"></textarea>
        <button style="flex:1" class="button">Send</button>
    </form>
@endsection

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ route('services.index') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        Service Feedbacks, Reviews and  Ratings
    </h2>
    <div class="block">
        <div class="columns">
            <div class="column is-4">
                <div class="box">
                    <h4 class="title is-5" style="color: #aaa">
                        #{{ $service->uniq_id }}
                    </h4>
                    <div class="is-flex is-justify-content-center">
                        <img src="{{ $service->public_picture }}" alt="" style="height:200px;">
                    </div>
                    <div>
                        <label for="" class="label">Name</label>
                        <input type="text" disabled value="{{ $service->name }}" class="input is-small">
                    </div>
                    <div>
                        <label for="" class="label">Price</label>
                        <input
                        type="text"
                        disabled 
                        value="PHP {{ $service->price_formatted }}"
                        @if ($service->packages()->count())
                        style="text-decoration:line-through"
                        class="has-text-grey-light input is-small"
                        @else 
                        class="input is-small"
                        @endif
                        >
                        @if ($service->packages()->count())
                        <input
                        type="text"
                        disabled 
                        value="PHP {{ number_format($service->discountPrice($service->packages()->first()->id), 2) }}"
                        class="input is-small"
                        >
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="column" >
                <div class="help block">
                    {{ $service->feedbacks()->count() }} feedback(s)
                </div>
                <div class="block" style="height:70vh;overflow-y:auto;">
                    @foreach ($service->feedbacks as $fb)
                        <div class="box">
                            <div class="is-flex is-justify-content-space-between align-items-center">
                                <div class="is-flex is-justify-content-space-between align-items-center">
                                    <img src="{{ $fb->user->profile->picture ? $fb->user->public_picture : "https://ui-avatars.com/api/?size=128&background=random&name=".$fb->user->name  }}" alt="" style="width:30px; height:30px;border-radius:50%;" class="mr-2">
                                    <div style="line-height: 0.8">
                                        <a href="{{ route('profile.show', $fb->user) }}">{{ $fb->user->name }}</a>
                                        <div class="help">
                                            {{ $fb->user->prifile->job ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @for($i = 0; $i < $fb->stars; $i++)
                                        <img src="/img/star-enable.svg" alt="" style="width: 20px;">
                                    @endfor
                                </div>
                            </div>
                            <div class="block mt-2">
                                {{ $fb->message }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

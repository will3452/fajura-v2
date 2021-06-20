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
                <div class="mt-2" x-data="{
                    isCopied:false,
                    copyUrl(){
                        const link = document.getElementById('url_link');
                        link.select();
                        document.execCommand('copy');
                        this.isCopied = true;
                    }
                }">
                    <div class="box">
                        <label for="" class="label">Share to friends</label>
                        <div class="field has-addons" >
                            <div class="control is-expanded">
                                @auth
                                <input type="text" id="url_link" readonly class="input is-small" value="{{ url()->current() }}?referrer={{ auth()->user()->id }}&referrer_code={{ \Hash::make(auth()->user()->id) }}">
                                @else
                                <input type="text" id="url_link" readonly class="input is-small" value="{{ url()->current() }}">
                                @endauth
                            </div>
                            <div class="control">
                                <button class="button is-small has-icon" x-on:click="copyUrl()">
                                    <div class="icon">
                                        <i data-feather="copy"></i>
                                    </div>
                                    <div >
                                        Copy Link 
                                    </div>
                                </button>
                            </div>
                        </div>
                        <small x-show="isCopied" class="help is-success">
                            Link copied
                        </small>
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

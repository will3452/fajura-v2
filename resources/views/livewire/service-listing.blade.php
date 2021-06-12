<div class="mt-5">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt=""  style="width:25px; height:25px;">
    </div>
    @if (count($services))
        @foreach ($services as $service)
            <div class="columns is-centered">
                <div class="column is-2 is-flex is-justify-content-center is-mobile">
                    <p class="image is-128x128">
                        <img src="{{ $service->public_picture }}" alt="">
                    </p>
                </div>
                <div class="column">
                    <div>
                        <strong>
                            {{ $service->name }} 
                        </strong>
                        <div>
                           P {{ $service->price_formatted }} / Ratings {{ $service->ratings() }}
                        </div>
                        <div>
                        &OpenCurlyDoubleQuote;
                            <i>
                                {{ $service->remarks }}
                            </i>
                            &CloseCurlyDoubleQuote;
                        </div>
                    </div>
                    <div x-data="{
                        write:false
                    }">
                        @if ($service->feedbacks()->count())
                            <a href="{{ route('feedbacks.show', $service) }}" class="button is-small is-rounded">
                                {{ $service->feedbacks()->count() }} Feedback/s
                            </a>
                        @endif
                        <a href="#" x-on:click.prevent="write = true" x-show="!write" class="button is-small is-rounded"> Write a feedback</a>
                        <div x-show="write">
                            @livewire('star-selector', key($service->id))
                            <form action="{{ route('feedbacks.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $star }}" name="stars" required>
                                <input type="hidden" name="star_validator" value="{{ \Hash::make($star) }}">
                                <input type="hidden" value="{{ $service->id }}" name="service_id" required>
                                <input type="hidden" name="service_validator" value="{{ \Hash::make($service->id) }}">
                                <div class="control">
                                    <label for="" class="label">Enter Feedback Here</label>
                                    <textarea class="textarea" name="message" required></textarea>
                                </div>
                                <div style="text-align:right" class="mt-2">
                                    <button class="button is-small is-info is-rounded">
                                        Submit
                                    </button>
                                    <button x-on:click.prevent="write = false" class="button is-small is-rounded" >
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endforeach
    @else
        <div class="notification mt-2">
            No Service found.
        </div>
    @endif
</div>
{{--  <div x-data="{
                            write:false
                        }">
                            <a href="#" x-on:click.prevent="write = true" x-show="!write" class="button is-small is-rounded">Write a feedback</a>
                            <div x-show="write">
                                <div class="control">
                                    <label for="" class="label">Enter Feedback Here</label>
                                    <textarea class="textarea"></textarea>
                                </div>
                                <div style="text-align:right" class="mt-2">
                                    <button class="button is-small is-info is-rounded">
                                        Submit
                                    </button>
                                    <button x-on:click.prevent="write = false" class="button is-small is-rounded">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div> --}}
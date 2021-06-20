<div class="mt-5">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt=""  style="width:25px; height:25px;">
    </div>
    @if (count($services))
        @foreach ($services as $service)
            <div class="mb-6">
                <div class="box columns is-centered" style="position:relative;overflow:hidden;">
                    @if ($service->packages()->count())
                        <div
                        class="banner"
                        style="position:absolute; text-align:center;width:200px;top:30px;left:-60px;padding:0px 1em;background:red;color:yellow;transform:rotate(-45deg)"
                        >
                            {{ $service->packages()->first()->discount_rate }}% OFF
                        </div>
                    @endif
                    <div class="column is-2 is-flex is-justify-content-center is-mobile">
                        <img src="{{ $service->public_picture }}" alt="" style="width:100px;height:100px;object-fit:cover;border-radius:50%">
                    </div>
                    <div class="column has-text-centered-touch">
                        <strong>
                            {{ $service->name }}
                        </strong>
                        <div >
                            
                            <div class="is-size-7">
                               <span
                               @if ($service->packages()->count())
                               style="text-decoration:line-through"
                               class="has-text-grey-light"
                               @endif
                               >P {{ $service->price_formatted }}</span>
                               @if ($service->packages()->count())
                                P {{ number_format($service->discountPrice($service->packages()->first()->id), 2) }}
                               @endif
                            </div>
                            <div class="is-size-7">
                            &OpenCurlyDoubleQuote;
                                <i>
                                    {{ $service->remarks }}
                                </i>
                                &CloseCurlyDoubleQuote;
                            </div>
                        </div>
                    </div>
                    <div class="column has-text-right-desktop has-text-centered">
                        <div x-data="{
                            write:false
                        }">
                            <div x-show="!write" class="mb-2 is-size-7">
                                Rating: {{ $service->ratings() }}
                            </div>
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
            </div>
        @endforeach
    @else
        <div class="notification mt-2">
            No Service found.
        </div>
    @endif
</div>
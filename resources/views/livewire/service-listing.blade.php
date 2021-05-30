<div class="mt-5">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    @if (count($services))
        @foreach ($services as $service)
            <article class="media">
                <figure class="media-left">
                    <p class="image is-128x128">
                        <img src="{{ $service->public_picture }}" alt="">
                    </p>
                </figure>
                <div class="media-content">
                    <div>
                        
                        <strong>
                            {{ $service->name }}
                        </strong>
                        <div>
                           P {{ $service->price_formatted }}
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
                    </div>
                    
                </div>
            </article>
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
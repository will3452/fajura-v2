<div class="mt-2">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    @if (count($services))
        @foreach ($services as $service)
            <div class="block">
                <div class="columns">
                    <div class="column is-3">
                        <img style="width: 100%"
                        src="{{ $service->public_picture }}"
                        alt="{{ $service->name }} picture">
                    </div>
                    <div class="column">
                        <small class="help is-dark">
                            {{ $service->uniq_id }}
                        </small>
                        <h5 class="subtitle is-5 mb-0">
                            {{ $service->name }}
                        </h5>
                        <p>
                            P {{ $service->price_formatted }}
                        </p>
                        <i>
                            {{ $service->remarks }}
                        </i>
                        @livewire('toggle-button', ['active'=>$service->active, 'return'=>$service->id], key($service->id))
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="notification is-warning">
            No Service found.
        </div>
    @endif
</div>
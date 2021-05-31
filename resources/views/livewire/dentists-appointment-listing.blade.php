<div>
    @livewire('dentists-appointment-listing-tab')
    <div wire:ignore>
        @livewire('search', ['component'=>'dentists-appointment-listing', 'placholder'=>'Find Appointment'])
    </div>
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    @forelse ($meetings as $meeting)
        <div class="box mt-2 level">
            <div class="level-left">
                <img src="https://picsum.photos/200" alt="" class="level-item" width="50" style="border-radius: 50%">
                <div class="level-item">
                    <div style="display:flex !important; flex-direction:column;">
                        <div>
                        {{ $meeting->user->name }}
                        </div>
                        <div class="is-size-7">
                        {{ $meeting->date }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="level-right">
                <a href="{{ route('dental-records.show', $meeting->user) }}" class="button is-small is-success is-rounded mx-2">Dental Records</a>
                <a href="#" class="button is-small is-info is-rounded mx-2">Medical Records</a>
            </div>
        </div>
    @empty 

    @endforelse
</div>

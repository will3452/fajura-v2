<div>
    @livewire('dentists-appointment-listing-tab')
    <div wire:ignore>
        @livewire('search', ['component'=>'dentists-appointment-listing', 'placholder'=>'Find Appointment'])
    </div>
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    @forelse ($meetings as $meeting)
        <div class="box mt-2 columns">
            <div class="column is-1" style="display:flex; justify-content:center;">
                <img src="https://picsum.photos/200" alt="" class="level-item" width="100" style="border-radius: 50%">
            </div>
            <div style="text-align:center" class="column is-8 has-text-left-desktop">
                
                <div  style="display:flex !important; flex-direction:column;">
                    <div class="is-size-5 ">
                    {{ $meeting->user->name }}
                    </div>
                    <div class="is-size-6">
                    {{ $meeting->date }} -  {{\App\Models\Time::MAKEREADBLE($meeting->start_time) }} - {{\App\Models\Time::MAKEREADBLE($meeting->end_time)}}
                    </div>
                    <div class="is-size-7"
                    
                    >
                        {{$meeting->status}}
                    </div>
                </div>
            </div>
            <div class="column is-3" style="display:flex; justify-content:center; align-items:center">
                <a href="{{ route('dental-records.show', $meeting->user) }}" class="button is-small is-success is-rounded mx-2">Dental Records</a>
                <a href="#" class="button is-small is-info is-rounded mx-2">Medical Records</a>
            </div>
        </div>
    @empty 

    @endforelse
</div>

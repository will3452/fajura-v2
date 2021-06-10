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
            <div class="column is-2" style="display:flex; justify-content:center;">
                <img src="{{ $meeting->user->profile->picture ? $meeting->user->public_picture : "https://ui-avatars.com/api/?size=128&background=random&name=".$meeting->user->name }}" alt=""  width="100" style="border-radius: 50%" height="100">
            </div>
            <div style="text-align:center" class="column is-7 has-text-left-desktop">
                
                <div  style="">
                    <div class="is-size-5 ">
                    {{ $meeting->user->name }}
                    </div>
                    <div class="is-size-6">
                    {{ $meeting->date }} -  {{\App\Models\Time::MAKEREADBLE($meeting->start_time) }} - {{\App\Models\Time::MAKEREADBLE($meeting->end_time)}}
                    </div>
                    <i class="is-size-7
                    @switch($meeting->status)
                        @case('pending')
                            tag is-link is-rounded
                            @break
                        @case('completed')
                            tag is-success is-rounded
                            @break
                        @default
                            tag is-danger is-rounded
                    @endswitch

                    "
                    >
                        {{$meeting->status}}
                </i>
                </div>
            </div>
            <div class="column is-3" style="display:flex; justify-content:center; align-items:center">
                @if ($meeting->status == 'pending')
                    <a class="button is-success is-rounded is-small" href="#">
                        Resolve Now
                    </a>
                @endif
            </div>
        </div>
    @empty 
        <p style="text-align:center" class="mt-4 has-text-grey-light">
            No Appointment available
        </p>
    @endforelse
</div>

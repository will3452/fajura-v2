<div>
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    <form action="{{ route('dental-records.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{$app_id}}" name="appointment_id">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
       <div class="block" style="max-height:600px;overflow-y:auto">
            @foreach ($teeth as $tooth)
                <div class="block level p-2" style="border:2px solid #eee">
                    <div class="level-left">
                        <div class="content">
                            <h3 class="title is-5">
                                {{ $tooth['name'] }}
                            </h3>
                            <h4 class="subtitle is-7">
                                Position: {{ $tooth['position'] }}
                            </h4>
                        </div>
                    </div>
                    <div class="level-right">
                        <a href="{{ route('teeth.show', $tooth['id']) }}?user={{ $user->id }}&valid={{ \Hash::make($user->id.$tooth['id']) }}" class="button is-small is-success is-rounded">View Records</a>
                    </div>
                </div>
                <input type="hidden" name="teeth[]" value="{{ $tooth['id'] }}">
            @endforeach
       </div>
        @if (auth()->user()->hasRole('dentist') && count($teeth))
            <div class="box is-fixed-top">
                <div class="field">
                    <label for="" class="label">Services / Treatments</label>
                    <textarea class="textarea" name="treatments" placeholder="Aa" required></textarea>
                </div>
                <div class="field">
                    <label for="" class="label">Cost</label>
                    <div class="control">
                        <input type="number" name="cost" class="input" required>
                    </div>
                </div>
                <button class="button is-fullwidth is-rounded is-info">
                    Submit
                </button>
            </div>
        @endif
    </form>
    
</div>

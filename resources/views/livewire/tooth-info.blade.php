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
            <div class="box">
                <h1 class="title">Add Treatment</h1>
                <div class="field">
                    <label for="" class="label">Date of inital symptoms</label>
                    <div class="control">
                        <input type="date" class="input" name="date_of_initial_symptoms">
                    </div>
                </div>
                <div class="field">
                    <label for="" class="label">Symptoms</label>
                    <textarea class="textarea" name="symptoms" placeholder="Aa" required></textarea>
                </div>
                <div class="field">
                    <label for="" class="label">Services / Treatments / Dental Work</label>
                    <textarea class="textarea" name="treatments" placeholder="Aa" required></textarea>
                </div>
                <div class="field">
                    <label for="" class="label">Date of Dental Work</label>
                    <div class="control">
                        <input type="date" class="input" id="d" name="date_of_dental_work">
                    </div>
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

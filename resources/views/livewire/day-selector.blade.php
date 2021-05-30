<div class="field">
    <div class="control">
        <div class="select">
            <select name="" id="" wire:model="day">
                <option value="" selected disabled>Select Day</option>
                @foreach ($days as $day)
                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div x-data="{
    isActive:false,
    updateModal(){
        this.isActive = !this.isActive;
        this.isActive ? this.$refs.modal.classList.add('is-active'):this.$refs.modal.classList.remove('is-active')
    }
}">
    
    <button class="button is-info is-small is-rounded" x-on:click="updateModal()">
        Add Schedule
    </button>
    <div class="modal" x-ref="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <form method="POST" action="{{ route('schedules.store') }}">
                    @csrf
                    <div class="field">
                        <label for="" class="label">Day</label>
                        <div class="select is-fullwidth">
                            <div class="control">
                                <select name="day_id" id="">
                                    <option value="" disabled selected>Select day</option>
                                    @foreach ($days as $d)
                                        <option value="{{ $d->id}}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Start Time</label>
                        <div class="control">
                            <input type="time" name="start" class="input" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">End Time</label>
                        <div class="control">
                            <input type="time" name="end" class="input" required>
                        </div>
                    </div>
                    <button class="button is-small is-info is-rounded">Submit</button>
                </form>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close" x-on:click="updateModal()"></button>
    </div>
</div>

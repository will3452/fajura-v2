<div class="">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    <div class="box mb-2">
        @if ($times == null)
            Please select the day in the above .
        @endif
        @if ($times != null)
            @forelse ($times as $time)
                <div class="level" x-data="{
                    editMode:false,
                    submit(){
                        this.$refs.formEdit.submit();
                    }
                }">
                    <div class="level-left" x-show = "!editMode">
                        <div class="level-item">
                            {{ $time->makeReadable($time->start) }} - {{ $time->makeReadable($time->end) }}
                        </div>
                    </div>
                    <div class="level-left" x-show="editMode">
                        <div class="level-item">
                            <form action="{{ route('schedules.update', $time) }}" x-ref="formEdit" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="time" name="start" value="{{ $time->start }}" required> -  <input type="time" name="end" required value="{{ $time->end }}">
                            </form>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button is-small is-success is-rounded" x-on:click="editMode = true" x-show="!editMode">
                                Edit
                            </button>
                            <button class="button is-small is-info is-rounded" x-on:click="submit()" x-show="editMode">
                                Save
                            </button>
                            <button class="button is-small is-dark is-rounded mx-1" x-show="editMode" x-on:click="editMode = false">
                                Cancel
                            </button>
                        </div>
                        <div class="level-item" x-show="!editMode">
                            <form action="{{ route('schedules.destroy', $time) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="button is-small is-danger is-rounded">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="subtitle is-5 has-text-grey">No schedule created.</h3>
            @endforelse
        @endif
    </div>
</div>

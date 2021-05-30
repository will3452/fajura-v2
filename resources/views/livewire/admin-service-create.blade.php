<div>
    <form wire:submit.prevent="submit">
        @if ($success)
            <div class="notification mt-2 is-success">
                Done!
            </div>
        @endif
        <div class="field">
            <label for="" class="label">Name</label>
            <div class="control">
                <input type="text" wire:model="name" class="input">
                @error('name')
                <small class="help is-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="field">
            <label for="" class="label">Price</label>
            <div class="control">
                <input type="number" wire:model="price" class="input">
            </div>
        </div>
        <div class="field">
            <label for="" class="label">Remarks</label>
            <div class="control">
                <textarea class="textarea" wire:model="remarks" placeholder=""></textarea>
            </div>
        </div>
        <img width="100" src="{{ $picture ? $picture->temporaryUrl() : '' }}" alt="">
        <div class="field">
            <input type="file" wire:model="picture" accept="image/*">
            @error('picture')
                <small class="help is-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="field"  wire:loading.remove wire:target="submit" >
            <button class="button is-info is-rounded">
                Submit
            </button>
        </div>

        <div class="field"  wire:loading wire:target="submit" >
            <button  class=" button is-loading is-info is-rounded">
                Submit
            </button>
        </div>
        
    </form>
</div>
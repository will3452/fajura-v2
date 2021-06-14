<div class="block">
    <div class="field">
        <label for="email" class="label">{{ __('E-Mail Address') }}</label>
    
        <div class="control">
            <input id="email" wire:model="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="help is-danger" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
    {{-- <div class="field">
        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

        <div class="control">
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div> --}}

</div>
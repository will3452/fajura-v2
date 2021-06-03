<div class="block" x-data="{
    passwordVisible1:false,
    updatePasswordVisible1(){
        this.passwordVisible1 = !this.passwordVisible1;
        this.passwordVisible1 ? document.getElementById('password').type = 'text': document.getElementById('password').type = 'password';
    },
    passwordVisible2:false,
    updatePasswordVisible2(){
        this.passwordVisible2 = !this.passwordVisible2;
        this.passwordVisible2 ? document.getElementById('password-confirm').type = 'text': document.getElementById('password-confirm').type = 'password';
    },
    passwordNotMatched:false,
    checkpassword(){
        this.passwordNotMatched = document.getElementById('password-confirm').value != document.getElementById('password').value && document.getElementById('password-confirm').value.length;
    },
    passwordIsEmail:false,
    checkPasswordIsEmail(){
        let email = document.getElementById('email').value;
        let firstname = document.getElementById('firstname').value;
        let lastname = document.getElementById('lastname').value;
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('password-confirm').value;
    
        this.passwordIsEmail = password.includes(email) && email.length > 0
        if(!this.passwordIsEmail && password.length && firstname.length && lastname.length && cpassword == password){
            document.getElementById('submitButton').disabled = false;
        }else {
            document.getElementById('submitButton').disabled = true;
        }
    }
}">
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

    <div class="field" >
        <label for="password" class="label">{{ __('Password') }}</label>
        
        <small wire:loading target="updatePassword">Please wait. Your password has been validating...</small>
        <div class="field has-addons">
            <div class="control is-expanded">
                <input id="password" x-on:input="checkPasswordIsEmail()" value="{{ old('email') }}" wire:ignore wire:model="password" x-on:change="checkpassword()" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="help is-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <span class="help is-danger" x-show="passwordIsEmail" role="alert">
                    Your email or name should not included to your password.
                </span>
                <div class="content">
                    <ul>
                        <li>
                            <small>The password must have atlease special characters.</small>
                        </li>
                        <li>
                            <small>The password must have atlease special Numeric characters.</small>
                        </li>
                        <li>
                            <small>The password must be at least 8 characters.</small>
                        </li>
                    </ul>
                </div>
            </div>
            <p class="control">
                <a class="button" wire:ignore x-on:click="updatePasswordVisible1()">
                  <i data-feather="eye" x-show="!passwordVisible1"></i>
                  <i data-feather="eye-off" x-show="passwordVisible1"></i>
                </a>
              </p>
        </div>
        
    </div>
    <div class="field" >
        <label for="password" class="label">{{ __('Confirm Password') }}</label>
        <div class="field has-addons">
            <div class="control is-expanded">
                <input x-on:input="checkPasswordIsEmail()" x-on:change="checkpassword()" id="password-confirm" wire:ignore type="password" class="input @error('password') is-danger @enderror" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <span class="help is-danger" role="alert">
                        {{ $message }}
                    </span>
                @enderror
                <span x-show="passwordNotMatched" class="help is-danger" role="alert">
                    Password do not match!
                </span>
            </div>
            <p class="control">
                <a class="button" wire:ignore x-on:click="updatePasswordVisible2()">
                  <i data-feather="eye" x-show="!passwordVisible2"></i>
                  <i data-feather="eye-off" x-show="passwordVisible2"></i>
                </a>
              </p>
        </div>
        
    </div>

    {{-- <div class="field">
        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

        <div class="control">
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div> --}}

</div>
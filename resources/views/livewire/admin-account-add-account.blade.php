<div class="block">
    @if ($alert)
    <div class="notification is-info">
        done!
    </div>
    @endif
    <form method="POST" wire:submit.prevent="addAccount()">
        @csrf
        <div class="field">
            <label for="" class="label">
                Role
            </label>
            <div class="select is-fullwidth">
                <select wire:model="role" name="role" id="" wire:model="sex">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                
            </div>
        </div>
        <div class="field">
            <label for="" class="label">Name</label>
            <div class="control">
                <div class="columns">
                    <div class="column is-5">
                        <input type="text" wire:model="firstname" class="input" value="{{ old('firstname') }}" autofocus placeholder="First Name" name="firstname" id="firstname" required>
                    </div>
                    <div class="column is-5">
                        <input type="text"  wire:model="lastname" class="input" value="{{ old('lastname') }}" placeholder="Last Name" name="lastname" id="lastname"  required>
                    </div>
                    <div class="column is-2">
                        <input type="text"  wire:model="mi" class="input" value="{{ old('mi') }}" placeholder="M.I" maxlength="1" name="mi" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="field">
            <div class="columns">
                <div class="column">
                    <label for="" class="label">Birthdate</label>
                    <div class="control">
                        <input type="date" wire:model="birthdate"  id="bdate" name="birthdate" value="{{ old('birthdate') }}" class="input" >
                    </div>
                </div>
                <div class="column">
                    <label for="" class="label">Sex</label>
                    <div class="select is-fullwidth">
                        <select name="sex"id="" wire:model="sex">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        
                    </div>
                    @if(!in_array($sex, ['Male', 'Female']))
                        <div  class="help is-danger">
                            Invalid Sex
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="field" x-data="{
            provinces:[],
            selectedProvCode:null,
            async fetchProvinces(){
                if(!this.provinces.length){
                    const resp = await fetch('/json/refprovince.json')
                    const {RECORDS: data} = await resp.json()
                    const provinces = await data.filter(d=>d.regCode == '03');
                    document.getElementById('prov').innerHTML = `<option value=''  selected>Province</option>`;
                    this.provinces = await provinces;
                    for({provDesc} of provinces){
                        let [first, ...str] = provDesc;
                            str = str.join('').toLowerCase();
                        document.getElementById('prov').innerHTML += `<option value='${provDesc}'>${first+str}</option>`;
                    }
                }
            },
            fetchMunicipality(){
                fetch('/json/refprovince.json')
                .then(data=>data.json())
                .then(({RECORDS: data})=>{
                    return data.find(d=>d.provDesc == document.getElementById('prov').value)
                })
                .then(prov=>{
                    fetch('/json/refcitymun.json')
                    .then(data=>data.json())
                    .then(({RECORDS:data})=>{
                        return data.filter(d=>d.provCode == prov.provCode)
                    }).
                    then(cities=>{
                        document.getElementById('city').innerHTML = `<option value=''  selected>Municipality</option>`;
                        for({citymunDesc:desc} of cities){
                            let [first, ...str] = desc;
                            str = str.join('').toLowerCase();
                            document.getElementById('city').innerHTML += `<option value='${desc}'>${first+str}</option>`;
                        }
                    })
                })
            },
            fetchBrgy(){
                fetch('/json/refcitymun.json')
                .then(data=>data.json())
                .then(({RECORDS:cities})=>{
                    return cities.find(({citymunDesc:desc})=>desc == document.getElementById('city').value)
                }).then(city=>{
                    fetch('/json/refbrgy.json')
                    .then(data=>data.json())
                    .then(({RECORDS:brgy})=>{
                        return brgy.filter(({citymunCode})=>citymunCode == city.citymunCode)
                    }).
                    then(brgy=>{
                        document.getElementById('brgy').innerHTML = `<option value=''  selected>Barangay</option>`;
                        for({brgyDesc:desc} of brgy){
                            document.getElementById('brgy').innerHTML += `<option value='${desc}'>${desc}</option>`;
                        }
                    })
                })
            }

        }">
            <label for="" class="label">Address</label>
            <div class="columns" wire:ignore>
                <div class="column">
                    <div class="select is-fullwidth">
                        <select name="prov" id="prov" wire:model="prov" x-on:change="fetchMunicipality()" required x-on:click="fetchProvinces()">
                            <option value=""  selected>Province</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="select is-fullwidth">
                        <select name="city"wire:model="city"  x-on:change="fetchBrgy()" id="city"required>
                            <option value=""  selected>Municipality</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <div class="select is-fullwidth"  >
                        <select wire:model="brgy" name="brgy" id="brgy"required>
                            <option value=""  selected>Barangay</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="field" x-data="{
            invalid:false,
            updateInvalid(){
                let rx = /\b9\d{9}\b/;
                
                this.invalid = document.getElementById('phone').value[0] != 9 || document.getElementById('phone').value.length != 10;
                console.log(document.getElementById('phone').value[0])
            }
        }">
            <label for="" class="label">Phone No.</label>
            <p class="control has-icons-left">
                <input class="input" wire:model="phone" type="number" id="phone" name="phone" value="{{ old('phone') }}" placeholder="" x-on:change="updateInvalid()" >
                <span class="icon is-small is-left">
                +63
                </span>
            </p>
            <div x-show="invalid" class="help is-danger">
                Invalid Phone Number.
            </div>
        </div>
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
            passwordIsEmail:false,
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
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input id="password" wire:ignore wire:model="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="help is-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                        <span class="help is-danger" x-show="passwordIsEmail" role="alert">
                            Your email or name should not included to your password.
                        </span>
                    </div>
                    <p class="control" >
                        <a class="button" wire:ignore x-on:click="updatePasswordVisible1()" >
                        <i x-show="!passwordVisible1" >show</i>
                        <i x-show="passwordVisible1">hide</i>
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

        <div class="field">
            <div class="control">
                <button wire:loading.remove wire:target="addAccount" type="submit" class="button is-small  is-info is-rounded" wire:ignore>
                    <i data-feather="check"></i> <span> {{ __('Submit') }}</span>
                </button>
                <div class="" wire:loading wire:target="addAccount">
                    <button type="submit" class="button is-loading is-small  is-info is-rounded" wire:ignore>
                        <i data-feather="check"></i> <span> {{ __('Submit') }}</span>
                    </button>
                </div>
                
            </div>
        </div>
    </form>
</div>
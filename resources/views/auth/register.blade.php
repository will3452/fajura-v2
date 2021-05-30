@extends('layouts.main')

@section('content')
<div class="container px-2">
    <h2 class="title is-3 has-text-centered">
        Registration
    </h2>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <div class="field">
                    <label for="" class="label">Name</label>
                    <div class="control">
                        <div class="columns">
                            <div class="column is-5">
                                <input type="text" class="input" value="{{ old('firstname') }}" autofocus placeholder="First Name" name="firstname" id="firstname" required>
                            </div>
                            <div class="column is-5">
                                <input type="text" class="input" value="{{ old('lastname') }}" placeholder="Last Name" name="lastname" id="lastname"  required>
                            </div>
                            <div class="column is-2">
                                <input type="text" class="input" value="{{ old('mi') }}" placeholder="M.I" maxlength="1" name="mi" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="columns">
                        <div class="column">
                            <label for="" class="label">Birthdate</label>
                            <div class="control">
                                <input type="text" id="bdate" name="birthdate" value="{{ old('birthdate') }}" class="input" readonly>
                            </div>
                        </div>
                        <div class="column">
                            <label for="" class="label">Sex</label>
                            <div class="select is-fullwidth">
                                <select name="sex"id="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
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
                            document.getElementById('prov').innerHTML = `<option value='' disabled selected>Province</option>`;
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
                                document.getElementById('city').innerHTML = `<option value='' disabled selected>Municipality</option>`;
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
                                document.getElementById('brgy').innerHTML = `<option value='' disabled selected>Barangay</option>`;
                                for({brgyDesc:desc} of brgy){
                                    document.getElementById('brgy').innerHTML += `<option value='${desc}'>${desc}</option>`;
                                }
                            })
                        })
                    }

                }">
                    <label for="" class="label">Address</label>
                    <div class="columns">
                        <div class="column">
                            <div class="select is-fullwidth">
                                <select name="prov" id="prov" x-on:change="fetchMunicipality()" required x-on:click="fetchProvinces()">
                                    <option value="" disabled selected>Province</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="select is-fullwidth">
                                <select name="city" x-on:change="fetchBrgy()" id="city"required>
                                    <option value="" disabled selected>Municipality</option>
                                </select>
                            </div>
                        </div>
                        <div class="column">
                            <div class="select is-fullwidth"  >
                                <select name="brgy" id="brgy"required>
                                    <option value="" disabled selected>Barangay</option>
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
                        <input class="input" type="number" id="phone" name="phone" value="{{ old('phone') }}" placeholder="" x-on:change="updateInvalid()" >
                        <span class="icon is-small is-left">
                          +63
                        </span>
                    </p>
                    <div x-show="invalid" class="help is-danger">
                        Invalid Phone Number.
                    </div>
                </div>
                @livewire('register-fields')

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-info" disabled=true id="submitButton">
                            <i data-feather="check"></i> <span> {{ __('Submit') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        const picker = datepicker('#bdate', {minDate: new Date(1951, 0, 1), maxDate: new Date(2010, 0, 1), formatter: (input, date, instance) => {
    const value = date.toLocaleDateString()
    input.value = value // => '1/1/2099'
  }});
  picker.navigate(new Date(2000, 3, 3));
    </script>
@endpush

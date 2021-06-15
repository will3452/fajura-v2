@extends('layouts.main')

@section('content')
    <div class="container">
        
        <div class="is-flex is-justify-content-space-between">
            <a href="{{ route('dental-records.show', $user) }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
        </div>
        <h2 class="title is-4" style="text-align: center">Add New Dental Record</h2>
       <div class="columns">
           <div class="column is-5">
               <div class="box">
                    <img src="/img/dental chart2.jpg" alt="" class="is-unselectable">
               </div>
           </div>
           <div class="column is-7" style="height: 70vh;overflow-y:auto">
            <div class="box">
                @if($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                @endif
                <form action="{{ route('dental-records.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="" class="label">Patient Id</label>
                        <div class="control">
                            <input type="text" disabled value="{{ $user->unique_id }}" class="input is-small">
                        </div>
                    </div>
                    
                    <input type="hidden" name="patient_id" value="{{ $user->id }}">
                    <input type="hidden" name="patient_secret" value="{{ \Hash::make($user->id) }}">
                    <div class="field">
                        <label for="" class="label">Patient Name</label>
                        <div class="control">
                            <input type="text" disabled value="{{ $user->name }}" class="input is-small" required>
                        </div>
                    </div>
                    @if (auth()->user()->hasRole('staff'))
                    <div class="field">
                        <label for="" class="label">Dentist</label>
                        <div class="select is-fullwidth is-small">
                            <select name="dentist_id" id="" required>
                                @foreach (\App\Models\User::role('dentist')->get() as $dentist)
                                    <option value="{{ $dentist->id }}">
                                        {{ $dentist->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class="field">
                        <label for="" class="label">Date of Initial Symptoms</label>
                        <div class="control">
                            <input type="date" class="input is-small" name="date_of_initial_symptoms" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Symptoms</label>
                        <div class="control">
                            <textarea name="symptoms" class="textarea is-small" placeholder="Aa" required></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Injured / Affected Tooth (or Teeth)</label>
                        <div class="control">
                            <input type="text" name="injured" class="input is-small" placeholder="eg. 12 - 23" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Dental work carried out</label>
                        <div class="control">
                            <textarea name="dental_work_carried_out" class="textarea is-small" placeholder="Aa" required></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Date of dental work</label>
                        <div class="control">
                            <input type="date" class="input is-small" name="date_of_dental_work" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Amount </label>
                        <div class="control">
                            <input type="text" name="amount" class="input is-small" placeholder="eg. 1000" required>
                        </div>
                        <small class="help">
                            (Patient must need to pay)
                        </small>
                    </div>
                    <div class="block is-flex is-justify-content-space-between">
                        <button class="button is-small is-info is-rounded">Submit</button>
                        <button class="button is-small is-dark is-rounded" type="reset">Reset</button>
                    </div>
                    
                    
                </form>
            </div>
           </div>
       </div>
    </div>
@endsection
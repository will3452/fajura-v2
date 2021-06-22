@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-4 is-hidden-mobile">
                @livewire('date-card')
            </div>
            <div class="column is-4 is-hidden-tablet">
                @livewire('date-card-mobile')
            </div>
            <div class="column is-8">
                <div class="columns is-multiline is-mobile">
                    @can('browse services')
                        <div class="column is-6 is-half-mobile" id="service_box">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="heart"></i>
                                        </div>
                                        <div class="level-item">
                                        Services
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('services.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('read accounts')
                        <div class="column is-6 is-half-mobile">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="users"></i>
                                        </div>
                                        <div class="level-item">
                                        Accounts
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('account-management.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('add appointments')
                        <div class="column is-6 is-half-mobile" id="appointment_box">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="calendar"></i>
                                        </div>
                                        <div class="level-item">
                                        Appointment
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('appointments.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('browse appointments')
                        <div class="column is-6 is-half-mobile">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="calendar"></i>
                                        </div>
                                        <div class="level-item">
                                        All Appointment
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('all-appointments.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                   @can('edit appointments')
                        <div class="column is-6 is-half-mobile">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="calendar"></i>
                                        </div>
                                        <div class="level-item">
                                        Appointment
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('dentist-appointments.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    

                    @can('edit schedules')
                        <div class="column is-6 is-half-mobile">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="clock"></i>
                                        </div>
                                        <div class="level-item">
                                        Schedules
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="{{ route('schedules.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    <div class="column is-6 is-half-mobile" id="help_box">
                        <div class="box">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <i data-feather="help-circle"></i>
                                    </div>
                                    <div class="level-item">
                                       Helps &amp; Tutorials
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <a href="{{ route('helps.index') }}" class="button is-info is-small is-rounded">
                                            view
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6 is-half-mobile" id="setting_box">
                        <div class="box">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <i data-feather="settings"></i>
                                    </div>
                                    <div class="level-item">
                                       Setting
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <a href="{{ route('settings') }}" class="button is-info is-small is-rounded">
                                            view
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('top')
@php
    $packages = App\Models\Package::latest()->get();
@endphp
    @if (count($packages))
        <div class="marquee mb-5">
            @foreach ($packages as $package)
                <strong>{{ $package->name }}</strong> - {{ $package->remarks }} - Inclusive Services: {{ $package->service_names }}
                @if (!$loop->last)
                    |
                @endif
            @endforeach 
        </div> 
    @endif
@endsection
@push('scripts')
    @include('includes.jquery')
    @include('includes.marquee')
    @if (request()->has('tut'))
    @include('includes.introjs')
    <script>
        introJs().setOptions({
        steps: [{
            intro: "Hello {{ auth()->user()->profile->sex == 'Male' ? 'Mr.':'Ms.' }} {{ auth()->user()->name }}, Since your first time to use our system, let me guide you :)"
        }, {
            element: document.querySelector('#service_box'),
            intro: "This is Services menu, If you want to browse all of our services go here."
        },
        {
            element: document.querySelector('#appointment_box'),
            intro: "This is Appointment menu, If you want to book an appointment go here."
        },
        {
            element: document.querySelector('#help_box'),
            intro: "This is Helps & Tutorials menu, If you need some help just go here."
        },
        {
            element: document.querySelector('#setting_box'),
            intro: "This is Settings menu, If you want to change your account password, turn your display into dark mode go here."
        },
        {
            element: document.querySelector('#notif_box'),
            intro: "All of your Notifications goes here."
        },
        {
            element: document.querySelector('#profile_box'),
            intro: "If you want to check your profile Just hover here and click the profile :)"
        }
        ]
        }).onbeforeexit(function () {
            window.location.href="{{ route('home') }}"
            return true;
        }).start();
    </script>
    @endif
@endpush

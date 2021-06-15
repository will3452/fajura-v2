@extends('layouts.main')

@section('content')
{{session()->get('appointment_id')}}
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
                        <div class="column is-6 is-half-mobile">
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
                    @can('add appointments', Model::class)
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
                                            <a href="{{ route('appointments.index') }}" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                    @can('browse appointments', Model::class)
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
                   @can('edit appointments', Model::class)
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
                    @can('browse blog')
                        <div class="column is-6 is-half-mobile">
                            <div class="box">
                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item">
                                            <i data-feather="layout"></i>
                                        </div>
                                        <div class="level-item">
                                        Blog
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <a href="#" class="button is-info is-small is-rounded">
                                                view
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan

                    @can('edit schedules', Model::class)
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
                    <div class="column is-6 is-half-mobile">
                        <div class="box">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <i data-feather="help-circle"></i>
                                    </div>
                                    <div class="level-item">
                                       Help
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <a href="#" class="button is-info is-small is-rounded">
                                            view
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6 is-half-mobile">
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

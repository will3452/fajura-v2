@extends('layouts.admin-main')

@section('content')
{{-- @include('refresh') --}}
    <div class="container" x-data="{
        active:'services',
        
    }">
        <div class="columns ">
            <div class="column is-3">
                <aside class="menu box">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'dashboard'" href="#dashboard" :class="{'is-active':active == 'dashboard'}">Dashboard</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'appointments'" href="#dashboard" :class="{'is-active':active == 'appointments'}">Appointments</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'services'" href="#dashboard" :class="{'is-active':active == 'services'}">Services</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'pages'" href="#dashboard" :class="{'is-active':active == 'pages'}">Pages</a></li>
                    </ul>
                    <p class="menu-label">
                        Administration
                    </p>
                    <ul class="menu-list">
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'accounts'" href="" :class="{'is-active':active == 'accounts'}">Accounts</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'permissions'" href="" :class="{'is-active':active == 'permissions'}">Permissions</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'reports'" href="" :class="{'is-active':active == 'reports'}">Reports</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'log'" href="" :class="{'is-active':active == 'log'}"">Activity Log</a></li>
                        <li><a style="border-radius: 20px" x-on:click.prevent="active = 'setting'" href="" :class="{'is-active':active == 'setting'}">Settings</a></li>
                    </ul>
                </aside>
            </div>
            <div class="column is-9">


                {{-- dashboard --}}
                    <div class="box" x-show="active == 'dashboard'">
                        <h1 class="title">
                            <i data-feather="box"></i> Dashboard
                        </h1>
                    </div>
                {{-- end of dashboard --}}

                {{-- Appointments --}}
                    <div class="box" x-show="active == 'appointments'">
                        <h1 class="title">
                            <i data-feather="calendar"></i> Appointment
                        </h1>
                    </div>
                {{-- end of appointments --}}

                {{-- Services --}}
                <div class="box" x-show="active == 'services'">
                    <h1 class="title">
                        <i data-feather="star"></i> Services
                    </h1>
                    @livewire('admin-service')
                </div>
                {{-- end of Services --}}

                {{-- pages --}}
                <div class="box" x-show="active == 'pages'">
                    <h1 class="title">
                        <i data-feather="layout"></i> Pages
                    </h1>
                </div>
                {{-- end of pages --}}

                {{-- Accounts --}}
                <div class="box" x-show="active == 'accounts'">
                    <h1 class="title">
                        <i data-feather="users"></i> Accounts
                    </h1>
                    @livewire('admin-account')
                </div>
                {{-- end of Accounts --}}

                {{-- Permissions --}}
                <div class="box" x-show="active == 'permissions'">
                    <h1 class="title">
                        <i data-feather="unlock"></i> Roles / Permissions
                    </h1>
                    @livewire('admin-permissions')
                </div>
                {{-- end of Permissions --}}

                 {{-- Reports --}}
                 <div class="box" x-show="active == 'reports'">
                    <h1 class="title">
                        <i data-feather="bar-chart-2"></i> Reports
                    </h1>
                </div>
                {{-- end of Reports --}}

                {{-- log --}}
                <div class="box" x-show="active == 'log'">
                    <h1 class="title">
                        <i data-feather="activity"></i> Activity Log
                    </h1>
                </div>
                {{-- end of log --}}
                
                {{-- setting --}}
                <div class="box" x-show="active == 'setting'">
                    <h1 class="title">
                        <i data-feather="settings"></i> Settings
                    </h1>
                </div>
                {{-- end of setting --}}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        Settings
    </h2>
    <div class="block">
        <div class="is-flex is-justify-content-space-between box">
            <div class="is-flex align-items-center">
              <i data-feather="moon" class="mx-2"></i>  Dark-mode
            </div>
           
            <div>
                @livewire('setting-toggle', ['active'=>auth()->user()->setting->dark_mode, 'setting'=>auth()->user()->setting,'prop'=>'dark_mode'])
            </div>
        </div>
        <div class="is-flex is-justify-content-space-between box">
            <div class="is-flex align-items-center">
              <i data-feather="mail" class="mx-2"></i>  Email Notification
            </div>
            <div>
                @livewire('setting-toggle', ['active'=>auth()->user()->setting->notify_by_email, 'setting'=>auth()->user()->setting, 'prop'=>'notify_by_email'])
            </div>
        </div>
    </div>
    <div style="text-align: right">
        <a href="{{ url()->current() }}" class="has-icon 
            button is-info is-rounded is-small">
            <div class="icon">
                <i data-feather="refresh-ccw"></i>
            </div>
            <div>
                Reload is required
            </div>
        </a>
    </div>
</div>
@endsection

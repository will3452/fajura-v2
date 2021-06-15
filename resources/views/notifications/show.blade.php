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
        <h2 class="title is-4" style="text-align: center">Notifications</h2>
        @foreach ($notifications as $not)
            <div class="columns box mt-2">
                <div class="column is-flex is-justify-content-center is-2 ">
                    <img src="/img/notifications/{{ $not->data['icon']??'calendar' }}.svg" alt="">
                </div>
                <div class="column is-10">
                    <div class="block">
                        {{ $not->data['message'] }}
                    </div>
                    <div class="is-flex is-justify-content-space-between">
                        <div class="help">
                            {{ $not->created_at->diffForHumans() }}
                        </div>
                        <div style="text-align:right;">
                            <a href="{{ route('notif.update', $not) }}?goto_link={{ $not->data['action'] }}" class="button is-small is-success is-rounded has-icon">
                                <div class="icon">
                                    <i data-feather="info"></i>
                                </div>
                                <div>
                                    Show more
                                </div>
                            </a>
                            @if (!$not->read_at)
                                <a href="{{ route('notif.update', $not) }}" class="button is-small is-rounded has-icon">
                                    <div class="icon">
                                        <i data-feather="check-circle"></i>
                                    </div>
                                    <div>
                                        Mark as Read
                                    </div>
                                </a> 
                           
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="is-flex justify-content-center">
            {{ $notifications->render("pagination::simple-bootstrap-4") }}
        </div>
        @if (!count($notifications))
            <div class="is-flex is-justify-content-center has-text-dark">
                <div>
                    <div class="mb-2 is-flex is-justify-content-center has-text-dark">
                        <i data-feather="bell-off"></i>
                    </div>
                    No notification found :)
                </div>
            </div>
        @endif
    </div>
@endsection
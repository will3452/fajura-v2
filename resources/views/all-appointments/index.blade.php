@extends('layouts.main')
@section('content')
    <div class="container">

        <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
        <h2 class="title is-4" style="text-align: center">Appointments ({{ request()->get ?? 'New' }})</h2>

        <div class="block">
            <a href="{{ route('all-appointments.index') }}" class="button is-small is-rounded">
                New
            </a>
            <a href="{{ route('all-appointments.index') }}?get=today" class="button is-small is-rounded">
                Today
            </a>
            <a href="{{ route('all-appointments.index') }}?get=tomorrow" class="button is-small is-rounded">
                Tomorrow
            </a>
            <a href="{{ route('all-appointments.index') }}?get=incoming" class="button is-small is-rounded">
                Incoming
            </a>
            <a href="{{ route('all-appointments.index') }}?get=completed" class="button is-small is-rounded">
                Completed
            </a>
            <a href="{{ route('all-appointments.index') }}?get=cancelled" class="button is-small is-rounded">
                Cancelled
            </a>
        </div>
        @if (auth()->user()->hasRole('staff'))
                <a href="{{ route('appointments.create') }}" class="button is-small is-success has-icon is-rounded">
                    <div class="icon">
                        <i data-feather="plus"></i>
                    </div>
                    <div>
                        Book now
                    </div>
                </a>
            @endif
        <div class="table-container">
            <table class="table is-fullwidth table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            PATIENT
                        </th>
                        <th>
                            DENTIST
                        </th>
                        <th>
                            STATUS
                        </th>
                        <th>
                            BOOKED DATE
                        </th>
                        <th>
                            BOOKED TIME
                        </th>
                        <th>
                            DATE CREATED
                        </th>
                        @if (!isset(request()->get) || !in_array(isset(request()->get) ? request()->get : '',['completed', 'cancelled']))
                            <th>
                                OPTION
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>
                                {{ $appointment->unique_id }}
                            </td>
                            <td>
                                {{ $appointment->user->name }}
                            </td>
                            <td>
                                {{ $appointment->dentist->name }}
                            </td>
                            <td>
                                {{ $appointment->status }}
                            </td>
                            <td>
                                {{ $appointment->date }}
                            </td>
                            <td>
                                {{ \App\Models\Time::MAKEREADBLE($appointment->start_time).' - '.\App\Models\Time::MAKEREADBLE($appointment->end_time) }}
                            </td>
                            <td>
                                {{ $appointment->created_at->format('m/d/Y') }}
                            </td>
                            @if (!isset(request()->get) || !in_array(isset(request()->get) ? request()->get : '',['completed', 'cancelled']))
                            <td class="is-flex is-justify-content-space-between">
                                @if (!in_array($appointment->status, ['completed', 'cancelled']))
                                    <form action="{{ route('all-appointments.update', $appointment) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="a" value="a">
                                        <button class="button is-small p-0 px-2 is-success is-rounded">
                                            Complete
                                        </button>
                                    </form>
                                    <form action="{{ route('all-appointments.update', $appointment) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="a" value="c">
                                        <button class="button is-small p-0 px-2 is-danger is-rounded">
                                            Cancel
                                        </button>
                                    </form>
                                @else
                                    <button disabled="true" class="button is-small p-0 px-2 is-success is-rounded">
                                        Complete
                                    </button>
                                    <button disabled="true" class="button is-small p-0 px-2 is-danger is-rounded">
                                        Cancel
                                    </button>
                                @endif
                            </td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">
@endpush
@push('scripts')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>
@endpush

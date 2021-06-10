<div class="mt-5">
    <div wire:loading>
        <img src="/img/loading-buffering.gif" alt="" style="width:25px; height:25px;">
    </div>
    <div wire:ignore class="is-size-7 mb-2" style="display:flex; align-items: center; justify-content:flex-end;">
        <i data-feather="help-circle" class="mx-2"></i>
        Cancellation of booked appointment will be no longer allowed upon 24 hours.
    </div>
    <div class="table-container">
        <table class="table is-fullwidth is-bordered is-striped">
            <thead>
                <tr>
                    <th>
                        Date
                    </th>
                    <th>
                        Time
                    </th>
                    <th>
                        Dentist
                    </th>
                    <th>
                        Booked At
                    </th>
                    <th>
                        Status
                    </th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>
                            {{ $appointment->date }}
                        </td>
                        <td>
                            {{ \App\Models\Time::MAKEREADBLE($appointment->time->start) }} - {{ \App\Models\Time::MAKEREADBLE($appointment->time->end) }}
                        </td>
                        <td>
                            {{ $appointment->dentist->name }}
                        </td>
                        <td>
                            {{ $appointment->created_at->format('Y/m/d') }}
                        </td>
                        <td>
                            {{ $appointment->status }}
                        </td>
                        <td>
                            @if (!$appointment->is_finished)
                                @if ($appointment->is_cancellable)
                                    <form action="{{route('appointments.update', $appointment)}}" method="POST">
                                        @csrf 
                                        @method('PUT')
                                        <button class="button is-dark is-small is-rounded">
                                            Cancel
                                        </button>
                                    </form>
                                @else
                                    <form action="#" method="POST">
                                        <button class="button is-dark is-small is-rounded" disabled>
                                            Cancel
                                        </button>
                                    </form>
                                @endif
                            @else 
                                <button class="button is-success is-small is-rounded">
                                    Details
                                </button>
                            @endif
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

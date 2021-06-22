@extends('layouts.admin-main')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cancelled Appointment</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Dentist Incharge</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Date Cancelled</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Dentist Incharge</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Date Cancelled</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($appointments as $app)
                            <tr>
                                <td>{{ $app->unique_id }}</td>
                                <td>
                                    {{ $app->user->name }}
                                </td>
                                <td>
                                    {{ $app->dentist->name }}
                                </td>
                                <td>
                                    {{ $app->time ? \App\Models\Time::MAKEREADBLE($app->start_time).' - '.\App\Models\Time::MAKEREADBLE($app->end_time) : 'N/a' }}
                                </td>
                                <td>
                                    {{ $app->date }}
                                </td>
                                <td>
                                    {{ $app->updated_at->format('Y/m/d') }}
                                </td>
                                {{-- <td>
                                    <form action="{{ route('admin.appointments.destroy', $app) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            Remove
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    @livewireScripts
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @livewireStyles
@endpush


@extends('layouts.main')

@section('content')
    <div class="container">
        
        <div class="is-flex is-justify-content-space-between">
           
            <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
            <a class="button is-small is-info is-rounded has-icon" href="{{ route('dental-records.create') }}?user_id={{ $user->id }}" >
                <div class="icon">
                    <i data-feather="plus"></i>
                </div>
                <div>
                    New Record
                </div>
            </a>
        </div>
        <h2 class="title is-4" style="text-align: center">Dental Records</h2>
        @if ($latest != null)
        <div class="box">
            <h2 class="title is-5">Latest Record</h2>
            <div class="table-container">
                <table class="table is-narrow is-bordered is-fullwidth">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Dentist
                            </th>
                            <th>
                                Injured / Affected Tooth (or Teeth)
                            </th>
                            <th>
                                Date of Initial Symptoms
                            </th>
                            <th>
                                Symptoms
                            </th>
                            <th>
                                Dental Work Carried Out
                            </th>
                            <th>
                                Date of Dental Work
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $latest->unique_id }}
                            </td>
                            <td>
                                {{ $latest->dentist->name }}
                            </td>
                            <td>
                                {{ $latest->injured }}
                            </td>
                            <td>
                                {{ $latest->date_of_initial_symptoms }}
                            </td>
                            <td>
                                {{ $latest->symptoms }}
                            </td>
                            <td>
                                {{ $latest->dental_work_carried_out }}
                            </td>
                            <td>
                                {{ $latest->date_of_dental_work }}
                            </td>
                            <td>
                                {{ $latest->amount }}
                            </td>
                            <td>
                                {{ $latest->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        
        <div class="block">
            <table class="table is-narrow is-bordered is-fullwidth" id="matable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Dentist
                        </th>
                        <th>
                            Injured / Affected Tooth (or Teeth)
                        </th>
                        <th>
                            Date of Initial Symptoms
                        </th>
                        <th>
                            Symptoms
                        </th>
                        <th>
                            Dental Work Carried Out
                        </th>
                        <th>
                            Date of Dental Work
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->dentalRecords()->latest()->get() as $record)
                    <tr>
                        <td>
                            {{ $record->unique_id }}
                        </td>
                        <td>
                            {{ $record->dentist->name }}
                        </td>
                        <td>
                            {{ $record->injured }}
                        </td>
                        <td>
                            {{ $record->date_of_initial_symptoms }}
                        </td>
                        <td>
                            {{ $record->symptoms }}
                        </td>
                        <td>
                            {{ $record->dental_work_carried_out }}
                        </td>
                        <td>
                            {{ $record->date_of_dental_work }}
                        </td>
                        <td>
                            {{ $record->amount }}
                        </td>
                        <td>
                            {{ $record->created_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(function(){
            $('#matable').DataTable()
        })
    </script>
@endpush

@push('styles')
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@extends('layouts.admin-main')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Activity Log</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Causer</th>
                            <th>Subject ID</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Causer</th>
                            <th>Subject ID</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach ($activities as $activity)
                           <tr>
                               <td>
                                   {{ $activity->id }}
                               </td>
                               <td>
                                    {{ $activity->causer_id }}
                                </td>
                                <td>
                                    {{ $activity->subject_id}}
                                </td>
                                <td>
                                    {{ $activity->description }}
                                </td>
                                <td>
                                    {{ $activity->created_at }}
                                </td>
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


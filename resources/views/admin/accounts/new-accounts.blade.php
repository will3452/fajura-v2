@extends('layouts.admin-main')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Accounts Subject for Approval</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Sex</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Sex</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->profile->phone }}
                                </td>
                                <td>
                                    {{ $user->profile->sex }}
                                </td>
                                <td>
                                    {{ $user->profile->address }}
                                </td>
                                <td>
                                    {{ $user->created_at->format('m-d-y') }}
                                </td>
                                <td class="d-flex justify-content-between">
                                    <form action="{{ route('admin.account.list_of_all_new_patients.update', $user) }}?q=a" method="POST">
                                        @csrf
                                        <button class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.account.list_of_all_new_patients.update', $user) }}?q=d" method="POST" >
                                        @csrf
                                        <button class="btn btn-danger">Decline</button>
                                    </form>
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
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
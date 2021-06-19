@extends('layouts.admin-main')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Promo &amp; Packages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Remarks</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Discount</th>
                            <th>Remarks</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($packages as $package)
                            <tr>
                                <td>
                                    {{ $package->unique_id }}
                                </td>
                                <td>
                                    {{ $package->name }}
                                </td>
                                <td>
                                    {{ $package->discount_rate }}%
                                </td>
                                <td>
                                    {{ $package->remarks }}
                                </td>
                                <td>
                                    {{ $package->start_date }}
                                </td>
                                <td>
                                    {{ $package->end_date }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.remove.package', $package) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.show.package', $package) }}" class="btn btn-success">
                                            show
                                        </a>
                                        <button class="btn btn-danger">
                                            remove
                                        </button>
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



@extends('layouts.admin-main')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Concerns</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Concern Type</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Concern Type</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($concerns as $concern)
                            <tr>
                                <td>
                                    {{ $concern->unique_id }}
                                </td>
                                <td>
                                    {{ $concern->email }}
                                </td>
                                <td>
                                    {{ $concern->concern_type }}
                                </td>
                                <td>
                                    {{ $concern->message }}
                                </td>
                                <td>
                                    @if (!$concern->is_resolved)
                                        <form action="{{ route('admin.concerns.update', $concern->id) }}" method="POST">
                                            @csrf 
                                            @method('PUT')
                                            <button class="btn btn-primary btn-sm">
                                                Mark as Solved!
                                            </button>
                                        </form>
                                    @else 
                                    <em>
                                        Solved!
                                    </em>
                                    @endif
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

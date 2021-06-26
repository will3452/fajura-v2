@extends('layouts.admin-main')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Services</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Price</th>
                            <th>Remarks</th>
                            <th>Enable/Disable</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Price</th>
                            <th>Remarks</th>
                            <th>Enable/Disable</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>
                                    {{ $service->name }}
                                </td>
                                <td>
                                    <a href="{{ $service->public_picture }}">{{ Str::limit($service->public_picture, 10) }}</a>
                                </td>
                                <td>
                                    {{ $service->price_formatted }}
                                </td>
                                <td>
                                    {{ $service->remarks }}
                                </td>
                                <td>
                                    @livewire('toggle-button', ['active'=>$service->active ,'service'=>$service], key($service->id))
                                </td>
                                <td>
                                    {{ $service->created_at->format('m/d/Y') }}
                                </td>
                                <td>
                                    <form id="form{{ $service->id }}" action="{{ route('admin.services.destroy', $service) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <form action="#" onsubmit="function(){
                                        e.preventDefault();
                                        let ans = confirm('Are you sure do you want to delete this service?');
                                        $('#form{{ $service->id }}').submit();
                                    }"  class="d-flex justify-content-between">
                                        
                                        <a href="{{ route('admin.services.edit', $service) }}" class="btn  btn-sm btn-primary">Edit</a>
                                        <button class="btn btn-danger btn-sm ">Delete</button>
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
    @livewireScripts
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    @livewireStyles
@endpush


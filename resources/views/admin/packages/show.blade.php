@extends('layouts.admin-main')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Inclusive services
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <form action="{{ route('admin.update.service.package') }}" method="POST">
                        @csrf
                        <div class="form-select input-group">
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <select name="id" id="" class="custom-select" required>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name.' - '.$service->price }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Orig. Price</th>
                            <th>Discounted Price</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Orig. Price</th>
                            <th>Discounted Price</th>
                            <th>Option</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($package->services as $p)
                            <tr>
                                <td>
                                    {{ $p->uniq_id }}
                                </td>
                                <td>
                                    {{ $p->name }}
                                </td>
                                <td>
                                    P {{ number_format($p->price , 2)}}
                                </td>
                                <td>
                                    P {{ number_format($p->discount_price, 2) }}
                                </td>
                                <td>
                                    <form action="{{ route('admin.update.service.package') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <button class="btn btn-danger btn-sm">
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Package Details
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>
                            Package Name
                        </th>
                        <td>
                            {{ $package->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Package Discount Rate
                        </th>
                        <td>
                            {{ $package->discount_rate }}%
                        </td>
                        
                    </tr>
                    <tr>
                        <th>
                            Remarks
                        </th>
                        <td>
                            {{ $package->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date Range
                        </th>
                        <td>
                            {{ $package->start_date.'-'.$package->end_date }}
                        </td>
                    </tr>
                </table>
            </div>
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Add new Packages
        </div>
        <div class="card-body">
            <form action="{{ route('admin.save.package') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Package Name" class="form-control" name="name" required>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="col-6">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" max="100" placeholder="Discount Rate - eg. 30" class="form-control" name="discount_rate" required>
                </div>
                <div class="form-group">
                    <textarea name="remarks" required class="form-control" placeholder="Remarks here"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Submit
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fa fa-sync"></i>
                        Reset
                    </button>
                </div>
                
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush

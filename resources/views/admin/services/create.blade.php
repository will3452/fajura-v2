@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Service Creation
        </div>
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="eg. Implants">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" required placeholder="eg. 1000">
                </div>
                <div class="form-group">
                    <label for="">Picture</label>
                    <input type="file" name="picture" class="d-block" required>
                </div>
                <div class="form-group">
                    <label for="">Remarks</label>
                    <textarea name="remarks" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Save
                    </button>
                    <button type="reset" class="btn btn-dark">
                        <i class="fa fa-sync"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

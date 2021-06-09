@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Service Creation
        </div>
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="eg. Implants" value="{{ $service->name }}">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" required placeholder="eg. 1000" value="{{ $service->price }}">
                </div>
                <div class="form-group">
                    <label for="">Picture</label>
                    <input type="file" name="picture" class="d-block" required>
                </div>
                <div class="form-group">
                    <label for="">Remarks</label>
                    <textarea name="remarks" id="" cols="30" rows="10" class="form-control" required>{{ $service->remarks }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Update
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

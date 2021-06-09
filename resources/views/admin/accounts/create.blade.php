@extends('layouts.admin-main')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        User Creation
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ route('admin.account.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">
                    Type of User
                </label>
                <select name="role" id="" class="custom-select">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">
                    Name
                </label>
                <input type="text" required name="name" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">
                    Email
                </label>
                <input type="text" required name="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">
                    Password
                </label>
                <input type="text" required name="password" class="form-control" value="{{ $password }}">
            </div>
            <div class="form-group">
                <label for="">
                    Address
                </label>
                <input type="text" style="text-transform: lowercase" required name="address" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">
                    Birthdate
                </label>
                <input type="date" required name="birthdate" class="form-control" value="">
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">
                        Phone
                    </label>
                    <input type="text" required name="phone" class="form-control" value="">
                </div>
                <div class="col-md-6">
                    <label for="">
                        Sex
                    </label>
                    <select name="sex" id="" class="custom-select">
                        <option value="Male" >Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">
                    Job
                </label>
                <input type="text" required name="job" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="">
                    Availability
                </label>
                <textarea name="availability" placeholder="No availality Found" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fa fa-save">
                    </i>
                    Save
                </button>
                <button type="reset" class="btn btn-dark">
                    <i class="fa fa-sync">
                    </i>
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
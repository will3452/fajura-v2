@extends('layouts.admin-main')

@section('content')
    <div class="card">
        <div class="card-header">
            Account Setting
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.account.save') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" disabled class="form-control" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" required class="form-control" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="">Change Password</label>
                    <div class="input-group">
                        <input type="password"  required id="password" name="password" class="form-control" value="">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="passwordToggler" type="button">
                                Hide/Show
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success mr-2">
                        <i class="fa fa-check"></i>
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
    <script>
        $(function(){
            let isShow = false;
            $('#passwordToggler').click(function(){
                isShow = !isShow;
                $('#password').prop('type', isShow ? 'text':'password');
            });
        })
    </script>
@endpush
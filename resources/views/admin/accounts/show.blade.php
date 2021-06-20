@extends('layouts.admin-main')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.account.patient_accounts.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">
                                Name
                            </label>
                            <input type="text" required name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input type="text" required name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Address
                            </label>
                            <input type="text" style="text-transform: lowercase" required name="address" class="form-control" value="{{ $user->profile->address }}">
                        </div>
                        <div class="form-group">
                            <label for="">
                                Birthdate
                            </label>
                            <input type="text" required name="birthdate" class="form-control" value="{{ $user->profile->birthdate }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">
                                    Phone
                                </label>
                                <input type="text" required name="phone" class="form-control" value="{{ $user->profile->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">
                                    Sex
                                </label>
                                <select name="sex" id="" class="custom-select">
                                    <option value="Male" {{ $user->profile->sex == 'Male' ? 'selected':''}}>Male</option>
                                    <option value="Female" {{ $user->profile->sex == 'Female' ? 'selected':''  }}>Female</option>
                                </select>
                            </div>
                        </div>
                        @if (!$user->hasRole('dentist'))
                            <div class="form-group">
                                <label for="">
                                    Job
                                </label>
                                <input type="text" required name="job" class="form-control" value="{{ $user->profile->job ?? 'N/a' }}">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    Availability
                                </label>
                                <textarea name="availability" placeholder="No availality Found" id="" cols="30" rows="5" class="form-control">{{ $user->profile->availability ?? 'N/a' }}</textarea>
                            </div>
                      
                        @endif
                        <div class="form-group">
                            <button class="btn btn-primary">
                                <i class="fa fa-save">
                                </i>
                                Save Changes
                            </button>
                            <a href="{{ url()->current() }}" class="btn btn-dark">
                                <i class="fa fa-sync">
                                </i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            @if ($user->hasRole('dentist'))
            <div class="card">
                <div class="card-header">
                    Schedules
                </div>
                <div class="card-body">
                   <table class="table table-bordered" id="schedTable">
                       <thead>
                           <tr>
                               <td>
                                   ID
                               </td>
                               <td>
                                   Day
                               </td>
                               <td>
                                   Time
                               </td>
                           </tr>
                       </thead>
                    <tbody>
                        @foreach ($user->times as $time)
                            <tr>
                                <td>
                                    {{ $time->unique_id }}
                                </td>
                                <td>
                                    {{ $time->day()->name }}
                                </td>
                                <td>
                                    {{ $time->makeReadable($time->start).' - '.$time->makeReadable($time->end) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                   </table>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Profile Picture
                </div>
                
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <img src="{{ $user->public_picture != '/storage/profile/' ? $user->public_picture:  "https://ui-avatars.com/api/?size=128&background=random&name=".$user->name  }}" }}" style="width:150px; height:150px; border-radius:50%;object-fit:cover;" alt="profile iamge" >
                    </div>
                    <div class="text-center text-uppercase mt-2">
                        {{ $user->roles()->first()->name }}
                    </div>
                    <div class="text-center mt-2">
                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-paper-plane"></i>
                                Send Password Reset
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    Mail
                </div>
                <div class="card-body">
                    <form action="/admin/send-email" method="POST">
                        @csrf
                        <input type="hidden" name="email" required value="{{ $user->email }}">
                        <textarea name="message" required id="message"></textarea>
                        <button class="btn btn-success btn-sm mt-2">
                            <i class="fa fa-paper-plane"></i>
                            Send
                        </button>
                    </form>
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
    <script>
        $(function(){
            $('#schedTable').DataTable();
        })
    </script>
    @include('includes.trumbowg')
    <script>
        $('#message').trumbowyg()
    </script>
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
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
    <div class="card mt-2">
        <div class="card-header">
            App Setting
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.app.save') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Brand Name</label>
                    <input type="text" class="form-control" required name="brand_name" value="{{ $appSetting->brand_name }}">
                </div>
                <div class="form-group">
                    <label for="">Brand Logo link</label>
                    <input type="text"
                    class="form-control"
                    
                    name="brand_logo"
                    placeholder="your uploaded logo over your social media account, please copy the image link and paste on it"
                    value="{{ $appSetting->brand_logo }}">
                </div>
                <div class="form-group">
                    <label for="">Brand Tagline</label>
                    <input type="text" class="form-control" required name="brand_saying" value="{{ $appSetting->brand_saying }}">
                </div>
                <div class="form-group">
                    <label for="">Google Map Link</label>
                    <input type="text" class="form-control" name="map_url" value="{{ $appSetting->map_url }}">
                </div>
                <div class="form-group">
                    <label for="">Facebook Page Link</label>
                    <input type="text" class="form-control" name="fb_page_url" value="{{ $appSetting->fb_page_url }}">
                </div>
                <div class="form-group">
                    <label for="">Messenger Link</label>
                    <input type="text" class="form-control" name="messenger_url" value="{{ $appSetting->messenger_url }}">
                </div>
                <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="text" class="form-control" name="tel" value="{{ $appSetting->tel }}">
                </div>
                <div class="form-group">
                    <label for="">Mobile number</label>
                    <input type="text" class="form-control" name="phone" value="{{ $appSetting->phone }}">
                </div>
                <div class="form-group">
                    <label for="">About Page Link</label>
                    <input type="text" class="form-control" name="about_url" value="{{ $appSetting->about_url }}">
                </div>
                <div class="form-group">
                    <label for="">About Page Excerpt</label>
                    <textarea name="about_excerpt"
                    class="form-control"
                    placeholder="eg. XXXX Clinic started operating in 2017 and it is located inside of Loving Mother General Hospital and Diagnostic Inc. in San Nicolas, Tarlac City."
                    >{{ $appSetting->about_excerpt??'' }}</textarea>
                </div>
                <button class="btn btn-success mr-2">
                    <i class="fa fa-check"></i>
                    Submit
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="fa fa-sync"></i>
                    Reset
                </button>
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
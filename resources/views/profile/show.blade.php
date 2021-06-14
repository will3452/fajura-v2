@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="is-flex is-justify-content-space-between">
           
            <a href="{{ route('home') }}" class="button is-small is-rounded has-icon">
                <div class="icon">
                    <i data-feather="arrow-left"></i>
                </div>
            </a>
            <a class="button is-small is-dark is-rounded has-icon" href="{{ route('settings') }}?user_id={{ $user->id }}" >
                <div class="icon">
                    <i data-feather="settings"></i>
                </div>
                <div>
                    Settings
                </div>
            </a>
        </div>
        <div class="columns">
            <div class="column is-3 is-flex is-flex-direction-column is-align-items-center">
                <img style="border-radius: 50%; object-fit:cover;height:200px; width:200px;" id="image" src="
                
                @if ($user->profile->picture)
                {{$user->public_picture}}
                @else
                https://ui-avatars.com/api/?size=128&background=random&name={{ $user->name }}
                @endif
                " alt="">
                @if ($user->id == auth()->user()->id)
                <div class="block mt-2" style="text-align:center" x-data="{
                    editMode:false,
                    updatePicture(){
                        let file = this.$refs.iimage.files[0];
                        document.getElementById('image').src = URL.createObjectURL(file);
                    }
                }">
                    <template x-if.transition="!editMode">
                        <a href="#" x-on:click.prevent="editMode = true" class="button is-small is-rounded">
                            <div class="icon">
                                <i data-feather="edit-2"></i>
                            </div>
                            <div>
                                Change Image
                            </div>
                        </a>
                    </template>
                    <template x-if.transition="editMode">
                        <form action="/profile-picture/{{$user->id}}" class="is-flex is-flex-direction-column is-align-items-center" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" required x-ref="iimage" name="picture" accept="image/*" x-on:change="updatePicture()">
                            <div class="block mt-4">
                                <button class="mx-2 button is-small is-success is-rounded">
                                    Save
                                </button>
                                <button type="button" x-on:click="editMode = false" class="mx-2 button is-small is-dark is-rounded">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </template>
                    
                </div>
                @endif
                <div class="block is-fullwidth">
                    <div class="is-size-7">
                        Joined at
                    </div>
                    <div class="is-size-6">
                        {{$user->created_at->format('m/d/y')}}
                    </div>
                </div>
                @if (auth()->user()->hasRole('dentist') || auth()->user()->id == $user->id)
                    <div class="block">
                        <a class="button is-small is-text is-rounded" href="{{ route('dental-records.show', $user->id) }}">View Dental Records</a>
                    </div>
                    <div class="block">
                        <a class="button is-small is-text is-rounded" href="{{ route('medical-history.show', $user->id) }}">View Medical Records</a>
                    </div>
                @endif
            </div>
            <div class="column is-9">
                <form action="{{ auth()->user()->id == $user->id ? route('profile.update', $user->id) : '#' }}" method="POST">
                    @csrf
                    @if (auth()->user()->id == $user->id)
                        @method('PUT')
                    @endif
                    <div class="field">
                        <label for="" class="label">Name</label>
                        <div class="control">
                            <input type="text" disabled value="{{$user->name}}" class="input is-small">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Email</label>
                        <div class="control">
                            <input type="text" disabled value="{{$user->email}}" class="input is-small">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Phone</label>
                        <div class="control">
                            <input type="text" disabled value="+63{{$user->profile->phone}}" class="input is-small">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Sex</label>
                        <div class="control">
                            <input type="text" class="input is-small" disabled value="{{$user->profile->sex}}"/>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Birthdate</label>
                        <div class="control">
                            <input type="text" disabled class="input is-small" value="{{$user->profile->birthdate}}">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Address</label>
                        <div class="control">
                            <input type="text" class="input is-small" style="text-transform:capitalize" disabled value="{{strtolower($user->profile->address)}}">
                        </div>
                    </div>
                    @if (auth()->user()->id == $user->id)

                    <div class="field">
                        <label for="" class="label">Job title</label>
                        <div class="control">
                            <input type="text" class="input is-small" style="text-transform:capitalize" name="job" value="{{ $user->profile->job }}" placeholder="eg. Programmer">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Availability <small class="is-text-7 is-text-light">( days / time )</small></label>
                        <div class="control">
                            <textarea name="availability" id="" class="textarea is-small" placeholder=" Monday 9:00am - 1:00pm, Tuesday Whole Day">{{ $user->profile->availability }}</textarea>
                        </div>
                    </div>
                    <div class="field" style="text-align:right;">
                        <button class="button is-rounded is-small has-icon">
                            <div class="icon">
                                <i data-feather="save"></i>
                            </div>
                            <div>
                                Save Changes
                            </div>
                        </button>
                    </div>
                    @else 
                    <div class="field">
                        <label for="" class="label">Job title</label>
                        <div class="control">
                            <input type="text" class="input is-small" style="text-transform:capitalize" disabled value="{{ $user->profile->job ?? 'N/a' }}" placeholder="eg. Programmer">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Availability <small class="is-text-7 is-text-light">( days / time )</small></label>
                        <div class="control">
                            <textarea id="" disabled class="textarea">{{ $user->profile->availability?? 'N/a' }}</textarea>
                        </div>
                    </div>

                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
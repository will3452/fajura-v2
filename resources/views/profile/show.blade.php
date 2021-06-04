@extends('layouts.main')
@section('content')
    <div class="container">
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
                            <input type="file" required x-ref="iimage" name="picture" x-on:change="updatePicture()">
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
                @if (auth()->user()->id == $user->id || auth()->user()->is_admin || auth()->user()->hasRole('dentist'))
                    <div class="block">
                        <a href="{{ route('dental-records.show', $user->id) }}?validate={{ \Hash::make($user->id) }}" class="button is-small is-rounded is-info">
                            My Teeth
                        </a>
                    </div>
                @endif
            </div>
            <div class="column is-9">
                <form action="">
                    <div class="field">
                        <label for="" class="label">Name</label>
                        <div class="control">
                            <input type="text" disabled value="{{$user->name}}" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Email</label>
                        <div class="control">
                            <input type="text" disabled value="{{$user->email}}" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Email</label>
                        <div class="control">
                            <input type="text" disabled value="+63{{$user->profile->phone}}" class="input">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Sex</label>
                        <div class="control">
                            <input type="text" class="input" disabled value="{{$user->profile->sex}}"/>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Birthdate</label>
                        <div class="control">
                            <input type="text" disabled class="input" value="{{\Carbon\Carbon::parse($user->profile->birthdate)->format('m-d-Y')}}">
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Address</label>
                        <div class="control">
                            <input type="text" class="input" style="text-transform:capitalize" disabled value="{{strtolower($user->profile->address)}}">
                        </div>
                    </div>
                    <div class="field" style="text-align:right;">
                        <a href="#" onclick="alert('editing information is currently not allowed!')" class="button is-rounded is-small has-icon">
                            <div class="icon">
                                <i data-feather="edit"></i>
                            </div>
                            <div>
                                Edit Information
                            </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
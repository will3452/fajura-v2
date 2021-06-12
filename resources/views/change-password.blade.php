@extends('layouts.main')

@section('content')
<div class="container">
    <div class="is-flex is-justify-content-space-between">
        <a href="{{ route('settings') }}" class="button is-small is-rounded has-icon">
            <div class="icon">
                <i data-feather="arrow-left"></i>
            </div>
        </a>
    </div>
    <h2 class="title is-4" style="text-align:center">
        Change Password
    </h2>
    <div class="block">
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <form action="{{ route('store.password') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="" class="label">Old password</label>
                        <div class="control">
                            <input type="password" name="old_password" class="input is-small" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">New Password</label>
                        <div class="control" x-data="{
                            passwordShow:false, 
                            changePasswordType(){
                                this.passwordShow = !this.passwordShow;
                                this.passwordShow ? this.$refs.pinput.type='text' : this.$refs.pinput.type='password';
                                this.$refs.pinput.focus();
                            }
                        }">
                            <input type="password" name="password" x-ref="pinput" class="input is-small" required>
                            <div style="text-align:right">
                                <template x-if="!passwordShow" >
                                    <a x-on:click.prevent="changePasswordType()" class="help">show password</a>
                                </template>
                                <template x-if="passwordShow" >
                                    <a x-on:click.prevent="changePasswordType()" class="help">hide password</a>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="field" x-data="{
                        passwordShow:false, 
                        changePasswordType(){
                            this.passwordShow = !this.passwordShow;
                            this.passwordShow ? this.$refs.pinput.type='text' : this.$refs.pinput.type='password';
                            this.$refs.pinput.focus();
                        }
                    }">
                        <label for="" class="label">Confirm Password</label>
                        <div class="control">
                            <input type="password" name="password_confirmation"  x-ref="pinput" class="input is-small" required>
                            <div style="text-align:right">
                                <template x-if="!passwordShow" >
                                    <a x-on:click.prevent="changePasswordType()" class="help">show password</a>
                                </template>
                                <template x-if="passwordShow" >
                                    <a x-on:click.prevent="changePasswordType()" class="help">hide password</a>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <button class="button is-small is-info is-rounded" type="submit">save</button>
                        <button class="button is-small is-dark is-rounded" type="reset">reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

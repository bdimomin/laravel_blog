@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Update Profile
        </div>
        <div class="panel-body">

            <form action="{{ route('profileUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username"> Enter a Username</label>
                    <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ $profile->name }}"  autofocus>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email"> Enter your email</label>
                    <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $profile->email }}"  autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password"> Enter your password</label>
                    <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" autofocus required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="avatar"> Enter your Avatar</label>
                    <input type="file" id="avatar" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" value=""  autofocus>
                    @if ($errors->has('avatar'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="bio"> Enter your bio</label>
                    <textarea name="bio" id="bio" cols="30" rows="5" class="form-control">{{ $profile->profile['bio'] }}</textarea>
                    @if ($errors->has('bio'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="facebook"> Facebook</label>
                    <input type="url" id="facebook" name="facebook" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" value="{{$profile->profile['facebook'] }}"  autofocus>
                    @if ($errors->has('facebook'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="youtube"> Youtube</label>
                    <input type="url" id="youtube" name="youtube" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" value="{{$profile->profile['youtube'] }}"  autofocus>
                    @if ($errors->has('youtube'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-block btn-primary">
                </div>

            </form>
        </div>
    </div>
@stop

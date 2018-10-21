@extends('layouts.app')

@section('content')

    <div class="panel panel-default">


        <div class="panel-heading text-center">
            Settings
        </div>

        <div class="panel-body">
            @if(count($settings)>0)
               @foreach($settings as $setting)
            <form action="{{ route('updateSettings',['id'=>$setting->id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="{{ $setting->id }}">

                </div>
                <div class="form-group">
                    <label for="title"> Enter the Site title</label>
                    <input type="text" id="site_title" name="site_title" class="form-control" value="{{ $setting->site_title }}" autofocus>

                </div>
                <div class="form-group">
                    <label for="title"> Enter the site About</label>
                    <textarea name="site_about" id="site_about" class="form-control" cols="30" rows="5">{{ $setting->site_about }}</textarea>

                </div>
                <div class="form-group">
                    <label for="title"> Contact Number</label>
                    <input type="number" id="contact_number" name="contact_number" class="form-control" value="{{ $setting->contact_number }}" autofocus>

                </div>

                <div class="form-group">
                    <label for="title"> Email Address</label>
                    <input type="email" id="email_address" name="email_address" class="form-control" value="{{ $setting->email_address }}" autofocus>

                </div>
                <div class="form-group">
                    <label for="description"> Address</label>
                    <textarea type="text" id="address" name="address" class="form-control" rows="5" autofocus>{{ $setting->address }}</textarea>

                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-block btn-primary">
                </div>

            </form>
                @endforeach
            @endif
        </div>
    </div>
@stop
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">

@stop



@section('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 200
        });
    </script>


@stop

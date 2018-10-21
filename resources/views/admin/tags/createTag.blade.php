@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create Tags
        </div>
        <div class="panel-body">

            <form action="{{ route('saveTag') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category"> Enter the Tag name</label>
                    <input type="text" id="tag" name="tag" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" value="{{ old('tag') }}" required autofocus>
                    @if ($errors->has('tag'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tag') }}</strong>
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

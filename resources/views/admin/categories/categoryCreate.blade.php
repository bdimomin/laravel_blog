@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create Category
        </div>
        <div class="panel-body">

            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category"> Enter the category name</label>
                    <input type="text" id="category" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}" required autofocus>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
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

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Update Tag
        </div>
        <div class="panel-body">

            <form action="{{ route('updateTag',['$id'=>$tag->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category"> Enter the tag name</label>
                    <input type="hidden" value="{{ $tag->id }}" name="id">
                    <input type="text" id="tag" name="tag" value="{{ $tag->tag }}" class="form-control">

                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-block btn-primary" value="update">
                </div>

            </form>
        </div>
    </div>
@stop

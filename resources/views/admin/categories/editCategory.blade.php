@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Update Category
        </div>
        <div class="panel-body">

            <form action="{{ route('category.update',['$id'=>$category->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category"> Enter the category name</label>
                    <input type="hidden" value="{{ $category->id }}" name="id">
                    <input type="text" id="category" name="category" value="{{ $category->name }}" class="form-control">

                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-block btn-primary" value="update">
                </div>

            </form>
        </div>
    </div>
@stop

@extends('layouts.app')

@section('content')
    <h2 class="text-center">Tags</h2>

    <a href="{{ route('createTag') }}" class="btn btn-lg btn-primary float-right"> Create Tag</a>
    <div class="row">
        <div class="col-md-12 text-center">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Well Done!</strong> {{ Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
    @if(count($tags) > 0)
        <table class="table table-striped">
            <tr class="text-center">
                <th>Tags</th>
                <th>Action</th>
            </tr>
            @foreach($tags as $tag)
                <tr class="text-center">
                    <td> {{ $tag->tag }}</td>
                    <td><a href="{{ route('editTag',['id'=>$tag->id]) }}" class="btn btn-warning btn-sm"> Edit</a>
                        <a href="{{ route('deleteTag',['id'=>$tag->id]) }}" class="btn btn-danger btn-sm"> Delete</a></td>
                </tr>
            @endforeach

        </table>
        @else
            <h3 class="text-center"> No Tags Found</h3>
    @endif
@stop

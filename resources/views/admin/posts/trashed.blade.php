@extends('layouts.app')

@section('content')
    <h3 class="text-center"> Trashed Posts</h3>
    <hr>

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
    @if (count($deletedPosts)>0)
    <table class="table table-striped">
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Action</th>
        </tr>

        @forelse($deletedPosts as $deletedPost)
            <tr>
                <td><img src="{{ $deletedPost->featured }}" alt=" {{$deletedPost->title}}" width="150" height="150" class="img img-thumbnail"></td>
                <td> {{$deletedPost->title}}</td>
                <td><a href="{{ route('restorePost',['id'=>$deletedPost->id]) }}" class="btn btn-warning btn-sm"> Restore</a>
                    <a href="{{ route('killPost',['id'=>$deletedPost->id]) }}" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure want to delete the post permanently?')"> Destroy</a></td>
            </tr>
        @empty

        @endforelse
    </table>
    @else
        <h3 class="text-center">No Trashed Post Found</h3>
    @endif
@stop

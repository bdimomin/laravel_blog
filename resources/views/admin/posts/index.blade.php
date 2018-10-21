@extends('layouts.app')

@section('content')
    <h3 class="text-center"> All Posts</h3>
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
    @if (count($posts)>0)

   <table class="table table-striped">
       <tr>
           <th>Image</th>
           <th>Title</th>
           <th>Action</th>
       </tr>

       @forelse($posts as $post)
            <tr>
                <td><img src="{{ $post->featured }}" alt=" {{$post->title}}" class="img img-thumbnail" width="150" height="150"></td>
                <td> {{$post->title}}</td>
                <td><a href="{{route('post.edit',['id'=>$post->id]) }}" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="{{ route('post.trash',['id'=>$post->id]) }}" class="btn btn-danger btn-sm"> Trash</a></td>
            </tr>
           @empty

       @endforelse
   </table>
        @else
        <h3 class="text-center"> No Posts Found</h3>
    @endif
@stop

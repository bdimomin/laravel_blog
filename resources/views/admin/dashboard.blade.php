@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
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

           <div class="row">
               <div class="col-md-3">
                   <div class="card text-white bg-primary">
                       <div class="card-header text-center">Posted</div>

                       <div class="card-body">
                            <h3 class="text-center">{{ $allPosts }}</h3>
                       </div>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="card text-white bg-danger">
                       <div class="card-header text-center">Trashed Post</div>

                       <div class="card-body">
                            <h3 class="text-center">{{ $trashedPosts }}</h3>
                       </div>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="card text-white bg-info">
                       <div class="card-header text-center">Categories</div>

                       <div class="card-body">
                            <h3 class="text-center">{{ $categories }}</h3>
                       </div>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="card text-white bg-success">
                       <div class="card-header text-center">Tags</div>

                       <div class="card-body">
                            <h3 class="text-center">{{ $tags }}</h3>
                       </div>
                   </div>
               </div>
           </div>

@endsection

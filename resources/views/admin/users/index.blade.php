@extends('layouts.app')

@section('content')
    <h3 class="text-center float-left"> All User </h3>

    <a href="{{ route('createUser') }}" class="float-right btn btn-primary"> Create User </a>
    <br>
    <br>
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
    @if (count($users)>0)

        <table class="table table-striped">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Permission</th>
                <th>Delete</th>
            </tr>

            @forelse($users as $user)
                <tr>
                    <td><img src="{{ asset($user->profile['avatar'])}}" alt="Avatar Image" style="border-radius: 50%" class="img img-thumbnail" width="100" height="100"></td>
                    <td> {{$user->name }}</td>
                    <td>
                        @if($user->admin)
                            <a href="{{ route('removeAdmin',['id'=>$user->id]) }}" class="btn btn-danger btn-sm"> Remove Admin</a>
                        @else
                            <a href="{{ route('makeAdmin',['id'=>$user->id]) }}" class="btn btn-primary btn-sm">Make admin</a>
                        @endif

                    </td>
                    <td>
                        @if(Auth::user()->id !== $user->id)
                            <a href="{{ route('userDelete',['id'=>$user->id]) }}" class="btn btn-primary btn-sm">Destroy</a>
                        @endif


                </tr>
            @empty

            @endforelse
        </table>
    @else
        <h3 class="text-center"> No Posts Found</h3>
    @endif
@stop

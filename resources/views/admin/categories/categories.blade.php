@extends('layouts.app')

@section('content')
    <h2 class="text-center">Categoies</h2>


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

    <table class="table table-striped">
        <tr class="text-center">
            <th>Categories</th>
            <th>Action</th>
        </tr>


        @forelse($categories as $category)
            <tr class="text-center">
                <td> {{ $category->name }}</td>
                <td><a href="{{route('category.edit',['id'=>$category->id]) }}" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="{{ route('category.delete',['id'=>$category->id]) }}" class="btn btn-danger btn-sm"> Delete</a></td>
            </tr>
            @empty
                No category found
        @endforelse



    </table>

@stop

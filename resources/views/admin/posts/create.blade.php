@extends('layouts.app')

@section('content')

    <div class="panel panel-default">


        <div class="panel-heading text-center">
            Create new Post
        </div>
        <div class="panel-body">

            <form action="{{ route('PostStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title"> Enter the title</label>
                    <input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required autofocus>
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description"> Enter the Content</label>
                    <textarea type="text" id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" required autofocus></textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category"> Enter the Category</label>
                    <select id="category" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}" required autofocus>
                        <option value=""> Select the Category</option>
                      @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                    @endif

                </div>


                <div class="form-check">
                    <label class="form-check-label" for="tags">Select the tags</label> <br>
                    @foreach($tags as $tag)
                     <input type="checkbox" class="form-check-input" id="tags" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}<br>
                    @endforeach

                </div>
                <div class="form-group">
                    <label for="featured_image"> Featured Image</label>
                    <input type="file" id="featured_image" name="featured_image" class="form-control{{ $errors->has('featured_image') ? ' is-invalid' : '' }}" value="{{ old('featured_image') }}" required autofocus>
                    @if ($errors->has('featured_image'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('featured_image') }}</strong>
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

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">


        <div class="panel-heading text-center">
           Edit Post

        </div>
        <div class="panel-body">

            <form action="{{ route('postUpdate',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data" name="postupdate">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $post->id }}">
                </div>
                <div class="form-group">
                    <label for="title"> Enter the title</label>
                    <input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $post->title }}" autofocus>

                </div>
                <div class="form-group">
                    <label for="description"> Enter the Content</label>
                    <textarea type="text" id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="5" autofocus>{{ $post->content }}</textarea>

                </div>
                <div class="form-group">
                    <label for="category"> Enter the Category</label>
                    <select id="category" name="categorySelect" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"  autofocus required>
                            <option>Select the Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"

                             @if ($post->category_id == $category->id)
                                 selected
                             @endif

                            >{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-check">
                    <label class="form-check-label" for="tags">Select the tags</label> <br>
                    @foreach($tags as $tag)
                        <input type="checkbox" class="form-check-input" id="tags" name="tags[]" value="{{ $tag->id }}"
                        @foreach ($post->tags as $t)
                            @if ($tag->id == $t->id)
                                checked
                            @endif
                        @endforeach

                        >{{ $tag->tag }}<br>
                    @endforeach

                </div>
                <div class="form-group">
                    <label for="featured_image"> Featured Image</label>
                    <input type="file" id="featured_image" name="featured_image" class="form-control{{ $errors->has('featured_image') ? ' is-invalid' : '' }}"  autofocus>

                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-block btn-primary">
                </div>

            </form>
        </div>
    </div>

@stop

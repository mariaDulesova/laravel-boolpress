@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.posts.update', $post->id)  }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Please enter the title..." name="title" value="{{ old('title', $post->title) }}">

            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ old('content', $post->content) }}</textarea>
        </div>
    </form>
    <div>
        <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
        <button type="submit"class="btn btn-success">SAVE</button>
    </div>
</div>
    
@endsection
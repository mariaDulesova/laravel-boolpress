@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Update {{ $post->title}}</h2>
    <form action="{{route('admin.posts.update', $post->id)  }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title" class="mt-4">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Please enter the title..." name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <p><small class="text-danger">{{ $message }}</small></p>
            @enderror

            <label for="content" class="mt-4">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10" name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p><small class="text-danger">{{ $message }}</small></p>
            @enderror
        </div>
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"> Back to Posts List </a>
            <button type="submit"class="btn btn-success">UPDATE</button>
        </div>
    </form>
    
</div>
    
@endsection
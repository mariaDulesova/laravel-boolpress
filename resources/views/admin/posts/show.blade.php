@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h2>
            {{$post->title}}
            @if ($post->category)
                <a href=" {{ route('admin.categories.show', $post->category->id) }}" class="badge badge-pill badge-info "> {{ $post->category->name}}</a>     
            @else
                <small class="badge badge-pill badge-info"> No category</small>
            @endif      
        </h2>
        <p> {{$post->slug}}</p>
        <p> {{$post->content}}</p>
        <div class="my-4 h5">
            @foreach ($post->tags as $tag)
                <a href=" {{ route('admin.tags.show', $tag->id) }}"><span class="badge badge-pill badge-success"> {{ $tag->name }}</span></a>
            @endforeach
        </div>
        <div>
            <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
            <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-warning">EDIT</a>
        </div>
    </div>
    

@endsection
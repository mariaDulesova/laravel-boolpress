@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h2>{{$post->title}}</h2>
        <p> {{$post->slug}}</p>
        <p> {{$post->content}}</p>
        <div>
            <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
            <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-warning">EDIT</a>
        </div>
    </div>
    

@endsection
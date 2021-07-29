@extends('layouts.app')
@section('content')
    <div class="container">
        <h2> All posts related to tag: {{ $tag->name}}</h2>
        <ul>
            @foreach ($tag->posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title}}</a>
                </li>   
            @endforeach
        </ul>
        <div>
            <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
       </div>
    </div>    
@endsection
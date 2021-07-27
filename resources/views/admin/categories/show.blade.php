@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- @dd($category->posts) --}}
        <h2> All posts related to category: {{ $category->name}}</h2>
        <ul>
            @foreach ($category->posts as $post)
                <li>
                    <a href="{{ route('admin.posts.show', $post->id)}}"> {{$post->title}} </a>
                </li>
            @endforeach
        </ul>
       <div>
            <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
       </div>

    </div>  
@endsection
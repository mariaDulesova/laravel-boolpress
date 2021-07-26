@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.posts.create')}}" class="btn btn-secondary"> New Article</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td> <a href="{{route('admin.posts.show', $post->id)}}"><i class="fas fa-binoculars fa-2x"></i></a> </td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}"><i class="fas fa-edit fa-2x"></i></a></td>
                        <td><i class="fas fa-trash-alt fa-2x"></i></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    
@endsection
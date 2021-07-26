@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
        @endif
        <div class="d-flex justify-content-between">
            <h2> Posts' List</h2>
            <a href="{{ route('admin.posts.create')}}" class="btn btn-secondary mb-4"> New Article</a>
        </div>
        
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
                        <td> 
                            <a href="{{route('admin.posts.show', $post->id)}}" class="btn"><i class="fas fa-binoculars fa-2x text-success"></i></a> 
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn"><i class="fas fa-edit fa-2x text-warning"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete {{$post->title}} ?')">
                                @csrf
                                @method('DELETE')
                               <button type="submit" class='btn'>
                                    <i class="fas fa-trash-alt fa-2x text-danger"></i>
                                </button>
                            </form>
                        </td>
                            
                    </tr>
                @endforeach

            </tbody>
        </table>
        
    </div>
    
@endsection
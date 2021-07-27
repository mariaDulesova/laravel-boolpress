@extends('layouts.app')

@section('content')
    <div class="container">
        <h2> Create New Post</h2>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title" class="mt-4">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Please enter the title..." name="title" value="{{ old('title') }}">
                @error('title')
                    <p> <small class="text-danger">{{ $message }} </small></p>
                @enderror

                <label for="content" class="mt-4">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10" name="content" placeholder="Please enter the text...">{{ old('content') }}</textarea>
                @error('content')
                    <p> <small class="text-danger">{{ $message }} </small></p>
                @enderror
                <div class="mt-4">
                    <label for="category_id">Category</label>
                    <div>
                        <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ ($category->id == old('category_id')) ? 'selected' :''}}>{{ $category->name }}</option>   
                            @endforeach
                        </select>
                        @error('category_id')
                            <p> <small class="text-danger">{{ $message }} </small></p>
                        @enderror
                    </div> 
                </div>   
            </div>
            <div>
                <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
                <button class="btn btn-success">CREATE</button>
            </div>
        </form>
        
    </div>
    
@endsection
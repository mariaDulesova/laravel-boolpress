@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolos</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Please enter the title..." name="title" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control @error('content') is-invalid @enderror" " id="exampleFormControlTextarea1" rows="3" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </form>
        <div>
            <a href="{{ route('admin.posts.index')}}" class="btn btn-secondary"> Back to Posts List </a>
            <button class="btn btn-success">CREATE</button>
        </div>
    </div>
    
@endsection
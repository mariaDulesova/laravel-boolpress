@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Update {{ $post->title}}</h2>
    <form action="{{route('admin.posts.update', $post->id)  }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PATCH')
        <div class="form-group">
            {{-- Post Title --}}
            <label for="title" class="mt-4">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Please enter the title..." name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <p><small class="text-danger">{{ $message }}</small></p>
            @enderror

            {{-- Post Content --}}
            <label for="content" class="mt-4">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10" name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p><small class="text-danger">{{ $message }}</small></p>
            @enderror

            {{-- Add Cover --}}
            @if ($post->cover)
                <img src=" {{ asset('storage/'.$post->cover)}}" alt="{{$post->title}}" width='150' class="mt-4">
            @else
                <p class="font-weight-bold mt-4"> No cover to display</p>
            @endif
            <div class="form-group mt-4">
                <label for="cover">Add Cover</label>
                <input type="file" class="form-control-file @error('cover') is-invalid @enderror" id="cover" name="cover" >
                @error('cover')
                    <p> <small class="text-danger">{{ $message }} </small></p>
                @enderror
            </div>

            {{-- Post Category --}}
            <div class="mt-4">
                <label for="category_id">Category</label>
                <div>
                    <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ ($category->id == old('category_id', $post->category_id )) ? 'selected' :''}}>{{ $category->name }}</option>   
                            {{-- al posto di $post->category_id, posso usare anche $category->name --}}
                        @endforeach
                    </select>
                    @error('category_id')
                        <p> <small class="text-danger">{{ $message }} </small></p>
                    @enderror
                </div> 
            </div>  

            {{-- Post Tag --}}
            <h6 class='mt-4'>Tags</h6>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    @if ($errors->any())
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' :'' }}>
                        {{-- Se eiste al meno un errore nella validazione di qualsiasi elemento del form ($error->any()), faccio scattare quanto sopra i.e. mantengo i valori inseriti --}}  
                    @else 
                        <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"
                        {{ $post->tags->contains($tag->id) ? 'checked' : ''}}>
                    @endif
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                </div>   
            @endforeach
            @error('tags')
                <p> <small class="text-danger">{{ $message }} </small></p>
            @enderror 
        </div>
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"> Back to Posts List </a>
            <button type="submit"class="btn btn-success">UPDATE</button>
        </div>
    </form>
    
</div>
    
@endsection
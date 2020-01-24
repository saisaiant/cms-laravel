@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create Post' }}
    </div>
    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')                
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ isset($post) ? $post->title : '' }}">
                @error('title')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ isset($post) ? $post->description : '' }}</textarea>
                @error('description')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="content"></trix-editor>
                @error('content')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="published_at">Published_at</label>
                <input type="text" id="published_at" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
                @error('published_at')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            @if (isset($post))
                <div class="form-group">
                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
                </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>           
            <div class="form-group">
                <button class="btn btn-success btn-sm" type="submit">                    
                    {{ isset($post) ? 'Update Post' : 'Create Post' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
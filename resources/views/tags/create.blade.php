@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit tag' : 'Create tag' }}
    </div>
    <div class="card-body">
        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST">
            @csrf
            @if (isset($tag))
                @method('PUT')                
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" 
                    value="{{ isset($tag) ? $tag->name : '' }}">
                @error('name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-sm">
                    {{ isset($tag) ? 'Update Tag' : 'Add Tag' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
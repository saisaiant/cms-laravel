@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">My Profile</div>

    <div class="card-body">
        <form action="{{ route('users.update-profile') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                @error('name')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="about">About Me</label>
                <textarea name="about" id="about" class="form-control @error('about') is-invalid @enderror" cols="5" rows="5">{{ $user->about }}</textarea>
                @error('about')
                    <div class="error invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection

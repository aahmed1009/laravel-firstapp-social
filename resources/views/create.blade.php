@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Create New Post</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title') }}">
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
        rows="5">{{ old('body') }}</textarea>
      @error('body')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
        value="{{ old('author') }}">
      @error('author')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="images">Image</label>
      <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images"
        value="{{ old('images') }}">
      @error('images')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
  </form>
</div>
@endsection
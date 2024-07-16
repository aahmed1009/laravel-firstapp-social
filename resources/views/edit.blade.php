@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Post</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $post->title) }}">
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
        rows="5">{{ old('body', $post->body) }}</textarea>
      @error('body')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
        value="{{ old('author', $post->author) }}">
      @error('author')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-success">Update Post</button>
  </form>
</div>
@endsection
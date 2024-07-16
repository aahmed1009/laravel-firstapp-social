@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->body }}</p>
  <p class="text-muted">Posted by {{ $post->author }} on {{ $post->created_at->format('M d, Y') }}</p>
  <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>

  <hr>
  <h3>Comments</h3>
  @foreach ($post->comments as $comment)
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">{{ $comment->user->name }}</h5>
      <p class="card-text">{{ $comment->body }}</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group" role="group">
          <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
          <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <hr>
  <h3>Leave a Comment</h3>
  <form action="{{ route('comments.store', $post->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="body">Comment</label>
      <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="3"></textarea>
      @error('body')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
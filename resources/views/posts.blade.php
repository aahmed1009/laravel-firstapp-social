@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="my-4 text-center">Posts</h1>
  <div class="d-flex justify-content-end mb-4">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      @foreach ($posts as $post)
      <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">{{ $post->title }}</h5>
        </div>
        <div class="card-body">
          <p class="card-text">{{ Str::limit($post->body, 150, '...') }}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>
            </div>
            <small class="text-muted">Posted by {{ $post->author }} on {{ $post->created_at->format('M d, Y') }}</small>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Read More</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
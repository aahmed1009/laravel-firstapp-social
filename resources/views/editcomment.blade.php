@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Edit Comment</h1>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('comments.update', $comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="body">Comment</label>
      <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
        rows="3">{{ old('body', $comment->body) }}</textarea>
      @error('body')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update Comment</button>
  </form>
</div>
@endsection
@extends('dashboard.templates.main')

@section('content')
<div class="col-lg-8 mb-5">
  <form method="post" action="/dashboard/post/{{ $post->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
      <div class="mb-2">
        <label for="caption" class="form-label">Caption</label>
        @error('caption')
        <p class="text-danger">
          {{ $message }}
        </p>
        @enderror
        <input id="caption" type="hidden" name="caption" value="{{ $post->caption }}" required>
        <trix-editor input="caption"></trix-editor>
      </div>
      @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3" width="250">
      @else
        <img class="img-preview img-fluid mb-3" width="250">
      @endif
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload Image</label>
        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImg()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
      </form>
</div>
@endsection
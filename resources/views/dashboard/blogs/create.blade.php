@extends('dashboard.templates.main')

@section('content')
<div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/blog" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <img class="img-preview img-fluid mb-3" width="250">
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Image</label>
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">
            {{ $message }}
          </p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
          <trix-editor input="body"></trix-editor>
        </div>
         
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
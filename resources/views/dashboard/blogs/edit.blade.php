@extends('dashboard.templates.main')

@section('content')
<div class="col-lg-8 mb-5">
    <form method="post" action="/dashboard/blog/{{ $blog->slug }}" enctype="multipart/form-data">
      @method('put')
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ $blog->title }}">
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ $blog->slug }}">
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        {{-- <input type="hidden" value="1" name="category_id"> --}}
        {{-- <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
              @if('category_id' == $category->id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
          </select>
        </div> --}}
        <div class="mb-3">
          <label for="formFile" class="form-label">Upload Image</label>
          {{-- @if($blog->image) --}}
            <img src="{{ asset('storage/'. $blog->image) }}" class="img-preview img-fluid mb-3 d-block" width="250">
          {{-- @else --}}
            {{-- <img class="img-preview img-fluid mb-3 d-block" width="250"> --}}
          {{-- @endif --}}

          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImg()">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">
            {{ $message }}
          </p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ $blog->body }}" required>
          <trix-editor input="body"></trix-editor>
        </div>
         
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@endsection
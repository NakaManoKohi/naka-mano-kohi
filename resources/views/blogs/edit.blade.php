@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0 h-full">
        <div class="card-header bg-brown text-white">
          <h3>Edit a Blog</h3>
        </div>
        <div class="card-body col-12">
          <form method="post" action="/blog/{{ $blog->id }}" enctype="multipart/form-data">
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
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="id" name="id_blog" required value="{{ $blog->id }}">
              <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                {{-- @if($blog->image) --}}
                  <img src="{{ asset('storage/'. $blog->image) }}" class="img-preview img-fluid mb-3 d-block" width="250">
                {{-- @else --}}
                  {{-- <img class="img-preview img-fluid mb-3 d-block" width="250"> --}}
                {{-- @endif --}}
                <input type="hidden" name="oldImage" value="{{ $blog->image }}">
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
      </section>
    </main>
    @include('components.aside')
  </div>
@endsection
@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0 h-full">
        <div class="card-header bg-brown text-white">
          <h3>Create a Blog</h3>
        </div>
        <div class="card-body col-12">
          <form method="post" action="/blog" enctype="multipart/form-data">
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
              <img class="img-preview img-fluid mb-3" width="250">
              <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImg()">
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
      </section>
    </main>
    @include('components.aside')
  </div>
@endsection
@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0 h-full">
        <div class="card-header bg-brown text-white">
          <h3>Create a Post</h3>
        </div>
        <div class="card-body col-12">
          <form method="post" action="/post" enctype="multipart/form-data" class="d-flex flex-wrap gap-3 col-12">
              @csrf
            <div class="gap-halfed-width">
              <img class="img-preview col-12 mb-3">
              <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImg()">
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="gap-halfed-width">
              <label for="caption" class="form-label">Caption</label>
              @error('caption')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="caption" type="hidden" name="caption" required>
              <trix-editor input="caption"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary col-12">Submit</button>
          </form>
        </div>
      </section>
    </main>
    @include('components.aside')
  </div>
@endsection
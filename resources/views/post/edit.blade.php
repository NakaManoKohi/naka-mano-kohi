@extends('templates.main')

@section('content')
    <div class="col-12 d-flex p-3">
        <main class="col-9 pe-2">
            <section class="col-12 bg-primary-grey card border-0">
            <div class="card-header bg-brown text-white">
                <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/post" class="text-decoration-none text-white">Post</a></h3>
            </div>
            <div class="card-body col-8 mx-auto" style="max-width: 800px">
                <form method="post" action="/post/{{ $post->id }}" enctype="multipart/form-data">
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
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
            </section>
        </main>    
    </div>
@endsection
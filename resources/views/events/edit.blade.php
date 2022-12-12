@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0 h-full">
        <div class="card-header bg-brown text-white">
          <h3>Edit an Event</h3>
        </div>
        <div class="card-body col-12">
          <form method="post" action="/event/{{ $event->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
              <div class="mb-3">  
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ $event->title }}">
                @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="id" name="id" required value="{{ $event->id }}">
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date', $event->date) }}">
                @error('date')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input type="hidden" name="oldImage" value="{{ $event->image }}">
                @if($event->image)
                  <img src="{{ asset('storage/'. $event->image) }}" class="img-preview img-fluid mb-3 d-block" width="250">
                @else
                  <img class="img-preview img-fluid mb-3 d-block" width="250">
                @endif
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
                <input id="body" type="hidden" name="body" value="{{ $event->body }}" required>
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
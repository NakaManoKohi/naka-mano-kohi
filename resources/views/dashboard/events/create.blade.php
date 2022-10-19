@extends('dashboard.templates.main')

@section('content')
<div class="col-lg-6 mb-5">
    <form method="post" action="/dashboard/event" enctype="multipart/form-data">
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
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
          @error('slug')
            <div class="invalid-fe  edback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required value="{{ old('date') }}">
          @error('date')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <input type="hidden" value="1" name="category_id">
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
          <img class="img-preview img-fluid mb-3">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
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

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#title');

    title.addEventListener('change', function(){
        fetch('/dashboard/blog/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
    })
</script>
@endsection
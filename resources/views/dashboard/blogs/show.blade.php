@extends('dashboard.templates.main')

@section('content')
<div class="col-12 d-flex p-2">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-body">
        <a href="/dashboard/blog" class="btn btn-success me-1"><i class="fa-solid fa-arrow-left"></i> Back to Blogs</a>
        <a href="/dashboard/blog/{{ $blog->slug }}/edit" class="btn btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <a href="#" class="btn btn-danger me-1"><i class="fa-solid fa-trash"></i> Delete</a>
          <div class="row mt-3">
            <div class="col-8">
              @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title . 'Image' }}" width="250" class="mx-auto d-block">
              @else
                <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $blog->title }}-image" class="w-75">
              @endif
              <h3 class="mt-3">{{ $blog->title }}</h3>
              <article class="mt-2">
                {!! $blog->body !!}
              </article>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
@extends('dashboard.templates.main')

@section('content')
<div class="col-12 d-flex p-2">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-body">
        <a href="/dashboard/post" class="btn btn-success me-1"><i class="fa-solid fa-arrow-left"></i> Back to Posts</a>
        <a href="/dashboard/post/{{ $post->id }}/edit" class="btn btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <a href="#" class="btn btn-danger me-1"><i class="fa-solid fa-trash"></i> Delete</a>
          <div class="row mt-3">
            <div class="col-8">
              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ 'Post-Image' }}" width="250" class="mx-auto d-block">
              @else
                <img src="https://source.unsplash.com/1000x400/?coffee" alt="Post-Image" class="w-75">
              @endif
              <article class="mt-2">
                {!! $post->caption !!}
              </article>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
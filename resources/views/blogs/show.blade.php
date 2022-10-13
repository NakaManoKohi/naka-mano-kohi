@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/blog" class="text-decoration-none text-white">Blog</a> / <a href="/blog/{{ $blog->slug }}" class="text-decoration-none text-white">{{ $blog->title }}</a></h3>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-8">
              <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $blog->title }}-image" class="w-75">
              <h3 class="mt-3">{{ $blog->title }}</h3>
              <article class="mt-2">
                {!! $blog->body !!}
              </article>
              <a href="/blog" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Back to Blogs</a>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
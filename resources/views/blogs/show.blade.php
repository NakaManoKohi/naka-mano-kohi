@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/blog" class="text-decoration-none text-white">Blog</a> / <a href="/blog/{{ $blog->slug }}" class="text-decoration-none text-white">{{ $blog->title }}</a></h3>
        </div>
        <div class="card-body">
          <h3>{{ $blog->title }}</h3>
          <p>{!! $blog->body !!}</p>
        </div>
      </section>
    </main>
  </div>
@endsection
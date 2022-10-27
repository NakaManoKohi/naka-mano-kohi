@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/blog" class="text-decoration-none text-white">Blog</a></h3>
        </div>
        <div class="card-body">
            <div class="col-12 mb-3">
                <div class="card card-body border border-5 border-yellow blog-card-highlight">
                    <img src="{{ $blogs[0]->image }}" alt="" loading="lazy" class="blog-card-image">
                    <div class="blog-card-background"></div>
                    <div class="col-6 blog-card-desc gap-1">
                        <h2 class="title">{{ $blogs[0]->title }}</h2>
                        <p class="desc">{{ $blogs[0]->excerpt }}</p>
                        <a href="/blog/{{ $blogs[0]->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                    </div>
                </div>
            </div>
          <h4 class="h4 px-4 mb-3 fw-bold">Blogs</h4>
          <div class="d-flex flex-wrap col-12">
            @foreach ($blogs->skip(1) as $blog)
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow blog-card-small">
                <img src="{{ $blog->image }}" alt="" loading="lazy" class="blog-card-image">
                <div class="blog-card-background"></div>
                <div class="col-8 blog-card-desc gap-1">
                  <h5 class="title">{{ $blog->title }}</h5>
                  <p style="font-size: 12px;" class="desc">{{ $blog->excerpt }}</p>
                  <a href="/blog/{{ $blog->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>              
          <div class="mt-4 d-flex justify-content-end">
            {{ $blogs->links() }}
        </div>
        </div>
      </section>
    </main>
  </div>
@endsection
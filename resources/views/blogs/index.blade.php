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
                    <div class="col-6">
                        <h2>{{ $blogs[0]->title }}</h2>
                        <p>{{ $blogs[0]->excerpt }}</p>
                        <a href="/blog/{{ $blogs[0]->slug }}" class="btn btn-primary btn-sm col-2">Read More</a>
                    </div>
                </div>
            </div>
          <h4 class="h4 px-4 mb-3 fw-bold">Blogs</h4>
          <div class="d-flex flex-wrap col-12">
            @foreach ($blogs->skip(1) as $blog)
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow blog-card-small">
                <div class="col-8 blog-card-desc">
                  <h5>{{ $blog->title }}</h5>
                  <p style="font-size: 12px;" class=" flex-fill">{{ $blog->excerpt }}</p>
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
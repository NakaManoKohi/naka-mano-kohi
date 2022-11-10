@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/blog" class="text-decoration-none text-white">Blog</a></h3>
        </div>
        <div class="card-body">
            @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                  {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
          </div>
            @endif
          <div class="col-12 mb-3">
              <div class="card card-body border border-5 border-yellow blog-card-highlight">
                  <img src="/storage/{{ $blogs[0]->image }}" alt="" loading="lazy" class="blog-card-image">
                  <div class="blog-card-background"></div>
                  <div class="col-6 blog-card-desc gap-1">
                      <h2 class="title">{{ $blogs[0]->title }}</h2>
                      <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                            @if($blogs[0]->user->image == 'images/user.jpg')
                          <img src="/{{ $blogs[0]->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                            @else 
                          <img src="{{ asset('storage/' . $blogs[0]->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                            @endif
                        <h6><a href="/{{ $blogs[0]->user->username }}" class="text-decoration-none text-dark">{{ $blogs[0]->user->name }}</a></h6>  
                      </div>
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
              <img src="/storage/{{ $blog->image }}" alt="" loading="lazy" class="blog-card-image">
              <div class="blog-card-background"></div>
              <div class="col-8 blog-card-desc gap-1">
                <h5 class="title">{{ $blog->title }}</h5>
                <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                      @if($blog->user->image == 'images/user.jpg')
                    <img src="/{{ $blog->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                      @else 
                    <img src="{{ asset('storage/' . $blog->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                      @endif
                  <h6><a href="/{{ $blog->user->username }}" class="text-decoration-none text-dark">{{ $blog->user->name }}</a></h6>  
                </div>
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
      </section>
    </main>
    @include('components.aside')
  </div>
@endsection
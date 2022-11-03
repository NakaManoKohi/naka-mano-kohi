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
              {{-- @if($blog->image) --}}
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title . 'Image' }}" width="250" class="mx-auto d-block">
              {{-- @else
                <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $blog->title }}-image" class="w-75">
              @endif --}}
              <h3 class="mt-3">{{ $blog->title }}</h3>
              <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                @if($blog->user->image == 'images/user.jpg')
                  <img src="/{{ $blog->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @else 
                  <img src="{{ asset('storage/' . $blog->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @endif
                <h6><a href="/{{ $blog->user->username }}" class="text-decoration-none text-dark">{{ $blog->user->name }}</a></h6>  
              </div>
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
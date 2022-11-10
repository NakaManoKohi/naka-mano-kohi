@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/post" class="text-decoration-none text-white">Post</a> / <a href="/post/{{ $post->id }}" class="text-decoration-none text-white">{{ $post->user->username }}</a></h3>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-8">
              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ 'Post Image' }}" width="250" class="mx-auto d-block">
              @else
                <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $post->title }}-image" class="w-75">
              @endif
              <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                @if($post->user->image == 'images/user.jpg')
                  <img src="/{{ $post->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @else 
                  <img src="{{ asset('storage/' . $post->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @endif
                <h6><a href="/{{ $post->user->username }}" class="text-decoration-none text-dark">{{ $post->user->name }}</a></h6>  
              </div>
              <article class="mt-2">
                {!! $post->caption !!}
              </article>
              <a href="/post" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
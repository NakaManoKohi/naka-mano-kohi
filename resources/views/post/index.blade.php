{{-- {{ dd($ranking) }} --}}
@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/post" class="text-decoration-none text-white">Post</a></h3>
        </div>
        <div class="card-body col-12">
            @foreach ($posts as $post)
            <div class="card card-body border border-5 border-yellow blog-card-highlight my-3">
                <div class="col-12 blog-card-desc gap-1 d-flex flex-column">
                    <div class="d-flex flex-row">
                        @if($post->suspend == 1)
                          <p class="btn btn-warning" style="position:absolute; z-index: 9999; right: 20px;"><i class="fa-solid fa-triangle-exclamation"></i></p>
                        @else
                        
                        @endif
                        @if($post->user->image == 'images/user.jpg')
                          <img src="/{{ $post->user->image }}" alt="profile" width="50" height="50" class="rounded-circle ms-2">
                        @else 
                          <img src="{{ asset('storage/' . $post->user->image) }}" alt="profile" width="50" height="50" class="rounded-circle ms-2">
                        @endif
                        <div class="d-flex flex-column">
                            <h4 class="ms-3"><a href="/{{ $post->user->username }}/post" class="text-decoration-none text-dark">{{ $post->user->name }}</a></h4>
                            <p class="ms-3">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                      <div class="gap-halfed-width">
                        @if($post->image)
                          <img src="{{ asset('storage/' . $post->image) }}" alt="image" class="col-12">
                        @else
                          <img src="https://source.unsplash.com/300x300/?coffee" alt="image" class="col-12">
                        @endif
                      </div>
                      <div class="fs-5 gap-halfed-width align-self-stretch ratio-box overflow-auto scrollbar-none">{!! $post->caption !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </section>
    </main>
    @include('components.aside')
  </div>
@endsection
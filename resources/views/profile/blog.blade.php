@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body">
            @foreach ($blogs as $blog)
            <div class="blog-card col-12">
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
        </div>
      </div>
    </main>
  </div>
@endsection
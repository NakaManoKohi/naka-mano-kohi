@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="#" class="text-decoration-none text-white">Search</a> / {{ request('search') }}</h3>
        </div>
        @if($blogs->count() == 0 && $events->count() == 0 && $users->count() == 0)
          <h4 class="h4 px-4 my-3 fw-bold text-center">No Result Found</h4>
        @else
          @if($blogs->count())
          <div class="card-body">
            <h4 class="h4 mb-3 fw-bold">Blogs</h4>
            <div class="d-flex flex-wrap col-12">
              @foreach ($blogs as $blog)
              <div class="blog-card col-6">
                <div class="card card-body border border-5 border-yellow blog-card-small">
                  <img src="/storage/{{ $blog->image }}" alt="" loading="lazy" class="blog-card-image">
                  <div class="blog-card-background"></div>
                  <div class="col-8 blog-card-desc gap-1">
                    <h5 class="title">{{ $blog->title }}</h5>
                    @if($blog->suspend == 1)
                      <p class="btn btn-warning" style="position:absolute; z-index: 9999; right: 20px;"><i class="fa-solid fa-triangle-exclamation"></i></p>
                    @else
                    
                    @endif
                    <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                          @if($blog->user->image == 'images/user.jpg')
                        <img src="/{{ $blog->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                          @else 
                        <img src="{{ asset('storage/' . $blog->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                          @endif
                      <h6><a href="/{{ $blog->user->username }}" class="text-decoration-none text-dark">{{ $blog->user->name }}</a></h6>  
                    </div>
                    <p style="font-size: 12px;" class="desc">{{ $blog->excerpt }}</p>
                    <a href="/blog/{{ $blog->id }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>              
            <div class="mt-4 d-flex justify-content-end">
              {{ $blogs->links() }}
          </div>
          </div>
          @else

          @endif

        @if($events->count())
        <h4 class="h4 px-4 mb-3 fw-bold">Events</h4>
        @foreach ($events as $event)
        <div class="blog-card col-6">
          <div class="card card-body border border-5 border-yellow blog-card-small">
            <img src="/storage/{{ $event->image }}" alt="" loading="lazy" class="blog-card-image">
            <div class="blog-card-background"></div>
            <div class="col-8 blog-card-desc gap-1">
              <h5 class="title">{{ $event->title }}</h5>
              @if($event->suspend == 1)
                <p class="btn btn-warning" style="position:absolute; z-index: 9999; right: 20px;"><i class="fa-solid fa-triangle-exclamation"></i></p>
              @else
              
              @endif
              <div class="event-profile d-flex gap-1 mt-2 align-items-center">
                @if($event->user->image == 'images/user.jpg')
                  <img src="/{{ $event->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @else 
                  <img src="{{ asset('storage/' . $event->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                @endif
                <h6><a href="/{{ $event->user->username }}" class="text-decoration-none text-dark">{{ $event->user->name }}</a></h6>  
              </div>
              <h6 class="text-brown m-0"> <i class="fa-solid fa-calendar-days"></i> {{ $event->date->diffForHumans() }}</h6>
              <p style="font-size: 12px;" class="desc">{{ $event->excerpt }}</p>
              <a href="/event/{{ $event->id }}" class="btn btn-primary btn-sm w-fit">Read More</a>
            </div>
          </div>
        </div>
        @endforeach
        @else

        @endif

        @if($posts->count())
        <h4 class="h4 px-4 mb-3 fw-bold">Events</h4>
        @foreach ($posts as $post)
          <div class="blog-card col-6 px-4">
            <div class="card card-body border border-5 border-yellow card-bg">
                @if($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="image" class="col-12">
                @else
                  <img src="https://source.unsplash.com/300x300/?coffee" alt="image" class="col-12">
                @endif
                <p style="font-size: 12px;">{!! $post->caption !!}</p>
                <div class="col-4">
                  <button class="btn btn-primary">Read More</button>
                </div>
            </div>
          </div>
        @endforeach
        @else

        @endif

        @if($users->count())
        <h4 class="h4 px-4 fw-bold">Users</h4>
          @foreach($users as $user)
            <div class="d-flex px-4 m-3 rounded align-items-center bg-yellow col-3">
              <a class="nav-link text-white text-decoration-none dropdown-toggle no-arrow me-3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if($user->image == 'images/user.jpg')  
                  <img src="/{{ $user->image }}" alt="profile" width="44" class="rounded-circle ms-2">
                @else 
                  <img src="{{ asset('storage/' . $user->image) }}" alt="profile" width="44" height="44" class="rounded-circle ms-2">
                @endif
              </a>
              <div class="profile-text flex-column">
                <h3><a href="/{{ $user->username }}" class="text-brown text-decoration-none">{{ $user->name }}</a></h3>
                <h5><a href="/{{ $user->username }}" class="text-brown text-decoration-none">{{ $user->username }}</a></h5>
              </div>
              
            </div> 
          @endforeach
        @else

        @endif
      @endif
      </section>
    </main>
  </div>
@endsection
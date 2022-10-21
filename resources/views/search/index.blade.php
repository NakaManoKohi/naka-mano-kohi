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
              <div class="card card-body border border-5 border-yellow card-bg">
                    <h5>{{ $blog->title }}</h5>
                    <p style="font-size: 12px;">{{ $blog->excerpt }}</p>
                    <div class="col-4">
                      <button class="btn btn-primary">Read More</button>
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
          <div class="blog-card col-6 px-4">
            <div class="card card-body border border-5 border-yellow card-bg">
                <h5>{{ $event->title }}</h5>
                <p style="font-size: 12px;">{{ $event->excerpt }}</p>
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
                <img src="/images/lilgru.jpg" alt="profile" width="44" class="rounded-circle ms-2">
              </a>
              <div class="profile-text flex-column">
                <h3><a href="/{{ $user->name }}" class="text-brown text-decoration-none">{{ $user->name }}</a></h3>
                <h5><a href="/{{ $user->username }}" class="text-brown text-decoration-none">{{ $user->username }}</a></h5>
              </div>
              
            </div> 
          @endforeach
          {{-- <a href="/{{ $users->username }}">
            {{ $users->username }}
          </a> --}}
        @else

        @endif
      @endif
      </section>
    </main>
  </div>
@endsection
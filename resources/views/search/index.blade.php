@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="#" class="text-decoration-none text-white">Search</a> / {{ request('search') }}</h3>
        </div>
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
        @foreach($users as $user)
          <h3><a href="/{{ $user->username }}">{{ $user->username }}</a></h3>
        @endforeach
        {{-- <a href="/{{ $users->username }}">
          {{ $users->username }}
        </a> --}}
      @else

      @endif
      </section>
    </main>
  </div>
@endsection
@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body">
            @foreach ($activities as $activity)
              <div class="ms-2 ps-2 border-start border-3 border-dark d-flex flex-column">
                <p class="m-0 position-relative">
                  <svg height="10" width="10" class="position-relative activity-circle">
                    <circle cx="5" cy="5" r="5" fill="black" />
                  </svg>
                  {{ $activity->date }}</p>
                @if ($activity->table === 'follows')
                  <p class="mb-3 ps-4">
                    <span class="fw-bold"><a href="/{{ $activity->follower->username }}" class="text-decoration-none text-dark">{{ $activity->follower->username }}</a></span>
                    {{ $activity->status }} 
                    <span class="fw-bold"><a href="/{{ $activity->follow->username }}" class="text-decoration-none text-dark">{{ $activity->follow->username }}</a></span>
                  </p>
                @elseif ($activity->table === 'blog')
                  <p class="mb-1 ps-4">
                    <span class="fw-bold"><a href="/{{ $activity->user->username }}" class="text-decoration-none text-dark">{{ $activity->user->username }}</a></span>
                    {{ $activity->status }} 
                    <span class="fw-bold"><a href="/blog/{{ $activity->slug }}" class="text-decoration-none text-dark">"{{ $activity->title }}"</a></span>
                  </p>
                  <div class="blog-card col-6 mb-3">
                    <div class="card card-body border border-5 border-yellow blog-card-small">
                      <img src="/storage/{{ $activity->image }}" alt="" loading="lazy" class="blog-card-image">
                      <div class="blog-card-background"></div>
                      <div class="col-8 blog-card-desc gap-1">
                        <h5 class="title">{{ $activity->title }}</h5>
                        <p style="font-size: 12px;" class="desc">{{ $activity->excerpt }}</p>
                        <a href="/blog/{{ $activity->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
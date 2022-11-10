@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body">
            @foreach ($events as $event)
            <div class="card card-body border border-5 border-yellow blog-card-highlight">
              <img src="/storage/{{ $event->image }}" alt="" loading="lazy" class="blog-card-image">
              <div class="blog-card-background"></div>
              <div class="col-6 blog-card-desc gap-1">
                <h2 class="title">{{ $event->title }}</h2>
                <div class="event-profile d-flex gap-1 mt-2 align-items-center">
                  @if($event->user->image == 'images/user.jpg')
                    <img src="/{{ $event->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                  @else 
                    <img src="{{ asset('storage/' . $event->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                  @endif
                  <h6><a href="/{{ $event->user->username }}" class="text-decoration-none text-dark">{{ $event->user->name }}</a></h6>  
                </div>
                <h5 class="text-brown m-0"> <i class="fa-solid fa-calendar-days"></i> {{ $event->date->diffForHumans() }}</h5>
                <p class="desc">{{ $event->excerpt }}</p>
                <a href="/event/{{ $event->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
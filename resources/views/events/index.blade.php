@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/event" class="text-decoration-none text-white">Event</a></h3>
        </div>
        <div class="card-body">
            <div class="col-12 mb-3">
                <div class="card card-body border border-5 border-yellow blog-card-highlight">
                    <div class="col-6 blog-card-desc gap-1">
                        <h2 class="title">{{ $events[0]->title }}</h2>
                        <h5 class="text-brown m-0"> <i class="fa-solid fa-calendar-days"></i> {{ $events[0]->date->diffForHumans() }}</h5>
                        <p class="desc">{{ $events[0]->excerpt }}</p>
                        <a href="/event/{{ $events[0]->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                    </div>
                </div>
            </div>
          <h4 class="h4 px-4 mb-3 fw-bold">Events</h4>
          <div class="d-flex flex-wrap col-12">
            @foreach ($events->skip(1) as $event)
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow blog-card-small">
                <div class="col-8 blog-card-desc gap-1">
                  <h5 class="title">{{ $event->title }}</h5>
                  <h6 class="text-brown m-0"> <i class="fa-solid fa-calendar-days"></i> {{ $event->date->diffForHumans() }}</h6>
                  <p style="font-size: 12px;" class="desc">{{ $event->excerpt }}</p>
                  <a href="/event/{{ $event->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>              
          <div class="mt-4 d-flex justify-content-end">
            {{ $events->links() }}
        </div>
        </div>
      </section>
    </main>
  </div>
@endsection
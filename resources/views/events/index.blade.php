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
                <div class="card card-body border border-5 border-yellow card-bg">
                    <div class="col-6">
                        <h2>{{ $events[0]->title }}</h2>
                        <h5 class="text-brown">{{ $date->diffForHumans() }}</h5>
                        <p>{{ $events[0]->excerpt }}</p>
                        <a href="/event/{{ $events[0]->slug }}" class="btn btn-primary btn-sm col-2">Read More</a>
                    </div>
                </div>
            </div>
          <h4 class="h4 px-4 mb-3 fw-bold">Events</h4>
          <div class="d-flex flex-wrap col-12">
            @foreach ($events->skip(1) as $event)
            <div class="blog-card col-6">
            <div class="card card-body border border-5 border-yellow card-bg
              ">
                  <h5>{{ $event->title }}</h5>
                  <h6 class="text-brown">{{ $date->diffForHumans() }}</h6>
                  <p style="font-size: 12px;">{{ $event->excerpt }}</p>
                  <div class="col-4">
                    <a href="/event/{{ $event->slug }}" class="btn btn-primary">Read More</a>
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
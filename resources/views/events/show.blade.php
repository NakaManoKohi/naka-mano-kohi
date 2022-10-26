@extends('templates.main')

@section('content')
<div class="col-12 d-flex p-3">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a> / <a href="/event" class="text-decoration-none text-white">Event</a> / <a href="/blog/{{ $event->slug }}" class="text-decoration-none text-white">{{ $event->title }}</a></h3>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-8">
              <h3 class="mt-3">{{ $event->title }}</h3>
              <h5 class="mt-3 text-brown">{{ $event->date->diffForHumans() }}</h5>
              @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title . 'Image' }}" width="400" class="mx-auto d-block">
              @else
                <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $event->title }}-image" class="w-75">
              @endif
              <article class="mt-2">
                {!! $event->body !!}
              </article>
              <a href="/event" class="btn btn-success mt-3"><i class="fa-solid fa-arrow-left"></i> Back to Events</a>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
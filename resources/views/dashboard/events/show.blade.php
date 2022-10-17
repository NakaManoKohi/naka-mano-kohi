@extends('dashboard.templates.main')

@section('content')
<div class="col-12 d-flex p-2">
    <main class="col-12 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-body">
        <a href="/dashboard/blog" class="btn btn-success me-1"><i class="fa-solid fa-arrow-left"></i> Back to Blogs</a>
        <a href="#" class="btn btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        <a href="#" class="btn btn-danger me-1"><i class="fa-solid fa-trash"></i> Delete</a>
          <div class="row mt-3">
            <div class="col-8">
              <img src="https://source.unsplash.com/1000x400/?coffee" alt="{{ $event->title }}-image" class="w-75">
              <h3 class="mt-3">{{ $event->title }}</h3>
              <h5 class="mt-3">{{ $event->date }}</h5>
              <article class="mt-2">
                {!! $event->body !!}
              </article>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
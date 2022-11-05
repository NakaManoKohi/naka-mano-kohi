@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body col-12 d-flex flex-row flex-wrap gap-2 justify-content-center">
            @foreach ($posts as $post)
            @if($post->image)
            <div class="post col-3">
              <img class="col-12" src="{{ asset('storage/' . $post->image) }}" alt="image" height="400">
              @if($post->user->username == auth()->user()->username)
              <div class="actions mt-2">
                <a href="/post/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/post/{{ $post->id }}" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
              @else

              @endif
            </div>
            @else
            <div class="post col-3">
              <img class="col-12" src="https://source.unsplash.com/300x300/?coffee" alt="image" height="400" onclick="window.location.href='/post/{{ $post->id }}'">
              @if($post->user->username == auth()->user()->username)
              <div class="actions mt-2">
                <a href="/post/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                <form action="/post/{{ $post->id }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </div>
              @else

              @endif
            </div>
            @endif
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
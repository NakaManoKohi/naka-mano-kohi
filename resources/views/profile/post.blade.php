@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body col-12 d-flex flex-row flex-wrap justify-content-center">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            @foreach ($posts as $post)
            <div class="card card-body border border-5 border-yellow blog-card-highlight mb-3">
              <div class="col-12 blog-card-desc gap-1 d-flex flex-column">
                  <div class="d-flex flex-row align-items-center">
                      @if($post->user->image == 'images/user.jpg')
                        <img src="/{{ $post->user->image }}" alt="profile" width="50" height="50" class="rounded-circle mx-2">
                      @else 
                        <img src="{{ asset('storage/' . $post->user->image) }}" alt="profile" width="50" height="50" class="rounded-circle mx-2">
                      @endif
                      <div class="d-flex flex-column">
                          <h4 class="m-0"><a href="/{{ $post->user->username }}/post" class="text-decoration-none text-dark">{{ $post->user->name }}</a></h4>
                          <p class="m-0">{{ $post->created_at->diffForHumans() }}</p>
                      </div>
                      @if(auth()->user()->username == $user->username)
                      <div class="actions ms-auto">
                        <a class="nav-link text-dark text-decoration-none dropdown-toggle no-arrow me-3 fs-4 px-3" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-solid fa-ellipsis-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                          <li class="dropdown-item"><a href="/post/{{ $post->id }}/edit" class="btn btn-warning">Edit</a></li>
                          <li><form action="/post/{{ $post->id }}" method="post" class="d-inline dropdown-item">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form></li>
                        </ul>
                      </div>
                      @else

                      @endif
                      @if($post->suspend == 1)
                        <button class="btn btn-warning" style="position:absolute; z-index: 9999; right: 80px;"><i class="fa-solid fa-triangle-exclamation"></i></button>
                      @else
                      
                      @endif
                  </div>
                  <div class="d-flex gap-3">
                    <div class="gap-halfed-width">
                      @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="image" class="col-12">
                      @else
                        <img src="https://source.unsplash.com/300x300/?coffee" alt="image" class="col-12">
                      @endif
                    </div>
                    <div class="fs-5 gap-halfed-width align-self-stretch ratio-box overflow-auto scrollbar-none">{!! $post->caption !!}</div>
                  </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
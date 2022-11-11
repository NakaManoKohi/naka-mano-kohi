@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    @include('profile.components.profile')
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        @include('profile.components.nav')
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            @foreach ($blogs as $blog)
              <div class="card card-body border border-5 border-yellow blog-card-highlight mb-3">
                <img src="/storage/{{ $blog->image }}" alt="" loading="lazy" class="blog-card-image">
                <div class="blog-card-background"></div>
                @if(auth()->user()->username == $user->username)
                    <a class="nav-link text-dark text-decoration-none dropdown-toggle no-arrow me-3 fs-4 px-3 rounded" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position:absolute; z-index: 9999; right: 10px;"><i class="fa fa-solid fa-ellipsis-vertical"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                      <li class="dropdown-item"><a href="/blog/{{ $blog->id }}/edit" class="btn btn-warning">Edit</a></li>
                      <li><form action="/blog/{{ $blog->id }}" method="post" class="d-inline dropdown-item">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form></li>
                    </ul>
                  @else

                  @endif
                <div class="col-6 blog-card-desc gap-1">
                    <h2 class="title">{{ $blog->title }}</h2>
                    <div class="blog-profile d-flex gap-1 mt-2 align-items-center">
                          @if($blog->user->image == 'images/user.jpg')
                        <img src="/{{ $blog->user->image }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                          @else 
                        <img src="{{ asset('storage/' . $blog->user->image) }}" alt="profile" width="35" height="35" class="rounded-circle ms-2">
                          @endif
                      <h6><a href="/{{ $blog->user->username }}" class="text-decoration-none text-dark">{{ $blog->user->name }}</a></h6>  
                    </div>
                    <p class="desc">{{ $blog->excerpt }}</p>
                    <a href="/blog/{{ $blog->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
                </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
@extends('templates.main')
@section('content')
  {{-- {{ dd($activities) }} --}}

  <div class="col-12 d-flex p-3">
    <aside class="pe-2 col-3">
      <div class="card bg-primary-grey profile-card">
        <div class="card-header bg-brown text-white">
          <h4 class="mb-0">{{ $user->username }}'s Profile</h4>
        </div>
        <div class="card-body d-flex flex-column align-items-center">
          <img src="{{ asset('storage/'. $user->image) }}" alt="profile.jpg" class="col-9 rounded-circle border border-5 border-dark mb-4">
          <h4 class="w-100 fw-bold mb-0">{{ $user->name }}</h4>
          <h5 class="fw-normal w-100">{{ $user->username }}</h5>
          @auth
            @if (($user->name) === (auth()->user()->name))
              <a href="/setting/profile" class="btn button-brown col-12 border border-3 border-dark">Edit Profile</a>
            @else
              @if ($following_user > 0)
                <a href="/{{ $user->username }}/unfollow" class="btn button-brown col-12 border border-3 border-dark">Unfollow</a>
              @else
                <a href="/{{ $user->username }}/follow" class="btn button-brown col-12 border border-3 border-dark">Follow</a>
              @endif
            @endif
          @endauth
          <div class="col-12 d-flex gap-2">
            <p class="m-0 w-auto">{{ $followers->count() }} Followers</p>
            <p class="m-0 w-auto px-1 fw-bold">.</p>
            <p class="m-0 w-auto">{{ $following->count() }} Following</p>
          </div>
        </div>
      </div>
    </aside>
    <main class="ps-2 col-9">
      <div class="timeline-card d-flex flex-column align-items-stretch">
        <div class="pb-3 card bg-transparent border-0">
          <nav class="col-12 profile-nav">
            <a href="/{{ $user->username }}?tab=activity" class="profile-nav-item active">
              <h5 class="mb-0">Activity</h5></a>
            <a href="/{{ $user->username }}?tab=blog" class="profile-nav-item">
              <h5 class="mb-0">Blog</h5></a>
            <a href="/{{ $user->username }}/post" class="profile-nav-item">
              <h5 class="mb-0">Post</h5></a>
          </nav>
        </div>
        <div class="card bg-primary-grey flex-grow-1">
          <div class="card-body col-8 mx-auto" style="max-width: 800px">
            @foreach ($posts as $post)
            <div class="card card-body border border-5 border-yellow blog-card-highlight my-3">
              <div class="col-12 blog-card-desc gap-1">
                <div class="d-flex flex-row">
                  <img src="{{ asset('storage/' . $post->user->image) }}" alt="profile" width="50" height="50" class="rounded-circle ms-2">
                    <div class="d-flex flex-column">
                      <h4 class="ms-3"><a href="/{{ $post->user->username }}/post" class="text-decoration-none text-dark">{{ $post->user->name }}</a></h4>
                      <p class="ms-3">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                  </div>
                  <img src="https://source.unsplash.com/300x300/?coffee" alt="image" height="500">
                  <p class="w-100">{!! $post->caption !!}</p>
                </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </main>
  </div>
@endsection
@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    <aside class="pe-2 col-3">
      <div class="card bg-primary-grey profile-card">
        <div class="card-header bg-brown text-white">
          <h4>Profile</h4>
        </div>
        <div class="card-body d-flex flex-column align-items-center">
          <img src="/images/lilgru.jpg" alt="profile.jpg" class="col-9 rounded-circle border border-5 border-dark mb-4">
          <h4 class="w-100 fw-bold mb-0">{{ $user->name }}</h4>
          <h5 class="fw-normal w-100">{{ $user->username }}</h5>
          @if (auth()->user() != null)
            @if (($user->name) === (auth()->user()->name))
              <a href="/setting#profile" class="btn button-brown col-12 border border-3 border-dark">Edit Profile</a>
            @else
              @if ($following_user > 0)
                <a href="/{{ $user->username }}/unfollow" class="btn button-brown col-12 border border-3 border-dark">Unfollow</a>
              @else
                <a href="/{{ $user->username }}/follow" class="btn button-brown col-12 border border-3 border-dark">Follow</a>
              @endif
            @endif
          @endif
          <div class="col-12 d-flex gap-2">
            <p class="m-0 w-auto">{{ $followers->count() }} Followers</p>
            <p class="m-0 w-auto px-1 fw-bold">.</p>
            <p class="m-0 w-auto">{{ $following->count() }} Following</p>
          </div>
        </div>
      </div>
    </aside>
    <main class="ps-2 col-9">
      <div class="card bg-primary-grey timeline-card">
        <div class="card-header bg-brown text-white">
          <h4>Time Line</h4>
        </div>
        <div class="card-body">
        </div>
      </div>
    </main>
  </div>
@endsection
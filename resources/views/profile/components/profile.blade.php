<aside class="pe-2 col-3 h-fit sticky-top profile">
  <div class="card bg-primary-grey profile-card">
    <div class="card-header bg-brown text-white">
      <h4 class="mb-0">{{ $user->username }}'s Profile</h4>
    </div>
    <div class="card-body d-flex flex-column align-items-center">
      <img src="{{ asset('storage/' . $user->image) }}" alt="profile.jpg" class="col-9 rounded-circle border border-5 border-dark mb-4">
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
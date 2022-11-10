<div class="pb-3 card bg-transparent border-0">
  <nav class="col-12 profile-nav">
    <a href="/{{ $user->username }}/activity" class="profile-nav-item {{ Request::is($user->username . '', $user->username . '/activity') ? 'active' : '' }}">
      <h5 class="mb-0">Activity</h5></a>
    <a href="/{{ $user->username }}/blog" class="profile-nav-item {{ Request::is($user->username . '/blog') ? 'active' : '' }}">
      <h5 class="mb-0">Blog</h5></a>
    <a href="/{{ $user->username }}/event" class="profile-nav-item {{ Request::is($user->username . '/event') ? 'active' : '' }}">
      <h5 class="mb-0">Event</h5></a>
    <a href="/{{ $user->username }}/post" class="profile-nav-item {{ Request::is($user->username . '/post*') ? 'active' : '' }}">
      <h5 class="mb-0">Post</h5></a>
  </nav>
</div>
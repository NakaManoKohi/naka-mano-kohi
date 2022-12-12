@extends('templates.main')
@section('content')
  <div class="content position-fixed overflow-auto bg-tertiary-grey">
    <div class="col-12 d-flex p-3 content-container">
      <main class="col-12 d-flex card border-0 bg-primary-grey">
        <div class="card-header bg-brown text-white">
          <h3>Setting</h3>
        </div>
        <div class="card-body d-flex align-items-stretch p-0">
          <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav border-end border-5 border-dark">
            <a class="{{ Request::is('setting', 'setting/general') ? 'active' : '' }} setting-nav-item" href="/setting/general">
              <h4 class="fw-normal text-white">General</h4></a>
          @auth
            <a class="{{ Request::is('setting/profile') ? 'active' : '' }} setting-nav-item" href="/setting/profile">
              <h4 class="fw-normal text-white">Profile</h4></a>
            <a class="{{ Request::is('setting/password') ? 'active' : '' }} setting-nav-item" href="/setting/password">
              <h4 class="fw-normal text-white">Password</h4></a>
            <a class="{{ Request::is('setting/notifications') ? 'active' : '' }} setting-nav-item" href="/setting/notifications">
              <h4 class="fw-normal text-white">Notifications</h4></a>
            <a class="{{ Request::is('setting/membership') ? 'active' : '' }} setting-nav-item" href="/setting/membership">
              <h4 class="fw-normal text-white">Membership</h4></a>
          @endauth
          </nav>
          <section class="col-9 p-3 setting-content">
            @yield('settingContent')
          </section>
        </div>
      </main>
    </div>
  </div>
    
@endsection
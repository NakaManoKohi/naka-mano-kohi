@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3 content-container">
    <main class="col-12 d-flex card border-0 bg-primary-grey">
      <div class="card-header bg-brown text-white">
        <h3>Setting</h3>
      </div>
      <div class="card-body d-flex align-items-stretch p-0">
        <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav border-end border-5 border-dark">
          <a class="setting-nav-item {{ Request::is('setting#general') ? 'active' : '' }}" role="button" data="general"><h4 class="fw-normal text-white">General</h4></a>
          <a class="setting-nav-item {{ Request::is('setting#profile') ? 'active' : '' }}" role="button" data="profile"><h4 class="fw-normal text-white">Profile</h4></a>
          <a class="setting-nav-item {{ Request::is('setting#notifications') ? 'active' : '' }}" role="button" data="notifications"><h4 class="fw-normal text-white">Notifications</h4></a>
          <a class="setting-nav-item {{ Request::is('setting#membership') ? 'active' : '' }}" role="button" data="membership"><h4 class="fw-normal text-white">Membership</h4></a>
          <a class="setting-nav-item {{ Request::is('setting#password') ? 'active' : '' }}" role="button" data="password"><h4 class="fw-normal text-white">Password</h4></a>
        </nav>
        {{-- when active --}}
        <section class="col-9 p-3 setting-content">

        </section>
      </div>
    </main>
    <script src="script/setting_components.js"></script>
    <script src="script/setting.js"></script>
  </div>
@endsection
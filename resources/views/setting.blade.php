@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3 content-container">
    <main class="col-12 d-flex card border-0 bg-primary-grey">
      <div class="card-header bg-brown text-white">
        <h3>Setting</h3>
      </div>
      <div class="card-body d-flex align-items-stretch p-0">
        <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav border-end border-5 border-dark">
          <a class="setting-nav-item" data="general"><h4 class="fw-normal text-white">General</h4></a>
          @auth
            <a class="setting-nav-item" data="profile"><h4 class="fw-normal text-white">Profile</h4></a>
            <a class="setting-nav-item" data="notifications"><h4 class="fw-normal text-white">Notifications</h4></a>
            <a class="setting-nav-item" data="membership"><h4 class="fw-normal text-white">Membership</h4></a>
            <a class="setting-nav-item" data="password"><h4 class="fw-normal text-white">Password</h4></a>
          @endauth
        </nav>
        <section class="col-9 p-3 setting-content">
          {{-- <div class="d-flex flex-column gap-3">
            <h4 class="border-bottom border-3 border-dark pb-1">Profile</h4>
            <div class="col-12 d-flex justify-content-center pb-3">
              <img src="images/lilgru.jpg" alt="profile.jpg" width="200" class="rounded-circle border border-3 border-dark">
            </div>
            <form class="col-12 d-flex flex-wrap gap-3">
              <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
              <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
              <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
              <input type="text" name="" id="" class="gap-halfed-width border border-3 border-dark rounded bg-secondary-grey p-2">
              <textarea name="" id="" rows="5" class="col-12 border border-3 border-dark rounded bg-secondary-grey p-2"></textarea>
              <button class="col-3 ms-auto button button-brown mb-3 fw-bold border border-3 border-dark rounded" type="submit">Update</button>
            </form>
          </div> --}}
        </section>
      </div>
    </main>
    <script src="script/setting_components.js"></script>
    @auth
      <script>const user = "{{ json_encode(auth()->user()->getAttributes()) }}";</script>
      <script src="script/setting.js"></script>
    @else
      <script src="script/setting.js">new Setting([]);</script>
    @endauth
    
  </div>
@endsection
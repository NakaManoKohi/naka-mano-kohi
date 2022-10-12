@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3 content-container">
    <main class="col-12 d-flex card border-0">
      <div class="card-header bg-brown text-white">
        <h3>Setting</h3>
      </div>
      <div class="card-body d-flex align-items-stretch p-0">
        <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav border-end border-5 border-dark">
          <a class="setting-nav-item border-bottom border-2 border-white text-decoration-none active" role="button" id="profile"><h4 class="fw-normal text-white">Proflie</h4></a>
          <a class="setting-nav-item border-bottom border-2 border-white text-decoration-none" role="button" id="notifications"><h4 class="fw-normal text-white">Notifications</h4></a>
          <a class="setting-nav-item border-bottom border-2 border-white text-decoration-none" role="button" id="membership"><h4 class="fw-normal text-white">Membership</h4></a>
          <a class="setting-nav-item border-bottom border-2 border-white text-decoration-none" role="button" id="password"><h4 class="fw-normal text-white">Password</h4></a>
        </nav>
        <section class="col-9 p-3 setting-content">
          <setting-profile></setting-profile>
        </section>
      </div>
    </main>
    <script src="script/setting_components.js"></script>
    <script src="script/setting.js"></script>
  </div>
@endsection
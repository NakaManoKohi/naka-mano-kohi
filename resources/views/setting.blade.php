@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3 content-container">
    <main class="col-12 d-flex card border-0">
      <div class="card-header bg-brown text-white">
        <h3>Setting</h3>
      </div>
      <div class="card-body d-flex align-items-stretch p-0">
        <nav class="col-3 d-flex flex-column bg-secondary-grey h-100 overflow-auto setting-nav">
          <div class="setting-nav-item border-bottom border-2 border-white"><h4 class="fw-normal text-white">Proflie</h4></div>
          <div class="setting-nav-item border-bottom border-2 border-white"><h4 class="fw-normal text-white">Notifications</h4></div>
          <div class="setting-nav-item border-bottom border-2 border-white"><h4 class="fw-normal text-white">Membership</h4></div>
          <div class="setting-nav-item border-bottom border-2 border-white"><h4 class="fw-normal text-white">Password</h4></div>
        </nav>
      </div>
    </main>
  </div>
@endsection
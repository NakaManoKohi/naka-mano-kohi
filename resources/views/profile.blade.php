@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    <aside class="pe-2 col-4">
      <div class="card bg-primary-grey">
        <div class="card-body d-flex flex-column align-items-center">
          <img src="images/lilgru.jpg" alt="profile.jpg" class="col-8 rounded-circle border border-5 border-dark mb-4">
          <h4 class="w-100 fw-bold mb-0">{{ auth()->user()->name }}</h4>
          <h5 class="fw-normal w-100">{{ auth()->user()->username }}</h5>
          <a href="/setting#profile" class="btn button-brown col-12 border border-3 border-dark">Edit Profile</a>
        </div>
      </div>
    </aside>
    <main class="ps-2 col-8">
      <div class="card bg-primary-grey">
        <div class="card-body">

        </div>
      </div>
    </main>
  </div>
@endsection
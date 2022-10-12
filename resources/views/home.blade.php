@extends('templates.main')

@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3>Home</h3>
        </div>
        <div class="card-body">
          <h6 class="h6 px-4 mb-3 fw-bold">Events</h6>
          <div class="col-12 mb-4 overflow-auto scrollbar-none">
            <div class="d-flex w-fit">
              <div class="card border-5 border-yellow border me-3 card-events">
  
              </div>
              <div class="card border-5 border-yellow border me-3 card-events">
  
              </div>
              <div class="card border-5 border-yellow border me-3 card-events">
  
              </div>
              <div class="card border-5 border-yellow border me-3 card-events">
  
              </div>
              <div class="card border-5 border-yellow border me-3 card-events">
  
              </div>
            </div>
          </div>
          <h6 class="h6 px-4 mb-3 fw-bold">Blogs</h6>
          <div class="d-flex flex-wrap col-12">
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow">

              </div>
            </div>
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow">

              </div>
            </div>
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow">

              </div>
            </div>
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow">

              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <aside class="col-3 ps-2 position-sticky aside-home d-flex flex-column gap-3">
      <section class="col-12 bg-primary-grey card border-0 card-aside">
        <div class="card-header bg-brown text-white">
          <h6 class="h6">Member Of The Month</h6>
        </div>
        <div class="card-body ranking p-0 border-1-rem border-primary-grey overflow-auto scrollbar-none">
          <div class="card-body bg-yellow rounded">
            <div class="d-flex align-items-center">
              <img src="images/lilgru.jpg" alt="profile" width="44" class="me-3 rounded-circle border-black-3">
              <div class="d-flex flex-column text-nowrap overflow-hidden">
                <h6 class="h6 fw-bold m-0">Rank #1</h6>
                <h6 class="h6 fw-normal m-0">Lil Gru</h6>
                <h6 class="h6 fw-normal m-0">1M Followers</h6>
              </div>
            </div>
          </div>
          <div class="card-body bg-tertiary-grey rounded">
            <div class="d-flex align-items-center">
              <img src="images/uraracak.png" alt="profile" width="44" class="me-3 rounded-circle border-black-3">
              <div class="d-flex flex-column text-nowrap overflow-hidden">
                <h6 class="h6 fw-bold m-0">Rank #2</h6>
                <h6 class="h6 fw-normal m-0">Uraracak</h6>
                <h6 class="h6 fw-normal m-0">0.8M Followers</h6>
              </div>
            </div>
          </div>
          <div class="card-body bg-brown rounded">
            <div class="d-flex align-items-center">
              <img src="images/jelek_tetep_good.png" alt="profile" width="44" class="me-3 rounded-circle border-black-3">
              <div class="d-flex flex-column text-nowrap overflow-hidden">
                <h6 class="h6 fw-bold m-0">Rank #3</h6>
                <h6 class="h6 fw-normal m-0">jelek tetep good</h6>
                <h6 class="h6 fw-normal m-0">0 Followers</h6>
                {{-- Note: nanti pas di hover kasi animasi, biar bisa keliatan namanya --}}
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="col-12 bg-primary-grey card border-0 card-aside">
        <div class="card-header bg-brown text-white">
          <h6 class="h6">Public Chat</h6>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">
          <form action="" class="d-flex align-items-stretch">
            <input type="text" name="" id="" class="col-9 rounded-pill">
            <button type="submit" class="ms-auto col-2 rounded-pill">Push</button>
          </form>
        </div>
      </section>
    </aside>
  </div>
@endsection
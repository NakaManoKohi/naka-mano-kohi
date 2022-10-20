@extends('templates.main')
@section('content')
  <div class="col-12 d-flex p-3">
    <main class="col-9 pe-2">
      <section class="col-12 bg-primary-grey card border-0">
        <div class="card-header bg-brown text-white">
          <h3><a href="/" class="text-decoration-none text-white">Home</a></h3>
        </div>
        <div class="card-body">
          <h6 class="px-4 mb-3 fw-bold">Events</h6>
          <div class="col-12 mb-3">
            <div class="card card-body border border-5 border-yellow card-bg">
              <div class="col-6">
                <h2>{{ $events[0]->title }}</h2>
                <h5 class="text-brown"> <i class="fa-solid fa-calendar-days"></i> {{ $events[0]->date->diffForHumans() }}</h5>
                <p>{{ $events[0]->excerpt }}</p>
                <a href="/blog/{{ $events[0]->slug }}" class="btn btn-primary btn-sm col-2">Read More</a>
              </div>
            </div>
          </div>
          <h6 class="px-4 mb-3 fw-bold">Blogs</h6>
          <div class="d-flex flex-wrap col-12">
            @foreach ($blogs as $blog)
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow card-bg
              ">
                  <h5>{{ $blog->title }}</h5>
                  <p style="font-size: 12px;">{{ $blog->excerpt }}</p>
                  <div class="col-4">
                    <button class="btn btn-primary">Read More</button>
                  </div>
              </div>
            </div>
            @endforeach
          </div>              
          <div class="mt-4 d-flex justify-content-end">
            {{ $blogs->links() }}
        </div>
        </div>
      </section>
    </main>
    <aside class="col-3 ps-2 position-sticky aside-home d-flex flex-column gap-3">
      <section class="col-12 bg-primary-grey card border-0 gap-halfed-height">
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
      <section class="col-12 bg-primary-grey card border-0 gap-halfed-height">
        <div class="card-header bg-brown text-white">
          <h6 class="h6">Public Chat</h6>
        </div>
        <div class="card-body d-flex flex-column-reverse col-12 overflow-auto">
        @foreach ($publicChat as $chat)
          @auth
            @if ($chat->user_id === auth()->user()->id)
            <div class="d-flex flex-row-reverse mb-3 chat-box">
              <img src="/images/lilgru.jpg" width="36" class="h-fit rounded-circle chat-image-right">
              <div class="card bg-brown p-2 w-fit align-self-end text-white position-relative border-0">
                <svg viewBox="0 0 16 16" width="16" height="16" class="chat-arrow-fight">
                  <polygon points="8 16, 0 0, 16 0"/>
                </svg>
            @endif
          @else
            <div class="d-flex flex-row mb-3 chat-box">
              <img src="/images/lilgru.jpg" width="36" class="h-fit rounded-circle chat-image-left">
              <div class="card bg-yellow p-2 w-fit align-self-end text-brown position-relative border-0">
                <svg viewBox="0 0 16 16" width="16" height="16" class="chat-arrow-left">
                  <polygon points="8 16, 0 0, 16 0"/>
                </svg>
          @endauth
              <p class="m-0">{{ $chat->message }}</p>
            </div>
            <p class="m-0 align-self-end mx-1"><sub>{{ (new DateTime($chat->created_at))->format('h:i A') }}</sub></p>
          </div>
        @endforeach
        </div>
        @auth
        <div class="card-footer">
          @if (auth()->user()->suspend === 1)
            <button class="col-12 bg-danger fw-bold text-white rounded-pill">Your Account is Suspend</button>
          @else
            <form action="/chat/public" method="POST" class="d-flex align-items-stretch">
            @csrf
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <input type="text" name="message" class="col-9 rounded-pill" autocomplete="off">
              <button type="submit" class="ms-auto col-2 rounded-pill">Push</button>
            </form>
          @endif
        </div>
        @endauth
      </section>
    </aside>
  </div>
@endsection
{{-- {{ dd($ranking) }} --}}
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
            <div class="card card-body border border-5 border-yellow blog-card-highlight">
              <img src="/storage/{{ $events[0]->image }}" alt="" loading="lazy" class="blog-card-image">
              <div class="blog-card-background"></div>
              <div class="col-6 blog-card-desc gap-1">
                <h2 class="title">{{ $events[0]->title }}</h2>
                <h5 class="text-brown m-0"> <i class="fa-solid fa-calendar-days"></i> {{ $events[0]->date->diffForHumans() }}</h5>
                <p class="desc">{{ $events[0]->excerpt }}</p>
                <a href="/event/{{ $events[0]->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
              </div>
            </div>
          </div>
          <h6 class="px-4 mb-3 fw-bold">Blogs</h6>
          <div class="d-flex flex-wrap col-12">
            @foreach ($blogs as $blog)
            <div class="blog-card col-6">
              <div class="card card-body border border-5 border-yellow blog-card-small">
                <img src="/storage/{{ $blog->image }}" alt="" loading="lazy" class="blog-card-image">
                <div class="blog-card-background"></div>
                <div class="col-8 blog-card-desc gap-1">
                  <h5 class="title">{{ $blog->title }}</h5>
                  <p style="font-size: 12px;" class="desc">{{ $blog->excerpt }}</p>
                  <a href="/blog/{{ $blog->slug }}" class="btn btn-primary btn-sm w-fit">Read More</a>
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
          @php $i = 1; @endphp
          @foreach ($ranking as $user)
            <div class="card-body rounded" onclick="window.location='/{{ $user->username }}'" role="button">
              <div class="d-flex align-items-center">
                @if($user->image == 'images/user.jpg')
                  <img src="/{{ $user->image }}" alt="profile" height="44" class="rounded-circle ms-2">
                @else
                  <img src="{{ asset('storage/' . $user->image) }}" alt="profile" width="44" height="44" class="rounded-circle ms-2">
                @endif
                <div class="d-flex flex-column text-nowrap overflow-hidden">
                  <h6 class="h6 fw-bold m-0">Rank #{{ $i }}</h6>
                  <h6 class="h6 fw-normal m-0">{{ $user->username }}</h6>
                  <h6 class="h6 fw-normal m-0">{{ $user->followers_count }} Followers</h6>
                </div>
              </div>
            </div>
            @php $i += 1; @endphp
          @endforeach
        </div>
      </section>
      <section class="col-12 bg-primary-grey card border-0 gap-halfed-height">
        <div class="card-header bg-brown text-white">
          <h6 class="h6">Public Chat</h6>
        </div>
        <div class="card-body d-flex flex-column-reverse col-12 pb-0 overflow-auto">
          @foreach ($publicChat as $chatDate)
            <div class="d-flex flex-column col-12 h-auto">
              @if ((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($tz))->format('Y-m-d') != $date)
                <p class="p-2 card mx-auto">{{ (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($tz))->format('d/m/Y') }}</p>
                @php
                  $date = (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($tz))->format('Y-m-d');
                @endphp
                <div class="d-flex flex-column-reverse">
                  @foreach ($publicChat as $chat)
                    @if (strpos($chat->created_at, $date) === 0)
                      @auth
                        @if ($chat->user_id === auth()->user()->id)
                          <div class="d-flex flex-row-reverse mb-3 chat-box">
                            {{-- @if($chat->user->image == 'images/user.jpg')
                              <img src="/{{ $chat->user->image }}" alt="profile" width="36" class="rounded-circle ms-2">
                            @else
                              <img src="{{ asset('storage/' . $chat->user->image) }}" alt="profile" width="36" class="rounded-circle ms-2">
                            @endif --}}
                            <img src="/images/lilgru.jpg" width="36" class="h-fit rounded-circle chat-image-right">
                            <div class="card bg-brown p-2 w-fit align-self-end text-white position-relative border-0">
                              <svg viewBox="0 0 16 16" width="16" height="16" class="chat-arrow-right">
                                <polygon points="8 16, 0 0, 16 0"/>
                              </svg>
                        @else
                          <div class="d-flex flex-row mb-3 chat-box">
                            <img src="/images/lilgru.jpg" width="36" class="h-fit rounded-circle chat-image-left">
                            <div class="card bg-yellow p-2 w-fit align-self-end text-brown position-relative border-0">
                              <svg viewBox="0 0 16 16" width="16" height="16" class="chat-arrow-left">
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
                        <p class="m-0 align-self-end mx-1"><sub>{{ (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chat->created_at)->setTimezone($tz))->format('h:i A') }}</sub></p>
                      </div>
                    @endif
                  @endforeach
                </div>
              @endif
            </div>
            @endforeach
          </div>
        @auth
        <div class="card-footer">
          @if (auth()->user()->suspend === 1)
            <button class="col-12 bg-danger fw-bold text-white rounded-pill">Your Account is Suspend</button>
          @else
            <form action="/chat/public" method="POST" class="d-flex gap-2">
              @csrf
              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <input type="text" name="message" class="flex-fill rounded-pill" autocomplete="off">
              <button type="submit" class="rounded-pill">Push</button>
            </form>
          @endif
        </div>
        @endauth
      </section>
    </aside>
  </div>
@endsection
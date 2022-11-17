<aside class="col-3 ps-2 position-sticky aside-home d-flex flex-column gap-3">
  <section class="col-12 bg-primary-grey card border-0 gap-halfed-height">
    <div class="card-header bg-brown text-white">
      <h6 class="h6">Member Of The Month</h6>
    </div>
    <div class="card-body ranking p-0 border-1-rem border-primary-grey overflow-auto scrollbar-none">
      @php $i = 1; @endphp
      @foreach ($aside['ranking'] as $user)
        <div class="card-body rounded" onclick="window.location='/{{ $user->username }}'" role="button">
          <div class="d-flex align-items-center">
            @if($user->image == 'images/user.jpg')
              <img src="/{{ $user->image }}" alt="profile" width="44" height="44" class="rounded-circle ms-2 me-2">
            @else
              <img src="{{ asset('storage/' . $user->image) }}" alt="profile" width="44" height="44" class="rounded-circle ms-2 me-2">
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
      @php $time = 0; @endphp
      @foreach ($aside['publicChat'] as $chatDate)
        <div class="d-flex flex-column col-12 h-auto">
          @if ((\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($aside['tz']))->format('Y-m-d') != $time)
            <p class="p-2 card mx-auto">{{ (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($aside['tz']))->format('d/m/Y') }}</p>
            @php
              $time = (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chatDate->created_at)->setTimezone($aside['tz']))->format('Y-m-d');
            @endphp
            <div class="d-flex flex-column-reverse">
              @foreach ($aside['publicChat'] as $chat)
              {{-- {{ dd($chat->user()) }} --}}
                @if (strpos($chat->created_at, $time) === 0)
                  @auth
                    @if ($chat->user_id === auth()->user()->id)
                      <div class="d-flex flex-row-reverse mb-3 chat-box">
                        {{-- @if($chat->user->image === 'images/user.jpg')
                          <img src="/{{ $chat->user->image }}" alt="profile" width="36" class="rounded-circle ms-2">
                        @else
                          <img src="{{ asset('storage/' . $user->image) }}" alt="profile" width="36" class="rounded-circle ms-2">
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
                    <p class="m-0 align-self-end mx-1"><sub>{{ (\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $chat->created_at)->setTimezone($aside['tz']))->format('h:i A') }}</sub></p>
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
        <button class="col-12 bg-danger fw-bold text-white rounded-pill">Your Account is Suspended</button>
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
<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-brown p-2">
  <div class="container-fluid d-flex justify-content-between align-items-center text-white">
    <a href="/" class="text-white d-flex align-items-center text-decoration-none">
      <img src="/images/Naka_Mano_Kohi_yellow.png" alt="logo" width="60" class="me-4">
      <h6 class="h6 m-0 text-yellow">Naka Mano Kohi</h6>
    </a>
    <form action="" class="col-5 p-2 align-self-stretch d-flex align-item-baseline gap-3">
      @csrf
      <input type="text" placeholder="Search" class="rounded col-10">
      <button type="submit" class="rounded col-2 ms-auto">Search</button>
    </form>
    <button class="navbar-toggler bg-white color-edge" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
    <ul class="navbar-nav">
      @auth
        <li class="nav-item btn-group">
          <a class="nav-link text-white text-decoration-none dropdown-toggle no-arrow me-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
            <img src="/images/lilgru.jpg" alt="profile" width="44" class="rounded-circle ms-2">
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2 me-4">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="/setting">Setting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <input class="dropdown-item" value="Logout" type="submit">
              </form>
            </li>
          </ul>
        </li>
      @else
        <li><a href="/login" class="nav-link text-white text-decoration-none me-4">Login <i class="fa-solid fa-right-to-bracket"></i></a></li>
      @endauth
    </ul>
  </div>
</nav>
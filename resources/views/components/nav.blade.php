<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-brown p-2">
  <div class="container-fluid d-flex justify-content-between align-items-center text-white">
    <a href="#" class="text-white d-flex align-items-center text-decoration-none">
      <img src="images/Naka_Mano_Kohi_yellow.png" alt="logo" width="60" class="me-4">
      <h6 class="h6 m-0 text-yellow">Naka Mano Kohi</h6>
    </a>
    <button class="navbar-toggler bg-white color-edge" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
      <!-- Example single danger button -->
      @auth
      <div class="btn-group d-flex align-items-center">
        <div type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </div>
        <img src="images/lilgru.jpg" alt="profile" width="44" class="me-4 p-1 rounded-circle ms-2">
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Dashboard</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <input class="dropdown-item" type="submit" value="Logout">
            </form>
          </li>
        </ul>
      </div>
      @else
      <li><a href="#">Login</a></li>
      @endauth
      </ul>
    </div>
  </div>
</nav>